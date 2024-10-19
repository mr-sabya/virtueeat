 <!-- Main Header -->
 <header class="main_header style_2">

     <!-- Header Lower -->
     <div class="header_lower_style_one style_2">
         <div class="container-fulid">
             <div class="header_lower_inner sidemenu_container">
                 <div class="logo-box">
                     <figure class="logo"><a href="{{ route('home')}}"><img
                                 src="{{ asset('assets/merchant/images/main-logo.png') }}" alt=""></a>
                     </figure>
                 </div>
                 <div class="header_lower_right menu_area">
                     <!--Mobile Navigation Toggler-->
                     <div class="mobile-nav-toggler">
                         <i class="icon-bar"></i>
                         <i class="icon-bar"></i>
                         <i class="icon-bar"></i>
                     </div>
                     <nav class="main-menu navbar-expand-md navbar-light">
                         <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                             <ul class="navigation clearfix">
                                 <li><a href="#">All Restaurant</a></li>
                                 <li class="current"><a href="#">Become a Partner</a></li>
                                 <li><a href="#">Virtue Store</a></li>
                                 <li><a href="#">Career</a></li>
                             </ul>
                         </div>
                     </nav>
                 </div>
                 <div class="header_lower_right">
                     <div class="language">
                         <select class="selectpicker" name="make">
                             <i class="flaticon-globe"></i>
                             <option value="*">English</option>
                             <option value=".category-1">Spanish</option>
                             <option value=".category-2">French</option>
                             <option value=".category-3">Chinese</option>
                         </select>
                     </div>
                     {{-- <div class="popup_btn signup-toggler">Sign up</div>
                     <div class="popup_btn login-toggler">log in</div> --}}
                 </div>
             </div>
         </div>
     </div>
     <!-- End Header Top -->

     <!-- Sticky Header-->
     <div class="sticky_header">
         <div class="container">
             <div class="header-outer-box">
                 <div class="logo-box">
                     <figure class="logo"><a href="index.html"><img
                                 src="{{ asset('assets/merchant/images/main-logo.png') }}" alt=""></a>
                     </figure>
                 </div>
                 <div class="menu-area">
                     <nav class="main-menu navbar-expand-md navbar-light">
                         <!--Keep This Empty / Menu will come through Javascript-->
                     </nav>
                 </div>
             </div>
         </div>
     </div>
     <!-- End Sticky Header-->

     <!-- Mobile Menu  -->
     <div class="mobile-menu">
         <div class="menu-backdrop"></div>
         <div class="close-btn">X</div>

         <nav class="menu-box">
             <div class="nav-logo"><a href="index.html"><img src="{{ asset('assets/merchant/images/white-logo.png') }}"
                         alt="" title=""></a></div>
             <div class="menu-outer">
                 <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
             </div>
             <div class="contact-info">
                 <h4>Contact Info</h4>
                 <ul>
                     <li>Chicago 12, Melborne City, USA</li>
                     <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                     <li><a href="mailto:info@example.com">info@example.com</a></li>
                 </ul>
             </div>
             <ul class="social-links centred">
                 <li><a href="index.html"><span class="fab fa-twitter"></span></a></li>
                 <li><a href="index.html"><span class="fab fa-facebook-square"></span></a></li>
                 <li><a href="index.html"><span class="fab fa-pinterest-p"></span></a></li>
                 <li><a href="index.html"><span class="fab fa-instagram"></span></a></li>
                 <li><a href="index.html"><span class="fab fa-youtube"></span></a></li>
             </ul>
         </nav>
     </div>
     <!-- End Mobile Menu -->

 </header>
 <!-- End Main Header -->

 
