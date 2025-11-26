<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureEmployee
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session('employee_id')) {
            return redirect()->route('employee.login');
        }
        return $next($request);
    }
}
