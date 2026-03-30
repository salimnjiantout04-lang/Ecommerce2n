<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Assurez-vous que cela pointe vers le bon modèle

class AdminMiddleware

{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
        $user = Auth::user(); // Récupérer l'utilisateur authentifié
        $role = $user->statut;
    }
        else{
            return redirect('/logout'); // Ou utilisez abort(403);

        }
        if ($role !== 'admin') {
            return redirect('/logout'); // Ou utilisez abort(403);
        }
        return $next($request);
    }

   

}
