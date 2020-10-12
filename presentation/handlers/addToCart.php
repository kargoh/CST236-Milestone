<?php 
require_once '../../Autoloader.php';
session_start();

$id = $_GET['id'];

if (isset($_SESSION['cart'])) {
    $c = $_SESSION['cart'];
} else {
    if (isset($_SESSION['userid'])) {
        $c = new Cart($_SESSION['userid']);
    } else {
        echo "Please login first<br>";
        exit;
    }
}

$c->addItem($id);
$c->calculateTotal();

$_SESSION['cart'] = $c;

header("Location: ../views/showCart.php");

?>