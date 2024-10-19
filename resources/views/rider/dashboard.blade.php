@extends('rider.layouts.app')

@section('content')
<div class="work_shift_outer_box">
    <div class="analytics_box">
        <h1 class="sec_title">Analytics</h1>
        <div class="analytics_outer_box">
            <div class="analytics_block">
                <h1 class="">$124.99</h1>
                <h6 class="">My Earnings</h6>
                <div class="icon_box"><i class="flaticon-coin"></i></div>
            </div>
            <div class="analytics_block">
                <h1 class="">54</h1>
                <h6 class="">Total trips</h6>
                <div class="icon_box"><i class="flaticon-track"></i></div>
            </div>
            <div class="analytics_block">
                <h1 class="">312</h1>
                <h6 class="">Total orders</h6>
                <div class="icon_box"><i class="flaticon-parcel"></i></div>
            </div>
        </div>
        <div class="chart_outer_box">
            <div class="chart-container">
                <div class="cart-title-box">
                    <div class="chart-title">
                        <h2>$124.99</h2>
                        <span>My Earnings</span>
                    </div>
                    <div class="chart-select select-box">
                        <select class="wide">
                            <option value="en">Daily</option>
                            <option value="es">Monthly</option>
                            <option value="fr">Yearly</option>
                        </select>
                    </div>
                </div>

                <canvas id="lineChart1"></canvas>
            </div>
            <div class="chart-container">
                <div class="cart-title-box">
                    <div class="chart-title">
                        <h2>54</h2>
                        <span>My Trips</span>
                    </div>
                    <div class="chart-select select-box">
                        <select class="wide">
                            <option value="en">Daily</option>
                            <option value="es">Monthly</option>
                            <option value="fr">Yearly</option>
                        </select>
                    </div>
                </div>
                <canvas id="lineChart2"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('assets/backend/js/chart-script.js') }}"></script>
@endpush