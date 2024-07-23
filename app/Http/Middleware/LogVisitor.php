<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Visitor;

class LogVisitor
{
    public function handle(Request $request, Closure $next)
    {
        // Define roles to exclude from logging
        $excludedRoles = ['admin'];

        // Log visitor information only for GET requests and users without excluded roles
        if ($request->isMethod('get') && !$this->hasExcludedRole()) {
            Visitor::create([
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
        }

        // Ensure the request proceeds regardless of the logging condition
        return $next($request);
    }

    /**
     * Check if the authenticated user has an excluded role
     *
     * @return bool
     */
    protected function hasExcludedRole()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $excludedRoles = ['admin'];

            return in_array($user->user_role, $excludedRoles);
        }

        return false;
    }
}
