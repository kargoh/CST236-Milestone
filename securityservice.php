<?php

require_once 'Database.php';

class SecurityService {
    private $un = "";
    
    function __construct($username, $password) {
        $this->password = $password;
        $this->username = $username;
    }
    
    public function authenticate() {
        if ($this->password == "" || $this->username = "") {
            return false;
        }
        if ($this->password == "secretpw" && $this->username == "isaiah") {
            return true;
        } else {
            return false;
        }
    }
}

?>