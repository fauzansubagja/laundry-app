<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = $request->user();
    
        if (! $user || ! in_array($user->role, $roles)) {
            return redirect('/dashboard');
        }
    
        return $next($request);
    }    
    // public function handle(Request $request, Closure $next)
    // {
    //    // Mengecek apakah user memiliki role 'kasir'
    //    if (auth()->check() && auth()->user()->role == 'Kasir') {
    //     // Jika user memiliki role 'kasir', maka dilarang mengakses route outlet, paket, dan registrasi pelanggan
    //     if ($request->is('outlet') || $request->is('paket') || $request->is('registrasi/pelanggan')) {
    //         return redirect('/dashboard')->with('error', 'Anda tidak memiliki hak akses untuk mengakses halaman tersebut.');
    //     }
    // }

    // return $next($request);
    // }
}
