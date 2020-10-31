<?php

include_once '../../Autoloader.php';
include_once '../../header.php';

$date1 = $_GET['startdate'];
$date2 = $_GET['enddate'];

$orderbs = new OrdersBusinessService();
$usersbs = new UserBusinessService();

$orders = $orderbs->getOrdersBetweenDates($date1, $date2);


if ($orders == null) {
    echo "Sorry. Nothing here for that date range<br>";
    exit;
} 

include '../views/_displayOrdersReportsTable.php';


?>