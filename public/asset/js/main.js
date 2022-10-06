/* ===================================================================
    
    Author          : Valid Theme
    Template Name   : Boxass - Startup Landing Page Templatee
    Version         : 1.0
    
* ================================================================= */
(function($) {
    "use strict";

    $(document).on('ready', function() {


        /* ==================================================
            # Wow Init
         ===============================================*/
        var wow = new WOW({
            boxClass: 'wow', // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset: 0, // distance to the element when triggering the animation (default is 0)
            mobile: true, // trigger animations on mobile devices (default is true)
            live: true // act on asynchronously loaded content (default is true)
        });
        wow.init();

        /* ==================================================
            # Smooth Scroll
         ===============================================*/
        $("body").scrollspy({
            target: ".navbar-collapse",
            offset: 200
        });
        $('a.smooth-menu').on('click', function(event) {
            var $anchor = $(this);
            var headerH = '75';
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top - headerH + "px"
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
        });


        /* ==================================================
            # Equal Height Init
        ===============================================*/
        $(window).on('resize', function() {
            $(".equal-height").equalHeights();
        });

        $(".equal-height").equalHeights().find("img, iframe, object").on('load', function() {
            $(".equal-height").equalHeights();
        });


        /* ==================================================
            # Fun Factor Init
        ===============================================*/
        $('.timer').countTo();
        $('.fun-fact').appear(function() {
            $('.timer').countTo();
        }, {
            accY: -100
        });


        /* ==================================================
            # Magnific popup init
         ===============================================*/
        $(".popup-link").magnificPopup({
            type: 'image',
            // other options
        });

        $(".popup-gallery").magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            },
            // other options
        });

        $(".popup-youtube, .popup-vimeo, .popup-gmaps").magnificPopup({
            type: "iframe",
            mainClass: "mfp-fade",
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });

        $('.magnific-mix-gallery').each(function() {
            var $container = $(this);
            var $imageLinks = $container.find('.item');

            var items = [];
            $imageLinks.each(function() {
                var $item = $(this);
                var type = 'image';
                if ($item.hasClass('magnific-iframe')) {
                    type = 'iframe';
                }
                var magItem = {
                    src: $item.attr('href'),
                    type: type
                };
                magItem.title = $item.data('title');
                items.push(magItem);
            });

            $imageLinks.magnificPopup({
                mainClass: 'mfp-fade',
                items: items,
                gallery: {
                    enabled: true,
                    tPrev: $(this).data('prev-text'),
                    tNext: $(this).data('next-text')
                },
                type: 'image',
                callbacks: {
                    beforeOpen: function() {
                        var index = $imageLinks.index(this.st.el);
                        if (-1 !== index) {
                            this.goTo(index);
                        }
                    }
                }
            });
        });


        /* ==================================================
            # Banner Carousel
         ===============================================*/
        $('.banner-carousel').owlCarousel({
            loop: false,
            nav: false,
            dots: true,
            autoplay: true,
            items: 1,
            navText: [
                "<i class='fa fa-angle-left'></i>",
                "<i class='fa fa-angle-right'></i>"
            ],
        });

        /* ==================================================
            # Content Carousel
         ===============================================*/
        $('.content-carousel').owlCarousel({
            loop: false,
            nav: false,
            dots: true,
            autoplay: true,
            items: 1,
            navText: [
                "<i class='fa fa-angle-left'></i>",
                "<i class='fa fa-angle-right'></i>"
            ],
        });

        
        /* ==================================================
            # Features Carousel
         ===============================================*/
        $('.features-carousel').owlCarousel({
            loop: false,
            margin: 30,
            nav: false,
            navText: [
                "<i class='fa fa-angle-left'></i>",
                "<i class='fa fa-angle-right'></i>"
            ],
            dots: true,
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });


        /* ==================================================
            # Testimonial Carousel
         ===============================================*/
        $('.testimonial-carousel').owlCarousel({
            loop: false,
            nav: true,
            dots: false,
            autoplay: true,
            items: 1,
            navText: [
                "<i class='fa fa-angle-left'></i>",
                "<i class='fa fa-angle-right'></i>"
            ],
        });


        /* ==================================================
            # Team Carousel
         ===============================================*/
        $('.team-carousel').owlCarousel({
            loop: false,
            margin: 30,
            nav: false,
            navText: [
                "<i class='fa fa-angle-left'></i>",
                "<i class='fa fa-angle-right'></i>"
            ],
            dots: true,
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });


        /* ==================================================
            # Services Carousel
         ===============================================*/
        $('.services-carousel').owlCarousel({
            loop: false,
            margin: 30,
            nav: false,
            navText: [
                "<i class='fa fa-angle-left'></i>",
                "<i class='fa fa-angle-right'></i>"
            ],
            dots: true,
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });


        /* ==================================================
            # Overview Carousel
         ===============================================*/
        $('.overview-carousel').owlCarousel({
            loop: true,
            nav: false,
            navText: [
                "<i class='fa fa-angle-left'></i>",
                "<i class='fa fa-angle-right'></i>"
            ],
            dots: true,
            autoplay: true,
            center: true,
            items:1,
            margin:30,
            stagePadding:10,

            responsive:{
                600:{
                    items:1,
                    stagePadding:200

                }
            }
        });


        /* ==================================================
            # Clients Carousel
         ===============================================*/
        $('.clients-items').owlCarousel({
            loop: false,
            margin: 20,
            nav: true,
            navText: [
                "<i class='fa fa-angle-left'></i>",
                "<i class='fa fa-angle-right'></i>"
            ],
            dots: false,
            autoplay: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });


        /* ==================================================
            Preloader Init
         ===============================================*/
        $(window).on('load', function() {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");;
        });


        /* ==================================================
            Contact Form Validations
        ================================================== */
        $('.contact-form').each(function() {
            var formInstance = $(this);
            formInstance.submit(function() {

                var action = $(this).attr('action');

                $("#message").slideUp(750, function() {
                    $('#message').hide();

                    $('#submit')
                        .after('<img src="assets/img/ajax-loader.gif" class="loader" />')
                        .attr('disabled', 'disabled');

                    $.post(action, {
                            name: $('#name').val(),
                            email: $('#email').val(),
                            phone: $('#phone').val(),
                            comments: $('#comments').val()
                        },
                        function(data) {
                            document.getElementById('message').innerHTML = data;
                            $('#message').slideDown('slow');
                            $('.contact-form img.loader').fadeOut('slow', function() {
                                $(this).remove()
                            });
                            $('#submit').removeAttr('disabled');
                        }
                    );
                });
                return false;
            });
        });

    }); // end document ready function
})(jQuery); // End jQuery