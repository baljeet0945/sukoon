<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Admin
{
    public function handle($request, Closure $next)
    {
        if ( Auth::user()->permission !== 'admin' ) {
            //
        } else {
            //
        }

    }
}
