@extends('backend.layouts.app')

@section('title', 'Edit User')

@section('content')
<a href="{{ url()->previous() }}">
    <div class="come_to_back_btn"><span class="icon-Path-1777"></span>Back</div>
</a>
<div class="add_food_iten_box">
    <h2>Edit User</h2>
    <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label for="name">User Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{ $user->name }}">
                @if ($errors->has('name'))
                <span id="slug_error" style="color: red">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="email">User Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{ $user->email }}">
                @if ($errors->has('email'))
                <span id="slug_error" style="color: red">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                @if ($errors->has('password'))
                <span id="slug_error" style="color: red">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter Password">
                @if ($errors->has('password_confirmation'))
                <span id="slug_error" style="color: red">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label for="password">Assign Roles</label>
                <select name="roles[]" id="roles" class="form-control" multiple data-placeholder="Select Role">
                    @foreach ($roles as $role)
                    <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <button type="submit" class="btn btn-primary waves-effect">Update User</button>
    </form>
</div>
@endsection

@push('scripts')

<script>
    $('#roles').select2();
</script>

@endpush