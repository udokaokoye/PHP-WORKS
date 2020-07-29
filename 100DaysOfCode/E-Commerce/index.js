

$(document).ready(function () {
   
    $('#banner-area .owl-carousel').owlCarousel({
        dots:true,
        items: 1,
        responsive:{
            0:{
              items: 1
            },
            600:{
                items: 1
            },
            1000:{
                items: 1
            }
        }
    });

    // Top Sale Carousel

    $("#top-sale .owl-carousel").owlCarousel({
        loop: false,
        nav:false,
        dots:false,
        
    });



    // NEW PRODUCTS CAROUSEL

    $("#new-product .owl-carousel").owlCarousel({
        loop: false,
        nav:false,
        dots:false,
        responsive:{
            0:{
              items: 1
            },
            600:{
                items: 3
            },
            1000:{
                items: 5
            }
        }
    });

    $("#login-drop-btn").click(function () {
        $("#login-dropdown").toggle();
    });

    // Isotope filter

    var $grid = $(".grid").isotope({
        itemSelector: ".grid-item",
        layoutMode: 'fitRows'
    });

    // Filter item on btn click
    $(".button-group").on("click", "button", function () {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({
            filter: filterValue
        })
    });

    // PRODUCT QTY BTN 
    let $qty_up = $(".qty .qty-up");
    let $qty_down = $(".qty .qty-down");
    // let $qty_input = $(".qty .qty_input");
    // CLICK TO INCREASE QTY
    $qty_up.click(function (e) {
        let $qty_input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        if ($qty_input.val() >= 1 && $qty_input.val() <= 19) {
            $qty_input.val(function(i,oldval) {
                return ++oldval;
            });
        }
    });
    // CLICK TO DECREASE QTY
    $qty_down.click(function (e) {
        let $qty_input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        if ($qty_input.val() >1 && $qty_input.val() <= 20) {
            $qty_input.val(function(i,oldval) {
                return --oldval;
            });
        }
    });
});


