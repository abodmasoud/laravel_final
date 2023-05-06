<?php

namespace App\Http\Controllers\panel\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function loginView()
    {
        return view('panel.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:3',
            'remember_me' => 'boolean'
        ]);
        $credentials = ['email' => $request->get('email'), 'password' => $request->get('password')];
        if (Auth::guard('user')->attempt($credentials, $request->get('remember_me'))) {

            return redirect()->route('stores.index')->with('success', 'Login Successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to Login check Credentials');
        }
    }


    public function logout()
    {
        Auth::guard('user')->logout();

        return redirect()->route('index')->with('success', 'Logout Successfully');
    }
}
