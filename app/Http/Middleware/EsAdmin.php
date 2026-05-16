<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EsAdmin
{
    /**
     * Handle an incoming request.
     *(No olvides registrarlo en app/Http/Kernel.php en el array $middlewareAliases como 'admin' => \App\Http\Middleware\EsAdmin::class si usas Laravel 10
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si el usuario autenticado es administrador
        if (auth()->check() && auth()->user()->tipo === 'administrador') {
            return $next($request);
        }
        // Si no, lo mandamos al inicio con un error
        return redirect()->route('inicio')->with('error', 'Acceso restringido a administradores.');
    }
}
