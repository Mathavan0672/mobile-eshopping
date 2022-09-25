 <?php
 // MYSQL CONNECTION
        require('./database/dbcontroller.php');

 // PRODUCT OBJECT
        require('./database/product.php');

 // CART OBJECT
        require('./database/cart.php');

// REGISTER OBJECT
       require('./database/register.php');  

// DBCONTROLLER OBJECT
$db = new DBController;

// PRODUCT OBJECT
$product = new Product($db);
// print_r($product->getData()); TO TEST
$product_shuffle = $product->getData();

// CART OBJECT
$cart = new Cart($db);

$cart->getCartId($product->getData('cart'));

// REGISTER OBJECT
$register = new Register($db);

// print_r($cart->getCartId($product->getData('cart')));
// TO TEST
// $arr = array(
//        "user_id" => 2,
//        "item_id" => 9

// );

// $cart->insertItemIntoCart($arr);