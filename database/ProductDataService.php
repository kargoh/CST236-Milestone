<?php

require_once 'Database.php';

class ProductDataService
{

    function __construct() {

    }

    function showAll() {
        $db = new Database();
        
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT * FROM products");
        
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
            $products_array = array();
            
            while ($product = $result->fetch_assoc()) {
                array_push($products_array, $product);
            }
            
            return $products_array;
        }
    }

    function findByProductName($n) {
        // returns an array of persons
        $db = new Database();
        $limit = 10;
        $paged = (isset($_GET['paged']) ? $_GET['paged'] : 0) * $limit; 
        
        $connection = $db->getConnection();
        $stmt = $connection->prepare("
            SELECT * 
                FROM products
                WHERE PRODUCTNAME 
                LIKE ? 
                LIMIT $paged, $limit");
        
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
            $product_array = array();
            
            while ($product = $result->fetch_assoc()) {
                array_push($product_array, $product);
            }
            
            return $product_array;
        }
    }

    public function findbyID($id) {
        // returns an object of products
        $db = new Database();
        
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT * FROM products WHERE ID = ? LIMIT 1");
        
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
            $product_array = array();
            
            while ($product = $result->fetch_assoc()) {
                array_push($product_array, $product);
            }
            
            $p = new Product($product_array[0]['ID'], $product_array[0]['PRODUCTNAME'], $product_array[0]['DESCRIPTION'], $product_array[0]['PRICE'], $product_array[0]['PHOTO']);
            return $p;
        }
    }

        function deleteItem($id) {
            // $id is the number to delete. returns a true or false;
            $db = new Database();
            
            $connection = $db->getConnection();
            $stmt = $connection->prepare("DELETE FROM products WHERE ID = ? LIMIT 1");
            
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
        
        function updateOne($id, $product) {
            // $id is the number to update. returns a true or false. $person is the item to change
            $db = new Database();
            $connection = $db->getConnection();
            $stmt = $connection->prepare("UPDATE products SET PRODUCTNAME = ?, DESCRIPTION = ?, PRICE = ?, PHOTO = ? WHERE ID = ?");
            
            if (!$stmt) {
                echo "Something went wrong in the binding process. sql error?";
                exit;
            }
            
            $pn = $product->getName();
            $desc = $product->getDescription();
            $pr = $product->getPrice();
            $f = $product->getFile();
            
            $stmt->bind_param("ssdsi", $pn, $desc, $pr, $f, $id);
            $stmt->execute();
            //var_dump($stmt->affected_rows > 0); die;
            if ($stmt->affected_rows > 0) {
                return true;
            } else {
                return false;
            }
        }
    
    function makeNew($product){
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare('INSERT INTO products (PRODUCTNAME, DESCRIPTION, PRICE, PHOTO) VALUES (?,?,?,?)');
        
        if (!$stmt) {
            echo "Something went wrong in the binding process. sql error?";
            exit;
        }
        
        $pn = $product->getName();
        $desc = $product->getDescription();
        $pr = $product->getPrice();
        $f = $product->getFile();
        
        $stmt->bind_param("ssds", $pn, $desc, $pr, $f);
        $stmt->execute();
        
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
    
}

?>