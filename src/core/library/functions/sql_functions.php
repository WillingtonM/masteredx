<?php
$key        = constant("MERCHANT_KEY");
$email_key  = constant("EMAIL_KEY");
$date       = date('Y-m-d H:i:s');

// -----------------------------------------------------------------------------
// user

function check_user($user_id)
{
  global $sql_request_data;

  $sql_stmnt   = "SELECT * FROM users WHERE user_id = ? LIMIT 1";
  $sql_data   = [$user_id];

  return (prep_exec($sql_stmnt, $sql_data, $sql_request_data[0])) ? true : false;
}


function get_user_by_id($user_id)
{
  global $sql_request_data;

  $email_key  = constant("EMAIL_KEY");
  $userkey    = constant("USER_INFO_KEY");

  $sql_stmnt  = "SELECT * FROM users WHERE user_id = ? LIMIT 1";
  $sql_data   = [$user_id];

  return ($sql_result = prep_exec($sql_stmnt, $sql_data, $sql_request_data[0])) ? $sql_result : null;
}

function get_user_by_username($username)
{
  global $sql_request_data;

  $email_key  = constant("EMAIL_KEY");
  $userkey    = constant("USER_INFO_KEY");

  $sql_stmnt  = "SELECT * FROM users WHERE username = ? LIMIT 1";
  $sql_data   = [$username];

  return ($sql_result = prep_exec($sql_stmnt, $sql_data, $sql_request_data[0])) ? $sql_result : null;
}

function get_user_by_email($email)
{
  global $sql_request_data;

  $email_key  = constant("EMAIL_KEY");
  $userkey    = constant("USER_INFO_KEY");

  $sql_stmnt  = "SELECT * FROM users WHERE email = ? LIMIT 1";
  $sql_data   = [$email];

  return ($sql_result = prep_exec($sql_stmnt, $sql_data, $sql_request_data[0])) ? $sql_result : null;
}

function get_user_by_user_type_id($article_type_id)
{
  global $sql_request_data;

  $email_key  = constant("EMAIL_KEY");

  $sql_stmnt  = "SELECT * FROM users WHERE user_type_id = ? AND user_status = 1 ORDER BY user_listpos";
  $sql_dta    = [$article_type_id];
  return ($req_res = prep_exec($sql_stmnt, $sql_dta, $sql_request_data[1])) ? $req_res : null;
}

function get_all_user()
{
  global $sql_request_data;

  $email_key  = constant("EMAIL_KEY");

  $sql_stmnt  = "SELECT * FROM users WHERE user_status = 1 ORDER BY user_listpos";
  $sql_dta    = [];
  return ($req_res = prep_exec($sql_stmnt, $sql_dta, $sql_request_data[1])) ? $req_res : null;
}

function get_users () {
  global $sql_request_data;

  $req_sql = "SELECT * FROM users u INNER JOIN user_types ut ON u.user_type_id = ut.user_type_id WHERE u.user_status = 1 AND NOT ut.user_type_slug = 'admin' AND NOT ut.user_type_slug = 'guest' ORDER BY u.user_listpos DESC";
  $req_dta = [];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[1])) ? $req_res : null;
}


function get_media_by_id($article_id)
{
  global $sql_request_data;

  $req_sql = "SELECT * FROM media WHERE media_id = ? LIMIT 1";
  $req_dta = [$article_id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

function get_media_by_title($article_title, $media_type = '')
{
  global $sql_request_data;

  $ext_sql = (!empty($media_type)) ? " AND media_type = ? " : "";
  $req_sql = "SELECT * FROM media WHERE media_title = ? $ext_sql LIMIT 1";
  $req_dta = (!empty($media_type)) ? [$article_title, $media_type] : [$article_title];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

function get_media_by_media_type($article_type)
{
  global $sql_request_data;

  $req_sql = "SELECT * FROM media WHERE media_type = ? AND media_status = 1 ORDER BY media_publish_date DESC";
  $req_dta = [$article_type];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[1])) ? $req_res : null;
}

function count_media_by_media_type($article_type)
{
  global $sql_request_data;

  $req_sql = "SELECT * FROM media WHERE media_type = ? AND media_status = 1";
  $req_dta = [$article_type];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[3])) ? $req_res : null;
}

function get_comment_replies_by_comment_id($comment_id)
{
  global $sql_request_data;

  $req_sql = "SELECT * FROM article_comments WHERE article_comment_type = 1 AND article_comment_status = 1 AND comment_id = ? ORDER BY article_comment_date_created";
  $req_dta = [$comment_id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[1])) ? $req_res : null;
}

function get_article_by_id($article_id)
{
  global $sql_request_data;

  $req_sql = "SELECT * FROM articles WHERE article_id = ? LIMIT 1";
  $req_dta = [$article_id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

function get_article_by_title($article_title)
{
  global $sql_request_data;

  $req_sql = "SELECT * FROM articles WHERE article_title = ? LIMIT 1";
  $req_dta = [$article_title];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

function update_article_by_id($article_id)
{
  global $sql_request_data;

  $req_sql = "UPDATE articles SET article_sent = 1 WHERE article_id = ? LIMIT 1";
  $req_dta = [$article_id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[2])) ? $req_res : null;
}

function get_article_commennts_by_id($blog_id)
{
  global $sql_request_data;

  $userkey    = constant("USER_INFO_KEY");

  $sql_stmnt  = "SELECT * FROM article_comments WHERE article_id = ?";
  $sql_data   = [$blog_id];

  return ($sql_result = prep_exec($sql_stmnt, $sql_data, $sql_request_data[1])) ? $sql_result : null;
}

function get_article_by_type($article_type, $limit = 255)
{
  global $sql_request_data;

  $userkey    = constant("USER_INFO_KEY");

  $sql_stmnt  = "SELECT * FROM articles WHERE article_type = ? AND article_status = 1 ORDER BY article_publish_date DESC LIMIT $limit";
  $sql_data   = [$article_type];

  return ($sql_result = prep_exec($sql_stmnt, $sql_data, $sql_request_data[1])) ? $sql_result : null;
}

function get_article_visits_count($article_id)
{
  global $sql_request_data;

  $cnt_sql = "SELECT * FROM article_visits WHERE article_id = ?";
  $cnt_dta = [$article_id];
  return ($cnt_res = prep_exec($cnt_sql, $cnt_dta, $sql_request_data[3])) ? $cnt_res : 0;
}


// ****************************************************************************************
// events 

function get_event_by_date($event_host_date)
{
  global $sql_request_data;

  $req_sql = "SELECT * FROM events WHERE event_host_date = ? LIMIT 1";
  $req_dta = [$event_host_date];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

function get_event_by_id($event_id)
{
  global $sql_request_data;

  $req_sql = "SELECT * FROM events WHERE event_id = ? LIMIT 1";
  $req_dta = [$event_id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

function get_event_by_email($email)
{
  global $sql_request_data;

  $req_sql = "SELECT * FROM events WHERE event_user_email = ? LIMIT 1";
  $req_dta = [$email];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

function get_events()
{
  global $sql_request_data;

  $req_sql = "SELECT * FROM events ORDER BY event_date_created DESC";
  $req_dta = [];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[1])) ? $req_res : null;
}

function get_events_by_type($event_type)
{
  global $sql_request_data;

  $req_sql = "SELECT * FROM events WHERE event_type = ? AND event_processed = 0 ORDER BY event_date_created DESC";
  $req_dta = [$event_type];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[1])) ? $req_res : null;
}

function get_events_processed()
{
  global $sql_request_data;

  $req_sql = "SELECT * FROM events WHERE event_processed = 1 ORDER BY event_date_created DESC";
  $req_dta = [];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[1])) ? $req_res : null;
}

function get_events_unprocessed()
{
  global $sql_request_data;

  $req_sql = "SELECT * FROM events WHERE event_processed = 0 ORDER BY event_date_created DESC";
  $req_dta = [];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[1])) ? $req_res : null;
}


function get_page_content_by_name($page_content_name)
{
  global $sql_request_data;

  $req_sql = "SELECT * FROM page_contents WHERE page_content_name = ? LIMIT 1";
  $req_dta = [$page_content_name];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

function get_services()
{
  global $sql_request_data;

  $req_sql = "SELECT * FROM services ORDER BY service_date_created DESC";
  $req_dta = [];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[1])) ? $req_res : null;
}

function get_service_by_id($service_id)
{
  global $sql_request_data;

  $req_sql = "SELECT * FROM services WHERE service_id = ? LIMIT 1";
  $req_dta = [$service_id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

// **************************************************************************************************
// subscriptions

function get_subscriber_by_id($subscription_id)
{
  global $sql_request_data;

  $req_sql = "SELECT subscription_id, subscription_name, subscription_last_name, subscription_email, subscription_token, subscription_date_created, subscription_date_updated, subscription_edit, subscription_status FROM email_subscription WHERE subscription_id = ? LIMIT 1";
  $req_dta = [$subscription_id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

function get_subscriber_by_email($subscription_email)
{
  global $sql_request_data;

  $req_sql = "SELECT subscription_id, subscription_name, subscription_last_name, subscription_email, subscription_token, subscription_date_created, subscription_date_updated, subscription_edit, subscription_status FROM email_subscription WHERE subscription_email = ? LIMIT 1";
  $req_dta = [$subscription_email];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}


function get_subscribers()
{
  global $sql_request_data;

  $req_sql = "SELECT subscription_id, subscription_name, subscription_last_name, subscription_email, subscription_token, subscription_date_created, subscription_date_updated, subscription_status FROM email_subscription WHERE subscription_status = 1";
  $req_dta = [];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[1])) ? $req_res : null;
}

// API users
function get_api_by_user_id($user_id)
{
  global $sql_request_data;

  $req_sql = "SELECT * FROM api_users WHERE user_id = ? LIMIT 1";
  $req_dta = [$user_id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

// heeell ======================================================================

// ********************************************************
// associations
function get_association_by_user_id($user_id)
{
  global $sql_request_data;

  $cnt_sql = "SELECT * FROM associations as a INNER JOIN members m ON m.member_id = a.member_id INNER JOIN practice_areas p ON a.practice_area_id = p.practice_area_id WHERE a.user_id = ? AND a.association_status = 1";
  $cnt_dta = [$user_id];
  return ($cnt_res = prep_exec($cnt_sql, $cnt_dta, $sql_request_data[1])) ? $cnt_res : null;
}

function get_association_by_member_id($user_id)
{
  global $sql_request_data;

  $cnt_sql = "SELECT DISTINCT m.member_name, m.member_surname, m.member_id, m.member_surname_initials, a.association_status, a.practice_area_id, p.practice_area FROM associations as a INNER JOIN members m ON m.member_id = a.member_id INNER JOIN practice_areas p ON a.practice_area_id = p.practice_area_id WHERE a.member_id = ? AND a.association_status = 1";
  $cnt_dta = [$user_id];
  return ($cnt_res = prep_exec($cnt_sql, $cnt_dta, $sql_request_data[1])) ? $cnt_res : null;
}

function get_association_user_by_member_id($user_id)
{
  global $sql_request_data;

  $cnt_sql = "SELECT DISTINCT u.user_id, u.name, u.last_name, u.username, u.contact_number, a.association_status, a.practice_area_id, p.practice_area FROM associations as a INNER JOIN users u ON u.user_id = a.user_id INNER JOIN practice_areas p ON a.practice_area_id = p.practice_area_id WHERE a.member_id = ? AND a.association_status = 1";
  $cnt_dta = [$user_id];
  return ($cnt_res = prep_exec($cnt_sql, $cnt_dta, $sql_request_data[1])) ? $cnt_res : null;
}

function get_member_by_user_id($user_id, $member_id, $status_check = true)
{
  global $sql_request_data;

  $usr_sts = ($status_check) ? "AND association_status = 1" : "";
  $req_sql = "SELECT * FROM associations a INNER JOIN members m ON m.member_id = a.member_id INNER JOIN practice_areas p ON a.practice_area_id = p.practice_area_id WHERE a.user_id = ? AND a.member_id = ? $usr_sts LIMIT 1";
  $req_dta = [$user_id, $member_id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

function get_member_by_member_id($member_id, $statsu_strict = true)
{
  global $sql_request_data;

  $ext_dta = ($statsu_strict) ? 'AND member_status = 1' : '';

  $req_sql = "SELECT * FROM members WHERE member_id = ? $ext_dta LIMIT 1";
  $req_dta = [$member_id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

function get_member_by_surname_init($member_name)
{
  global $sql_request_data;

  $company_id = get_company_id();

  $req_sql = "SELECT * FROM members WHERE member_surname_initials = ? AND company_id = ? AND member_status = 1 LIMIT 1";
  $req_dta = [$member_name, $company_id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

function get_member_by_member_surname_initials($name)
{
  global $sql_request_data;

  $company_id = get_company_id();

  $req_sql = "SELECT * FROM members WHERE member_surname_initials = ?  AND company_id = ? AND member_status = 1 LIMIT 1";
  $req_dta = [$name, $company_id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

// ********************************************************
// Notifications 
function insert_notifications($user_id, $notification_alt_id, $database, $database_id, $user_type = 0, $notification_type = 0, $notification_message = '', $message_index = '')
{
  global $sql_request_data;

  $sql_stmnt  = "INSERT INTO notifications (user_id, user_type, notification_type, notification_alt_id, notification_database, notification_database_id, notification_message, notification_message_index) VALUES (?,?,?,?,?,?,?,?)";
  $sql_data   = [$user_id, $user_type, $notification_type, $notification_alt_id, $database, $database_id, $notification_message, $message_index];
  return ($sql_result = prep_exec($sql_stmnt, $sql_data, $sql_request_data[2])) ? true : false;
}

function get_notification_by_id($notification_id)
{
  global $sql_request_data;

  $req_sql = "SELECT * FROM notifications WHERE notification_id = ?  AND notification_status = 1 LIMIT 1";
  $req_dta = [$notification_id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

function get_notifications_by_user_id($user_id)
{
  global $sql_request_data;

  $req_sql = "SELECT * FROM notifications WHERE user_id = ?  AND notification_status = 1";
  $req_dta = [$user_id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[1])) ? $req_res : null;
}

// registry
function get_registry_by_id ($registry_id) {
  global $sql_request_data;

  $req_sql = "SELECT * FROM registry WHERE registry_id = ?  AND registry_status = 1 LIMIT 1";
  $req_dta = [$registry_id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}




// careers ***********************************************************************************

// get career by id
function get_career_by_id($id) {
  global $sql_request_data;

  $req_sql = "SELECT * FROM careers WHERE career_id = ? LIMIT 1";
  $req_dta = [$id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

function get_careers($limit = null, $active = false) {
  global $sql_request_data;
  $lmt_sql = ($limit) ? "LIMIT " .$limit : '';
  $dte_sql = ($active) ? "AND DATE(career_closing_date) >= DATE(NOW()) " : '';
  $req_sql = "SELECT * FROM careers WHERE career_status = 1 " . $dte_sql . "ORDER BY career_closing_date DESC " . $lmt_sql;
  $req_dta = [];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[1])) ? $req_res : null;
}

// get career application
function get_career_application_by_id($id)
{
  global $sql_request_data;

  $req_sql = "SELECT * FROM career_applications WHERE application_id = ? LIMIT 1";
  $req_dta = [$id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

function get_career_applications($limit = null, $active = 1)
{
  global $sql_request_data;
  $lmt_sql = ($limit) ? "LIMIT " . $limit : '';
  $req_sql = "SELECT * FROM career_applications WHERE application_status = ? ORDER BY application_date_created DESC " . $lmt_sql;
  $req_dta = [$active];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[1])) ? $req_res : null;
}


// orders *************************************************************************************

function get_order_by_id($id)
{
  global $sql_request_data;

  $req_sql = "SELECT * FROM orders WHERE order_id = ? LIMIT 1";
  $req_dta = [$id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

function get_order_by_code($code)
{
  global $sql_request_data;

  $req_sql = "SELECT * FROM orders WHERE order_track_code = ? LIMIT 1";
  $req_dta = [$code];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

function get_order_by_event_id($event_id) {
  global $sql_request_data;

  $req_sql = "SELECT * FROM orders WHERE event_id = ? LIMIT 1";
  $req_dta = [$event_id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

function get_orders()
{
  global $sql_request_data;

  $req_sql = "SELECT * FROM orders ORDER BY order_date DESC";
  $req_dta = [];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[1])) ? $req_res : null;
}

function get_notifications_by_order_id($order_id)
{
  global $sql_request_data;
  
  $req_sql = "SELECT * FROM notifications WHERE order_id = ? AND notification_status = 1 ORDER BY notification_created_date DESC";
  $req_dta = [$order_id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[1])) ? $req_res : null;
}

function get_notification_by_index ($order_id, $index) {
  global $sql_request_data;
  
  $req_sql = "SELECT * FROM notifications WHERE order_id = ? AND notification_message_index = ? LIMIT 1";
  $req_dta = [$order_id, $index];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

// feedback ***********************************************************************************
function get_feedback() 
{
  global $sql_request_data;

  $req_sql = "SELECT * FROM feedback WHERE feedback_status = 1 ORDER BY feedback_date_created DESC";
  $req_dta = [];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[1])) ? $req_res : null;
}


// feedback ***********************************************************************************
// user type

function get_user_type_by_id ($type_id, $user_type = 1) {
  global $sql_request_data;

  $req_inf = ($user_type == 1) ? " AND user_type_status = 1" : "";
  $req_sql = "SELECT * FROM user_types WHERE user_type_id = ?". $req_inf . " LIMIT 1";
  $req_dta = [$type_id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

function get_user_type_by_name($user_type) {
  global $sql_request_data;

  $company_id = get_company_id();

  $req_sql = "SELECT * FROM user_types ut INNER JOIN users u ON ut.user_id = u.user_id WHERE ut.user_type = ? AND u.company_id = ? LIMIT 1";
  $req_dta = [$user_type, $company_id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

function get_user_types() {
  global $sql_request_data;

  $company_id = get_company_id();

  $req_sql = "SELECT * FROM user_types WHERE user_type_status = 1 AND (company_id = ? OR user_type_default = 1)";
  $req_dta = [$company_id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[1])) ? $req_res : null;
}

// get all usertypes

// -----------------------------------------------------------------------------
// settings

function get_seetings () {
  global $sql_request_data;

  $sql_stmnt  = "SELECT * FROM settings WHERE user_id = ? LIMIT 1";
  $sql_data   = [1];

  $sql_res    = prep_exec($sql_stmnt, $sql_data, $sql_request_data[0]);
  if (!$sql_res) {
    $header   = '<p style="text-align: center; margin: 0cm 0cm 8pt; line-height: 107%; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><span style="color: #44546A; font-size: 18px;">I’ve just published a new article, please find the full text below.</span> </p>';
    $footer   = '<p style="margin-right:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;margin-top:0cm;margin-bottom:8.0pt;line-height:107%;text-align:center;border:none;padding:0cm;"><span style="color:#44546A;">&nbsp;</span></p>
          <p style="margin-right:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;margin-top:0cm;margin-bottom:8.0pt;line-height:107%;text-align:center;border:none;padding:0cm;"><span style="color:#44546A;">Regards,</span></p>
          <p style="margin-right:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;margin-top:0cm;margin-bottom:8.0pt;line-height:107%;text-align:center;border:none;padding:0cm;"><span style="color:#44546A;"> </span></p>
          <p style="margin-right:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;margin-top:0cm;margin-bottom:8.0pt;line-height:107%;border:none;padding:0cm;"><span style="color:#44546A;">&nbsp;</span></p>';
    $sql_ins  = "INSERT INTO settings (user_id, setting_email_header, setting_email_footer) VALUES (1, ?, ?)";
    $sql_dta  = [$header, $footer];

    $sql_res  = prep_exec($sql_ins, $sql_dta, $sql_request_data[0]);
  }

  return $sql_res;
}

// practice areas  -----------------------------------------------------------------------------
// 

function get_practice_area_by_id ($id) {
  global $sql_request_data;

  $req_sql = "SELECT * FROM practice_areas WHERE practice_area_id = ?  AND practice_area_status = 1 LIMIT 1";
  $req_dta = [$id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

function get_practice_areas_by_company($company_id) {
  global $sql_request_data;

  $req_sql = "SELECT * FROM practice_areas WHERE practice_area_status = 1 AND company_id = ?";
  $req_dta = [$company_id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[1])) ? $req_res : null;
}

// practice tasks  -----------------------------------------------------------------------------
// 

function get_practice_task_by_id ($id) {
  global $sql_request_data;

  $req_sql = "SELECT * FROM practice_tasks WHERE practice_task_id = ?  AND practice_task_status = 1 LIMIT 1";
  $req_dta = [$id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

function get_practice_task_by_name($task_name) {
 global $sql_request_data;

  $req_sql = "SELECT * FROM practice_tasks WHERE practice_task_name = ?  AND practice_task_status = 1 LIMIT 1";
  $req_dta = [$task_name];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

function get_practice_tasks_by_company($company_id) {
  global $sql_request_data;

  $req_sql = "SELECT * FROM practice_tasks pt INNER JOIN practice_areas pa ON pt.practice_area_id = pa.practice_area_id WHERE practice_task_status = 1 AND pa.company_id = ?";
  $req_dta = [$company_id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[1])) ? $req_res : null;
}

function count_practice_tasks_by_company($company_id) {
  global $sql_request_data;

  $req_sql = "SELECT * FROM practice_tasks pt INNER JOIN users u ON pt.user_id = u.user_id WHERE pt.practice_task_status = 1 AND u.company_id = ? ORDER BY pt.practice_task_position ASC";
  $req_dta = [$company_id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[3])) ? $req_res : null;
}

function increment_practice_task_positions($position) {
  global $sql_request_data;

  $req_sql = "UPDATE practice_tasks SET practice_task_position = practice_task_position + 1 WHERE ISNULL(practice_task_position) OR practice_task_position >= ?";
  $req_dta = [$position];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[2])) ? $req_res : null;
}

function increment_practice_task_position($task_id, $position) {
  global $sql_request_data;

  $req_sql = "UPDATE practice_tasks SET practice_task_position = ? WHERE practice_task_id = ? LIMIT 1";
  $req_dta = [$position, $task_id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[2])) ? $req_res : null;
}

function get_practice_task_position($position) {
  global $sql_request_data;

  $req_sql = "SELECT practice_task_id, practice_task_position FROM practice_tasks WHERE ISNULL(practice_task_position) OR practice_task_position > ? ORDER BY practice_task_position ASC";
  $req_dta = [$position];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[1])) ? $req_res : null;
}

function get_practice_tasks_by_practice($practice_area_id) {
  global $sql_request_data;

  $req_sql = "SELECT * FROM practice_tasks WHERE practice_task_status = 1 AND practice_area_id = ? ORDER BY practice_task_position ASC";
  $req_dta = [$practice_area_id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[1])) ? $req_res : null;
}

// activity tasks  -----------------------------------------------------------------------------
// 
function insert_activity_task ($user_id, $member_id, $task_id, $task_date) {
  global $sql_request_data;

  $sql_stmnt  = "INSERT INTO activity_tasks (user_id, member_id, practice_task_id, activity_task_date) VALUES (?,?,?,?)";
  $sql_data  = [$user_id, $member_id, $task_id, $task_date];

  return ($sql_result = prep_exec($sql_stmnt, $sql_data, $sql_request_data[2])) ? true : false;
}

function update_activity_task ($task_date, $user_id, $member_id, $practice_task_id) {
  global $sql_request_data;

  $sql_stmnt  = "UPDATE activity_tasks SET activity_task_date = ?, user_id = ? WHERE member_id = ? AND practice_task_id = ? LIMIT 1";
  $sql_data  = [$task_date, $user_id, $member_id, $practice_task_id];

  return ($sql_result = prep_exec($sql_stmnt, $sql_data, $sql_request_data[2])) ? true : false;
}

// get activity task by member_id
function get_activity_tasks_by_member_id ($member_id, $order_asc = true) {
  global $sql_request_data;

  $req_opt = ($order_asc) ? "ASC" : "DESC";

  $req_sql = "SELECT * FROM activity_tasks AS act INNER JOIN practice_tasks AS pt ON act.practice_task_id = pt.practice_task_id WHERE act.activity_task_status = 1 AND !ISNULL(act.activity_task_date) AND act.member_id = ? ORDER BY pt.practice_task_position $req_opt LIMIT 1";
  $req_dta = [$member_id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

function get_activity_tasks_by_practice_task ($member_id, $task_id) {
  global $sql_request_data;

  $req_sql = "SELECT * FROM activity_tasks AS act INNER JOIN practice_tasks AS pt ON act.practice_task_id = pt.practice_task_id WHERE act.activity_task_status = 1 AND act.member_id = ? AND act.practice_task_id = ? LIMIT 1";
  $req_dta = [$member_id, $task_id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

// office and companies  -----------------------------------------------------------------------------
// office and companies
function get_company_by_id ($id) {
  global $sql_request_data;

  $req_sql = "SELECT * FROM companies WHERE company_id = ?  AND company_status = 1 LIMIT 1";
  $req_dta = [$id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

function get_company_by_name($company_name) {
   global $sql_request_data;

  $req_sql = "SELECT * FROM companies WHERE company_name = ?  AND company_status = 1 LIMIT 1";
  $req_dta = [$company_name];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

function get_office_by_id ($id) {
  global $sql_request_data;

  $req_sql = "SELECT * FROM offices WHERE office_id = ?  AND office_status = 1 LIMIT 1";
  $req_dta = [$id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}

function get_offices_by_company($company_id) {
  global $sql_request_data;

  $req_sql = "SELECT * FROM offices WHERE office_status = 1 AND company_id = ?";
  $req_dta = [$company_id];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[1])) ? $req_res : null;
}

function get_office_by_name_company($company_id, $office_name) {
  global $sql_request_data;

  $req_sql = "SELECT * FROM offices WHERE company_id = ? AND office_name = ?  AND office_status = 1 LIMIT 1";
  $req_dta = [$company_id, $office_name];
  return ($req_res = prep_exec($req_sql, $req_dta, $sql_request_data[0])) ? $req_res : null;
}