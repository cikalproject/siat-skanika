<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AdminAuth
{
    public function handle($request, Closure $next)
    {
        if (!Session::has('user') || Session::get('user')->role !== 'admin') {
            return redirect('/');
        }
        return $next($request);
    }
}
