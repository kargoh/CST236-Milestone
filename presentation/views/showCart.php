<?php 

require_once '../../Autoloader.php';
require_once '../../header.php';

setlocale(LC_MONETARY, 'en_US');

$productBS = new ProductBusinessService();
$userBS = new UserBusinessService();

if (isset($_SESSION['cart'])) {
    $c = $_SESSION['cart'];
} else {
    echo "Nothing in the cart yet.<br>";
    exit;
}


if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
} else {
    echo "You are not logged in yet.<br>";
    exit;
}
// check to see if cart belongs to the logged in user
if ($c->getUserid() != $userid) {
    echo "It appears that this cart does not belong to you. Please login again<br>";
    exit;
} 

// show the welcome message
//$user = $userBS->findbyID($userid);
echo "<h2>View Cart</h2>";

echo "<table>";

echo "<th>";

echo "<td>Product ID</td>";
echo "<td>Name</td>";
echo "<td>Description</td>";
echo "<td>Photo</td>";
echo "<td>Quantity</td>";
echo "<td>Product Price</td>";
echo "<td>Subtotal</td>";

echo "</th>";

foreach ($c->getItems() as $product_id => $qty) {

    $product = $productBS->findbyID($product_id);
    echo "<tr>";

    echo "<td> </td>";
    echo "<td>" . $product->getId() . "</td>";
    echo "<td>" . $product->getName() . "</td>";
    echo "<td>" . $product->getDescription() . "</td>";
    echo "<td>" . $product->getFile() . "</td>";
    echo "<td>";
    echo "<form action='updateQty.php'";
    echo "<input type='hidden' name='id' value=" .$product->getId() . ">";
    echo "<span class='input-group-text'>";
    echo "<input class='form-control' type='text' name='qty' value =" . $qty . ">";
    echo "<input class='btn btn-secondary' type='submit' name='submit' value='Update Quantity'>";
    echo "</span>";
    echo "</form>";
    echo "</td>";
    echo "<td>" . "$" . $product->getPrice() . "</td>";
    echo "<td>" . "$" . $qty * $product->getPrice() . "</td>";

    echo "</tr>";

}

echo "</table>";
echo "<h3>Total price: " . "$" . $c->getTotal_Price() . "</h3><br>";
echo "<a class='btn-primary btn' href='/CST-236/Milestone-Project/presentation/views/adminProducts.php'>Continue Shopping</a><br>";
echo "<a class='btn-primary btn' href='../handlers/processCheckout.php'>Checkout</a>";

?>

<style>
    table { font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; border-collapse: collapse; width: 100%; }
    table td, #customers th { border: 1px solid #ddd; padding: 8px; }
    table tr:nth-child(even) { background-color: #f2f2f2; }
    table tr:hover { background-color: #ddd; }
    table th { padding-top: 12px; padding-bottom: 12px; text-align: left; background-color: #4caf50; color: white; }
    .btn { margin-bottom: 16px; }
</style>