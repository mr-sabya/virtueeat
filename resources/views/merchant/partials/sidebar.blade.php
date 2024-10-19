<nav id="adminSidebar">
    <figure class="company_logo">
        <img src="{{ asset('assets/backend/images/logo.png') }}" alt="">
    </figure>
    <div class="admin-sidebar-menu">
        <ul class="list-unstyled components">

            
            <ul>
                <x-admin.nav-item title="Dashboard" :route="route('merchant.dashboard')" icon="home" />
                <x-admin.nav-item title="Schedule" :route="route('merchant.schedule.index')" icon="clock" />
                <x-admin.nav-item title="Item Category" :route="route('merchant.itemcategory.index')" icon="parcel" />
                <x-admin.nav-item title="Menu Item" :route="route('merchant.menuitem.index')" icon="cutlery" />
                <x-admin.nav-item title="Account" :route="route('merchant.account')" icon="user" />
                <x-admin.nav-item title="Restaurant" :route="route('merchant.restaurant')" icon="user" />
                <x-admin.nav-item title="Orders" :route="route('merchant.order.index')" icon="cutlery" />
            </ul>

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