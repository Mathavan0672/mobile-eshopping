   <!-- PRODUCTS -->
   <?php
    // ADD TO CART
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['product_submit'])){

            // CALL ADDTOCART METHOD
            $cart->addToCart($_POST['userId'], $_POST['itemId']);
        }    
    };
    
   $item_id = $_GET['item_id'] ?? 1;
   foreach($product->getData() as $items):
    if($items['item_id'] == $item_id):

   ?>

   <section id="products">
       <div class="container py-5">
           <div class="row">
               <div class="col-sm-6">
                   <img src="<?php echo $items['item_image'] ?? './assets/products/1.png';?>" alt="product1"
                       class="img-fluid" />

                   <div class="form-row pt-2">
                       <div class="col">
                           <button type="submit" class="btn btn-danger form-control font-baloo font-size-14">
                               Proceed to buy
                           </button>
                       </div>
                       <div class="col">
                           <form method="POST">

                               <input type="hidden" name="userId" value="<?php echo 1;?>">
                               <input type="hidden" name="itemId" value="<?php echo $items['item_id'] ?? 1;?>">
                               <?php

                        if(in_array($items['item_id'], $cart->getCartId($product->getData('cart')) ?? [])){

                           echo  '<button type="submit" disabled class="btn btn-success form-control px-3  font-size-12">
                                  In the cart
                                  </button>';
                        }
                        else
                        {

                           echo  '<button type="submit" name= "product_submit" class="btn btn-warning form-control px3 font-size-12">
                                 Add to cart
                                  </button>';

                        }
                        
                        ?>
                           </form>
                       </div>
                   </div>
               </div>
               <div class="col-sm-6 py-4">
                   <h6 class="font-baloo text-dark"><?php echo $items['item_name'] ?? 'Unknown';?></h6>
                   <small class="font-rubik font-size-14">By <?php echo $items['item_brand'] ?? 'brand';?></small>
                   <div class="d-flex">
                       <div class="rating text-warning font-size-12">
                           <span><i class="fas fa-star"></i></span>
                           <span><i class="fas fa-star"></i></span>
                           <span><i class="fas fa-star"></i></span>
                           <span><i class="fas fa-star"></i></span>
                           <span><i class="far fa-star"></i></span>
                       </div>
                       <a href="#" class="px-3 font-rale font-size-12">201,000 Rating | 10,000 Subscribers</a>
                   </div>
                   <hr class="m-0" />

                   <!-- PRODUCT PRICE -->
                   <table id="product-proce" class="my-4">
                       <tr class="font-baloo font-size-14">
                           <td>M.R.P</td>
                           <td>
                               <strike>RM156</strike>
                           </td>
                       </tr>

                       <tr class="font-baloo font-size-16">
                           <td>Deal Price</td>
                           <td>
                               <span class="px-2 text-danger">RM
                                   <?php echo $items['item_price'] ?? 0; ?></span><small>&nbsp:&nbsp: you save up
                                   10%</small>
                           </td>
                       </tr>

                       <tr class="font-baloo font-size-16">
                           <td>You Save</td>
                           <td>
                               <span class="px-2 text-danger"> RM 243 </span>
                           </td>
                       </tr>
                   </table>
                   <!-- #PRODUCT PRICE -->

                   <!-- POLICY -->
                   <div id="policy">
                       <div class="d-flex">

                           <div class="policy-details text-center color-second mr-5">
                               <div class="font-baloo font-size-20">
                                   <span class="fas fa-retweet border p-3 rounded-pill"></span>
                               </div>
                               <a href="#" class="font-baloo font-size-14">10 days <br>Returnable</br></a>
                           </div>

                           <div class="policy-details text-center color-second mr-5">
                               <div class="font-baloo font-size-20">
                                   <span class="fas fa-truck border p-3 rounded-pill"></span>
                               </div>
                               <a href="#" class="fonr-baloo font-size-14">Free <br>Delivery</br></a>
                           </div>

                           <div class="policy-details text-center color-second mr-5">
                               <div class="font-baloo font-size-20">
                                   <span class="fas fa-check-double border p-3 rounded-pill"></span>
                               </div>
                               <a href="#" class="fonr-baloo font-size-14">1 year <br>Warranty</br></a>
                           </div>

                       </div>
                   </div>
                   <!-- #POLICY -->
                   <hr>

                   <!-- Delivery Details -->
                   <div id="delivery-details" class="font-rale d-flex flex-column">
                       <small>Delivery on Moday At 8.45pm</small>
                       <small>Sold By <a href="#">&nbsp:&nbsp:Nexus System Services</a></small>
                       <small><i class="fas fa-map-marker-alt color-second"></i> Location of Delivery</small>
                   </div>
                   <!-- #Delivery Details -->

                   <!-- PRODUCT COLOR -->
                   <div class="row">
                       <div class="col-6">
                           <div class="color my-3">
                               <h6 class="font-baloo">Color</h6>
                               <div class="d-flex justify-content-between">
                                   <div class="p-2 color-yellow-bg rounded-circle"><button type="submit"
                                           class="btn font-size-14"></button></div>
                                   <div class="p-2 bg-light rounded-circle" style="border: 2px dotted;"><button
                                           type="submit" class="btn font-size-14"></button></div>
                                   <div class="p-2 bg-dark rounded-circle"><button type="submit"
                                           class="btn font-size-14"></button></div>
                               </div>
                           </div>
                       </div>

                       <!-- PRODUCT QTY SECTION -->
                       <div class="col-6">
                           <div class="qty d-flex">
                               <h6 class="font-baloo my-3 mr-2">Qty</h6>
                               <div class="p-2 d-flex font-rale">
                                   <button class="qty-up rounded-left bg-primary text-white" data-id="prod1"><i
                                           class="fas fa-angle-up"></i></button>
                                   <input type="text" data-id="prod1" class="qty_input border px-2 w-25 bg-light"
                                       disabled value="1" placeholder="1">
                                   <button data-id="prod1" class="qty-down rounded-right bg-primary text-white"><i
                                           class="fas fa-angle-down"></i></button>
                               </div>
                           </div>
                       </div>
                       <!-- #PRODUCT QTY SECTION -->
                   </div>
                   <!-- #PRODUCT COLOR -->

                   <!-- SIZE -->
                   <div class="size my-3">
                       <h6 class="font-baloo">RAM SIZE</h6>
                       <div class="d-flex justify-content-between w-75">
                           <div class="font-fale border p-2">
                               <button class="btn font-size-14">8 GB RAM</button>
                           </div>
                           <div class="font-fale border p-2">
                               <button class="btn font-size-14">16 GB RAM</button>
                           </div>
                           <div class="font-fale border p-2">
                               <button class="btn font-size-14">32 GB RAM</button>
                           </div>
                       </div>
                   </div>
                   <!-- #SIZE -->
               </div>

               <!-- PRODUCT DESCRIPTION -->
               <div class="col-12">
                   <h6 class="font-baloo font-size-20">Product Description</h6>
                   <p class="font-rale font-size-14">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel
                       suscipit error qui quisquam, consequuntur, recusandae laborum exercitationem, cum incidunt soluta
                       necessitatibus ipsa aliquid distinctio at nam eos ipsum earum quo?</p>
                   <p class="font-rale font-size-14">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel
                       suscipit error qui quisquam, consequuntur, recusandae laborum exercitationem, cum incidunt soluta
                       necessitatibus ipsa aliquid distinctio at nam eos ipsum earum quo?</p>
               </div>
               <!-- #PRODUCT DESCRIPTION -->
           </div>
       </div>
   </section>

   <?php
   endif;
   endforeach;
   ?>
   <!-- #PRODUCTS -->