<?php

$req_res            = null;
$is_admin           = is_admin_check();
// search
if (isset($_GET['name']) && !empty($_GET['name'])) {
    $search         = (isset($_GET['name'])) ? urldecode($_GET['name']) : '';
    $req_sql        = "SELECT user_id, name, last_name, username FROM users WHERE name LIKE '%$search%' OR last_name LIKE '%$search%' OR username LIKE '%$search%' AND user_status = 1 ORDER BY username DESC LIMIT 35";

    $req_dta        = [];
    $req_res        = prep_exec($req_sql, $req_dta, $sql_request_data[1]);
}
