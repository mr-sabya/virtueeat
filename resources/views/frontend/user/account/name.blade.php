<x-app-layout>



    <!-- Reset Password Box -->
    <div class="reset_password_box">
        <div class="reset_outer_box">
            <h3>Change Name</h3>
            
            <form action="{{ route('user.name.update')}}" method="post">
                @csrf
                
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input id="first_name" class="form-control" type="text" name="first_name" value="{{ Auth::user()->first_name }}">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input id="last_name" class="form-control" type="text" name="last_name" value="{{ Auth::user()->last_name }}">
                    </div>
                
                
                    
                <div class="form-group">
                    <button type="submit" class="theme-btn-two mt-4">Update</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Reset Password Box End -->


</x-app-layout>