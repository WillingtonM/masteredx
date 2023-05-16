<?php
$is_admin           = is_admin_check();

$usr_arr            = null;
$registry           = null;
if (isset($_POST['user'])) {

    $rgst_dta       = [];
    
    $rgst_id        = $_POST['registry'];
    $registry       = get_registry_by_id($rgst_id);

    $user_id        = ($registry)? $registry['registry_user_id'] : '';
    $usr_arr        = get_user_by_id($user_id);
}

$usr_sql            = "SELECT * FROM users WHERE user_status = 1 && user_type != 'guest' ORDER BY date_created DESC";
$usr_dta            = [];
$registry_users     = prep_exec($usr_sql, $usr_dta, $sql_request_data[1]);

// modal variables
$modal_id           = 'registry';
$modal_title        = '';
$modal_size         = 'modal-lg/';

$modal_backdrop     = true;
$modal_screen       = 'modal-fullscreen-md-down';
$modal_centered     = 'modal-dialog-centered';
$modal_scrollable   = 'modal-dialog-scrollable';
