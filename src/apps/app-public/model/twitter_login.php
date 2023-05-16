<?php

use Abraham\TwitterOAuth\TwitterOAuth;

$tmp_user_id    = (isset($_SESSION['TMP_USER_ID'])) ? $_SESSION['TMP_USER_ID'] : '';
$user_id        = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : $tmp_user_id;
$twt_data       = ['error' => false, 'success' => false, 'data' => ''];

// if user already verified
if (isset($_SESSION['status']) && $_SESSION['status']  == 'verified' && isset($_SESSION['request_vars'])) {
    $twitter_id         = $_SESSION['request_vars']['user_id'];
    $username           = $_SESSION['request_vars']['screen_name'];
    $oauth_token        = $_SESSION['request_vars']['oauth_token'];
    $oauth_token_secret = $_SESSION['request_vars']['oauth_token_secret'];

    $api_user           = get_api_by_user_id($user_id);

    if ($api_user) {
        $twi_connect        = new TwitterOAuth($_ENV['TWEET_API_KEY'], $_ENV['TWEET_API_KEY_SECRET'], $api_user['oauth_token'], $api_user['oauth_token_secret']);
        $content            = $twi_connect->get("account/verify_credentials");
    }

    redirect_to('home');

}

if ((isset($_GET['oauth_token']) && isset($_SESSION['user_token']) && $_SESSION['user_token'] == $_GET['oauth_token']) || (isset($_GET['oauth_token']) && isset($_GET['oauth_verifier']) && isset($_SESSION['user_token']))) {
    // call twitter API
    $oauth_token        = isset($_SESSION['user_token']) ? $_SESSION['user_token'] : $_GET['oauth_token'];
    $user_token_secret  = isset($_SESSION['user_token_secret']) ? $_SESSION['user_token_secret'] : $_GET['oauth_token_secret'];
    $outh_verifier      = isset($_GET['oauth_verifier']) ? $_GET['oauth_verifier'] : $_REQUEST['oauth_verifier'];
    $twi_connect        = new TwitterOAuth($_ENV['TWEET_API_KEY'], $_ENV['TWEET_API_KEY_SECRET'], $oauth_token, $user_token_secret);

    if (!empty($outh_verifier)) {
        $access_tokken  = $twi_connect->oauth("oauth/access_token", ["oauth_verifier" => $outh_verifier]);
        // if returns tokens
        $twi_connect    = new TwitterOAuth($_ENV['TWEET_API_KEY'], $_ENV['TWEET_API_KEY_SECRET'], $access_tokken['oauth_token'], $access_tokken['oauth_token_secret']);
        $user_info      = $twi_connect->get('account/verify_credentials');
        
        // get user_profile data from twitter
        if ($twi_connect->getLastHttpCode() == 200) {
            $user_info_arr = ((is_object($user_info)) ? (array) $user_info : (array) $user_info );

            if ( isset($user_info_arr['errors']) || isset($user_info_arr->errors)) {
                $user_info = (array) $user_info_arr;
                $twt_data['error'] = true;
                $twt_data['data']   = $user_info['errors'][0]->message;

            } else {
                if (is_object($user_info)) {
                    $usr_id         = (isset($user_info->id) && !empty($user_info->id)) ? $user_info->id : '';
                    $usr_name       = (isset($user_info->name) && !empty($user_info->name)) ? $user_info->name : '';
                    $usr_screenname = (isset($user_info->screen_name) && !empty($user_info->screen_name)) ? $user_info->screen_name : '';
                    $usr_lang       = (isset($user_info->lang) && !empty($user_info->lang)) ? $user_info->lang : '';
                    $usr_profile_img = (isset($user_info->profile_image_url) && !empty($user_info->profile_image_url)) ? $user_info->profile_image_url : '';

                } else {
                    $usr_id         = (isset($user_info['id']) && !empty($user_info['id']))? $user_info['id'] : '';
                    $usr_name       = (isset($user_info['name']) && !empty($user_info['name']))? $user_info['name'] : '';
                    $usr_screenname = (isset($user_info['screen_name']) && !empty($user_info['screen_name']))? $user_info['screen_name'] : '';
                    $usr_lang       = (isset($user_info['lang']) && !empty($user_info['lang']))? $user_info['lang'] : '';
                    $usr_profile_img = (isset($user_info['profile_image_url']) && !empty($user_info['profile_image_url']))? $user_info['profile_image_url'] : '';
                }
                
                $name           = explode(' ', $usr_name);
                $first_name     = isset($name[0]) ? $name[0] : '';
                $last_name      = isset($name[1]) ? $name[1] : '';
                $username       = $usr_screenname;
                $profile_link   = 'https://twitter.com/' . $usr_screenname;

                $oauth_provider = 'twitter';

                $twt_user_data  = [
                    'oauth_uid'   => $usr_id,
                    'first_name'  => $first_name,
                    'last_name'   => $last_name,
                    'locale'      => $usr_lang,
                    'picture'     => $usr_profile_img,
                    'link'        => $profile_link,
                    'username'    => $username,
                    'oauth_provider' => $oauth_provider,
                ];

                $_SESSION['user_data'] = $twt_user_data;

                $oauth_token        = $_SESSION['user_token'];
                $oauth_token_secret = $_SESSION['user_token_secret'];

                $user               = get_api_by_user_id($user_id);

                if ($user) {
                    $twt_sql = "UPDATE api_users SET oauth_uid = ?, first_name = ?, last_name = ?, user_locale = ?, user_image = ?, user_link =? , username = ?, oauth_provider = ?, oauth_token = ?, oauth_token_secret = ? WHERE user_id = ? LIMIT 1";
                    $twt_dta = [$usr_id, $first_name, $last_name, $usr_lang, $usr_profile_img, $profile_link, $username, $oauth_provider, $oauth_token, $oauth_token_secret, $user_id];
                } else {
                    $twt_sql = "INSERT INTO api_users (oauth_uid, user_id, first_name, last_name, user_locale, user_image, user_link, username, oauth_provider, oauth_token, oauth_token_secret ) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
                    $twt_dta = [$usr_id, $user_id, $first_name, $last_name, $usr_lang, $usr_profile_img, $profile_link, $username, $oauth_provider, $oauth_token, $oauth_token_secret];
                }

                if (prep_exec($twt_sql, $twt_dta, $sql_request_data[2])) {
                    // try login
                    $_SESSION['admin_id']   = $user_id;
                    $_SESSION['active_app'] = 'admin';
                    $_SESSION['user_id']    = $user_id;

                    $_SESSION['request_vars']   = $access_tokken;
                    $_SESSION['status']         = 'verified';

                    header("Location: " . $_SERVER['PHP_SELF']);
                }

            }

        } else {
            $user_info_array = (array) $user_info;
            $user_info_array = (array) $user_info_array['errors'];

            $twt_data['error'] = true;
            $twt_data['data']   = $user_info_array[0]->message;
        }

        // unset titter tokens
        unset($_SESSION['user_token']);
        unset($_SESSION['user_token_secret']);
    
    } else {
        $output = "Some issues occured, please try again";
    }

} else {
    $twt_data['success'] = false;
    $twt_data['data']    = 'failed to connect';
}
