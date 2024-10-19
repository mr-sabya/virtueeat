<x-app-layout>



    <!-- Reset Password Box -->
    <div class="reset_password_box">
        <div class="reset_outer_box">
            <h3>New Password</h3>
            <p>Your password must be at least 8 characters long, and contain at least one digit and one non-digit character</p>
            <form action="{{ route('user.password.update')}}" method="post">
                @csrf
                <div id="show_hide_password_1">
                    <div class="form-group">
                        <label for="password">New password</label>
                        <input id="password" class="form-control" type="password" name="password">
                        <div class="input-group-addon"><i class="eyeicon fa fa-eye-slash" aria-hidden="true"></i></div>
                    </div>
                </div>
                <div id="show_hide_password_2">
                    <div class="form-group">
                        <label for="password_confirmation">Confirm password</label>
                        <input id="password_confirmation" class="form-control" type="password" name="password_confirmation">
                        <div class="input-group-addon"><i class="eyeicon fa fa-eye-slash" aria-hidden="true"></i></div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="theme-btn-two">Update</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Reset Password Box End -->


</x-app-layout>