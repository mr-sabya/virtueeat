<nav id="adminSidebar">
    <figure class="company_logo">
        <img src="{{ asset('assets/backend/images/logo.png') }}" alt="">
    </figure>
    <div class="admin-sidebar-menu">
        <ul class="list-unstyled components">

            @if (Auth::guard('admin')->check())
            <ul class="menu_height">
                <x-admin.nav-item title="Home" :route="route('admin.dashboard')" icon="home-1" />

                <x-admin.nav-item title="Country" :route="route('admin.country.index')" icon="globe" />

                <x-admin.nav-item title="City" :route="route('admin.city.index')" icon="museum" />


                <li>
                    <a href="#" class="dropdown-toggle"><i class="flaticon-chart-up"></i> Role & Permissions</a>
                    <ul class="list-unstyled collapse">
                        <li>
                            <a href="{{ route('admin.permission.index')}}"><i class="flaticon-chart-up"></i> Permissions</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.role.index')}}"><i class="flaticon-chart-up"></i> Role</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.user.index')}}"><i class="flaticon-chart-up"></i> Users</a>
                        </li>
                    </ul>
                </li>

                <x-admin.nav-item title="Category" :route="route('admin.category.index')" icon="parcel" />

                <x-admin.nav-item title="Shop Category" :route="route('admin.shopcategory.index')" icon="parcel" />

                <x-admin.nav-item title="Item Category" :route="route('admin.itemcategory.index')" icon="parcel" />

                <x-admin.nav-item title="Dietary" :route="route('admin.dietary.index')" icon="cutlery" />

                <x-admin.nav-item title="Customers" :route="route('admin.customer.index', 'users')" icon="user" />

                <x-admin.nav-item title="Merchants" :route="route('admin.merchant.index', 'merchants')" icon="user" />

                <x-admin.nav-item title="Riders" :route="route('admin.rider.index', 'riders')" icon="user" />

                <x-admin.nav-item title="Orders" :route="route('admin.main.order.index')" icon="cutlery" />

                <x-admin.nav-item title="Pending Orders" :route="route('admin.main.pendingorder.index')" icon="cutlery" />

                <x-admin.nav-item title="Vehicle Documents" :route="route('admin.page.index', 'vehicle')" icon="car" />

                <x-admin.nav-item title="Homepage Settings" :route="route('admin.page.index', 'homepage')" icon="paper" />

                <x-admin.nav-item title="Aboutpage Settings" :route="route('admin.page.index', 'aboutpage')" icon="paper" />

                <x-admin.nav-item title="Privacy & Policy" :route="route('admin.page.index', 'privacy')" icon="paper" />

                <x-admin.nav-item title="Terms of Use" :route="route('admin.page.index', 'terms')" icon="paper" />
                <hr>
                <span class="text-dark">Shop2</span>
                <x-admin.nav-item title="Product Category" :route="route('admin.productcategory.index', 'category')" icon="paper" />
                <x-admin.nav-item title="Product Color" :route="route('admin.productcolor.index', 'product-color')" icon="paper" />
                <x-admin.nav-item title="Product" :route="route('admin.product.index', 'product')" icon="paper" />
                <x-admin.nav-item title="Orders" :route="route('admin.order.index', 'orders')" icon="paper" />
            </ul>

            @endif



            <div class="earnings_chart">
                <div class="total-earnings">
                    $<span id="total-earnings">0</span>
                    <strong>Total Earnings:</strong>
                </div>
                <canvas id="earningsChart" width="320" height="200"></canvas>
            </div>
            <li><a href="#"><i class="flaticon-add-user"></i>Invite friends</a></li>
            <li><a href="#"><i class="flaticon-question"></i>Help</a></li>
        </ul>
    </div>
</nav>