<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Memastikan user sudah login dan merupakan admin
        if (Auth::check() && Auth::user()->userType->id === 1) {
            return $next($request);
        }

        // Jika bukan admin, redirect ke halaman lain, misalnya home
        return redirect('/user/purchase');
    }
}
