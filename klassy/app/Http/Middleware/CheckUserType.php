<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    public function handle(Request $request, Closure $next, ...$types)
    {
        $user = Auth::user();

        if (!$user || !in_array($user->tipo_usuario, $types)) {
            abort(403, 'Acesso não autorizado.');
        }

        return $next($request);
    }
}
