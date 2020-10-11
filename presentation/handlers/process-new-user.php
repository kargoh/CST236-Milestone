<?php

require_once "../../header.php";
require_once "../../Autoloader.php";

if (isset($_GET)) {
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
$user = new Person(0, $firstname, $lastname, $username, $role, $password);

if ($bs->makeNew($user)) {
    echo "Item Inserted<br>";
} else {
    echo "Nothing inserted.<br>"; 
}

echo '<a href="/">Return to main page</a>';

?>