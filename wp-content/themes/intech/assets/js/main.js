(function($) {
    "use strict";
    // Navbar Hover Menu
    $('[data-toggle="tooltip"]').tooltip()
    $('#main-menu').smartmenus();
    $('#footer-menu').smartmenus({
        bottomToTopSubMenus: true,
    });

    $(window).bind('scroll', function() {
        var navHeight = $(window).height() - 200;
        if ($(window).scrollTop() > navHeight) {
            $('#header-stikcy').addClass('on');
        } else {
            $('#header-stikcy').removeClass('on');
        }
    });
    $('body').scrollspy({
        target: '#header-stikcy',
        offset: 500

    });

    jQuery('#intech-post-gallery').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
    });



    // Footer Widget masonry
    if (typeof imagesLoaded == 'function') {
        $('.masonrys > div').addClass('masonry-item');
        var $boxes = $('.masonry-item');
        $boxes.hide();
        var $container = $('.masonrys');
        $container.imagesLoaded(function() {
            $boxes.fadeIn();
            $container.masonry({
                itemSelector: '.masonry-item',
            });
        });
    }
    // Bottom to top 
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 300) {
            $('#back-top').fadeIn();
        } else {
            $('#back-top').fadeOut();
        }
    });

    $('#back-top').on('click', function() {
        $("html, body").animate({
            scrollTop: 0
        }, 1000);
        return false;
    });
    // Preloader 
    var winObj = $(window),
        bodyObj = $('body'),
        headerObj = $('header');
    winObj.on('load', function() {
        var $preloader = $('#preloader');
        $preloader.find('.group').fadeOut();
        $preloader.delay(350).fadeOut('slow');
    });
    $('.intech-product-big-img').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.intech-product-small-img'
    });
    $('.intech-product-small-img').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.intech-product-big-img',
        dots: true,
        arrows: false,
        focusOnSelect: true,
        centerMode: true,
        centerPadding: '60px',
    });
}(jQuery))