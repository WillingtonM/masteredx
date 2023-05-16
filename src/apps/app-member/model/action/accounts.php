<?php

if(isset($_POST)) {
  $date     = date('Y-m-d H:i:s');
  $data     = array('error' => '','data' => '', 'success' => false,'message' => '', 'url' => '');
  $user_id  = (isset($_SESSION['user_id']) && $_SESSION['user_id'] != null)?$_SESSION['user_id']:null;

  $emailkey = constant("EMAIL_KEY");

  // feedback form
  if (isset($_POST['name']) && isset($_POST['message']) && isset($_POST['email'])) {
    // code...
    $name       = sanitize($_POST['name']);
    $last_name  = '';
    $message    = sanitize($_POST['message']);
    $email      = sanitize($_POST['email']);
    $full_name  = $name . ' ' . $last_name;

    $rqrd_flds = array('name', 'message', 'email');

    $data['error'] = validate_presences($rqrd_flds);

    if (!empty($data['error'])) {
      $data['error']    = true;
      $data['message']  = "Ensure that all required fields are not empty";
    }

    // email validity
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $data['error'] = "Incorect email format";
    }

    if (empty($data['error'])) {
      $Feedbacks_sql = "INSERT INTO feedback (feedback_name, feedback_last_name, feedback_email, feedback_message, feedback_date_created, feedback_date_updated) VALUES (?, ?, ?, ?, ?, ?)";
      $Feedbacks_dta = [$name, $last_name, $email, $message, $date, $date];
      $Feedbacks_qry = prep_exec($Feedbacks_sql, $Feedbacks_dta, $sql_request_data[2]);

      if ($Feedbacks_qry) {

        // Send email preparation
        $client_ifo = array(
          "name"      => $full_name,
          "email"     => $email,
          "message"   => $message,
        );

        // Prepare to send email *************************************************
        $from       = MAIL_FROM;

        $to_usrs    = array(
          "name"    => $full_name,
          "email"   => $email
        );

        $subject    = "Feedback Message Captured";
        $html       =  user_feedback($full_name,
          $client_ifo
        );

        if ($err = $mailer->mail(array($to_usrs), $subject, $html, $from)) {
          $subject    = "New Feedback Message";
          $html       =  user_feedback_notifify($_ENV["MAIL_USER"], $client_ifo);

          $mailer->mail->clearAllRecipients();
          if ($err2 = $mailer->mail(array(array("name"    => $_ENV["MAIL_USER"], "email"   => $_ENV['MAIL_MAIL'])), $subject, $html, $from)) {
            $data['success'] = true;
            $data['message'] = 'Your message was sent succesfully.';
          } else {
            $data['error']    = true;
            $data['message']  = 'Your message was not sent';
          }
        } else {
          $data['error']    = true;
          $data['message']  = 'Your message was not sent';
        }

      } else {
        $data['error']   = true;
        $data['message']  = 'Your message was not sent';
      }

    }
  }

  // email subscription
  if(isset($_POST['signup_email'])) {
    $name         = $_POST['name'];
    $last_name    = $_POST['last_name'];
    $signup_email = sanitize($_POST['signup_email']);
    $full_name    = $name . ' ' . $last_name;

    // email validity
    if(!filter_var($signup_email, FILTER_VALIDATE_EMAIL)) { $data['error'] = true; $data['message'] = 'Incorect email format'; }

    if(empty($signup_email)){$data['error'] = true; $data['message'] = 'Please provide your email';}
    
    if(!$data['error']) {

      // check subcription if exists
      $chck_sql = "SELECT subscription_id, subscription_name, subscription_last_name, AES_DECRYPT(subscription_email, UNHEX('$emailkey')) subscription_email, subscription_token, subscription_date_created, subscription_date_updated, subscription_status FROM email_subscription WHERE AES_DECRYPT(subscription_email, UNHEX('$email_key')) = ? LIMIT 1";
      $chck_dta = [$signup_email];
      $chck_qry = prep_exec($chck_sql, $chck_dta, $sql_request_data[0]);

      if($chck_qry && $chck_qry['subscription_status'] == 1) {$data['error'] = true; $data['message'] = 'You have already subscribed to ' . PROJECT_TITLE . '\'s newsletter.';}

      if(!$data['error']) {
        if ($chck_qry && $chck_qry['subscription_status'] == 0) {
          $sbscrp_sql = "UPDATE email_subscription SET subscription_status = 1 WHERE subscription_id = ? LIMIT 1";
          $sbscrp_dta = [$chck_qry['subscription_id']];
        } else {
          $sbscrp_sql = "INSERT INTO email_subscription (subscription_name, subscription_last_name, subscription_email, subscription_date_created) VALUES (?,?, AES_ENCRYPT( ?, UNHEX('$emailkey')),?)";
          $sbscrp_dta = [$name, $last_name, $signup_email, $date];
        }

        if($sbscrp_qry = prep_exec($sbscrp_sql, $sbscrp_dta, $sql_request_data[2])) {

          $last_id          = $connect->lastInsertId();
          $token            = db_hash($last_id);
          $token_url        = "/action?distroy=true&id=" . $last_id . "&token=" . $token . '&mail=' . $signup_email;

          $upd_sql          = "UPDATE email_subscription SET subscription_token = ? WHERE subscription_id = ? LIMIT 1";
          $upd_dta          = [$token, $last_id];
          if($sql_res = prep_exec($upd_sql, $upd_dta, $sql_request_data[2])) {
            $data['success']  = true;
            $data['message']  = "You have been subscribed, please check your email inbox";
          }

          // Prepare to send email
          $from             = MAIL_FROM;
          $token_url        = "/action?distroy=true&mail=" . $signup_email;

          $to_usrs    = array(
            "name"    => $full_name,
            "email"   => $signup_email,
            "url_reset" => host_url($token_url)
          );

          $client_ifo         = $to_usrs;
          $client_ifo["url"]  = $token_url;

          $subject  = "Email Subscription";
          $html     =  email_subscription($to_usrs["name"], $client_ifo);

          if ($mailer->mail(array($to_usrs), $subject, $html, $from)) {
            $subject    = "New Email Subscription";
            $html       =  email_subscription_notify($_ENV["MAIL_USER"], $to_usrs);

            $mailer->mail->clearAllRecipients();
            if($mailer->mail(array(array("name"    => $_ENV["MAIL_USER"], "email"   => $_ENV["MAIL_MAIL"])), $subject, $html, $from)){
              $data['success'] = true;
            }
          }

          if($data['success'] == true){
            $data['error'] = '';
          }else{
            $data['success'] == false;
          }

        }

      }
    }

  }

  //
  if (isset($_POST["subscribe_token"])) {
    $id       = $_POST["id"];
    $token    = $_POST["subscribe_token"];

    $chck_sql = "SELECT subscription_id, subscription_name, subscription_last_name, AES_DECRYPT(subscription_email, UNHEX('$emailkey')) subscription_email, subscription_token, subscription_date_created, subscription_date_updated, subscription_status FROM email_subscription WHERE subscription_id = ? AND subscription_token = ? LIMIT 1";
    $chck_dta = [$id , $token];
    if($chck_qry = prep_exec($chck_sql, $chck_dta, $sql_request_data[0])) {
      $sql    = "UPDATE email_subscription SET subscription_status = 0 WHERE subscription_id = ? AND subscription_token = ? LIMIT 1";
      $dta    = [$id, $token];

      if ($qry = prep_exec($sql, $dta, $sql_request_data[2])) {
        $data['success']  = true;
        $data['message']  = 'You have been unsubscribed from ' . PROJECT_TITLE . ' mailing list';
      } else {
        $data['success']  = false;
        $data['message']  = 'There was a problem with unsubscribing you from ' . PROJECT_TITLE . ' mailing list';
      }
    } else {
      $data['success']    = false;
      $data['message']    = 'You have never subscribed with us, or you have provided us with incorrect token';
    }
  }

  // user login
  if (isset($_POST["login_password"]) && isset($_POST["login_username"])) {
    $username = $_POST['login_username'];
    $password = $_POST['login_password'];

    if (empty($password)) {
      $data['error']    = true;
      $data['message']  = "Password field is empty";
    } elseif (empty($username)) {
      $data['error']    = true;
      $data['message']  = "Username field is empty";
    }

    if (!$data['error']) {
      if ($usr_res  = get_user_by_username($username)) {
        $found_user = try_login($username, $password);

        if ($found_user) {
          $user_id = $usr_res['user_id'];
          $usr_sql = "UPDATE users SET last_seen = ? WHERE user_id = ? LIMIT 1";
          $usr_dta = [$date, $user_id];
          prep_exec($usr_sql, $usr_dta, $sql_request_data[2]);

          // check if user is guest
          $active_app               = ($usr_res['user_type'] == 'guest') ? 'member' : 'admin';
          $_SESSION['tmp_user']     = 'true';
          $_SESSION['admin_id']     = 'admin';
          $_SESSION['user_id']      = $user_id;
          $_SESSION['active_app']   = $active_app;

          $data['success']        = true;
          $data['message']        = "User succesfully logged in";
          $data['url']            = "home";
        } else {
          $data['error']    = true;
          $data['message']  = "Your username and/ or password is incorrect";
        }
      } else {
        $data['error']    = true;
        $data['message']  = "This username may not exists";
      }
    }
  }

  // users
  if (isset($_POST['position']) && isset($_POST['email']) && isset($_POST['name'])) {
    $user_type_id       = $_POST['user_type'];
    $username           = $_POST['username'];
    $name               = $_POST['name'];
    $surname            = $_POST['surname'];
    $mobile             = $_POST['mobile'];
    $telephone          = $_POST['telephone'];
    $email              = $_POST['email'];
    $password           = $_POST['password'];
    $position           = $_POST['position'];
    $province           = $_POST['province'];
    $list_position      = (empty($_POST['list_position'])) ? 0 : $_POST['list_position'];
    $user_description   = $_POST['description'];

    $usr_type_sql = "SELECT * FROM user_types WHERE user_type_id = ? LIMIT 1";
    $usr_type_dta = [$user_type_id];
    $usr_type_qry = prep_exec($usr_type_sql, $usr_type_dta, $sql_request_data[0]);

    if (!$usr_type_qry) {
      $data['error']    = true;
      $data['message']  = 'Please select a user type option';
    }

    $required           = ($usr_type_qry && $usr_type_qry['user_type'] != 'guest' && !$data['error']) ? array('username') : array('username', 'mobile');

    $errors['error']    = validate_presences($required);

    if (!empty($errors['error'])) {
      $data['error']    = true;
      $data['message']  = "Ensure that all required fields are not empty";
    }

    if (isset($_POST['username'])) {
      if ($username == '') {
        $data['error']    = true;
        $data['message']  = "Username can not be blank";
      } elseif (!has_min_length($username, 3)) {
        $data['error']    = true;
        $data['message']  = "Username must be more than 3 characters";
      }
    }

    // if (!is_valid_password($password) && $password != '') {
    //   $data['error']      = true;
    //   $data['message']    = 'Your password must contain at-least 8 characters!';
    // }


    if ($usr_type_qry && $usr_type_qry['user_type'] != 'guest' && !$data['error']) {
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //invalid email!
        $data['error']    = true;
        $data['message']  = "Incorect email format";
      }
    }

    if (!$data['error']) {
      if (isset($_POST['post_user'])) {
        $user_id      = $_POST['post_user'];
        $chck_sql     = "SELECT username FROM users WHERE user_id = ? LIMIT 1";
        $chck_dta     = [$user_id];
        $data['data'] = 'update';
        $_SESSION['last_user_id'] = $user_id;
      } else {
        $chck_sql     = "SELECT username FROM users WHERE username = ? LIMIT 1";
        $chck_dta     = [$username];
      }

      $chck_qry       = prep_exec($chck_sql, $chck_dta, $sql_request_data[0]);

      if ($chck_qry && $data['data'] != 'update') {
        $data['error']     = true;
        $data['message']   = "The user already exists, use a different username";
      } else {

        if ($password != '' && $data['data'] == 'update') {
          $password        = password_hashing($password);
        }

        $user_type_id      = $usr_type_qry['user_type_id'];
        $user_type         = $usr_type_qry['user_type'];

        if ($data['data'] == 'update') {
          if ($password != '') {
            $inst_sql     = "UPDATE users SET user_type_id = ?, user_type = ?, username = ?, contact_number = ?, alt_contact_number = ?, name = ?, last_name = ?, email = ?, user_position = ?, user_listpos = ?, user_province = ?, user_description = ?, password = ? WHERE user_id = ? LIMIT 1";
            $inst_dta     = [$user_type_id, $user_type, $username, $mobile, $telephone, $name, $surname, $email, $position, $list_position, $province, $user_description, $password, $user_id];
          } else {
            $inst_sql     = "UPDATE users SET user_type_id = ?, user_type = ?, username = ?, contact_number = ?, alt_contact_number = ?, name = ?, last_name = ?, email = ?, user_position = ?, user_listpos = ?, user_province = ?, user_description = ? WHERE user_id = ? LIMIT 1";
            $inst_dta     = [$user_type_id, $user_type, $username, $mobile, $telephone, $name, $surname, $email, $position, $list_position, $province, $user_description, $user_id];
          }
        } else {
          $password       = password_hashing($password);
          $inst_sql       = "INSERT INTO users (user_type_id, user_type, username, contact_number, alt_contact_number, name, last_name, email, password, user_position, user_listpos, user_province, user_description, date_created, last_seen) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $inst_dta       = [$user_type_id, $user_type, $username, $mobile, $telephone, $name, $surname, $email, $password, $position, $list_position, $province, $user_description, $date, $date];
        }

        if (prep_exec($inst_sql, $inst_dta, $sql_request_data[2])) {
          $last_id        = $connect->lastInsertId();
          if ($data['data'] != 'update') {
            $_SESSION['last_user_id'] = $last_id;
          }

          $data['success']  = true;
          $data['message']  = "User has been updated succesfully";
        } else {
          $data['error']    = true;
          $data['message']  = "Something went wrong, please try again";
        }
      }

      $data['data'] = '';
    }
  }



  echo json_encode($data, true);

}
