<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckProfileUpdated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd($request->user()->profile_is_updated);
        if ($request->user() && !$request->user()->profile_is_updated) {
            return redirect()->route('student.profile');
        }
        return $next($request);
    }
}
