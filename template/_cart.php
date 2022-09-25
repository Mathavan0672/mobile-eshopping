  <!-- SHOPPING CART -->
  <?php
  session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['delete_cart_submit'])){
            $cart->deleteCartItem($_POST['item_id']);
        }
    }

    // SAVE FOR LATER
    if(isset($_POST['save_later_submit'])){
        $cart->saveForLater($_POST['item_id']);
    }
  ?>


  <section id="cart">
      <div class="container-fluid w-75 py-3">
          <h6 class="font-baloo font-size-20 text-dark">Shopping Cart</h6>

          <!-- CART ITEMS -->
          <div class="row">

              <div class="col-sm-9">

                  <?php
                 //TO TEST
                 // $result = $product->getProduct(5);
                 //print_r($result);

                   foreach($product->getData('cart') as $items):
                   $cartItem = $product->getProduct($items['item_id']);
                   $subTotal[] = array_map(function($item){
                 // print_r($cart);
                 // print_r($items);
                  ?>

                  <div class="row border-top py-2 mt-4">
                      <div class="col-sm-2">
                          <img style=" width: 200px;"
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
                              <div class="d-flex w-50 pt-2">
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
                                  <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? 0; ?>">
                                  <button type="submit" name="delete_cart_submit"
                                      class="btn text-danger px-2 border-right">
                                      Delete
                                  </button>
                              </form>

                              <form method="POST">

                                  <!-- ADD ITEM TO WISHLIST -->
                                  <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? 0; ?>">
                                  <button type="submit" class="btn text-danger" name="save_later_submit">
                                      Save for later
                                  </button>
                                  <!-- #ADD ITEM TO WISHLIST -->

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
                   return $item['item_price']; } ,$cartItem);
            
                   //  print_r($subTotal);
                  endforeach;
                   ?>

              </div>

              <!-- SUB TOTAL -->
              <div class="col-sm-3">
                  <div class="sub-total shadow text-center mt-4">
                      <h6 class="font-baloo font-size-12 text-success">
                          <i class="fas fa-check"></i> Your order is eligible for FREE
                          delivery
                      </h6>
                      <div class="border-top py-2">
                          <h5 class="font-baloo font-size-16">
                              SubTotal( <?php echo isset($subTotal) ? count($subTotal): 0 ;?>Items ):&nbsp;<span
                                  class="text-danger"><br> RM
                                  <span
                                      id="total_price"><?php echo isset($subTotal) ? $cart->getSumTotal($subTotal):0;?></span></span>
                          </h5>
                          <button type="submit" class="btn btn-success">
                              Proceed to buy
                          </button>
                      </div>
                  </div>
              </div>
              <!-- #SUB TOTAL -->
          </div>

          <!-- #CART ITEMS -->


      </div>
  </section>
  <!-- #SHOPPING CART -->