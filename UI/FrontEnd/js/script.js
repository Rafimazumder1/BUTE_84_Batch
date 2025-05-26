(function($) {

    "use strict";


    function preloader() {
        if ($('.preloader').length) {
            $('.preloader').delay(500).fadeOut(500);
        }
    }

    // Navbar
    var nav = $('.main-navbar');
    $(window).scroll(function() {
        if ($(this).scrollTop() > 80) {
            nav.addClass("fixed-header");
        } else {
            nav.removeClass("fixed-header");
        }
    });


    // //=================== FOLDED SECTION EFFECT ===================================================


    var $folded_section = $(".folded_section");
    var $folded_section_row = $(".folded_section .row");
    // var $folded_section_inner_row   = $(".folded_section.vc_inner");
    var $folded_section_col = $(".folded_section .wpb_column");
    var $folded_section_col_even = $folded_section_col.filter(":even");
    var $folded_section_col_odd = $folded_section_col.filter(":odd");

    if ($folded_section.length) {
        $folded_section.each(function() {
            $(this).addClass("separator_top separator_bottom");
        });
        $folded_section_col.each(function() {
            $(this).prepend("<div class='separator_top'><div>");
            $(this).append("<div class='separator_bottom'><div>");
            var $thebgcolor = $(this).css("background-color");
            var $thewidth = $(this).outerWidth() - 4;
            $(this).css("border-color", $thebgcolor);
            $(this).children('.separator_top').css("border-left-width", $thewidth);
            $(this).children('.separator_bottom').css("border-left-width", $thewidth);
        });

        $folded_section_row.each(function() {
            var $folded_section_col_last = $(this).children('.wpb_column').filter(":last");
            var $thewidth = $folded_section_col_last.width() - 4;
            $folded_section_col_last.children('.separator_top').css("border-left-width", $thewidth);
            $folded_section_col_last.children('.separator_bottom').css("border-left-width", $thewidth);
        });

        // $folded_section_inner_row.each(function(){
        //   var $folded_section_col_last   = $(this).children('.wpb_column').filter( ":last" );
        //   var $thewidth = $folded_section_col_last.width() - 4;
        //   $folded_section_col_last.children('.separator_top').css("border-left-width", $thewidth);
        //   $folded_section_col_last.children('.separator_bottom').css("border-left-width", $thewidth);
        // });

        $folded_section_col_even.each(function() {
            $(this).addClass("sep_triangular_downhill_top");
            $(this).addClass("sep_triangular_downhill_bottom");
        });
        $folded_section_col_odd.each(function() {
            $(this).addClass("sep_triangular_uphill_top");
            $(this).addClass("sep_triangular_uphill_bottom");
        });

        $(window).on("resize", function() {
            $folded_section_col.each(function() {
                var $thewidth = $(this).outerWidth() - 4;
                $(this).children('.separator_top').css("border-left-width", $thewidth);
                $(this).children('.separator_bottom').css("border-left-width", $thewidth);
            });
            $folded_section_row.each(function() {
                var $folded_section_col_last = $(this).children('.wpb_column').filter(":last");
                var $thewidth = $folded_section_col_last.width() - 4;
                $folded_section_col_last.children('.separator_top').css("border-left-width", $thewidth);
                $folded_section_col_last.children('.separator_bottom').css("border-left-width", $thewidth);
            });
            // $folded_section_inner_row.each(function(){
            //   var $folded_section_col_last   = $(this).children('.wpb_column').filter( ":last" );
            //   var $thewidth = $folded_section_col_last.width() - 4;
            //   $folded_section_col_last.children('.separator_top').css("border-left-width", $thewidth);
            //   $folded_section_col_last.children('.separator_bottom').css("border-left-width", $thewidth);
            // });

        });
    }

    // //END=================== FOLDED SECTION EFFECT ===================================================



    //Search Popup

    //Show Popup
    $('.search-btn').on('click', function() {
        $('#search-item').addClass('search-visible');
    });

    //Hide Popup
    $('.search-close').on('click', function() {
        $('#search-item').removeClass('search-visible');
    });





    // Testimonial Carousel
    $('.testimonial-carousel').owlCarousel({
        loop: true,
        margin: 20,
        dots: false,
        nav: true,
        rtl: false,
        autoplayHoverPause: false,
        autoplay: true,
        smartSpeed: 1000,
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0: {
                items: 1,
                center: false
            },
            480: {
                items: 1,
                center: false
            },
            600: {
                items: 1,
                center: false
            },
            768: {
                items: 3
            },
            992: {
                items: 3
            },
            1200: {
                items: 4
            }
        }
    });

    // Testimonial Carousel One
    $('.testimonial-carousel-one').owlCarousel({
        loop: true,
        margin: 0,
        dots: true,
        nav: false,
        autoplayHoverPause: false,
        autoplay: true,
        rtl: false,
        smartSpeed: 1000,
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0: {
                items: 1,
                center: false
            },
            480: {
                items: 1,
                center: false
            },
            600: {
                items: 1,
                center: false
            },
            768: {
                items: 1
            },
            992: {
                items: 1
            },
            1200: {
                items: 1
            }
        }
    });
    // Testimonial Carousel One
    $('.carousel-one').owlCarousel({
        loop: true,
        margin: 10,
        rtl: false,
        dots: false,
        nav: true,
        autoplayHoverPause: false,
        autoplay: true,
        smartSpeed: 1000,
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0: {
                items: 1,
                center: false
            },
            480: {
                items: 1,
                center: false
            },
            600: {
                items: 2,
                center: false
            },
            768: {
                items: 2
            },
            992: {
                items: 4
            },
            1200: {
                items: 6
            }
        }
    });

    // Testimonial Carousel Two
    $('.testimonial-carousel-two').owlCarousel({
        loop: true,
        margin: 10,
        dots: false,
        nav: true,
        rtl: false,
        autoplayHoverPause: false,
        autoplay: true,
        smartSpeed: 1000,
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0: {
                items: 1,
                center: false
            },
            480: {
                items: 1,
                center: false
            },
            600: {
                items: 1,
                center: false
            },
            768: {
                items: 2
            },
            992: {
                items: 4
            },
            1200: {
                items: 4
            }
        }
    });

    // Team Carousel 
    $('.team-carousel').owlCarousel({
        loop: true,
        margin: 10,
        dots: false,
        nav: true,
        autoplayHoverPause: false,
        autoplay: true,
        rtl: false,
        smartSpeed: 1000,
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0: {
                items: 1,
            },
            480: {
                items: 1,
            },
            600: {
                items: 1,
            },
            768: {
                items: 3
            },
            992: {
                items: 3
            },
            1200: {
                items: 3
            }
        }
    });

    // Event Carousel 
    $('.event-carousel').owlCarousel({
        loop: true,
        margin: 8,
        dots: false,
        nav: false,
        autoplayHoverPause: false,
        autoplay: true,
        rtl: false,
        smartSpeed: 1000,
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0: {
                items: 1,
                center: false
            },
            480: {
                items: 1,
                center: false
            },
            600: {
                items: 1,
                center: false
            },
            768: {
                items: 1
            },
            992: {
                items: 1
            },
            1200: {
                items: 1
            }
        }
    });

    // gallery Carousel 
    $('.gallery-carousel').owlCarousel({
        loop: true,
        margin: 15,
        dots: false,
        nav: false,
        rtl: false,
        autoplayHoverPause: false,
        autoplay: true,
        smartSpeed: 1000,
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0: {
                items: 1,
                center: false
            },
            480: {
                items: 1,
                center: false
            },
            600: {
                items: 1,
                center: false
            },
            768: {
                items: 4
            },
            992: {
                items: 4
            },
            1200: {
                items: 4
            }
        }
    });

    // Clients Carousel
    $('.clients-carousel').owlCarousel({
        loop: true,
        margin: 0,
        dots: false,
        nav: false,
        rtl: false,
        autoplayHoverPause: false,
        autoplay: true,
        smartSpeed: 1000,
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0: {
                items: 1,
                center: false
            },
            480: {
                items: 2,
                center: false
            },
            600: {
                items: 3,
                center: false
            },
            768: {
                items: 4
            },
            992: {
                items: 5
            },
            1200: {
                items: 6
            }
        }
    });

    // countdown Timer
    var now = new Date();
    var countTo = '2019/01/01';
    $('.timer').countdown(countTo, function(event) {
        $(this).find('.days').text(event.offset.totalDays);
        $(this).find('.hours').text(event.offset.hours);
        $(this).find('.minutes').text(event.offset.minutes);
        $(this).find('.seconds').text(event.offset.seconds);
    });


    // Counter / Funfact
    $('.start-count').each(function() {
        var $this = $(this);
        $this.data('target', parseInt($this.html(), 10));
        $this.data('counted', false);
        $this.html('0');
    });

    $(window).on('scroll', function() {
            var speed = 3000;
            $('.start-count').each(function() {
                var $this = $(this);
                if (!$this.data('counted') && $(window).scrollTop() + $(window).height() >= $this.offset().top) {
                    $this.data('counted', true);
                    $this.animate({
                        dummy: 1
                    }, {
                        duration: speed,
                        step: function(now) {
                            var $this = $(this);
                            var val = Math.round($this.data('target') * now);
                            $this.html(val);
                            if (0 < $this.parent('.value').length) {
                                $this.parent('.value').css('width', val + '%');
                            }
                        }
                    });
                }
            });
        })
        .triggerHandler('scroll');



    // Progress Ber  
    startAnimation();

    function startAnimation() {
        jQuery('.skills').each(function() {

            jQuery(this).find('.skillbar-1').animate({
                width: jQuery(this).attr('data-percent')
            }, 3000);

            jQuery(this).find('.skillbar-2').animate({
                width: jQuery(this).attr('data-percent')
            }, 3000);

            jQuery(this).find('.skillbar-3').animate({
                width: jQuery(this).attr('data-percent')
            }, 3000);

            jQuery(this).find('.skillbar-4').animate({
                width: jQuery(this).attr('data-percent')
            }, 3000);

        });
    }


    // Gallery filter

    $('.gallery-filter li').on("click", function(event) {
        $(this).siblings('.active').removeClass('active');
        $(this).addClass('active');
        event.preventDefault();
    });

    $('.gallery-filter').on('click', 'a', function() {
        $('#filters button').removeClass('current');
        $(this).addClass('current');
        var filterValue = $(this).attr('data-filter');
        $(this).parents(".gallery-filter-item").next().isotope({
            filter: filterValue
        });
    });


    // isotope | init Isotope
    var $container = $(".gallery:not(.gallery-masonry)");
    imagesLoaded($container, function() {
        setTimeout(function() {
            $container.isotope({
                itemSelector: '.gallery-item',
                layoutMode: 'fitRows',
                filter: '*'
            });

            $(window).trigger("resize");
            // filter items on button click
        }, 500);

    });

    //LightBox / Fancybox start
    $('.lightbox-image').fancybox({
        openEffect: 'elastic',
        openSpeed: 250,
        closeEffect: 'elastic',
        helpers: {
            media: {}
        }
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 150) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });
    // Scroll to top
    $('.scrollup').on('click', function() {
        $("html, body").animate({
            scrollTop: 0
        }, 1500);
        return false;
    });

    $('.player').mb_YTPlayer();


    // -- Slider -- //
    $('#bootstrap-touch-slider').bsTouchSlider();




    /* ==========================================================================
       When document is loading, do
       ========================================================================== */

    $(window).on('load', function() {
        // add your functions
        preloader();
    });



})(window.jQuery);