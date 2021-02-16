<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if(!($request->user()->role->name == $role)){
            return response()->json(['error' => 'Неверная роль', 'role' => $request->user()->role]);
        } // if.

        return $next($request);
    }
}
