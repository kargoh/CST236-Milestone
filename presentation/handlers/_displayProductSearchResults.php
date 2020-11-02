<?php

require_once '../../header.php';

echo '<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>';
echo '<script src="../../js/popup.js"></script>';
?>

<head>
<link rel="stylesheet" href="../../css/popup.css">
<style>
    #product { font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; border-collapse: collapse; width: 100%; }
    #product td, #product th { border: 1px solid #ddd; padding: 8px; }
    #product tr:nth-child(even) { background-color: #f2f2f2; }
    #product .row:hover { background-color: #ddd; cursor: pointer; }
    #product th { padding-top: 12px; padding-bottom: 12px; text-align: left; background-color: #4caf50; color: white; }
    #product td img { max-width: 48px; max-height: 48px;}
    .hide { opacity: .5; pointer-events: none; }

</style>
</head>
<body>
    <h1>Product Search</h1>
		<form action="ProductSearchHandler.php">
			<label>Search for a product:</label><input type="text" name="name"></input><br>
			<input type="submit" value="Search"></input>
		</form>
<table id="product">
	<thead>
        <tr>
            <th>ID</tH>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
            <th>Add to Cart</th>
        </tr>
    </thead>
    <tbody>
<?php 
for ($x = 0; $x < count($products); $x++){
    
    echo '<tr class="group">';
    
    echo '<td>' . $products[$x]['ID'] . '</td>';
    echo '<td class="title">' . $products[$x]['PRODUCTNAME'] . '</td>';
    echo '<td class="desc">' . $products[$x]['DESCRIPTION'] . '</td>';
    echo '<td class="price">' . $products[$x]['PRICE'] . '</td>';
    echo '<td><img class="thumbnail" src="' . $products[$x]['PHOTO'] . '"/></td>';
    echo "<td><form action='addToCart.php'><input type='hidden' name='id' value=" . $products[$x]['ID'] . "><input type='submit' value='Add to Cart'></form></td>";
    
    echo "</tr>";
}


?>
	</tbody>
</table>

<?php 

    $searchphrase = $_GET['name'];
    $paged = isset($_GET['paged']) ? $_GET['paged'] : 0;
    $prev_index = ($paged - 1) > 0 ? ($paged - 1) : 0;
    $next_index = ($paged + 1);
    $prev = "?name=" . $searchphrase . "&paged=" . $prev_index;
    $next = "?name=" . $searchphrase . "&paged=" . $next_index;

    
?>

<a href="<?php echo $prev; ?>" class="prev <?php echo ($_GET['paged'] == 0) ? 'hide' : ''; ?>">Previous</a>
<a href="<?php echo $next; ?>" class="next <?php echo (count($products) < 10) ? 'hide' : ''; ?>">Next</a>

<div class="popup">
    <div class="wrapper">
        <a class="close" href="#">x</a>
        <img class="thumbnail" src=""/>
        <p class="title"></p>
        <p class="price"></p>
        <p class="desc"></p>
    </div>
</div>

</body> 
