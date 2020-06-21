<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
            if ($user->role == 1 or $user->role == 2) {
                if ($user->status == 1) {
                    return $next($request);
                } else abort('403', 'Akses di tolak');
             } else abort('404');
        } abort('404');
    }
}
