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
<th>Date</th>
<th>User_ID</th>
<th>Address_ID</th>
</tr>
<?php 
for ($x = 0; $x < count($orders); $x++){
    
    echo "<tr>";
    echo "<td><form action='editProduct.php'><input type='hidden' name='id' value=" . $orders[$x]['ID'] . "><input type='submit' value='Edit'></form></td>";
    echo "<td><form action='deleteProduct.php'><input type='hidden' name='id' value=" . $orders[$x]['ID'] . "><input type='submit' value='Delete'></form></td>";
    echo '<td>' . $orders[$x]['ID'] . '</td>';
    echo '<td class="title">' . $orders[$x]['DATE'] . '</td>';
    echo '<td class="desc">' . $orders[$x]['USERS_ID'] . '</td>';
    echo '<td class="price">' . $orders[$x]['ADDRESS_ID'] . '</td>';
    
    echo "</tr>";
}


?>
</table>
</body> 
