<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../Autoloader.php';

class OrdersBusinessService {

    function checkOut($order, $cart) {
        
    }

    function getOrdersBetweenDates($date1, $date2) {
        $dbService = new OrderDataService();
        $orders = $dbService->getOrdersBetweenDates($date1, $date2);

        return $orders;
    }

    function makeNew($order, $conn) {
        $dbService = new OrderDataService();
        return $dbService->makeNew($product);
    }

    function getAllOrders() {
        $orders = Array();
        
        $dbService = new OrderDataService();
        $orders = $dbService->getAllOrders();
        
        return $orders;
    }

    function deleteItem($id) {
        $dbService = new OrderDataService();
        
        return $dbService->deleteItem($id);
    }

    function findById($id) {
        $dbService = new OrderDataService();
        $order = $dbService->findbyID($id);
        return $order;
    }

    function updateOne($id, $order) {
        $dbService = new OrderDataService();
        return $dbService->updateOne($id, $order);
    }

    function getOrderDetails($id) {
        $dbService = new OrderDataService();
        return $dbService->getOrderDetails($id);
    }

}
