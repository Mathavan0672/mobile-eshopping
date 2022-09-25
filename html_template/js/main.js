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
    })

    // ISOTOP FILTER

    var $grid = $(".grid").isotope({
        itemSelector:".grid-item",
        layoutMode:"fitRows"

    })

    // FILTER ITEM  ON BTN CLICK
    $('.button-group').on("click", "button", function(){
        var filterValue = $(this).attr("data-filter");
        $grid.isotope({filter:filterValue});
    })

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
    })

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
    // let $input = $('.qty .qty_input');

    // CLICK ON QTY UP
    $qty_up.click(function(e){
        let $input = $(`.qty_input[data-id='${$(this).data('id')}']`);
        if($input.val() >= 1 && $input.val() <= 9){
            $input.val(function(i, oldval){
                return ++oldval;
            })
        }
    })

    // CLICK ON QTY DOWN
    $qty_down.click(function(e){
        let $input = $(`.qty_input[data-id='${$(this).data('id')}']`);
        if($input.val() > 1 && $input.val() <= 10){
            $input.val(function(i, oldval){
                return --oldval;
            })
        }
    })

})