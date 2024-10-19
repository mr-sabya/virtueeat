@extends('layouts.admin')

@section('title', 'Add User')

@section('content')
<a href="{{ url()->previous() }}">
    <div class="come_to_back_btn"><span class="icon-Path-1777"></span>Back</div>
</a>
<div class="row justify-content-center mt-4">
    <div class="col-lg-6">
        <h2>Add New user</h2>
        <form action="{{ route('admin.user.store') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-lg-12">
                    <label for="name">User Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                    @if ($errors->has('name'))
                    <span id="slug_error" style="color: red">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group col-lg-12">
                    <label for="email">User Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                    @if ($errors->has('email'))
                    <span id="slug_error" style="color: red">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group col-lg-12">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter usrename">
                    @if ($errors->has('username'))
                    <span id="slug_error" style="color: red">{{ $errors->first('username') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-lg-12">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                    @if ($errors->has('password'))
                    <span id="slug_error" style="color: red">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group col-lg-12">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter Password">
                    @if ($errors->has('password_confirmation'))
                    <span id="slug_error" style="color: red">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-lg-12">
                    <label for="password">Assign Roles</label>
                    <select name="roles[]" id="roles" class="form-control" multiple data-placeholder="Select Role">
                        @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <button type="submit" class="btn btn-primary waves-effect">Create User</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')

<script>
    $('#roles').select2();
</script>

@endpush