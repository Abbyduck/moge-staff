<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{


    public function login(Request $request){
        Log::info('aha');


        return view('admin.auth.login');
    }
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
    public function authenticate(Request $request)
    {
        Log::info('ha');
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');

        $remember = $request->input('remember');

        if (Auth::attempt($credentials,$remember)) {
            $request->session()->regenerate();

            return redirect()->intended('admin.dashboard')->withSuccess('Signed in');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
