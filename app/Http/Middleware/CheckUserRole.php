<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $ability = null): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();

        switch ($ability) {
            case 'manageUsers':
                if (!$user->canManageUsers()) {
                    abort(403, 'Access denied');
                }
                break;
            case 'deleteLetters':
                if (!$user->canDeleteLetters()) {
                    abort(403, 'Access denied');
                }
                break;
        }

        return $next($request);
    }
}