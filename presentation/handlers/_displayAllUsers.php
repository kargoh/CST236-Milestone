<?php



?>

<head>

<style>
    #customers { font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; border-collapse: collapse; width: 100%; }
    #customers td, #customers th { border: 1px solid #ddd; padding: 8px; }
    #customers tr:nth-child(even) { background-color: #f2f2f2; }
    #customers tr:hover { background-color: #ddd; }
    #customers th { padding-top: 12px; padding-bottom: 12px; text-align: left; background-color: #4caf50; color: white; }
</style>
</head>
<body>
<table id="customers">

<tr>
<th>Edit</th>
<th>Delete</th>
<th>ID</tH>
<th>First Name</th>
<th>Last Name</th>
<th>Role</th>
<th>Password</th>
</tr>
<?php 
for ($x = 0; $x < count($persons); $x++){
    
    echo "<tr>";
    echo "<td><form action='editUser.php'><input type='hidden' name='id' value=" . $persons[$x]['ID'] . "><input type='submit' value='Edit'></form></td>";
    echo "<td><form action='deleteUser.php'><input type='hidden' name='id' value=" . $persons[$x]['ID'] . "><input type='submit' value='Delete'></form></td>";
    echo "<td>" . $persons[$x]['ID'] . "</td>";
    echo "<td>" . $persons[$x]['FIRST_NAME'] . "</td>";
    echo "<td>" . $persons[$x]['LAST_NAME'] . "</td>";
    echo "<td>" . $persons[$x]['ROLE'] . "</td>";
    echo "<td>" . $persons[$x]['PASSWORD'] . "</td>";
    
    echo "</tr>";
}


?>
</table>
</body> 
