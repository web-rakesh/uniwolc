<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {
        // dd(auth()->user()->type);
        if (auth()->user()->type == 'student') {
            return redirect()->route('student.dashboard');
        } else if (auth()->user()->type == 'agent') {
            return redirect()->route('agent.dashboard');
        } else if (auth()->user()->type == 'university') {
            return redirect()->route('university.dashboard');
        } else if (auth()->user()->type == 'staff') {
            return redirect()->route('staff.dashboard');
        } else if (auth()->user()->type == 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('login');
        }
    }
}
