<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * $roles se pasa desde la ruta:
     * ->middleware('role:Administrador')
     * ->middleware('role:Administrador,Auxiliar')
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user(); // usuario autenticado (Sanctum)

        if (!$user) {
            return response()->json(['message' => 'No autenticado'], 401);
        }

        $trabajador = $user->trabajador; // relación en User

        if (!$trabajador || !$trabajador->tipo_trabajador) {
            return response()->json(['message' => 'Usuario sin tipo de trabajador'], 403);
        }

        $nombreTipo = $trabajador->tipo_trabajador->nombre_tipo; // Ej: "Administrador", "Auxiliar"

        // Comparamos por nombre exacto (puedes normalizar a lower si quieres)
        if (!in_array($nombreTipo, $roles)) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        return $next($request);
    }
}
