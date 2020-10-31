<?php

class OrderDataService {

    function deleteItem($id) {
        $db = new Database();
            
        $connection = $db->getConnection();
        $stmt = $connection->prepare("DELETE FROM order WHERE ID = ? LIMIT 1");
        
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

    function findById($id) {
    // returns an object of products
    $db = new Database();
            
    $connection = $db->getConnection();
    $stmt = $connection->prepare("SELECT * FROM order WHERE ID = ? LIMIT 1");

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
        
        $p = new Order($product_array[0]['ID'], $product_array[0]['PRODUCTNAME'], $product_array[0]['DESCRIPTION'], $product_array[0]['PRICE'], $product_array[0]['PHOTO']);
        return $p;
    }
        }

    function getAllOrders() {
        $db = new Database();
        
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT * FROM orders");
        
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
            $orders_array = array();
            
            while ($order = $result->fetch_assoc()) {
                array_push($orders_array, $order);
            }
            
            return $orders_array;
        }
    }

    function updateOne($id, $order) {
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("UPDATE orders SET DATE = ? WHERE ID = ?");
        
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

    function createNew($order, $connection) {
        //$db = new Database();
        //$connection = $db->getConnection();

        $stmt = $connection->prepare("INSERT INTO orders (DATE, users_ID, ADDRESSS_ID, TOTALPRICE) VALUES (?,?,?,?)");

        if (!$stmt) {
            echo "Something wrong in the binding process. sql error?";
            exit;
        }

        $order_id = $order->getId();
        $order_date = $order->getDate();
        $user_id = $order->getUser_Id();
        $user_address_id = $order->getCc();
        $order_total = $order->getTotal();

        $stmt->bind_param("slid", $order_date, $user_id, $user_address_id, $order_total);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            //$connection->close();
            return $connection->insert_id;
        } else {
            //$connection->close();
            echo "nothing inserted into the database during newOrder";
            return false;
        }
    }

    function addDetailsLine($order_id, $orderDetails, $connection) {
        $stmt = $connection->prepare("INSERT INTO orderdetails (ORDERS_ID, PRODUCTS_ID, QUANTITY, CURRENTPRICE, CURRENTDESCRIPTION) VALUES (?,?,?,?");
        
        if(!$stmt) {
            echo "something wrong in the binding process. SQL statement error?";
            return -1;
        }

        $product_id = $orderDetails->getProduct_id();
        $quantity - $orderDetails->getQuantity();
        $price = $orderDetails->getCurrent_price();
        $description = $orderDetails->getCurrent_description();

        $stmt->bind_param("$iiids", $id, $product_id, $quantity, $price, $description);

        $stmt->execute();

        if ($stmt->affected_rows() > 0) {
            return $connection->insert_id;
        } else {
            return -1;
        }
    }

    function getOrdersBetweenDates($date1, $date2) {
        $db = new Database();
        $connection = $db->getConnection();

        $stmt = $connection->prepare("SELECT * FROM orders WHERE 'DATE' BETWEEN $date1 AND $date2");

        if (!$stmt) {
            echo "Something went wrong in the binding process. sql error?";
            exit;
        }

        $stmt->execute();
        $result = $stmt->get_result();
        
        var_dump($result); die;
        if (!$result) {
            echo "Assume the SQL statement has an error";
            return null;
            exit;
        }

        
        if ($result->num_rows == 0) {
            return null;
        }
        else {
            $orders_array = array();
            
            while ($order = $result->fetch_assoc()) {
                array_push($orders_array, $order);
            }
            
            return $orders_array;
        }
    }

}

?>