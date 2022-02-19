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
    }
    public function postLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {

            // $getIDUser=auth()->user()->level;
            // if($getIDUser==1){
            //     return view('templates.admins.index');
            // }else{
            //     return view('templates.clients.index');
            // }

        }
    }
}
