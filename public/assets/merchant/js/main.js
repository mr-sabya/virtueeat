(function($) {	
	"use strict";

    //Hide Loading Box (Preloader)
	function handlePreloader() {
		if($('.loader-wrap').length){
			$('.loader-wrap').delay(1000).fadeOut(500);
		}
	}

	if ($('preloader-close').length) {
        $('.preloader-close').on("click", function(){
            $('.loader-wrap').delay(200).fadeOut(500);
        });
    }
    //End Hide Loading Box (Preloader)

    //Update Header Style and Scroll to Top
    function headerStyle() {
        if($('.main_header').length){
            var windowpos = $(window).scrollTop();
            var siteHeader = $('.main_header');
            var scrollLink = $('.scroll-top');
            if (windowpos >= 150) {
                siteHeader.addClass('fixed_header');
                scrollLink.addClass('open');
            } else {
                siteHeader.removeClass('fixed_header');
                scrollLink.removeClass('open');
            }
        }
    }
    headerStyle();

    //Submenu Dropdown Toggle
    if($('.main_header li.dropdown ul').length){
        $('.main_header .navigation li.dropdown').append('<div class="dropdown-btn"><i class="flaticon-down"></i></div>');
    }

    //Mobile Nav Hide Show
    if($('.mobile-menu').length){
        var mobileMenuContent = $('.main_header .menu_area .main-menu').html();
        $('.mobile-menu .menu-box .menu-outer').append(mobileMenuContent);
        $('.sticky_header .main-menu').append(mobileMenuContent);        
        //Dropdown Button
        $('.mobile-menu li.dropdown .dropdown-btn').on('click', function() {
            $(this).toggleClass('open');
            $(this).prev('ul').slideToggle(500);
        });
        //Dropdown Button
        $('.mobile-menu li.dropdown .dropdown-btn').on('click', function() {
            $(this).prev('.megamenu').slideToggle(900);
        });
        //Menu Toggle Btn
        $('.mobile-nav-toggler').on('click', function() {
            $('body').addClass('mobile-menu-visible');
        });
        //Menu Toggle Btn
        $('.mobile-menu .menu-backdrop,.mobile-menu .close-btn').on('click', function() {
            $('body').removeClass('mobile-menu-visible');
        });
    }

	if ($('.about_app_section .dropdown-sidemenu').length) {
		$('.about_app_section .dropdown-sidemenu').on('click', function(){
	        $('.about_app_section .dropdown-sidemenu> .slidbar-menu').slideToggle(2000);
	        $('.about_app_section .dropdown-sidemenu .slidbar-menu').addClass('show');
	    });
	};

	// Main Slider Carousel
	if ($('.banner-carousel').length) {
		$('.banner-carousel').owlCarousel({
			animateOut: 'fadeOut',
			animateIn: 'fadeIn',
			loop:true,
			margin:0,
			nav: false,
			singleItem:true,
			smartSpeed: 500,
			autoplay: true,
			autoplayTimeout:6000,
			navText: [ '<span class="fas fa-angle-left"></span>', '<span class="fas fa-angle-right"></span>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				1024:{
					items:1
				}
			}
		});    		
	}

	//Main Slider Carousel
	if ($('.main-slider-carousel').length) {
		$('.main-slider-carousel').owlCarousel({
			loop:true,
			margin:0,
			nav:true,
			animateOut: 'fadeOut',
    		animateIn: 'fadeIn',
    		active: true,
			smartSpeed: 1000,
			autoplay: 6000,
			navText: [ '<i class="fa-solid fa-angles-left"></i>', '<i class="fa-solid fa-angles-right"></i>'],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				1200:{
					items:1
				}
			}
		});    		
	}

	// clients_carousel
	if ($('.clients_carousel').length) {
		$('.clients_carousel').owlCarousel({
			loop:true,
			margin:30,
			nav:false,
			smartSpeed: 3000,
			autoplay: true,
			navText: [ '<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>' ],
			responsive:{
				0:{
					items:1
				},
				480:{
					items:2
				},
				600:{
					items:3
				},
				800:{
					items:4
				},			
				1200:{
					items:5
				}
			}
		});    		
	}

	// single_item_carousel
	if ($('.single_item_carousel').length) {
		$('.single_item_carousel').owlCarousel({
			loop:true,
			margin:0,
			nav:false,
			smartSpeed: 3000,
			autoplay: true,
			navText: [ '<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>' ],
			responsive:{
				0:{
					items:1
				},
				480:{
					items:1
				},
				600:{
					items:1
				},
				800:{
					items:1
				},			
				1200:{
					items:1
				}
			}
		});    		
	}

	//Signup Popup
	if($('#signup-popup').length){		
		//Show Popup
		$('.signup-toggler').on('click', function() {
			$('#signup-popup').addClass('popup-visible');
		});
		$(document).keydown(function(e){
	        if(e.keyCode === 27) {
	            $('#signup-popup').removeClass('popup-visible');
	        }
	    });
		//Hide Popup
		$('.close-signup, .overlay-layer').on('click', function() {
			$('#signup-popup').removeClass('popup-visible');
		});
	}

	//Login Popup
	if($('#login-popup').length){
		//Show Popup
		$('.login-toggler').on('click', function() {
			$('#login-popup').addClass('popup-visible');
		});
		$(document).keydown(function(e){
	        if(e.keyCode === 27) {
	            $('#login-popup').removeClass('popup-visible');
	        }
	    });
		//Hide Popup
		$('.close-login, .overlay-layer').on('click', function() {
			$('#login-popup').removeClass('popup-visible');
		});
	}

	//Show Hide Password
	$(document).ready(function() {
		$("#show_hide_password_1 .input-group-addon").on('click', function(event) {
			event.preventDefault();
			if($('#show_hide_password_1 input').attr("type") == "text"){
				$('#show_hide_password_1 input').attr('type', 'password');
				$('#show_hide_password_1 .input-group-addon .eyeicon').addClass( "fa-eye-slash" );
				$('#show_hide_password_1 .input-group-addon .eyeicon').removeClass( "fa-eye" );
			}
			else if($('#show_hide_password_1 input').attr("type") == "password"){
				$('#show_hide_password_1 input').attr('type', 'text');
				$('#show_hide_password_1 .input-group-addon .eyeicon').removeClass( "fa-eye-slash");
				$('#show_hide_password_1 .input-group-addon .eyeicon').addClass( "fa-eye" );
			}
		});
		$("#show_hide_password_2 .input-group-addon").on('click', function(event) {
			event.preventDefault();
			if($('#show_hide_password_2 input').attr("type") == "text"){
				$('#show_hide_password_2 input').attr('type', 'password');
				$('#show_hide_password_2 .input-group-addon .eyeicon').addClass( "fa-eye-slash" );
				$('#show_hide_password_2 .input-group-addon .eyeicon').removeClass( "fa-eye" );
			}
			else if($('#show_hide_password_2 input').attr("type") == "password"){
				$('#show_hide_password_2 input').attr('type', 'text');
				$('#show_hide_password_2 .input-group-addon .eyeicon').removeClass( "fa-eye-slash");
				$('#show_hide_password_2 .input-group-addon .eyeicon').addClass( "fa-eye" );
			}
		});		
	});

	//nice select
	$(document).ready(function() {
		$('select:not(.ignore)').niceSelect();
	});

	//Tabs Box
	if($('.tabs-box').length){
		$('.tabs-box .tab-buttons .tab-btn').on('click', function(e) {
			e.preventDefault();
			var target = $($(this).attr('data-tab'));
			
			if ($(target).is(':visible')){
				return false;
			}else{
				target.parents('.tabs-box').find('.tab-buttons').find('.tab-btn').removeClass('active-btn');
				$(this).addClass('active-btn');
				target.parents('.tabs-box').find('.tabs-content').find('.tab').fadeOut(0);
				target.parents('.tabs-box').find('.tabs-content').find('.tab').removeClass('active-tab');
				$(target).fadeIn(100);
				$(target).addClass('active-tab');
			}
		});
	}

	//Fact Counter + Text Count
	if($('.count_box').length){
		$('.count_box').appear(function(){	
			var $t = $(this),
				n = $t.find(".count_text").attr("data-stop"),
				r = parseInt($t.find(".count_text").attr("data-speed"), 10);				
			if (!$t.hasClass("counted")) {
				$t.addClass("counted");
				$({
					countNum: $t.find(".count_text").text()
				}).animate({
					countNum: n
				}, {
					duration: r,
					easing: "linear",
					step: function() {
						$t.find(".count_text").text(Math.floor(this.countNum));
					},
					complete: function() {
						$t.find(".count_text").text(this.countNum);
					}
				});
			}			
		},{accY: 0});
	}

    //Contact Form Validation
	if($('#contact-form').length){
		$('#contact-form').validate({
			rules: {
				username: {
					required: true
				},
				email: {
					required: true,
					email: true
				},
				phone: {
					required: true
				},
				subject: {
					required: true
				},
				message: {
					required: true
				}
			}
		});
	}

	//Accordion Box
	if($('.accordion-box').length){
		$(".accordion-box").on('click', '.acc-btn', function() {			
			var outerBox = $(this).parents('.accordion-box');
			var target = $(this).parents('.accordion');			
			if($(this).hasClass('active')!==true){
				$(outerBox).find('.accordion .acc-btn').removeClass('active');
			}			
			if ($(this).next('.acc-content').is(':visible')){
				return false;
			}else{
				$(this).addClass('active');
				$(outerBox).children('.accordion').removeClass('active-block');
				$(outerBox).find('.accordion').children('.acc-content').slideUp(300);
				target.addClass('active-block');
				$(this).next('.acc-content').slideDown(300);	
			}
		});	
	}

	//LightBox / Fancybox
	if($('.lightbox-image').length) {
		$('.lightbox-image').fancybox({
			openEffect  : 'fade',
			closeEffect : 'fade',
			helpers : {
				media : {}
			}
		});
	}

	//Price Range Slider
	if($('.price-range-slider').length){
		$( ".price-range-slider" ).slider({
			range: true,
			min: 0,
			max: 500,
			values: [ 5, 200 ],
			slide: function( event, ui ) {
			$( "input.property-amount" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
			}
		});
		
		$( "input.property-amount" ).val( $( ".price-range-slider" ).slider( "values", 0 ) + " - $" + $( ".price-range-slider" ).slider( "values", 1 ) );	
	}

	if ($('.two-item-carousel').length) {
		var twoItemCarousel = new Swiper('.two-item-carousel', {
			preloadImages: false,
			loop: true,
			grabCursor: true,
			centeredSlides: false,
			resistance: true,
			resistanceRatio: 0.6,
			slidesPerView: 2,
			speed: 1400,
			spaceBetween: 30,
			parallax: false,
			effect: "slide",
			active: 'active',
			autoplay: {
				delay: 800000,
				disableOnInteraction: false
			},
			pagination: {
				el: '.slider__pagination',
				clickable: true,
			},
			navigation: {
				nextEl: '.slider-button-next',
				prevEl: '.slider-button-prev',
			},
			noSwiping: true,
        	noSwipingClass: "no-swipe",
			breakpoints: {
                991: {
                  slidesPerView: 1,
                },
                640: {
                  slidesPerView: 1,
                }, 
            }
		});
	}

	//Jquery Spinner / Quantity Spinner
	

	if ($('.produt_details_box .bxslider').length) {
		$('.produt_details_box .bxslider').bxSlider({
	        nextSelector: '.produt_details_box #slider-next',
	        prevSelector: '.produt_details_box #slider-prev',
	        nextText: '<i class="fa fa-angle-right"></i>',
	        prevText: '<i class="fa fa-angle-left"></i>',
	        mode: 'fade',
	        auto: 'true',
	        speed: '700',
	        pagerCustom: '.produt_details_box .slider-pager .thumb-box'
	    });
	}; 

    // Scroll to a Specific Div
	if($('.scroll-to-target').length){
		$(".scroll-to-target").on('click', function() {
			var target = $(this).attr('data-target');
		   // animate
		   $('html, body').animate({
			   scrollTop: $(target).offset().top
			 }, 1000);	
		});
	}
    // End Scroll to a Specific Div

    // Elements Animation
	if($('.wow').length){
		var wow = new WOW({
		mobile:       false
		});
		wow.init();
	}
    // End Elements Animation

	/*	=========================================================================
	When document is Ready, do
	========================================================================== */

	$(window).on('ready', function () {

	});

	/* ==========================================================================
    When document is Scrollig, do
    ========================================================================== */
	
	$(window).on('scroll', function() {
		headerStyle();
	});  
    
    /* ==========================================================================
    When document is loaded, do
    ========================================================================== */
	
	$(window).on('load', function() {

	});
	

})(window.jQuery);