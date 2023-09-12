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
        if (auth()->user()->email_verified_at != null) {

            if (auth()->user()->type == 'student') {
                return redirect()->route('student.dashboard');
            } else if (auth()->user()->type == 'agent') {
                // if (agent_verify() == 0) {
                //     auth()->logout();
                //     return redirect()->route('login')->with('error', 'Your account is not active. Please contact admin.');
                // }
                return redirect()->route('agent.dashboard');
            } else if (auth()->user()->type == 'university') {
                return redirect()->route('university.dashboard');
            } else if (auth()->user()->type == 'staff') {
                if (staff_verify() == 0) {
                    auth()->logout();
                    return redirect()->route('login')->with('error', 'Your account is not active. Please contact your agent.');
                }
                return redirect()->route('staff.dashboard');
            } else if (auth()->user()->type == 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('login');
            }
        }
        else{
            return redirect()->to('dashboard');
        }
    }
}
