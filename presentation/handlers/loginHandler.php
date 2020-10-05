<?php

require_once 'Database.php';

// Establish connection
$db = new Database();
$un = $_REQUEST['email'];
$pw = $_REQUEST['password'];
$conn = $db->getConnection();

// Query for matching rows
$sql_query = "SELECT email FROM users WHERE email = '" . $un . "' AND password ='" . $pw . "'";
$result = $conn->query($sql_query);
$rows = array();

// Populate rows array
while ($row = $result -> fetch_row()) {
    $rows[] = $row[0];    
}

// Redirect to Index if matching row is returned
if (count($rows) > 0) {
    //$_SESSION['principal'] = true;
    header("Location:index.php");
} else {
    //$_SESSION['principal'] = false;
}

?>