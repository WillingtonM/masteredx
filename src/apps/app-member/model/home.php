<?php

$user_id        = $_SESSION['user_id'];
$user           = get_user_by_id($_SESSION['user_id']);

$username       = $user['username'];

$associations   = get_association_by_user_id($user_id);