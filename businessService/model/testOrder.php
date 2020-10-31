<?php
require_once '../../Autoloader.php';
require_once '../../header.php';

$os = new OrdersBusinessService();

$orders = $os->getAllOrders();

echo "<h1>All Orders</h1>";

require_once '../../presentation/handlers/_displayAllOrders.php';

?>