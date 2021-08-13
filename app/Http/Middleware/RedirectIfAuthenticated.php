<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */

    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // return redirect(RouteServiceProvider::HOME);
                if ($guard == 'admin') {
                    return redirect(RouteServiceProvider::ADMIN);
                }else if ($guard == 'vendor') {
                    return redirect(RouteServiceProvider::VENDOR);
            }else {
                    return redirect(RouteServiceProvider::HOME);
                }
            }
        }
        return $next($request);
    }

#################test
// public function handle(Request $request, Closure $next, $guard)
// {
//     if (Auth::guard($guard)->check()) {
//         if ($guard === 'admin') {
//             // return 'addd';
//             return redirect(RouteServiceProvider::ADMIN);
//         } else {
//             // return 'user';
//             return redirect(RouteServiceProvider::HOME);
//         }
// return $next($request);
//     }
// }
###################

}
