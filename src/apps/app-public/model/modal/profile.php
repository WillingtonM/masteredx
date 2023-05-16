<?php

$user_id            = (isset($_POST['user'])) ? $_POST['user'] : '';

$user               = get_user_by_id($user_id);

// modal variables
$modal_id           = 'profile';
$modal_title        = '';
$modal_size         = 'modal-lg';

$modal_backdrop     = false;
$modal_screen       = 'modal-fullscreen-md-down';
$modal_centered     = 'modal-dialog-centered';
$modal_scrollable   = 'modal-dialog-scrollable';
