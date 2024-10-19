@extends('rider.layouts.app')
@section('content')
<div class="text_info_title_box style_2">
    <h1 class="sec_title">{{ $title }}</h1>
    <div class="info_right_side_box">
        <form class="food_search_form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="search-button">
                <button class="search_btn" type="submit" id="search-button"><i class="flaticon-loupe"></i></button>
            </div>
        </form>


    </div>
</div>
<div class="foods_menu_box">
    <div class="row">
        <div class="col-lg-12">

            @php
            $user = App\Models\User::where('id', $order->user_id)->first();
            $country = App\Models\Country::where('iso2', $user->location['country'])->first();
            $shop = App\Models\Shop::where('id', $order->shop_id)->first();
            @endphp
            <div class="order-details">
                <h4 class="mb-3">Status: {{ $order->status['name'] }} </h4>
                <hr>


                <form id="distance_form" style="display: none;">
                    <div class="form-group">
                        <label>Enter Origin</label>
                        <input class="form-control" id="from_places" placeholder="Enter Origin" value="{{ $user->address }}" />
                        <input id="origin" name="origin" required="" type="hidden" value="{{ $user->address }}" />
                        <a onclick="getCurrentPosition()">Set Current Location</a>
                    </div>
                    <div class="form-group">
                        <label>Enter Destination</label>
                        <input class="form-control" id="to_places" placeholder="Enter Destination" value="{{ $shop->address }}" />
                        <input id="destination" name="destination" required="" type="hidden" value="{{ $shop->address }}" />
                    </div>
                    <div class="form-group">
                        <label>Travel Mode</label>
                        <select class="form-control" id="travel_mode" name="travel_mode">
                            <option value="DRIVING">Driving</option>
                            <option value="WALKING">Walking</option>
                            <option value="BICYCLING">Bicycle</option>
                            <option value="TRANSIT" selected>Transit</option>
                        </select>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Find" style="background: #8142b1; width: 100%; border: 0px;" />
                </form>


                <div class="completed_item_box">
                    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3677.762026072694!2d89.55237427608645!3d22.811280179322438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff90021918d63d%3A0xdd709dbcdb4cb5a1!2sBasupara%20Rd%2C%20Khulna!5e0!3m2!1sen!2sbd!4v1714327833150!5m2!1sen!2sbd" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                    <div id="map" style="height: 500px; width: 100%"></div>
                </div>

                <div class="completed_item_box mt-4">
                    <p id="in_mile"></p>
                    <p id="in_kilo"></p>
                    <p class="m-0" id="duration_text"></p>
                </div>

                <hr>

                @if($order->rider_id == NULL)
                <a href="{{ route('rider.order.take', $order->id)}}" class="btn btn-primary">Take this Order</a>
                @elseif($order->rider_id == Auth::user()->id)
                <p class="text-success">Taken By You</p>
                @else
                <p class="text-danger">Taked By Someone</p>
                @endif
                <hr>

                @if($order->rider_id == Auth::user()->id)
                <a href="{{ route('rider.order.update', $order->id)}}?status={{ App\Enums\OrderStatusType::Received_By_Rider }}" class="btn btn-primary {{ $order->status_id >= App\Enums\OrderStatusType::Received_By_Rider->value ? 'disabled' : '' }}">Received From Shop</a>

                <a href="{{ route('rider.order.update', $order->id)}}?status={{ App\Enums\OrderStatusType::On_the_Way_to_Deliver }}" class="btn btn-primary {{ $order->status_id >= App\Enums\OrderStatusType::On_the_Way_to_Deliver->value ? 'disabled' : '' }}">On the Way to Deliver</a>

                <a href="{{ route('rider.order.update', $order->id)}}?status={{ App\Enums\OrderStatusType::Delivered }}" class="btn btn-primary {{ $order->status_id == App\Enums\OrderStatusType::Delivered->value ? 'disabled' : '' }}">Delivered</a>
                @endif

                <hr>
                <div class="row">
                    <div class="col-lg-6">
                        <table class="table">
                            <tr>
                                <td>User: </td>
                                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{ $user->address }}</td>
                            </tr>
                            <tr>
                                <td>Phone : </td>
                                <td>{{ $user->phone }}</td>
                            </tr>
                            <tr>
                                <td>Location: </td>
                                <td>{{ $user->location['city'] }}, {{ $user->location['region'] }}, {{ $country->name }} </td>
                            </tr>

                        </table>
                    </div>

                    <div class="col-lg-6">
                        <table class="table">
                            <tr>
                                <td>Shop:</td>
                                <td>{{ $shop->company_name }}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{ $shop->address }}</td>
                            </tr>
                            <tr>
                                <td>Phone : </td>
                                <td>{{ $shop->phone }}</td>
                            </tr>
                            <tr>
                                <td>Location: </td>
                                <td>{{ $shop->location['city'] }}, {{ $shop->location['region'] }}, {{ $shop->country }} </td>
                            </tr>

                        </table>
                    </div>
                </div>


                <hr>

            </div>
            <div class="food_item_right table-responsive d-block">
                <table class="table table-bordered data-table bg-white w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Product</th>
                            <th style="text-align: right;">Price</th>
                            <th>Quantity</th>
                            <th>Instruction</th>
                            <th style="text-align: right;">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->menuItem['name'] }}</td>
                            <td style="text-align: right;">${{ $item->menuItem['price'] }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>

                            </td>
                            <td style="text-align: right;">${{ number_format((float)$item->menuItem['price'] * $item->quantity, 2, '.', '') }}</td>
                        </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <th colspan="5" style="text-align: right;">Deliver Charge</th>
                            <th style="text-align: right;">${{ $order->delivery_charge == '' ? '0.00' : $order->delivery_charge }}</th>
                        </tr>
                        <tr>
                            <th colspan="5" style="text-align: right;">tax</th>
                            <th style="text-align: right;">${{ $order->tax }}</th>
                        </tr>
                        <tr>
                            <th colspan="5" style="text-align: right;">Total</th>
                            <th style="text-align: right;">${{ $order->total }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script defer src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyD9-KcnI0PWFt4avTHoEFcZbXeN3yGcsfw" type="text/javascript"></script>
<script>
    $(function() {
        var origin, destination, map;

        // add input listeners
        google.maps.event.addDomListener(window, 'load', function(listener) {
            setDestination();
            initMap();
        });

        // init or load map
        function initMap() {

            var myLatLng = {
                lat: 20.5937,
                lng: 78.9629
            };
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 16,
                center: myLatLng,
            });
        }

        function setDestination() {
            var from_places = new google.maps.places.Autocomplete(document.getElementById('from_places'));
            var to_places = new google.maps.places.Autocomplete(document.getElementById('to_places'));

            google.maps.event.addListener(from_places, 'place_changed', function() {
                var from_place = from_places.getPlace();
                var from_address = from_place.formatted_address;
                $('#origin').val(from_address);
            });

            google.maps.event.addListener(to_places, 'place_changed', function() {
                var to_place = to_places.getPlace();
                var to_address = to_place.formatted_address;
                $('#destination').val(to_address);
            });


        }

        function displayRoute(travel_mode, origin, destination, directionsService, directionsDisplay) {
            directionsService.route({
                origin: origin,
                destination: destination,
                travelMode: travel_mode,
                avoidTolls: true
            }, function(response, status) {
                if (status === 'OK') {
                    directionsDisplay.setMap(map);
                    directionsDisplay.setDirections(response);
                } else {
                    directionsDisplay.setMap(null);
                    directionsDisplay.setDirections(null);
                    alert('Could not display directions due to: ' + status);
                }
            });
        }

        // calculate distance , after finish send result to callback function
        function calculateDistance(travel_mode, origin, destination) {

            var DistanceMatrixService = new google.maps.DistanceMatrixService();
            DistanceMatrixService.getDistanceMatrix({
                origins: [origin],
                destinations: [destination],
                travelMode: google.maps.TravelMode[travel_mode],
                unitSystem: google.maps.UnitSystem.IMPERIAL, // miles and feet.
                // unitSystem: google.maps.UnitSystem.metric, // kilometers and meters.
                avoidHighways: false,
                avoidTolls: false
            }, save_results);
        }

        // save distance results
        function save_results(response, status) {

            if (status != google.maps.DistanceMatrixStatus.OK) {
                $('#result').html(err);
            } else {
                var origin = response.originAddresses[0];
                var destination = response.destinationAddresses[0];
                if (response.rows[0].elements[0].status === "ZERO_RESULTS") {
                    $('#result').html("Sorry , not available to use this travel mode between " + origin + " and " + destination);
                } else {
                    var distance = response.rows[0].elements[0].distance;
                    var duration = response.rows[0].elements[0].duration;
                    var distance_in_kilo = distance.value / 1000; // the kilo meter
                    var distance_in_mile = distance.value / 1609.34; // the mile
                    var duration_text = duration.text;
                    appendResults(distance_in_kilo, distance_in_mile, duration_text);
                    // sendAjaxRequest(origin, destination, distance_in_kilo, distance_in_mile, duration_text);
                }
            }
        }

        // append html results
        function appendResults(distance_in_kilo, distance_in_mile, duration_text) {
            $("#result").removeClass("hide");
            $('#in_mile').html(" Distance in Mile: " + distance_in_mile.toFixed(2) + " Mile");
            $('#in_kilo').html("Distance in KM: " + distance_in_kilo.toFixed(2) + " KM");
            $('#duration_text').html("Duration: " + duration_text);
        }

        // send ajax request to save results in the database


        // on submit  display route ,append results and send calculateDistance to ajax request
        function getFinaResult() {
            var origin = $('#origin').val();
            var destination = $('#destination').val();
            var travel_mode = $('#travel_mode').val();
            var directionsDisplay = new google.maps.DirectionsRenderer({
                'draggable': false
            });
            var directionsService = new google.maps.DirectionsService();
            displayRoute(travel_mode, origin, destination, directionsService, directionsDisplay);
            calculateDistance(travel_mode, origin, destination);
        }


        window.onload = function() {
            getFinaResult();
        }


    });

    // get current Position
    function getCurrentPosition() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(setCurrentPosition);
        } else {
            alert("Geolocation is not supported by this browser.")
        }
    }

    // get formatted address based on current position and set it to input
    function setCurrentPosition(pos) {
        var geocoder = new google.maps.Geocoder();
        var latlng = {
            lat: parseFloat(pos.coords.latitude),
            lng: parseFloat(pos.coords.longitude)
        };
        geocoder.geocode({
            'location': latlng
        }, function(responses) {
            console.log(responses);
            if (responses && responses.length > 0) {
                $("#origin").val(responses[1].formatted_address);
                $("#from_places").val(responses[1].formatted_address);
                //    console.log(responses[1].formatted_address);
            } else {
                alert("Cannot determine address at this location.")
            }
        });
    }
</script>
@endpush