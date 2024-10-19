@extends('merchant.layouts.app')
@section('content')
<a href="{{ url()->previous() }}">
    <div class="come_to_back_btn"><span class="icon-Path-1777"></span>Back</div>
</a>


<form id="uploadForm" action="{{ route('merchant.account.update') }}" method="post" enctype="multipart/form-data">
    <div class="row mt-3">
        <div class="col-lg-6">
            <h3>Personal Info</h3>
            <div class="mt-3">
                @csrf

                <input type="hidden" name="id" value="{{ $account->id }}">

                <x-admin.input type="text" label="First Name" title="first_name" :value="$user->first_name" />
                @error('first_name')
                <x-admin.input-error :message="$message" />
                @enderror


                <x-admin.input type="text" label="Last Name" title="last_name" :value="$user->last_name" />
                @error('last_name')
                <x-admin.input-error :message="$message" />
                @enderror

                <x-admin.input type="text" label="Address" title="address" :value="$user->personal_address" />
                @error('personal_address')
                <x-admin.input-error :message="$message" />
                @enderror

            </div>

        </div>
        <div class="col-lg-6">
            <h3>Business Info</h3>
            <div class="mt-3">
                @csrf

                <x-admin.input type="text" label="Company Name" title="company_name" :value="$account->company_name" />
                @error('company_name')
                <x-admin.input-error :message="$message" />
                @enderror


                <x-admin.input type="text" label="Address" title="address" :value="$account->address" />
                @error('address')
                <x-admin.input-error :message="$message" />
                @enderror
                

                <x-admin.input type="text" label="Tax File Number" title="tax_file_number" :value="$account->tax_file_number" />
                @error('tax_file_number')
                <x-admin.input-error :message="$message" />
                @enderror



                <label for="">Employee Size</label>
                <div class="form-group">
                    <div class="form-switcher select-box mb-3">
                        <select class="wide" id="employee_size_id" name="employee_size_id">
                            <option value="" selected disabled>-- Select --</option>
                            @foreach ($employee_sizes as $employee_size)
                            <option value="{{ $employee_size->id }}" {{ $employee_size->id == $account->employee_size_id ? 'selected' : '' }}>
                                {{ $employee_size->quantity }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @error('employee_size_id')
                <x-admin.input-error :message="$message" />
                @enderror

                <x-admin.input type="text" label="Street Number" title="street_number" :value="$account->street_number" />
                @error('street_number')
                <x-admin.input-error :message="$message" />
                @enderror


                <x-admin.select class="mb-3" label="Country" title="country_id" :data="$countries" :value="$account->country_id" />
                @error('country_id')
                <x-admin.input-error :message="$message" />
                @enderror


                <x-admin.select class="mb-3" label="City" title="city_id" :data="$cities" :value="$account->city_id" />
                @error('city_id')
                <x-admin.input-error :message="$message" />
                @enderror




            </div>
        </div>
    </div>
    <div class="text-center mt-3">
        <button class="mb-3" type="submit" style="width: 300px;">Save</button>
    </div>
</form>

<div class="mt-5"></div>


@endsection
@push('scripts')

@endpush