<?php
 // MYSQL CONNECTION
        require('../database/dbcontroller.php');

 // PRODUCT OBJECT
        require('../database/product.php');

// DBCONTROLLER OBJECT
$db = new DBController;

// PRODUCT OBJECT
$product = new Product($db);

if(isset($_POST['item_id'])){
    
    $result = $product->getProduct($_POST['item_id']);

    echo json_encode($result);


};