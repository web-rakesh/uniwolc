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
        // dd(auth()->user()->type);
        if ($request->user() && !$request->user()->profile_is_updated) {
            if (auth()->user()->type == 'student') {
                return redirect()->route('student.profile')->with('error', 'Please complete your profile first.');
            } else if (auth()->user()->type == 'agent') {
                return redirect()->route('agent.general.details')->with('error', 'Please complete your profile first.');
            } else {
                return redirect()->route('university.profile.index')->with('error', 'Please complete your profile first.');
            }
        }
        return $next($request);
    }
}
