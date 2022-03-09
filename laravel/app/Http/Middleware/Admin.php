<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
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
        $currentUser = auth()->user();

        if ($currentUser->email == 'giangcakho@gmail.com') {
            return $next($request);
        }

        return redirect()->route('home-page');
    }
}