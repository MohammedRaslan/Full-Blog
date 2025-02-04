(function ($) {

    "use strict";

    // mobile menu
     $('.main-menu').meanmenu({
        meanScreenWidth: 991
    });

    // StickyHeader
    function stickyHeader() {
        var strickyScrollPos = $('#strickymenu').next().offset().top;
        if ($('#strickymenu').length) {
            if ($(window).scrollTop() > strickyScrollPos) {
                $('#strickymenu').addClass('sticky');
                $('body').addClass('sticky');
            } else if ($(window).scrollTop() <= strickyScrollPos) {
                $('#strickymenu').removeClass('sticky');
                $('body').removeClass('sticky');
            }
        };
    }
    $(window).on('scroll', function () {
        stickyHeader();
    });

    // Slider
    $('.slide-carousel').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        autoplaySpeed: 1500,
        smartSpeed: 1500,
        margin: 0,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        dots: false,
        nav: true,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    $('.slide-carousel').on('translate.owl.carousel', function () {
        $('.text-animated h1').removeClass('fadeInDown animated').hide();
        $('.text-animated p').removeClass('fadeInUp animated').hide();
        $('.text-animated li').removeClass('fadeInUp animated').hide();
    });

    $('.slide-carousel').on('translated.owl.carousel', function () {
        $('.text-animated h1').addClass('fadeInDown animated').show();
        $('.text-animated p').addClass('fadeInUp animated').show();
        $('.text-animated li').addClass('fadeInUp animated').show();
    });

    // Team
    $('.team-carousel').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        autoplaySpeed: 1500,
        smartSpeed: 1500,
        margin: 30,
        nav: true,
        navText: ["<i class='fa fa-caret-left'></i>", "<i class='fa fa-caret-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            460: {
                items: 2
            },
            576: {
                items: 2
            },
            768: {
                items: 3
            },
            991: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    });

    // Testimonial
    $('.testimonial-carousel').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        autoplaySpeed: 1500,
        smartSpeed: 1500,
        margin: 30,
        nav: false,
        navText: ["<i class='fa fa-caret-left'></i>", "<i class='fa fa-caret-right'></i>"],
        responsive: {
            0: {
                items: 1,
                dots: false,
                nav: true,
            },
            768: {
                items: 1
            },
            992: {
                items: 1
            }
        }
    });

    // Blog
    $('.blog-carousel').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        autoplaySpeed: 1500,
        smartSpeed: 1500,
        margin: 30,
        nav: true,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    });

    // Brand
    $('.brand-carousel').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        autoplaySpeed: 1500,
        smartSpeed: 1500,
        IsCyclical:false,
        margin: 30,
        nav: false,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 2
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

    // Portfolio
    $('.portfolio-carousel').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        autoplaySpeed: 1500,
        smartSpeed: 1500,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        margin: 0,
        nav: true,
        navText: ["<i class='fa fa-caret-left'></i>", "<i class='fa fa-caret-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            992: {
                items: 1
            }
        }
    });

    // Project
    $('.project-carousel').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        autoplaySpeed: 1500,
        smartSpeed: 1500,
        margin: 25,
        nav: true,
        navText: ["<i class='fa fa-caret-left'></i>", "<i class='fa fa-caret-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                items: 3
            }
        }
    });

    // About-Us
    $('.about-carousel').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        autoplaySpeed: 1500,
        smartSpeed: 1500,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        margin: 25,
        nav: true,
        navText: ["<i class='fa fa-caret-left'></i>", "<i class='fa fa-caret-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 1
            },
            992: {
                items: 1
            }
        }
    });

    // Single-Service
    $('.single-ser-carousel').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        autoplaySpeed: 1500,
        smartSpeed: 1500,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        margin: 0,
        nav: true,
        navText: ["<i class='fa fa-caret-left'></i>", "<i class='fa fa-caret-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 1
            },
            992: {
                items: 1
            }
        }
    });

    // Recent Product
    $('.owlproduct-carousel').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        autoplaySpeed: 1500,
        smartSpeed: 1500,
        margin: 25,
        nav: true,
        navText: ["<i class='fa fa-caret-left'></i>", "<i class='fa fa-caret-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2
            },
            768: {
                items: 3
            },
            1200: {
                items: 4
            }
        }
    });

    // Spinner
    $("#shop_spinner").spinner({
        min: 1
    });

    // Magnific Popup
    $('.magnific').magnificPopup({
      type: 'image'
    });

    // Scroll-Top
    $(".scroll-top").hide();
    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 300) {
            $(".scroll-top").fadeIn();
        } else {
            $(".scroll-top").fadeOut();
        }
    });
    $(".scroll-top").on("click", function () {
        $("html, body").animate({
            scrollTop: 0,
        }, 700)
    });

    // Loader
    $(window).on('load',function() {
      "use strict";
      $('#loader').fadeOut();
    });

    // Filtr-Menu
    $('.filtr-container').filterizr();

    // Filtering section nav
    $('#filtrnav li').on('click', function() {
        $('.filtr').removeClass('filtr-active');
        $(this).addClass('filtr-active');
        var filter = $(this).data('fltr');
        filtrnav.filterizr('filter', filter);
    });


    // Counter
    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });


})(jQuery);
