<?php

include "../../header.php";
include "../../Autoloader.php";

$id = $_GET['id'];

$bs = new UserBusinessService();

$success = $bs->deleteItem($id);

if ($success) {
    echo "Item was deleted<br>";
}
else {
    echo "Nothing was deleted<br>";
}

?>