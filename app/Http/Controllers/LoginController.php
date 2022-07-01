<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('auths.login');
    }

    public function logout()
    {
        Auth::logout();
        return view('auths.login')->with("message","Logout successful");
    }
    public function postLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {

            $name_login = auth()->user()->name_staff;
            return view('templates.admins.index', compact('name_login'));
        }
        return view('auths.login');
    }
}
