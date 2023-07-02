jQuery(function () {
    jQuery('.main__contacts__hide').click(function() {
        console.log(1)
        jQuery(this).remove();
    });
    gsap.registerPlugin(ScrollTrigger);

    function burg() {
        var burgerWr = jQuery('.burger-wrap'),
            burgerBtn = jQuery('.burger-btn'),
            burgerBody = jQuery('.burger-body'),
            burgerCloseBtn = jQuery('.burger-close-btn');

        burgerBtn.on('click', function () {
            jQuery(burgerWr).addClass('opened');
            jQuery('html').addClass('owh');
        });

        burgerCloseBtn.on('click', function () {
            jQuery(burgerWr).removeClass('opened');
            jQuery('html').removeClass('owh');
        })
    }

    burg();

    jQuery(document).on('click', function (e) {
        if (jQuery(e.target).closest('.burger-btn').length || jQuery(e.target).closest('.burger-body').length)
            return;

        jQuery('.burger-wrap').removeClass('opened');
        jQuery('html').removeClass('owh');
    });
    jQuery('.js_rev_sl').on("init", function (event, slick) {
        jQuery(".count").text(parseInt(slick.currentSlide + 1) + ' / ' + slick.slideCount);
    });

    jQuery('.js_rev_sl').on("afterChange", function (event, slick, currentSlide) {
        jQuery(".count").text(parseInt(slick.currentSlide + 1) + ' / ' + slick.slideCount);
    });
    jQuery('.js_rev_sl').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        fade: true,
    });
    jQuery('.js_ab_sl').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        variableWidth: true
    });
    jQuery('.content_slider_js').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: false
    });
    jQuery('.js_mast_sl').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        responsive: [{
            breakpoint: 1024,
            settings: {
                variableWidth: true,
                arrows: true,
                slidesToShow: 1
            }
        }, ]
    });
    var mastersSlider = jQuery('.slider-for').slick({
        // centerMode: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        // variableWidth: true,
        // asNavFor: '.slider-nav',
        responsive: [{
            breakpoint: 1024,
            settings: {
                centerMode: false,
                variableWidth: true
            }
        }, ]
    });
    var navSlider = jQuery('.slider-nav').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        initialSlide: 1,
        // asNavFor: '.slider-for',
        dots: false
    });
    mastersSlider.on('beforeChange', function(event, slick, currentSlide, nextSlide){
        navSlider.slick('slickGoTo', nextSlide+1);
    });
    navSlider.on('beforeChange', function(event, slick, currentSlide, nextSlide){
        mastersSlider.slick('slickGoTo', nextSlide-1);
    });
    

    function initAnimation() {
        var headerTextHeight = jQuery('.header__text').innerHeight();
        console.log(headerTextHeight);
        jQuery('.main_services__block').each(function() {
            gsap.to(jQuery(this).find('.main_services__l-side'), {
                scrollTrigger: {
                    trigger: jQuery(this),
                    start: 'top bottom-=400',
                    end: 'bottom bottom-=400',
                    scrub: 2,
                    // markers: true,
                },
                y: 0,
            })
            // gsap.to(jQuery(this).find('.main_services__r-side'), {
            //     scrollTrigger: {
            //         trigger: jQuery(this),
            //         start: 'top bottom-=400',
            //         end: 'bottom bottom-=400',
            //         scrub: 2,
            //         // markers: true,
            //     },
            //     y: 0,
            // })
        });
        jQuery('.sales_block__block').each(function() {
            gsap.to(jQuery(this).find('.sales_block__l-side'), {
                scrollTrigger: {
                    trigger: jQuery(this),
                    start: 'top bottom-=400',
                    end: 'bottom bottom-=400',
                    scrub: 2,
                    // markers: true,
                },
                y: 0,
            })
            // gsap.to(jQuery(this).find('.sales_block__r-side'), {
            //     scrollTrigger: {
            //         trigger: jQuery(this),
            //         start: 'top bottom-=400',
            //         end: 'bottom bottom-=400',
            //         scrub: 2,
            //         // markers: true,
            //     },
            //     y: 0,
            // })
        });
      	// gsap.to('.main_text__l-side', {
        //     scrollTrigger: {
        //         trigger: '.main_text',
        //         start: 'top center',
        //         end: 'bottom center',
        //         scrub: 2,
        //     },
        //     y: 0,
        // });
        gsap.to('.main_text__r-side', {
            scrollTrigger: {
                trigger: '.main_text',
                start: 'top center',
                end: 'bottom center',
                scrub: 2,
            },
            y: 0,
        });
        // gsap.to('.header--animated .header', {
        //     scrollTrigger: {
        //         trigger: '.header--animated',
        //         start: 'top top',
        //         end: 'bottom bottom',
        //         scrub: 2,
        //         // markers: true,
        //         pin: true,
        //         pinSpacer: false
        //     },
        //     y: 0,
        // });
        // gsap.to('.header--animated .header__h1', {
        //     scrollTrigger: {
        //         trigger: '.header--animated .header',
        //         start: 'bottom bottom',
        //         end: 'bottom top',
        //         scrub: 2,
        //         // markers: true
        //     },
        //     y: '-10vh',
        // })
        // gsap.to('.header--animated .header__text', {
        //     scrollTrigger: {
        //         trigger: '.header--animated .header',
        //         start: 'bottom bottom',
        //         end: 'bottom top',
        //         scrub: 2,
        //         // markers: true
        //     },
        //     y: '-15vh',
        //     opacity: '0',
        // })
        // gsap.to('.header--animated .main__contacts__blocks', {
        //     scrollTrigger: {
        //         trigger: '.header--animated .header',
        //         start: 'bottom bottom',
        //         end: 'bottom top',
        //         scrub: 2,
        //         // markers: true
        //     },
        //     y: '-15vh',
        //     opacity: '0',
        // })
        // gsap.to('.header--animated .header__info', {
        //     scrollTrigger: {
        //         trigger: '.header--animated .header',
        //         start: 'bottom bottom',
        //         end: 'bottom top',
        //         scrub: 2,
        //         // markers: true
        //     },
        //     y: () => {
        //         return ((window.innerHeight / 100 * 15) + headerTextHeight) * -1;
        //     }
        // })
        // gsap.to('.header--animated .breadcrums', {
        //     scrollTrigger: {
        //         trigger: '.header--animated .header',
        //         start: 'bottom bottom',
        //         end: 'bottom top',
        //         scrub: 2,
        //         // markers: true
        //     },
        //     opacity: '0'
        // })
    }
    if (window.innerWidth > 1023) {
        initAnimation();
    }
    jQuery('.burger-body__menu a[href^="/#"]').click(function() {
        jQuery('.burger-wrap').removeClass('opened');
        jQuery('html').removeClass('owh');
    });
});