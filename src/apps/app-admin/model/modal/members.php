<?php

$usr_arr        = null;
$last_key       = null;
$is_admin       = is_admin_check();

$practice_id    = (isset($_POST['practice']) && !empty($_POST['practice'])) ? $_POST['practice'] : 1;

$practice_tasks = get_practice_tasks_by_practice($practice_id);

if (isset($_POST['member']) && $_POST['member'] !== 'add' ) :

    $user_id    = $_POST['member'];
    $usr_arr    = get_member_by_member_id($user_id);

    // $last_key   = member_state($usr_arr)['key_text'];
    $first_key  = get_activity_tasks_by_member_id($user_id);
    $last_task  = get_activity_tasks_by_member_id($user_id, false);
endif;

var_dump($last_key);

// modal variables
$modal_id         = 'members';
$modal_title      = '';
$modal_size       = 'modal-lg';

$modal_backdrop   = true;
$modal_screen     = 'modal-fullscreen-md-down';
$modal_centered   = 'modal-dialog-centered';
$modal_scrollable = 'modal-dialog-scrollable';
