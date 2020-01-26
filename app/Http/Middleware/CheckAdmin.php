<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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
        if ($request->user()->is_admin == true) {
            if (request()->path() === 'home') {
                return redirect('admin/home');
            }

            return $next($request);
        } else {
            if (request()->path() === 'home') {
                return $next($request);
            }

            return redirect('home');
        }
    }
}
