<?php


class Database {
    
    // Declare private database variables
    private $dbservername = "localhost";
    private $dbusername = "root";
    private $dbpassword = "root";
    private $dbname = "milestone";
    
    // Class constructor
    function __construct() {
        
    }
    
    // Establish database connection
    function getConnection() {
        $conn = new mysqli($this->dbservername, $this->dbusername, $this->dbpassword, $this->dbname);
        if ($conn->connect_error) {
            echo "Connection failed " . $conn->connect_error . ".<br>";
        }
            
        return $conn;
    }
}