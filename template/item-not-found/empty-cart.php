  <!-- SHOPPING CART -->
  <section id="cart">
      <div class="container-fluid w-75 py-3">
          <h6 class="font-baloo font-size-20 text-dark">Shopping Cart</h6>

          <!-- CART ITEMS -->
          <div class="row">

              <div class="col-sm-9">

                  <div class="row mt-2">
                      <div class="col-sm-12 text-center">
                          <img src="./assets/blogs/cart_empty.jpg" alt="emptycart" class="img-fluid"
                              style="height:200px">
                          <p class="font-rale font-size-14">Empty Cart</p>
                      </div>
                  </div>

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
                                  class="product-total text-danger"><br> RM
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

              <!-- #CART ITEMS -->


          </div>
  </section>
  <!-- #SHOPPING CART -->