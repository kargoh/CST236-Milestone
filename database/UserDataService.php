<?php

require_once '../../Autoloader.php';

class UserDataService
{
    function __construct() {
        
    }

    function showAll() {
        $db = new Database();
        
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT * FROM users");
        
        if (!$stmt) {
            echo "Something went wrong in the binding process. sql error?";
            exit;
        }

        $stmt->execute();
        $result = $stmt->get_result();
        
        if (!$result) {
            echo "Assume the SQL statement has an error";
            return null;
            exit;
        }

        
        if ($result->num_rows == 0) {
            return null;
        }
        else {
            $person_array = array();
            
            while ($person = $result->fetch_assoc()) {
                array_push($person_array, $person);
            }
            
            return $person_array;
        }
    }
    
    function findByFirstName($n) {
        // returns an array of persons
        $db = new Database();
        
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT * FROM USERS WHERE FIRST_NAME LIKE ? LIMIT 1");
        
        if (!$stmt) {
            echo "Something went wrong in the binding process. sql error?";
            exit;
        }
        
        $like_n = "%" . $n . "%";
        $stmt->bind_param("s", $like_n);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if (!$result) {
            echo "Assume the SQL statement has an error";
            return null;
            exit;
        }
        
        if ($result->num_rows == 0) {
            return null;
        }
        else {
            $person_array = array();
            
            while ($person = $result->fetch_assoc()) {
                array_push($person_array, $person);
            }
            
            return $person_array;
        }
    }
    
    function findByLastName($n) {
        // returns an array of persons
        $db = new Database();
        
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT ID, FIRST_NAME, LAST_NAME FROM USERS WHERE LAST_NAME LIKE ?");
        
        if (!$stmt) {
            echo "Something went wrong in the binding process. sql error?";
            exit;
        }
        
        $like_n = "%" . $n . "%";
        $stmt->bind_param("s", $like_n);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if (!$result) {
            echo "Assume the SQL statement has an error";
            return null;
            exit;
        }
        
        if ($result->num_rows == 0) {
            return null;
        }
        else {
            $person_array = array();
            
            while ($person = $result->fetch_assoc()) {
                array_push($person_array, $person);
            }
            
            return $person_array;
        }
    }

    function findByUsername($n) {
        // returns an array of persons
        $db = new Database();
        
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT * FROM USERS WHERE USERNAME LIKE ? LIMIT 1");
        
        if (!$stmt) {
            echo "Something went wrong in the binding process. sql error?";
            exit;
        }
        
        $stmt->bind_param("s", $n);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if (!$result) {
            echo "Assume the SQL statement has an error";
            return null;
            exit;
        }
        
        if ($result->num_rows == 0) {
            return null;
        }
        else {
            $person_array = array();
            
            while ($person = $result->fetch_assoc()) {
                array_push($person_array, $person);
            }
            
            return $person_array;
        }
    }
    
    public function findbyID($id) {
        // returns an array of persons
        $db = new Database();
        
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT * FROM USERS WHERE ID = ? LIMIT 1");
        
        if (!$stmt) {
            echo "Something went wrong in the binding process. sql error?";
            exit;
        }
        
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if (!$result) {
            echo "Assume the SQL statement has an error";
            return null;
            exit;
        }
        
        if ($result->num_rows == 0) {
            return null;
        }
        else {
            $person_array = array();
            
            while ($person = $result->fetch_assoc()) {
                array_push($person_array, $person);
            }
            
            $p = new Person($person_array[0]['ID'], $person_array[0]['FIRST_NAME'], $person_array[0]['LAST_NAME'], $person_array[0]['USERNAME'], $person_array[0]['ROLE'], $person_array[0]['PASSWORD']);
            return $p;
        }
    }
    
    function deleteItem($id) {
        // $id is the number to delete. returns a true or false;
        $db = new Database();
        
        $connection = $db->getConnection();
        $stmt = $connection->prepare("DELETE FROM USERS WHERE ID = ? LIMIT 1");
        
        if (!$stmt) {
            echo "Something went wrong in the binding process. sql error?";
            exit;
        }
        
        $stmt->bind_param("s", $id);
        $stmt->execute();
        
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    function updateOne($id, $person) {
        // $id is the number to update. returns a true or false. $person is the item to change
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("UPDATE USERS SET FIRST_NAME = ?, LAST_NAME = ?, ROLE = ?, PASSWORD = ? WHERE ID = ? LIMIT 1");
        
        if (!$stmt) {
            echo "Something went wrong in the binding process. sql error?";
            exit;
        }
        
        $fn = $person->getFirst_name();
        $ln = $person->getLast_name();
        $r = $person->getRole();
        $pass = $person->getPassword();
        
        $stmt->bind_param("ssisi", $fn, $ln, $r, $pass, $id);
        $stmt->execute();
        
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    function makeNew($person){
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare('INSERT INTO users (FIRST_NAME, LAST_NAME, USERNAME, ROLE, PASSWORD) VALUES (?,?,?,?,?)');

        if (!$stmt) {
            echo "Something went wrong in the binding process. sql error?";
            exit;
        }

        $fn = $person->getFirst_name();
        $ln = $person->getLast_name();
        $un = $person->getUsername();
        $ro = $person->getRole();
        $pa = $person->getPassword();

        $stmt->bind_param("sssis", $fn, $ln, $un, $ro, $pa);
        $stmt->execute();
        
        

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    function findByFirstNameWithAddress($n) {
        $db = new Database();
        
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT USERS.ID, ISDEFAULT, FIRST_NAME, LAST_NAME, STREET, CITY, STATE, POSTALCODE
            FROM USERS
            JOIN ADDRESSES
            ON USERS.ID = ADDRESSES.USERS_ID
            WHERE FIRST_NAME LIKE ?");
        
        if (!$stmt) {
            echo "Something went wrong in the binding process. sql error?";
            exit;
        }
        
        $like_n = "%" . $n . "%";
        $stmt->bind_param("s", $like_n);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if (!$result) {
            echo "Assume the SQL statement has an error";
            return null;
            exit;
        }
        
        if ($result->num_rows == 0) {
            return null;
        }
        else {
            $person_array = array();
            $index = 0;
            
            while ($person = $result->fetch_assoc()) {
                array_push($person_array, $person);
            }
            
            return $person_array;
        }
    }
}

?>