<x-app-layout>
        <!-- Website Banner -->
        <section class="website_banner">
            <div class="container">
                <h1 class="banner_title">Order your <img src="assets/images/hotdog.png" alt=""> favorite
                    <br>
                    food <img src="assets/images/burger.png" alt=""> from the <img
                        src="assets/images/french_fries.png" alt=""> comfort <br> of your home.
                </h1>
            </div>
        </section>
        <!-- Website Banner End -->

        <!-- Search Section -->
        <section class="search_section">
            <div class="container">
                <div class="search_box_title">Order delivery near you!</div>
                <form action="search-page.html" method="post">
                    <div class="row">
                        <div class="col-xl-5 col-md-6 col-sm-12">
                            <div class="form-group">
                                <input type="text" id="locationInput" placeholder="Enter location">
                                <i class="icon-map-pin" id="searchIcon"></i>
                                <span id="clearIcon">Clear</span>
                                <div id="suggestionsContainer"></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-sm-12">
                            <div class="form-group" id="searchForm">
                                <select id="searchOption" onchange="updateScheduleOptionText()">
                                    <option value="normal">Normal Search</option>
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
</x-app-layout>
