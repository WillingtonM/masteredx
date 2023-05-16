<?php
$date = date('Y-m-d H:i:s', time());
$current_date   = DateTime::createFromFormat('Y-m-d H:i:s', $date);
$current_date   = $current_date->format('Y-m-d');
$usr_qry        = null;

$event_sql      = "SELECT * FROM events WHERE event_begin_date >= '$current_date' AND event_status = 1 ORDER BY event_begin_date ASC";
$event_dta      = [];
$upcmg_res      = prep_exec($event_sql, $event_dta, $sql_request_data[1]);
$event_row      = (is_array($upcmg_res) || is_object($upcmg_res)) ? count($upcmg_res) : 0;



$event_sql    = "SELECT * FROM events WHERE event_begin_date < '$current_date' AND event_status = 1 ORDER BY event_begin_date DESC";
$event_dta    = [];
$event_res    = prep_exec($event_sql, $event_dta, $sql_request_data[1]);
$curr_event   = 0;
