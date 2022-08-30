<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function getLogin(Request $request)
    {
        return view('user/login', ['error' => null]);
    }

    public function postLogin(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/user/dashboard');
        }
        Log::debug('Failed to authenticate user');
        //return redirect('/user/error');
        return back()->withErrors([
            'email' => 'Username or password is wrong'
        ])->onlyInput('email');
    }

    public function getDashboard(Request $request){
        return view('user/dashboard');
    }

    /**
     * Logout user
     */
    public function getLogout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/user/login');
    }
}
