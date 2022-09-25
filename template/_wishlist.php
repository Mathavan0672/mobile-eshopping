  <!-- SHOPPING CART -->
  <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['delete_wishlist_submit'])){
                $cart->deleteWishlistItem($_POST['item_id']);
            }

            // ADD TO SHOPPING CART AGAIN
            if(isset($_POST['add_to_cart_submit'])){
                $cart->saveForLater($_POST['item_id'], 'cart', 'wishlist');
            }
        }
  ?>

  <section id="wish-list">
      <div class="container-fluid w-75 py-3">
          <h6 class="font-baloo font-size-20 text-dark">Wish List</h6>

          <!-- CART ITEMS -->
          <div class="row">

              <div class="col-sm-9">

                  <?php
                 //TO TEST
                 // $result = $product->getProduct(5);
                 //print_r($result);

                   foreach($product->getData('wishlist') as $items):
                   $cartItem = $product->getProduct($items['item_id']);
                   array_map(function($item){
                 // print_r($cart);
                 // print_r($items);
                  ?>

                  <div class="row border-top py-2 mt-4">
                      <div class="col-sm-2">
                          <img style="height: 120px"
                              src="<?php echo $item['item_image'] ?? './assets/products/1.png';?>" alt="cart1"
                              class="img-fluid" />
                      </div>

                      <div class="col-sm-8">
                          <h6 class="font-rale font-size-14"><?php echo $item['item_name'] ?? 'Unknown';?></h6>
                          <small>By <?php echo $item['item_brand'] ?? 'Brand';?></small>

                          <!-- PRODUCT RATING -->
                          <div class="d-flex">
                              <div class="rating text-warning font-size-12">
                                  <span><i class="fas fa-star"></i></span>
                                  <span><i class="fas fa-star"></i></span>
                                  <span><i class="fas fa-star"></i></span>
                                  <span><i class="fas fa-star"></i></span>
                                  <span><i class="far fa-star"></i></span>
                              </div>
                              <a href="#" class="font-rale font-size-14 px-2">201,000 rating</a>
                          </div>
                          <!--# PRODUCT RATING -->

                          <!-- PRODUCT QTY -->
                          <div class="qty d-flex">
                              <div class="d-flex w-25 pt-2">
                                  <button class="qty-up border color-second-bg text-white"
                                      data-id="<?php echo $item['item_id'] ?? 0;?>">
                                      <i class="fas fa-angle-up"></i>
                                  </button>
                                  <input data-id="<?php echo $item['item_id'] ?? 0;?>" type="text"
                                      class="qty_input border px-2 w-50 bg-light" disabled value="1" placeholder="1" />
                                  <button class="qty-down border color-second-bg text-white"
                                      data-id="<?php echo $item['item_id'] ?? 0;?>">
                                      <i class="fas fa-angle-down"></i>
                                  </button>
                              </div>
                              <form method="POST">
                                  <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                  <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? 0; ?>">
                                  <button type="submit" name="delete_wishlist_submit"
                                      class="btn text-danger px-2 border-right">
                                      Delete
                                  </button>
                              </form>

                              <form method="post">

                                  <!-- ADD TO CART AGAIN -->
                                  <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? 0; ?>">
                                  <button type="submit" name="add_to_cart_submit" class="btn text-danger">
                                      Add to cart
                                  </button>
                                  <!-- #ADD TO CART AGAIN -->
                              </form>
                          </div>
                          <!-- # PRODUCT QTY -->
                      </div>

                      <!-- PRODUCT PRICE -->
                      <div class="col-sm-2 text-right">
                          <div class="font-baloo font-size-14 text-danger">
                              RM <span class="product_price"
                                  data-id="<?php echo $item['item_id'] ?? 0;?>"><?php echo $item['item_price'] ?? 0 ;?></span>
                          </div>
                      </div>
                      <!-- #PRODUCT PRICE -->
                  </div>
                  <?php
                   } ,$cartItem);
            
                   //  print_r($subTotal);
                  endforeach;
                   ?>

              </div>
          </div>

          <!-- #CART ITEMS -->


      </div>
  </section>
  <!-- #SHOPPING CART -->