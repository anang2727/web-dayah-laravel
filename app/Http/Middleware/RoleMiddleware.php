<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // dd($request->user()->role); // Tambahkan ini untuk memeriksa peran pengguna
        if ($request->user()->role !== $role) {
            abort(403);
        }

        return $next($request);
    }
}
