<header class="main-header">
    <div class="container">
        <nav class="main-menu">
            <div class="main-menu__wrapper-inner">
                <div class="main-header-one__bottom-left">
                    <div class="logo-box-one">

            
                    @if(Session::has('home_url'))
                    <a href="{{ Session::get('home_url') }}" wire:navigate><img src="{{ url('assets/frontend/images/main-logo.png') }}" alt="Company Logo" title="VirtueEats"></a>
                    @else
                    <a href="{{ route('home') }}" wire:navigate><img src="{{ url('assets/frontend/images/main-logo.png') }}" alt="Company Logo" title="VirtueEats"></a>
                    @endif
                    </div>
                </div>
                <div class="main-header-one__bottom-middel">
                    <div class="main-menu-box">
                        <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                        <ul class="main-menu__list">
                            <li class="current"><a href="#">Offers</a></li>
                            <li><a href="#">Donations</a></li>
                            <li><a href="#">Become a partner</a></li>
                        </ul>
                    </div>
                </div>
                <div class="main-header-one__bottom-right">
                    <div class="main-header-one__bottom-right-language">
                        <a class="theme-btn-one" href="#">En</a>
                    </div>
                    @auth
                    <div class="main-header-two__bottom-right-btn dropdown">
                        <button type="button" onclick="myFunction()" class="dropbtn"><img src="{{ url('assets/frontend/images/user_logo.png') }}" alt="">
                            @if(Auth::user()->first_name == '')
                            User
                            @else
                            {{ Auth::user()->first_name }}
                            @endif

                            <i class="icon-caret-down"></i></button>
                        <div id="myDropdown" class="dropdown-content">
                            <ul>
                                <li>
                                    <a href="{{ route('user.account')}}">
                                        <div class="icon"><img src="{{ url('assets/frontend/images/account_info.png') }}" alt=""></div> Account
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.order') }}">
                                        <div class="icon"><img src="{{ url('assets/frontend/images/order_info.png') }}" alt=""></div> Orders
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.favorite') }}">
                                        <div class="icon"><img src="{{ url('assets/frontend/images/favorite_info.png') }}" alt=""></div> Favorite
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.wallet') }}">
                                        <div class="icon"><img src="{{ url('assets/frontend/images/wallet_info.png') }}" alt=""></div> Wallet
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.help') }}">
                                        <div class="icon"><img src="{{ url('assets/frontend/images/help_info.png') }}" alt=""></div> Help
                                    </a>
                                </li>
                                <li class="popup_open_btn">
                                    <a href="#">
                                        <div class="icon"><img src="{{ url('assets/frontend/images/promotions_info.png') }}" alt=""></div> Promotions
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.invite') }}">
                                        <div class="icon"><img src="{{ url('assets/frontend/images/invite_friend.png') }}" alt=""></div> Invite friends
                                    </a>
                                </li>
                                <li>

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            <div class="icon"><img src="{{ url('assets/frontend/images/signout_info.png') }}" alt=""></div> Sign out
                                        </a>

                                    </form>

                                </li>
                            </ul>
                            @if(Auth::user()->user_type == 2)
                            <a href="{{ route('merchant.dashboard') }}">Go to Business Dashboard</a>
                            @else
                            <a href="#">Create a business account</a>
                            @endif
                            <a href="#">Add your Restaurant</a>
                            <a href="#">Sign up to deliver</a>
                        </div>
                    </div>
                    @else
                    <div class="main-header-one__bottom-right-btn">
                        <a class="theme-btn-one" href="{{ route('login') }}">Login / Sign up</a>
                    </div>
                    @endauth
                </div>
            </div>
        </nav>
    </div>
</header>

<div class="stricky-header stricked-menu main-menu">
    <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->