


(function ($) {
  "use strict";

  //Hide Loading Box (Preloader)
  function handlePreloader() {
    if ($('.loader-wrap').length) {
      $('.loader-wrap').delay(1000).fadeOut(500);
    }
  }

  if ($(".preloader-close").length) {
    $(".preloader-close").on("click", function () {
      $('.loader-wrap').delay(200).fadeOut(500);
    })
  }


  function thmSwiperInit() {
    // swiper slider
    if ($(".thm-swiper__slider").length) {
      $(".thm-swiper__slider").each(function () {
        let elm = $(this);
        let options = elm.data('swiper-options');
        let thmSwiperSlider = new Swiper(elm, options);
      });
    }
  }

  function dynamicCurrentMenuClass(selector) {
    let FileName = window.location.href.split("/").reverse()[0];
    selector.find("li").each(function () {
      let anchor = $(this).find("a");
      if ($(anchor).attr("href") == FileName) {
        $(this).addClass("current");
      }
    });
    // if any li has .current elmnt add class
    selector.children("li").each(function () {
      if ($(this).find(".current").length) {
        $(this).addClass("current");
      }
    });
    // if no file name return
    if ("" == FileName) {
      selector.find("li").eq(0).addClass("current");
    }
  }

  if ($(".main-menu__list").length) {
    // dynamic current class
    let mainNavUL = $(".main-menu__list");
    dynamicCurrentMenuClass(mainNavUL);
  }

  if ($(".main-menu__list").length && $(".mobile-nav__container").length) {
    let navContent = document.querySelector(".main-menu__list").outerHTML;
    let mobileNavContainer = document.querySelector(".mobile-nav__container");
    mobileNavContainer.innerHTML = navContent;
  }

  if ($(".sticky-header__content").length) {
    let navContent = document.querySelector(".main-menu").innerHTML;
    let mobileNavContainer = document.querySelector(".sticky-header__content");
    mobileNavContainer.innerHTML = navContent;
  }


  if ($(".mobile-nav__container .main-menu__list").length) {
    let dropdownAnchor = $(
      ".mobile-nav__container .main-menu__list .dropdown > a"
    );
    dropdownAnchor.each(function () {
      let self = $(this);
      let toggleBtn = document.createElement("BUTTON");
      toggleBtn.setAttribute("aria-label", "dropdown toggler");
      toggleBtn.innerHTML = "<i class='fa fa-angle-down'></i>";
      self.append(function () {
        return toggleBtn;
      });
      self.find("button").on("click", function (e) {
        e.preventDefault();
        let self = $(this);
        self.toggleClass("expanded");
        self.parent().toggleClass("expanded");
        self.parent().parent().children("ul").slideToggle();
      });
    });
  }

  if ($(".mobile-nav__toggler").length) {
    $(".mobile-nav__toggler").on("click", function (e) {
      e.preventDefault();
      $(".mobile-nav__wrapper").toggleClass("expanded");
      $("body").toggleClass("locked");
    });
  }

  //Fact Counter + Text Count
  if ($(".count-box").length) {
    $(".count-box").appear(
      function () {
        var $t = $(this),
          n = $t.find(".count-text").attr("data-stop"),
          r = parseInt($t.find(".count-text").attr("data-speed"), 10);

        if (!$t.hasClass("counted")) {
          $t.addClass("counted");
          $({
            countNum: $t.find(".count-text").text()
          }).animate({
            countNum: n
          }, {
            duration: r,
            easing: "linear",
            step: function () {
              $t.find(".count-text").text(Math.floor(this.countNum));
            },
            complete: function () {
              $t.find(".count-text").text(this.countNum);
            }
          });
        }
      }, {
      accY: 0
    }
    );
  }

  // Progress Bar
  if ($('.count-bar').length) {
    $('.count-bar').appear(function () {
      var el = $(this);
      var percent = el.data('percent');
      $(el).css('width', percent).addClass('counted');
    }, {
      accY: -50
    });
  }

  if ($('.search_bar_style_one .cart_box').length) {
    $('.search_bar_style_one .cart_box .menu-box').on('click', function () {
      $('.search_bar_style_one .cart_box .cart_box_outer').slideToggle(500);
      $('.search_bar_style_one .cart_box .cart_box_outer').addClass('show');
    });
    $('.search_bar_style_one .cart_box .close_cart_btn').on('click', function () {
      $('.search_bar_style_one .cart_box .cart_box_outer').slideToggle(500);
      $('.search_bar_style_one .cart_box .cart_box_outer').removeClass('show');
    });
  };

  //Login Popup
  if ($('#open_popup_box').length) {
    //Show Popup
    $('.popup_open_btn').on('click', function () {
      $('#open_popup_box').addClass('popup-visible');
    });
    $(document).keydown(function (e) {
      if (e.keyCode === 27) {
        $('#open_popup_box').removeClass('popup-visible');
      }
    });
    //Hide Popup
    $('.popup_close_btn, .popup_overlay_layer').on('click', function () {
      $('#open_popup_box').removeClass('popup-visible');
    });
  }
  //Login Popup
  if ($('#open_popup_box2').length) {
    //Show Popup
    $('.popup_open_btn2').on('click', function () {
      $('#open_popup_box2').addClass('popup-visible');
    });
    $(document).keydown(function (e) {
      if (e.keyCode === 27) {
        $('#open_popup_box2').removeClass('popup-visible');
      }
    });
    //Hide Popup
    $('.popup_close_btn, .popup_overlay_layer').on('click', function () {
      $('#open_popup_box2').removeClass('popup-visible');
    });
  }
  //Login Popup
  if ($('#open_popup_box3').length) {
    //Show Popup
    $('.popup_open_btn3').on('click', function () {
      $('#open_popup_box3').addClass('popup-visible');
    });
    $(document).keydown(function (e) {
      if (e.keyCode === 27) {
        $('#open_popup_box3').removeClass('popup-visible');
      }
    });
    //Hide Popup
    $('.popup_close_btn, .popup_overlay_layer').on('click', function () {
      $('#open_popup_box3').removeClass('popup-visible');
    });
  }

  //Login Popup
  if ($('#open_popup_box4').length) {
    //Show Popup
    $('.popup_open_btn4').on('click', function () {
      $('#open_popup_box4').addClass('popup-visible');
    });
    $(document).keydown(function (e) {
      if (e.keyCode === 27) {
        $('#open_popup_box4').removeClass('popup-visible');
      }
    });
    //Hide Popup
    $('.popup_close_btn, .popup_overlay_layer').on('click', function () {
      $('#open_popup_box4').removeClass('popup-visible');
    });
  }

  //Login Popup
  if ($('#open_popup_box5').length) {
    //Show Popup
    $('.popup_open_btn5').on('click', function () {
      $('#open_popup_box5').addClass('popup-visible');
    });
    $(document).keydown(function (e) {
      if (e.keyCode === 27) {
        $('#open_popup_box5').removeClass('popup-visible');
      }
    });
    //Hide Popup
    $('.popup_close_btn, .popup_overlay_layer').on('click', function () {
      $('#open_popup_box5').removeClass('popup-visible');
    });
  }

  //Login Popup
  if ($('#open_popup_box6').length) {
    //Show Popup
    $('.popup_open_btn6').on('click', function () {
      $('#open_popup_box6').addClass('popup-visible');
    });
    $(document).keydown(function (e) {
      if (e.keyCode === 27) {
        $('#open_popup_box6').removeClass('popup-visible');
      }
    });
    //Hide Popup
    $('.popup_close_btn, .popup_overlay_layer').on('click', function () {
      $('#open_popup_box6').removeClass('popup-visible');
    });
  }

  //Login Popup
  if ($('#open_popup_box7').length) {
    //Show Popup
    $('.popup_open_btn7').on('click', function () {
      $('#open_popup_box7').addClass('popup-visible');
    });
    $(document).keydown(function (e) {
      if (e.keyCode === 27) {
        $('#open_popup_box7').removeClass('popup-visible');
      }
    });
    //Hide Popup
    $('.popup_close_btn, .popup_overlay_layer').on('click', function () {
      $('#open_popup_box7').removeClass('popup-visible');
    });
  }

  //Login Popup
  if ($('#open_popup_box8').length) {
    //Show Popup
    $('.popup_open_btn8').on('click', function () {
      $('#open_popup_box8').addClass('popup-visible');
    });
    $(document).keydown(function (e) {
      if (e.keyCode === 27) {
        $('#open_popup_box8').removeClass('popup-visible');
      }
    });
    //Hide Popup
    $('.popup_close_btn, .popup_overlay_layer').on('click', function () {
      $('#open_popup_box8').removeClass('popup-visible');
    });
  }

  //Login Popup
  if ($('#open_popup_box9').length) {
    //Show Popup
    $('.popup_open_btn9').on('click', function () {
      $('#open_popup_box9').addClass('popup-visible');
    });
    $(document).keydown(function (e) {
      if (e.keyCode === 27) {
        $('#open_popup_box9').removeClass('popup-visible');
      }
    });
    //Hide Popup
    $('.popup_close_btn, .popup_overlay_layer').on('click', function () {
      $('#open_popup_box9').removeClass('popup-visible');
    });
  }

  //Login Popup
  if ($('#open_popup_box10').length) {
    //Show Popup
    $('.popup_open_btn10').on('click', function () {
      $('#open_popup_box10').addClass('popup-visible');
    });
    $(document).keydown(function (e) {
      if (e.keyCode === 27) {
        $('#open_popup_box10').removeClass('popup-visible');
      }
    });
    //Hide Popup
    $('.popup_close_btn, .popup_overlay_layer').on('click', function () {
      $('#open_popup_box10').removeClass('popup-visible');
    });
  }

  // Search Form Tab Box
  if ($('.search-form-tab-box').length) {
    $('.search-form-tab-box .tabs-button-box .tab-btn-item').on('click', function (e) {
      e.preventDefault();
      var target = $($(this).attr('data-tab'));

      if ($(target).hasClass('actve-tab')) {
        return false;
      } else {
        $('.search-form-tab-box .tabs-button-box .tab-btn-item').removeClass('active-btn-item');
        $(this).addClass('active-btn-item');
        $('.search-form-tab-box .tabs-content-box .tab-content-box-item').removeClass('tab-content-box-item-active');
        $(target).addClass('tab-content-box-item-active');
      }
    });
  }

  // AOS Animation
  if ($("[data-aos]").length) {
    AOS.init({
      duration: '1000',
      disable: 'false',
      easing: 'ease',
      mirror: true
    });
  }

  //Contact Form Validation
  if ($("#contact-form").length) {
    $("#contact-form").validate({
      submitHandler: function (form) {
        var form_btn = $(form).find('button[type="submit"]');
        var form_result_div = '#form-result';
        $(form_result_div).remove();
        form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
        var form_btn_old_msg = form_btn.html();
        form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
        $(form).ajaxSubmit({
          dataType: 'json',
          success: function (data) {
            if (data.status = 'true') {
              $(form).find('.form-control').val('');
            }
            form_btn.prop('disabled', false).html(form_btn_old_msg);
            $(form_result_div).html(data.message).fadeIn('slow');
            setTimeout(function () {
              $(form_result_div).fadeOut('slow')
            }, 6000);
          }
        });
      }
    });
  }

  //Show Hide Password
  $(document).ready(function () {
    $("#show_hide_password_1 .input-group-addon").on('click', function (event) {
      event.preventDefault();
      if ($('#show_hide_password_1 input').attr("type") == "text") {
        $('#show_hide_password_1 input').attr('type', 'password');
        $('#show_hide_password_1 .input-group-addon .eyeicon').addClass("fa-eye-slash");
        $('#show_hide_password_1 .input-group-addon .eyeicon').removeClass("fa-eye");
      }
      else if ($('#show_hide_password_1 input').attr("type") == "password") {
        $('#show_hide_password_1 input').attr('type', 'text');
        $('#show_hide_password_1 .input-group-addon .eyeicon').removeClass("fa-eye-slash");
        $('#show_hide_password_1 .input-group-addon .eyeicon').addClass("fa-eye");
      }
    });
    $("#show_hide_password_2 .input-group-addon").on('click', function (event) {
      event.preventDefault();
      if ($('#show_hide_password_2 input').attr("type") == "text") {
        $('#show_hide_password_2 input').attr('type', 'password');
        $('#show_hide_password_2 .input-group-addon .eyeicon').addClass("fa-eye-slash");
        $('#show_hide_password_2 .input-group-addon .eyeicon').removeClass("fa-eye");
      }
      else if ($('#show_hide_password_2 input').attr("type") == "password") {
        $('#show_hide_password_2 input').attr('type', 'text');
        $('#show_hide_password_2 .input-group-addon .eyeicon').removeClass("fa-eye-slash");
        $('#show_hide_password_2 .input-group-addon .eyeicon').addClass("fa-eye");
      }
    });
  });

  if ($("#datepicker").length) {
    $("#datepicker").datepicker();
  }


  $('input[name="time"]').ptTimeSelect();

  if ($(".wow").length) {
    var wow = new WOW({
      boxClass: "wow", // animated element css class (default is wow)
      animateClass: "animated", // animation css class (default is animated)
      mobile: true, // trigger animations on mobile devices (default is true)
      live: true // act on asynchronously loaded content (default is true)
    });
    wow.init();
  }

  if ($(".search-toggler").length) {
    $(".search-toggler").on("click", function (e) {
      e.preventDefault();
      $(".search-popup").toggleClass("active");
      $(".mobile-nav__wrapper").removeClass("expanded");
      $("body").toggleClass("locked");
    });
  }

  function SmoothMenuScroll() {
    var anchor = $(".scrollToLink");
    if (anchor.length) {
      anchor.children("a").bind("click", function (event) {
        if ($(window).scrollTop() > 10) {
          var headerH = "90";
        } else {
          var headerH = "90";
        }
        var target = $(this);
        $("html, body")
          .stop()
          .animate({
            scrollTop: $(target.attr("href")).offset().top - headerH + "px"
          },
            1200,
            "easeInOutExpo"
          );
        anchor.removeClass("current");
        anchor.removeClass("current-menu-ancestor");
        anchor.removeClass("current_page_item");
        anchor.removeClass("current-menu-parent");
        target.parent().addClass("current");
        event.preventDefault();
      });
    }
  }
  SmoothMenuScroll();


  function OnePageMenuScroll() {
    var windscroll = $(window).scrollTop();
    if (windscroll >= 117) {
      var menuAnchor = $(".one-page-scroll-menu .scrollToLink").children("a");
      menuAnchor.each(function () {
        var sections = $(this).attr("href");
        $(sections).each(function () {
          if ($(this).offset().top <= windscroll + 100) {
            var Sectionid = $(sections).attr("id");
            $(".one-page-scroll-menu").find("li").removeClass("current");
            $(".one-page-scroll-menu").find("li").removeClass("current-menu-ancestor");
            $(".one-page-scroll-menu").find("li").removeClass("current_page_item");
            $(".one-page-scroll-menu").find("li").removeClass("current-menu-parent");
            $(".one-page-scroll-menu")
              .find("a[href*=\\#" + Sectionid + "]")
              .parent()
              .addClass("current");
          }
        });
      });
    } else {
      $(".one-page-scroll-menu li.current").removeClass("current");
      $(".one-page-scroll-menu li:first").addClass("current");
    }
  }

  //Accordion Box
  if ($('.accordion_box').length) {
    // Attach a click event handler to elements with class 'acc-btn' inside '.accordion-box'
    $(".accordion_box").on('click', '.acc-btn', function () {
      // Get the outer accordion box and the specific accordion associated with the clicked button
      var outerBox = $(this).closest('.accordion_box');
      var target = $(this).closest('.accordion');

      // Check if the clicked button does not have the class 'active'
      if (!$(this).hasClass('active')) {
        // Remove the 'active' class from all accordion buttons within the same accordion box
        outerBox.find('.accordion .acc-btn').removeClass('active');
      }

      // Check if the next '.acc-content' element is visible
      if ($(this).next('.acc-content').is(':visible')) {
        return false; // Prevent further action if it's visible
      } else {
        // Add the 'active' class to the clicked button
        $(this).addClass('active');

        // Remove the 'active-block' class from all '.accordion' elements within the same accordion box
        outerBox.find('.accordion').removeClass('active-block');

        // Slide up all '.acc-content' elements within the accordion box
        outerBox.find('.accordion .acc-content').slideUp(300);

        // Add the 'active-block' class to the specific '.accordion'
        target.addClass('active-block');

        // Slide down the next '.acc-content' element
        $(this).next('.acc-content').slideDown(300);
      }
    });
  }

  // window load event

  thmSwiperInit();
  // initializeOwlCarousel();
  handlePreloader();


  //Jquery Spinner / Quantity Spinner
  if ($('.quantity-spinner').length) {
    $("input.quantity-spinner").TouchSpin({
      verticalbuttons: true
    });
  }

  //Jquery Curved Circle
  if ($('.curved-circle').length) {
    $('.curved-circle').circleType({
      position: 'absolute',
      dir: 1,
      radius: 70,
      forceHeight: true,
      forceWidth: true
    });
  }




  // window scroll event
  $(window).on("scroll", function () {

    //Stricked Menu Fixed
    if ($(".stricked-menu").length) {
      var headerScrollPos = 130;
      var stricky = $(".stricked-menu");
      if ($(window).scrollTop() > headerScrollPos) {
        stricky.addClass("stricky-fixed");
      } else if ($(this).scrollTop() <= headerScrollPos) {
        stricky.removeClass("stricky-fixed");
      }
    }
    //Scroll To Top
    if ($(".scroll-to-top").length) {
      var strickyScrollPos = 100;
      if ($(window).scrollTop() > strickyScrollPos) {
        $(".scroll-to-top").fadeIn(500);
      } else if ($(this).scrollTop() <= strickyScrollPos) {
        $(".scroll-to-top").fadeOut(500);
      }
    }
    OnePageMenuScroll();

  });


  if ($(".scroll-to-target").length) {
    $(".scroll-to-target").on("click", function () {
      var target = $(this).attr("data-target");
      // animate
      $("html, body").animate({
        scrollTop: $(target).offset().top
      },
        100
      );
      return false;
    });
  }

  $(document).ready(function () {
    $('select:not(.ignore)').niceSelect();
  });


})(jQuery);

