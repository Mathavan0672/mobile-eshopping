$(document).ready(function() {

    // BANNER AREA
    $("#banner-area .owl-carousel").owlCarousel({

        dots: true,
        items: 1
    });

    // TOP SALE AREA
    $("#top-sale .owl-carousel").owlCarousel({

        loop: true,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });

    // ISOTOP FILTER

    var $grid = $(".grid").isotope({
        itemSelector:".grid-item",
        layoutMode:"fitRows"

    });

    // FILTER ITEM  ON BTN CLICK
    $('.button-group').on("click", "button", function(){
        var filterValue = $(this).attr("data-filter");
        $grid.isotope({filter:filterValue});
    });

      // NEW PHONE AREA
    $("#new-phones .owl-carousel").owlCarousel({

        loop: true,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });

      // BLOGS
    $("#blogs .owl-carousel").owlCarousel({

        loop: true,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            }
        }
    });

    // PRODUCT QTY SECTION
    let $qty_up = $('.qty .qty-up');
    let $qty_down = $('.qty .qty-down');
    let $total_price = $('#total_price');
    // let $input = $('.qty .qty_input');

    // CLICK ON QTY UP
    $qty_up.click(function(e){

    // INCREASE PRODUCT PRICE BY CALLING AJAX
         let $input = $(`.qty_input[data-id='${$(this).data('id')}']`);
         let $price = $(`.product_price[data-id='${$(this).data('id')}']`);
        $.ajax(
            {url: "template/ajax.php",
            type : 'post',
            data : { item_id : $(this).data("id")},
            success: function(result){
                // console.log(result); TO TEST
                let obj = JSON.parse(result);
                let item_price = obj[0]['item_price'];
                
                if($input.val() >= 1 && $input.val() <= 9){
                    $input.val(function(i, oldval){
                        return ++oldval;
                    })

                // INCREASE PRODUCT PRICE
                  $price.text(parseInt(item_price * $input.val()).toFixed(2));

                // INCREASE SUBTOTAL PRICE
                  let subTotal = parseInt($total_price.text()) + parseInt(item_price)
                  $total_price.text(subTotal.toFixed(2))
                }
              
            }}); //CLOSING AJAX
    });

    // CLICK ON QTY DOWN
    $qty_down.click(function(e){

        let $input = $(`.qty_input[data-id='${$(this).data('id')}']`);
        let $price = $(`.product_price[data-id='${$(this).data('id')}']`);
           $.ajax(
            {url: "template/ajax.php",
            type : 'post',
            data : { item_id : $(this).data("id")},
            success: function(result){
                // console.log(result); TO TEST
                let obj = JSON.parse(result);
                let item_price = obj[0]['item_price'];

                if($input.val() > 1 && $input.val() <= 10){
                    $input.val(function(i, oldval){
                        return --oldval;
                    })

                // INCREASE PRODUCT PRICE
                    $price.text(parseInt(item_price * $input.val()).toFixed());

                // INCREASE SUBTOTAL PRICE
                    let subTotal = parseInt($total_price.text()) - parseInt(item_price)
                    $total_price.text(subTotal.toFixed(2))
                }
                    

            }}); //CLOSING AJAX
    })

});