<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../Autoloader.php';
require_once '../../database/UserDataService.php';

class UserBusinessService {
    
    function __construct() {
        
    }

    function showAll (){
        $persons = Array();
        
        $dbService = new UserDataService();
        $persons = $dbService->showAll();
        
        return $persons;
    }
    
    function findByFirstName($n) {
        $persons = Array();
        
        $dbService = new UserDataService();
        $persons = $dbService->findByFirstName($n);
        
        return $persons;
    }
    
    function findByLastName($n) {
        $persons = Array();
        
        $dbService = new UserDataService();
        $persons = $dbService->findByLastName($n);

        return $persons;
    }

    function findByUsername($n) {
        $persons = Array();
        
        $dbService = new UserDataService();
        $persons = $dbService->findByUsername($n);
        
        return $persons;
    }
    
    public function findbyID($id) {
        $dbService = new UserDataService();
        $person = $dbService->findbyID($id);
        
        return $person;
    }
    
    public function deleteItem($id) {
        $dbService = new UserDataService();
        
        return $dbService->deleteItem($id);
    }
    
    public function updateOne($id, $person) {
        $dbService = new UserDataService();
        return $dbService->updateOne($id, $person);
    }

    public function makeNew($person) {
        $dbService = new UserDataService();
        return $dbService->makeNew($person);
    }
    
    public function findByFirstNameWithAddress($n) {
        $persons = Array();
        
        $dbService = new UserDataService();
        $persons = $dbService->findByFirstNameWithAddress($n);
        
        return $persons;
    }
    
}
?>