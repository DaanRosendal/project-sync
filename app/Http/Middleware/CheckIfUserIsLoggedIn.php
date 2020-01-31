<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class CheckIfUserIsLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // als er een User ingelogd is, redirect naar /home
        if (Auth::check()) {
            return redirect('home');
        } else {
            return $next($request);
        }
    }
}
