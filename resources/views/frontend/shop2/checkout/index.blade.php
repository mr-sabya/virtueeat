@extends('layouts.merchant')

@section('body')
<section class="shop_product">
    <div class="container">
        <div class="shop_title_box">
            <h1>Your Order Shipping</h1>
        </div>
        <div class="order_sumary_box">
            <div class="order_sumary_inner">

                <div class="form-box">
                    <form action="{{ route('shop.order.store')}}" method="post" id="order_form">
                        @csrf
                        <h3 class="icon">
                            <span class="flaticon-person"></span>
                        </h3>

                        <fieldset>
                            <h3 class="shiping_title">Your Information</h3>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                                    <input type="text" class="form-control" placeholder="First Name" name="first_name" id="first_name">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                                    <input type="text" class="form-control" placeholder="Last Name" name="last_name" id="last_name">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 form-group">
                                    <input type="text" class="form-control" placeholder="Phone" name="phone" id="phone">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 form-group">
                                    <input type="email" class="form-control" placeholder="Email Address" name="email" id="email">
                                </div>

                            </div>
                        </fieldset>

                        <h3 class="icon">
                            <span class="flaticon-flag"></span>
                        </h3>
                        <fieldset>
                            <div class="row">
                                <div class="col-xl-12 col-lg-6 col-md-12 form-group">
                                    <input type="text" class="form-control" placeholder="City" name="city" id="city">
                                </div>
                                <div class="col-xl-12 col-lg-6 col-md-12 form-group">
                                    <input type="text" class="form-control" placeholder="Street Address Line 1" name="address_line_1" id="address_line_1">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 form-group">
                                    <input type="text" class="form-control" placeholder="Street Address Line 2" name="address_line_2" id="address_line_2">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 form-group">
                                    <input type="text" class="form-control" placeholder="ZIP Code" name="zip_code" id="zip_code">
                                </div>

                            </div>
                        </fieldset>

                        <h3 class="icon">
                            <span class="flaticon-credit-card"></span>
                        </h3>
                        <fieldset>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 form-group">
                                    <input type="text" class="form-control" placeholder="Card Holder's Name" name="card_holder_name" id="card_holder_name">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                                    <input type="text" class="form-control" placeholder="Expiration Month / 00" name="card_month" id="card_month">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                                    <input type="text" class="form-control" placeholder="Expiration Year / 0000" name="card_year" id="card_year">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 form-group">
                                    <input type="text" class="form-control" placeholder="CVV" name="cvv" id="cvv">
                                </div>

                            </div>
                        </fieldset>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection


@section('scripts')
<script src="{{ asset('assets/merchant/vendor/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/merchant/vendor/jquery-validation/dist/additional-methods.min.js') }}"></script>
<script src="{{ asset('assets/merchant/vendor/jquery-steps/jquery.steps.min.js') }}"></script>


<script>
    var form = $("#order_form");

    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        labels: {
            previous: 'Previous',
            next: 'Next',
            finish: 'Submit',
            current: ''
        },
        titleTemplate: '<span class="title">#title#</span>',
        onStepChanging: function(event, currentIndex, newIndex) {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function(event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function(event, currentIndex) {
            form.submit();
        },
        // onInit : function (event, currentIndex) {
        //     event.append('demo');
        // }
    });
</script>
@endsection