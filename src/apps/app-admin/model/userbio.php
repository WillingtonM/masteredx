<?php

$office_id          = (isset($_SESSION['office_id']) && $_SESSION['office_id'] != null)?$_SESSION['office_id']:0;
$company_id         = (isset($_SESSION['company_id']) && $_SESSION['company_id'] != null)?$_SESSION['company_id']:0;

$usrt_qry           = get_user_types();

$dft_user_type      = (isset($_GET['user_type']))? $_GET['user_type']:'';
$is_admin           = is_admin_check();

$user_id            = (isset($_GET['id'])) ? $_GET['id'] : ((isset($_GET['uid'])) ? $_GET['uid'] : '');

$user               = get_user_by_id($user_id);

// modal variables
$modal_id           = 'profile';
$modal_title        = '';
$modal_size         = 'modal-lg';

$modal_backdrop     = true;
$modal_screen       = 'modal-fullscreen-md-down';
$modal_centered     = 'modal-dialog-centered';
$modal_scrollable   = 'modal-dialog-scrollable';
