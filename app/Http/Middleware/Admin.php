<?php

namespace App\Http\Middleware;

use App\Models\Role;
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
        info('user', ['user' => \Auth::user(), 'can' => \Auth::user()->isA(Role::ADMIN), 'request' => $request->all()]);
        return \Auth::user()->isA(Role::ADMIN) ? $next($request) : abort(403);
    }
}
