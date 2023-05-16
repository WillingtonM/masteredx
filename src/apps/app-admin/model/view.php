<?php
$member             = null;

// practice areas
$company_id         = (isset($_SESSION['company_id'])) ? $_SESSION['company_id'] : '';
$practices          = get_practice_areas_by_company($company_id);

$user_type          = (isset($_GET['usr_type']))? $_GET['usr_type']:'';

if (isset($_GET['usr']) && isset($_SESSION['user_id'])) {
    $member_id      = $_GET['usr'];

    if ($user_type == 'client') {
        $member     = get_user_by_id($member_id);
    } else {
        $member     = get_member_by_member_id($member_id);
        $clients    = get_association_user_by_member_id($member_id);
    }
}
