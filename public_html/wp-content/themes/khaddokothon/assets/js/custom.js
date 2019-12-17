/*
* Global jQuery
* Theme Name: KhaddoKothon
* Theme URI: https://www.tabthemes.com/themes/khaddokothon/
* Author: Tab Themes
* Author URI: https://www.tabthemes.com/
*/

;(function ($) {
    "use strict";


    jQuery(window).on('load', function () {


        // Preloader
        $('.preloader').fadeOut(500);

        $(window).trigger("resize");


    }); // End Load Function


    /*------------------------------
         Back to top
    --------------------------------*/
    if ($('#khaddokothon-back-to-top').length) {
        var scrollTrigger = 500, // px
        backToTop = function() {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('#khaddokothon-back-to-top').addClass('show');
            } else {
                $('#khaddokothon-back-to-top').removeClass('show');
            }
        };
        backToTop();
        $(window).on('scroll', function() {
            backToTop();
        });
        $('#khaddokothon-back-to-top').on('click', function(e) {
            e.preventDefault();
            $('html,body').animate({
              scrollTop: 0
            }, 700);
        });
    }


    /*------------------------------
        Owl carousels
    --------------------------------*/
    //Featured Carousel
    $('.featured-carousel').owlCarousel({
        loop:true,
        margin:20,
        dots:false,
        navContainer: '#customNav',
        navText: ["<i class='fas fa-arrow-left'></i>","<i class='fas fa-arrow-right'></i>"],
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            992:{
                items:2,
                nav:false
            }
        }
    });

    //Gallery Carousel
    $('.gallery-carousel').owlCarousel({
        loop:true,
        dots:false,
        items: 1,
        nav: true,
        navText: ["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
    });


    /*------------------------------
        Sticky Header Desktop
    --------------------------------*/
    $(window).on("scroll", function(){
        if ($(window).scrollTop() >= 400) {
            $('.sticky-header').addClass('sticked');
        }else {
            $('.sticky-header').removeClass('sticked');
        }
    });

    /*------------------------------
        Header Search
    --------------------------------*/
    $('.toggle_search').on("click", function(){
        $(this).toggleClass( "active" );
        $('.h-search-form-field').toggleClass('show');
        if ($(this).find('i').hasClass( "fa-search" )) {
            $('.toggle_search > i').removeClass( "fa-search" ).addClass("fa-times");
        }else{
            $('.toggle_search > i').removeClass( "fa-times" ).addClass("fa-search");
        }
    });

    /*------------------------------
        Header Mobile
    --------------------------------*/
    // mobile_mainmenu create span
    $('.collapse .mobile_mainmenu li:has(ul)').prepend('<span class="arrow"><i class="fa fa-plus"></i></span>');

    $( "#mmenu_toggle" ).on('click', function() {
        $(this).toggleClass( "active" );

        if ($(this).hasClass( "active" )) {
            $('.mobile_nav').stop(true, true).slideDown();
        }else{
            $('.mobile_nav').stop(true, true).slideUp();
        }
    });

    $(".mobile_mainmenu > li span.arrow").click(function() {
        $(this).parent().find("> ul").stop(true, true).slideToggle()
        $(this).toggleClass( "active" );
    });


})(jQuery);