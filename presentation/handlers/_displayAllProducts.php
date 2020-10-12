<?php



?>

<head>

<style>
    #product { font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; border-collapse: collapse; width: 100%; }
    #product td, #customers th { border: 1px solid #ddd; padding: 8px; }
    #product tr:nth-child(even) { background-color: #f2f2f2; }
    #product tr:hover { background-color: #ddd; }
    #product th { padding-top: 12px; padding-bottom: 12px; text-align: left; background-color: #4caf50; color: white; }
    #product td img { max-width: 48px; max-height: 48px;}
</style>
</head>
<body>
<table id="product">

<tr>
<th>Edit</th>
<th>Delete</th>
<th>ID</tH>
<th>Product Name</th>
<th>Product Description</th>
<th>Product Price</th>
<th>Image</th>
<th>Add to Cart</th>
</tr>
<?php 
for ($x = 0; $x < count($products); $x++){
    
    echo "<tr>";
    echo "<td><form action='editProduct.php'><input type='hidden' name='id' value=" . $products[$x]['ID'] . "><input type='submit' value='Edit'></form></td>";
    echo "<td><form action='deleteProduct.php'><input type='hidden' name='id' value=" . $products[$x]['ID'] . "><input type='submit' value='Delete'></form></td>";
    echo '<td>' . $products[$x]['ID'] . '</td>';
    echo '<td class="title">' . $products[$x]['PRODUCTNAME'] . '</td>';
    echo '<td class="desc">' . $products[$x]['DESCRIPTION'] . '</td>';
    echo '<td class="price">' . $products[$x]['PRICE'] . '</td>';
    echo '<td><img class="thumbnail" src="' . $products[$x]['PHOTO'] . '"/></td>';
    echo "<td><form action='../handlers/addToCart.php'><input type='hidden' name='id' value=" . $products[$x]['ID'] . "><input type='submit' value='Add to Cart'></form></td>";
    
    echo "</tr>";
}


?>
</table>
</body> 
