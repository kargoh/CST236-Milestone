<?php

require_once '../../Autoloader.php';

class ProductBusinessService {
    
    function findByProductName($n) {
        $products = Array();
        
        $dbService = new ProductDataService();
        $products = $dbService->findByProductName($n);
        
        return $products;
    }
}
?>