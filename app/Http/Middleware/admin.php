<?php

namespace App\Http\Middleware;

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
