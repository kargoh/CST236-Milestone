<?php

require_once '../../Autoloader.php';
require_once '../../header.php';

$bs = new UserBusinessService();

$persons = $bs->showAll();

echo "<h1>All Users</h1>";

require_once '../handlers/_displayAllUsers.php';
?> 