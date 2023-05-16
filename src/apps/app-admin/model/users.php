<?php

$usr_sql    = "SELECT u.user_id, u.username, u.name, u.last_name, u.contact_number, u.user_position, u.user_description, u.user_listpos, u.user_image, u.user_type_id, u.last_seen, ut.user_type, u.user_position, u.date_created FROM users u INNER JOIN user_types ut ON u.user_type_id = ut.user_type_id WHERE u.user_status = 1 ORDER BY u.user_listpos DESC";
// $usr_sql    = "SELECT * FROM users LIMIT 7";
$usr_dta    = [];
$usr_qry    = prep_exec($usr_sql, $usr_dta, $sql_request_data[1]);

$is_admin   = is_admin_check();

// var_dump($usr_qry);