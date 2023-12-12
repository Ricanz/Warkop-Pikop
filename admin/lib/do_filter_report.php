<?php
include('../../config/function_library.php');
session_start();

if (isset($_POST['filter_range_total'])) {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    redirect("../report-total.php?start_date='$start_date'&end_date='$end_date'");
}
