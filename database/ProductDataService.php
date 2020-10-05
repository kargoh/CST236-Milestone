<?php

require_once 'Database.php';

class ProductDataService
{
    function findByProductName($n) {
        // returns an array of persons
        $db = new Database();
        $limit = 10;
        $paged = (isset($_GET['paged']) ? $_GET['paged'] : 0) * $limit; 
        
        $connection = $db->getConnection();
        $stmt = $connection->prepare("
            SELECT *
                FROM products
                JOIN images
                    ON products.ID = images.PRODUCT_ID
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
}

?>