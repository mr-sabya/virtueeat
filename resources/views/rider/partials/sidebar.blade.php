<nav id="adminSidebar">
    <figure class="company_logo">
        <img src="{{ asset('assets/backend/images/logo.png') }}" alt="">
    </figure>
    <div class="admin-sidebar-menu">
        <ul class="list-unstyled components">


            <ul>
                <x-admin.nav-item title="Dashboard" :route="route('rider.dashboard')" icon="home-1" />
                <x-admin.nav-item title="Vehicle" :route="route('rider.vehicle.create')" icon="car" />
                <x-admin.nav-item title="Ride Details" :route="route('rider.dashboard')" icon="track" />
                <x-admin.nav-item title="Payment" :route="route('rider.dashboard')" icon="coin" />
                <x-admin.nav-item title="Account" :route="route('rider.dashboard')" icon="user" />
                <x-admin.nav-item title="Orders" :route="route('rider.order.index')" icon="cutlery" />
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