<?php

require_once 'Database.php';

// Establish connection
$db = new Database();
$n = $_REQUEST['name'];
$un = $_REQUEST['email'];
$pw = $_REQUEST['password'];
$conn = $db->getConnection();

// Query for matching rows
$sql_query = "INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES (NULL, '" . $n . "', '" . $un . "', '" . $pw . "')";
$result = $conn->query($sql_query);

header("location:login.html");

?>