<!-- TOP SALE -->

<?php
session_start();   
$user = array();
if(isset($_SESSION['userID'])){
    // GET INFO FROM SERVER
$user = $register->get_user_info($_SESSION['userID'] );
};
                          
$product_shuffle = $product->getData();
shuffle($product_shuffle);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['top_sale_submit'])){

        if(empty($_POST['userID'])){
            header('Location:login.php');
        }
        // CALL ADDTOCART METHOD
        $cart->addToCart($_POST['userId'], $_POST['itemId']);
    }
}
?>

<section id="top-sale">
    <div class="container w-75 py-4">
        <h4 class="font-rubik font-size-20">Top Sale</h4>
        <hr />

        <!-- Owl-Carousel -->
        <div class="owl-carousel owl-theme">

            <?php foreach($product_shuffle as $items){?>
            <div class="item border py-2">
                <div class="text-center">
                    <div class="product font-rale">
                        <a href="<?php printf('%s?item_id=%s','products.php',$items['item_id']);?>"><img
                                src="<?php echo $items['item_image'] ?? "./assets/products/1.png";?>" alt="product1"
                                class="img-fluid" /></a>
                    </div>
                    <h6 class="py-2"><?php echo $items['item_name'] ?? 'Unknown'; ?></h6>
                    <div class="rating text-warning font-size-12">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                    </div>
                    <div class="price py-3">
                        <span>RM<?php echo $items['item_price'] ?? 0 ;?></span>
                    </div>
                    <form method="POST">
                        <input type="hidden" name="userId"
                            value="<?php echo isset($user['userID']) ? ($user['userID']):''?>">
                        <input type="hidden" name="itemId" value="<?php echo $items['item_id'] ?? 1;?>">

                        <?php
                        if(in_array($items['item_id'], $cart->getCartId($product->getData('cart')) ?? [])){
                           echo  '<button type="submit" disabled class="btn btn-danger rounded-pill px-3  font-size-12">
                                  In the cart
                                  </button>';
                        }
                        else
                        {   echo  '<button type="submit" name= "top_sale_submit" class="btn rounded-pill px-3 bg-dark text-white font-size-12">
                                 Add to cart
                                  </button>';
                        }
                        
                        ?>
                    </form>
                </div>
            </div>
            <?php } ?>


        </div>
        <!-- #Owl-Carousel -->
    </div>
</section>
<!-- #TOP SALE -->