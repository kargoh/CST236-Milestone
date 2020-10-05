<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../Autoloader.php';

// get the search term from the input form
$searchPhrase = $_GET['name'];

// create an instance of the businessService
$bs = new UserBusinessService();

// the find method returns an array of person
$persons = $bs->findByFirstNameWithAddress($searchPhrase);

?>

<?php 

if ($persons) {
    // we get results
    include('_displayPeopleSearchResults.php');
} else {
    echo "Nobody found here like that<br>";
}
    
    

?>