<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpFoundation\Response;

class VerifyCsrfToken
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        // Tambahkan URI yang ingin dikecualikan dari verifikasi CSRF
        'api/*', // Contoh: semua rute API
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah rute dalam pengecualian
        if ($this->inExceptArray($request)) {
            return $next($request);
        }

        // Cek token CSRF
        if (!$request->isMethod('GET') && !$request->isMethod('HEAD') && !$request->isMethod('OPTIONS') && !$request->session()->token() || $request->input('_token') !== $request->session()->token()) {
            throw new TokenMismatchException();
        }

        return $next($request);
    }

    /**
     * Determine if the request is in the except array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function inExceptArray(Request $request): bool
    {
        foreach ($this->except as $except) {
            if ($request->is($except)) {
                return true;
            }
        }

        return false;
    }
}
