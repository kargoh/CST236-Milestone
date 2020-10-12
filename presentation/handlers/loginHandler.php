<?php

require_once '../../Autoloader.php';
require_once '../../header.php';

// Establish connection
$db = new Database();
$un = $_REQUEST['username'];
$pw = $_REQUEST['password'];
$conn = $db->getConnection();


// Query for matching rows
$sql_query = "SELECT USERNAME, ID FROM users WHERE USERNAME = '" . $un . "' AND password ='" . $pw . "'";
$result = $conn->query($sql_query);
$rows = array();

$bs = new UserBusinessService;

$u = $bs->findbyUsername($un);

// Populate rows array
while ($row = $result -> fetch_row()) {
    $rows[] = $row[0];    
}

// Redirect to Index if matching row is returned
if (count($rows) > 0) {
    $_SESSION['principal'] = true;
    $_SESSION['userid'] = $u;
    header("Location:../../index.php");
} else {
    $_SESSION['principal'] = false;
}

?>