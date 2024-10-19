<x-app-layout>



    <!-- Reset Password Box -->
    <div class="reset_password_box">
        <div class="reset_outer_box">
            <h3>Change Name</h3>

            <form action="{{ route('user.address.update')}}" method="post">
                @csrf

                <div class="form-group">
                    <label for="address">Address</label>
                    <input id="address" class="form-control" type="text" name="address" value="{{ Auth::user()->address }}">
                </div>

                <div class="form-group">
                    <label for="country_id">Country</label>
                    <select class="form-control" name="country_id" id="country_id">
                        <option data-display="Country">Country</option>
                        @foreach ($countries as $country)
                        <option value="{{ $country->id }}" {{ $current_country == $country->iso2 ? 'selected' : '' }}>{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="city_id">City</label>
                    <select id="city_id" class="form-control" name="city_id">
                        <option data-display="City">City</option>
                        @foreach ($cities as $city)
                        <option value="{{ $city->id }}" {{ $current_city == $city->name ? 'selected' : '' }}>{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>



                <div class="form-group">
                    <button type="submit" class="theme-btn-two mt-4">Update</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Reset Password Box End -->


</x-app-layout>