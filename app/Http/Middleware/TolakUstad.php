<?php

namespace App\Http\Middleware;

use Closure;

class TolakUstad
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
        $user = $request->user();
        if ($user) {
            if ($user->role != 2) {
                return $next($request);
            } else return abort('403', 'Hanya dapat diakses oleh admin');
        } else return abort('404');
    }
}
