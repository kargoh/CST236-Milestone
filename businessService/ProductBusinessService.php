<?php

require_once '../../Autoloader.php';

class ProductBusinessService {

    function __construct() {

    }

    function showAll (){
        $products = Array();
        
        $dbService = new ProductDataService();
        $products = $dbService->showAll();
        
        return $products;
    }
    
    function findByProductName($n) {
        $products = Array();
        
        $dbService = new ProductDataService();
        $products = $dbService->findByProductName($n);
        
        return $products;
    }
    
    public function makeNew($product) {
        $dbService = new ProductDataService();
        return $dbService->makeNew($product);
    }

    public function findbyID($id) {
        $dbService = new ProductDataService();
        $product = $dbService->findbyID($id);
        return $product;
    }

    public function deleteItem($id) {
        $dbService = new ProductDataService();
        
        return $dbService->deleteItem($id);
    }

    public function updateOne($id, $product) {
        $dbService = new ProductDataService();
        return $dbService->updateOne($id, $product);
    }

}
?>