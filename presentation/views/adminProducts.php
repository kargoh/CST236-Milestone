<?php
require_once '../../Autoloader.php';
require_once '../../header.php';

$bs = new ProductBusinessService();

$products = $bs->showAll();

echo "<h1>All Products</h1>";

require_once '../handlers/_displayAllProducts.php';
?> 