<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../Autoloader.php';

// get the search term from the input form
$searchPhrase = $_GET['name'];

// create an instance of the businessService
$bs = new ProductBusinessService();

// the find method returns an array of person
$products = $bs->findByProductName($searchPhrase);

?>

<?php 

if ($products) {
    // we get results
    include('_displayProductSearchResults.php');
} else {
    echo "Nobody found here like that<br>";
}
    
    

?>