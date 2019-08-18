jQuery(function () {
    'use strict';

    //
    jQuery('.main-slider').owlCarousel({
        rtl: true,
        margin: 15,
        smartSpeed: 1500,
        nav: true,
        navText: ['<i class="fas fa-arrow-circle-left"></i>', '<i class="fas fa-arrow-circle-right"></i>'],
        dots: false,
        loop: true,
        autoplay: true,
        mouseDrag: true,
        touchDrag: true,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    //
    jQuery('.feature-carousel').owlCarousel({
        rtl: true,
        margin: 15,
        smartSpeed: 1500,
        nav: true,
        navText: ['<i class="fas fa-arrow-circle-left"></i>', '<i class="fas fa-arrow-circle-right"></i>'],
        dots: false,
        loop: true,
        autoplay: true,
        mouseDrag: true,
        touchDrag: true,
        autoplayHoverPause: true,
       // animateOut: 'fadeOut',
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    //
    jQuery('.client-slider').owlCarousel({
        rtl: true,
        loop: true,
        margin: 20,
        nav: true,
        navText: ['<i class="fa fa-angle-double-right"></i>', '<i class="fa fa-angle-double-left"></i>'],
        dots: true,
        mouseDrag: true,
        touchDrag: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
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

    //
    jQuery('.offer-single-carousel').owlCarousel({
        rtl: true,
        loop: true,
        margin: 15,
        nav: true,
        navText: ['<i class="fa fa-angle-double-right"></i>', '<i class="fa fa-angle-double-left"></i>'],
        dots: true,
        mouseDrag: true,
        touchDrag: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });

    //
    jQuery('.js-select,.search-sel').select2({
        //theme: "classic",
        dir: "rtl",
        width: '100%',
    });
    //tab
    jQuery('.tab ul.tabs').addClass('active').find('> li:eq(0)').addClass('current');
    jQuery('.tab ul.tabs li a').click(function (g) {
        var tab = jQuery(this).closest('.tab'),
            index = jQuery(this).closest('li').index();

        tab.find('ul.tabs > li').removeClass('current');
        jQuery(this).closest('li').addClass('current');

        tab.find('.tab-content').find('div.tabs-item').not('div.tabs-item:eq(' + index + ')').slideUp();
        tab.find('.tab-content').find('div.tabs-item:eq(' + index + ')').slideDown();

        g.preventDefault();
    });

    // activating the range slider
    jQuery(".range-slider").each(function () {
        var rangeSlider = $(this),
            from = rangeSlider.siblings(".from"),
            to   = rangeSlider.siblings(".to"),
            fromTo = rangeSlider.siblings(".from, .to")
        rangeSlider.slider({
            isRTL: true,
            range: true,
            min: rangeSlider.data("min"),
            max: rangeSlider.data("max"),
            values: [rangeSlider.data("value1"), rangeSlider.data("value2")],
            slide: function (event, ui) {
                to.val(-ui.values[ 0 ]);
                from.val(-ui.values[ 1 ]);
            }
        });
        to.val(-rangeSlider.slider( "values", 0 ));
        from.val(-rangeSlider.slider( "values", 1 ));

        fromTo.on("keyup", function () {
            var rangeSlider = $(this).siblings(".range-slider");
            if (parseInt(to.val()) > parseInt(from.val())) {
                rangeSlider.slider({
                    values: [parseInt(-to.val()), parseInt(-from.val())]
                });
            }
        });
    });

    //
    window.sr = ScrollReveal({
        reset: true,
        duration: 500,
        useDelay: "always",
        mobile: false,
        // delay: 200,
        afterReveal: function (el) {
            jQuery(el).attr("style", "");
        }
    });
    sr.reveal(".building-type-item,.latest-building-item,.search-results-item", {origin: "top"});
    sr.reveal("", {origin: "bottom"});
    sr.reveal(".feature-banner [class*='col-']:first-child", {origin: "right"});
    sr.reveal(".feature-banner [class*='col-']:last-child", {origin: "left"});




   

});
