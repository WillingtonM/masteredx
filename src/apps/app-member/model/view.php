<?php
$member             = null;

// practice areas
$company_id         = (isset($_SESSION['company_id'])) ? $_SESSION['company_id'] : '';
$practices          = get_practice_areas_by_company($company_id);

if (isset($_GET['usr']) && isset($_SESSION['user_id'])) {
    $user_id        = $_SESSION['user_id'];
    $member_id      = $_GET['usr'];

    $member         = get_member_by_user_id($user_id, $member_id);
}