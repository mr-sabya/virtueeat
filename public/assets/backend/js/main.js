(function($) {	
	"use strict";

    //Update Header Style and Scroll to Top
    function headerStyle() {
        if($('.header').length){
            var windowpos = $(window).scrollTop();
            var siteHeader = $('.header');
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
        $('.main_header .navigation li.dropdown').append('<div class="dropdown-btn"><i class="flaticon-left-arrow"></i></div>');
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

    // Select Location Dropdown
	if ($('.user_login_deshboard').length) {
		$('.user_login_deshboard .user_login_box').on('click', function(){
	        $('.user_login_deshboard .admin_panel_deshboard_menu').slideToggle(1000);
	        $('.user_login_deshboard .admin_panel_deshboard_menu').addClass('show');
	    });
	};

    // Scheduale Box Popup
	if($('#add_pament_box').length){		
		//Show Popup
		$('.add-payment-icon').on('click', function() {
			$('#add_pament_box').addClass('popup-visible');
		});
		$(document).keydown(function(e){
	        if(e.keyCode === 27) {
	            $('#add_pament_box').removeClass('popup-visible');
	        }
	    });
		//Hide Popup
		$('.close-popup , .add_pament_box .overlay-layer').on('click', function() {
			$('#add_pament_box').removeClass('popup-visible');
		});
	}
	// End Scheduale Box Popup

	// Scheduale Box Popup
	if($('#order_take_photo_box').length){
		//Hide Popup
		$('.order_take_photo_box .cross_btn').on('click', function() {
			$('#order_take_photo_box').addClass('remove');
		});
	}
	// End Scheduale Box Popup
	// Scheduale Box Popup
	if($('#order_tracking_info_box').length){
		//Hide Popup
		$('.order_tracking_info_box .cross_btn').on('click', function() {
			$('#order_tracking_info_box').addClass('remove');
		});
	}
	// End Scheduale Box Popup

	// Scheduale Box Popup
	if($('#start_delivery_box').length){
		//Hide Popup
		$('.start_delivery_box .cross_btn').on('click', function() {
			$('#start_delivery_box').addClass('remove');
		});
	}
	// End Scheduale Box Popup

	// Scheduale Box Popup
	if($('#order_tracking_info_box').length){
		//Hide Popup
		$('.order_tracking_info_box .order_cross_btn').on('click', function() {
			$('#order_tracking_info_box').addClass('remove');
		});
	}
	// End Scheduale Box Popup

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
   
    //nice select
	// $(document).ready(function() {
	// 	$('select:not(.ignore)').niceSelect();
	// });

    // Elements Animation
	if($('.wow').length){
		var wow = new WOW({
		mobile:       false
		});
		wow.init();
	}
    // End Elements Animation

	/* ==========================================================================
    When document is Scrollig, do
    ========================================================================== */	
    
	$(window).on('scroll', function() {
		headerStyle();
	});  


})(window.jQuery);