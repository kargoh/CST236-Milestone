<?php

require_once "../../header.php";
require_once "../../Autoloader.php";

if (isset($_GET)) {
    $id = $_GET['id'];
    $firstname = $_GET['firstname'];
    $lastname = $_GET['lastname'];
    $username = $_GET['username'];
    $role = $_GET['role'];
    $password = $_GET['password'];
} else {
    echo "Nothing submitted by form. Please try again.";
}

// send a new user object to the business service  - > database service chain

$bs = new UserBusinessService();
$user = new Person($id, $firstname, $lastname, $username, $role, $password);

if ($bs->updateOne($id, $user)) {
    echo "Item updated<br>";
} else {
    echo "Nothing updated.<br>"; 
}

echo '<a href="../views/adminUsers.php">Return to Admin page</a>';

?>