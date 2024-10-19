<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Notifications\NewUserNotification;
use App\Services\OTPService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    protected $otpService;

    public function __construct(OTPService $otpService)
    {
        $this->otpService = $otpService;
    }


    public function showLoginForm()
    {
        return view('frontend.auth.login');
    }

    public function login(Request $request)
    {

        $otp = rand(1111, 9999);
        $admins = Admin::all();


        if ($request->email) {
            $email = $request->email;
            $find_user = User::where('email', $email)->first();

            if ($find_user) {
                $user = $find_user;
                $user->otp = $otp;
                $user->save();
            } else {
                $user = new User();
                $user->email = $request->email;
                $user->otp = $otp;

                $user->save();
            }

            $data = array(
                'user_id' => $user->id,
                'email' => $user->email,
                'user_type' => 'user',
            );


            foreach ($admins as $admin) {
                $admin->notify(new NewUserNotification($data));
            }


            if ($request->redirect) {
                return redirect('/verify?email=' . $user->email . '&&redirect=' . $request->redirect);
            } else {
                return redirect('/verify?email=' . $user->email);
            }
        }



        if ($request->phone) {
            $phone = $request->phone;
            $find_user = User::where('phone', $phone)->first();

            if ($find_user) {
                $user = $find_user;
                $user->otp = $otp;
                $user->save();
            } else {
                $user = new User();
                $user->phone = $request->phone;
                $user->otp = $otp;

                $user->save();
            }

            // send otp in phoen
            $this->otpService->sendOTP($phone, $otp);

            $data = array(
                'user_id' => $user->id,
                'phone' => $user->phone,
                'user_type' => 'user',
            );


            foreach ($admins as $admin) {
                $admin->notify(new NewUserNotification($data));
            }


            if ($request->redirect) {
                return redirect('/verify?phone=' . $user->phone . '&&redirect=' . $request->redirect);
            } else {
                return redirect('/verify?phone=' . $user->phone);
            }
        }

        return redirect()->route('login');
    }

    public function loginVerification()
    {
        return view('frontend.auth.verify');
    }


    public function verifyOTP(Request $request)
    {

        $otp = $request->otp1 . $request->otp2 . $request->otp3 . $request->otp4;

        if ($request->email) {
            $email = $request->email;
            $user = User::where('email', $email)->first();
        } else {
            $phone = $request->phone;
            $user = User::where('phone', $phone)->first();
        }


        if ($user->otp == $otp) {
            $user->otp = null;
            $user->is_phone_verified = 1;
            $user->save();
            Auth::login($user);

            if ($user->user_type == UserType::MERCHANT) {
                return redirect()->route('merchant.dashboard');
            } else if ($user->user_type == UserType::RIDER) {
                return redirect()->route('rider.dashboard');
            } else {
                if ($request->redirect) {
                    return redirect($request->redirect);
                } else {
                    return redirect()->route('home');
                }
            }
        } else {
            return back()->with('error', 'OTP does not match');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
