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
<th>Order ID</th>
<th>DATE</th>
</tr>
<?php 
for ($x = 0; $x < count($orders); $x++){
    
    $user = $userbs->findById($order['users_ID']);
    echo "<tr>";
    echo '<td>' . $orders[$x]['ID'] . '</td>';
    echo '<td class="title">' . $orders[$x]['DATE'] . '</td>';
    
    echo "</tr>";
}


?>
</table>
</body> 
