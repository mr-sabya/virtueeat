<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;
        // dd($guards);
        foreach ($guards as $guard) {
            if ($guard === 'admin' && Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::ADMINHOME);
            }
            if (Auth::guard($guard)->check()) {
                if (Auth::user()->user_type === 1) {
                    return redirect(RouteServiceProvider::MERCHANTHOME);
                } else {
                    return redirect(RouteServiceProvider::MERCHANTHOME);
                }
            }
        }

        return $next($request);
    }
}
