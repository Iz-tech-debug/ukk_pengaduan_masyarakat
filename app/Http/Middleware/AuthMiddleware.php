<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $daffa_request, Closure $next, $level = null): Response
    {
        if (!session('daffaid') || session('daffalevel') !== $level) {
            return redirect('/login')->withErrors(['error' => 'Akses ditolak!']);
        }

        return $next($daffa_request);
    }
}
