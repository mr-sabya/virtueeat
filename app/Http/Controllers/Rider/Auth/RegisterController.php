<?php

namespace App\Http\Controllers\Rider\Auth;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Notifications\NewUserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function register(Request $request)
    {
        
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $data['user_type'] = UserType::RIDER;

        // return $data;
        
        $user = User::create($data);


        $data = array(
            'user_id' => $user->id,
            'email' => $user->email,
            'user_type' => 'rider',
        );

        $admins = Admin::all();
        foreach ($admins as $admin) {
            $admin->notify(new NewUserNotification($data));
        }



        auth()->login($user);

        return redirect()->route('rider.dashboard');
    }
}
