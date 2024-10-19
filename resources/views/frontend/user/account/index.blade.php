<x-app-layout>
    <!-- Search Section -->
    <div class="account_info_box">
        <div class="account_info_outer">
            <h3>Account Info</h3>
            <div class="account_holder_image">
                <div class="account_info_item">
                    <div class="account_name">
                        <span>Name</span>
                        <h6>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h6>
                    </div>
                    <div class="arrow_button"><a href="{{ route('user.name.form')}}"><i class="fas fa-angle-right"></i></a></div>
                </div>
                <div class="account_info_item">
                    <div class="account_name">
                        <span>Phone Number</span>
                        <h6>{{ Auth::user()->phone == ''? 'Not Set' : Auth::user()->phone }}</h6>
                    </div>
                    <div class="arrow_button"><a href="#"><i class="fas fa-angle-right"></i></a></div>
                </div>
                <div class="account_info_item">
                    <div class="account_name">
                        <span>Email</span>
                        <h6>{{ Auth::user()->email == ''? 'Not Set' : Auth::user()->email }}</h6>
                    </div>
                    <div class="arrow_button"><a href="#"><i class="fas fa-angle-right"></i></a></div>
                </div>
                <div class="account_info_item">
                    <div class="account_name">
                        <span>Password</span>
                        <h6>••••••••••</h6>
                    </div>
                    <div class="arrow_button"><a href="{{ route('user.password.form')}}"><i class="fas fa-angle-right"></i></a></div>
                </div>

                <div class="account_info_item">
                    <div class="account_name">
                        <span>Address</span>
                        <h6>{{ Auth::user()->address == ''? 'Not Set' : Auth::user()->address }}</h6>
                    </div>
                    <div class="arrow_button"><a href="{{ route('user.address.form') }}"><i class="fas fa-angle-right"></i></a></div>
                </div>
                <!-- <div class="save_btn"><a href="#" class="theme-btn-two">Save</a></div> -->
            </div>
        </div>
    </div>
    <!-- Search Section End -->
</x-app-layout>
