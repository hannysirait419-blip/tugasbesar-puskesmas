<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $guard = auth()->guard('web'); // paksa guard web

        if (!$guard->check()) {
            return redirect()->route('login');
        }

        $user = $guard->user();

        if (($user->role ?? 'user') !== 'admin') {
            abort(403, 'Akses ditolak');
        }

        return $next($request);
    }
}
