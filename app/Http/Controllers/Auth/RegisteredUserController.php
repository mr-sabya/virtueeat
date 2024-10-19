<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserMeta;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->name ?? $request->first_name . ' ' . $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_type' => $request->userType,
            ]);

            if ((int)$request->userType === UserType::MERCHANT->value) {
                $request->validate([
                    'first_name' => ['required', 'string', 'max:255'],
                    'last_name' => ['required', 'string', 'max:255'],
                    'country_id' => ['required'],
                    'city_id' => ['required'],
                    'category_id' => ['required'],
                    'details.res_name' => ['required'],
                    'details.address' => ['required'],
                    'details.post_code' => ['required'],
                    'location' => ['required'],
                ]);

                $userMeta = UserMeta::create([
                    'user_id' => $user->id,
                    'name' => ['first_name' => $request->first_name, 'last_name' => $request->last_name],
                    'country_id' => $request->country_id,
                    'city_id' => $request->city_id,
                    'category_id' => $request->category_id,
                    'location' => $request->location,
                    'details' => $request->details
                ]);
            }

            if ((int)$request->userType === UserType::RIDER->value) {
                $request->validate([
                    'first_name' => ['required', 'string', 'max:255'],
                    'last_name' => ['required', 'string', 'max:255'],
                    'country_id' => ['required'],
                    'city_id' => ['required'],
                    // 'category_id' => ['required'],
                    // 'details.res_name' => ['required'],
                    // 'details.address' => ['required'],
                    // 'details.post_code' => ['required'],
                    'location' => ['required'],
                ]);

                $userMeta = UserMeta::create([
                    'user_id' => $user->id,
                    'name' => ['first_name' => $request->first_name, 'last_name' => $request->last_name],
                    'country_id' => $request->country_id,
                    'city_id' => $request->city_id,
                    'location' => $request->location,
                    'details' => ['vehicle_type' => $request->vehicle_type]
                ]);
            }

            event(new Registered($user));

            Auth::login($user);
        });

        if (Auth::user()->user_type === UserType::MERCHANT) {
            return redirect()->intended(RouteServiceProvider::MERCHANTHOME);
        }

        if (Auth::user()->user_type === UserType::RIDER) {
            return redirect()->intended(RouteServiceProvider::RIDERHOME);
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
