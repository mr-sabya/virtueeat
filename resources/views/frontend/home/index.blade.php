<x-app-layout>
    <!-- Website Banner -->
    <section class="website_banner">
        <div class="container">
            <h1 class="banner_title">Order your <img src="{{ url('assets/frontend/images/hotdog.png') }}" alt=""> favorite
                <br>
                food <img src="{{ url('assets/frontend/images/burger.png') }}" alt=""> from the <img src="{{ url('assets/frontend/images/french_fries.png') }}" alt=""> comfort <br> of your home.
            </h1>
        </div>
    </section>
    <!-- Website Banner End -->

    <!-- Search Section -->
    <section class="search_section">
        <div class="container">


            <div class="search_box_title">Order delivery near you!</div>
            <form action="{{ route('main.feed.index') }}">
                <div class="row">
                    <div class="col-xl-5 col-md-6 col-sm-12">
                        <div class="form-group">
                            <input type="text" id="from_places" placeholder="Enter location" style="padding-left: 80px;" value="{{ Session::has('location') ? Session::get('location') : '' }}">
                            <input type="hidden" id="origin" name="location" value="khulna">
                            <i class="icon-map-pin" id="searchIcon"></i>
                            <span id="clearIcon">Clear</span>
                            <div id="suggestionsContainer"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-sm-12">
                        <div class="form-group" id="searchForm">
                            <select id="searchOption" name="search-option" onchange="updateScheduleOptionText()">
                                <option value="normal">Deliver Now</option>
                                <option value="schedule" onclick="openSchedulePopup()">Schedule Search</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-sm-12">
                        <div class="form-group">
                            <button type="submit" class="theme-btn-two">Search Here</button>
                        </div>
                    </div>
                </div>
            </form>
            @if(Session::has('error'))
            <p class="text-danger">{{ Session::get('error') }}</p>
            @endif
        </div>
    </section>
    <!-- Search Section End -->

    </div>
    <!-- /.page-wrapper -->

    <x-slot name="extra">
        <div id="schedulePopup">
            <h2>Schedule Search</h2>
            <div class="form-group">
                <label for="scheduleDate">Date:</label>
                <input type="date" id="scheduleDate">
            </div>
            <div class="form-group">
                <label for="scheduleTime">Time:</label>
                <input type="time" id="scheduleTime">
            </div>
            <div class="form-group">
                <button type="submit" onclick="setScheduledTime()" class="theme-btn-two">Set Schedule</button>
            </div>
            <div class="form-group">
                <button type="submit" onclick="cancelScheduledTime()" class="cancel">Cancel</button>
            </div>
        </div>
    </x-slot>

    @section('scripts')
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

        });

        // get current Position

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                console.log("Geolocation is not supported by this browser.");
            }
        }

        function showPosition(position) {
            var Latitude = position.coords.latitude;
            var Longitude = position.coords.longitude;
            console.log(Latitude);
            console.log(Longitude);
        }

        getLocation();
        showPosition();
    </script>
    @endsection
</x-app-layout>