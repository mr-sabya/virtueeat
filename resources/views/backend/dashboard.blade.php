@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
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
            <div class="chart_image">
                <img src="images/resource/project_chart_1.jpg" alt="">
            </div>
            <div class="chart_image">
                <img src="images/resource/project_chart_2.jpg" alt="">
            </div>
        </div>
    </div>
@endsection
