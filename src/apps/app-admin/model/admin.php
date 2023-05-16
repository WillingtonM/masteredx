<?php

// practice areas
$company_id     = (isset($_SESSION['company_id'])) ? $_SESSION['company_id'] : '';
$practices      = get_practice_areas_by_company($company_id);
$practice_tasks = get_practice_tasks_by_company($company_id);

$company        = get_company_by_id($company_id);
if ($company) {
    $offices    = get_offices_by_company($company['company_id']);
}
