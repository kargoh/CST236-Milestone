<?php 

include_once '../../Autoloader.php';
require_once '../../header.php';
if (isset($_SESSION['cart']) && ( isset($_SESSION['userid']))) {
    $c = $_SESSION['cart'];
} else {
    echo "No products or you are not logged in yet.<br>";
    exit;
}

$items = $c->getItems();
$total = $c->getTotal_price();

$order = new Order(null, date("Y/m/d h:i:sa"), $_SESSION['userid'], 2, $total);

$orderbs = new OrdersBusinessService();
$productbs = new ProductBusinessService();
$products = $productsbs->getAllProducts();

?>

<link rel="stylesheet" type="text/css" href="../../css/form.css">
<link rel="stylesheet" type="text/css" href="../../css/creditCard.css">

<?php
echo "<h1>Step 1</h1>";
echo
