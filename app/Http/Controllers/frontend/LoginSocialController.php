<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Laravel\Socialite\Facades\Socialite;



class LoginSocialController extends Controller
{
    public function login($type)
    {
        switch ($type) {
            case 'facebook':
                return  Socialite::driver('facebook')->redirect();
                break;
            case 'google':
                return  Socialite::driver('google')->redirect();
                break;
        }
    }

    public function loginAcc(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::guard('customer')->attempt(['email' => $email, 'password' => $password, 'trangthai' => 1])) {
            return true;
        } else {
            $cus = Customer::where('email', $request->email)->first();
            if ($cus) {
                if ($cus->trangthai == 0) {
                    return Response::json(['loginAcc' => 'Tài khoản chưa được kích hoạt. <br>Vui lòng nhấn <a href="">vào đây </a>để kích hoạt']);
                } else {
                return Response::json(['loginAcc' => 'Mật khẩu không chính xác.']);
                }
            } else {
                return Response::json(['loginAcc' => 'Email không tồn tại.']);
            }
        }
    }

    public function callback($type)
    {
        if ($type == 'facebook') {
            $users = Socialite::driver($type)->user();
        } else if ($type == 'google') {
            $users = Socialite::driver('google')->user();
        }
        $authUsers = Customer::where('email', $users->email)->first();
        if ($authUsers != null && $authUsers->id_social != $users->id) {
            return redirect()->route('get.home')->with('activeAcc', 'Tài khoản đã được tạo với nền tảng khác.');;
        }
        $authUser = ($authUsers) ? $authUsers : $this->CreateUser($users, $type);
        if (Auth::guard('customer')->attempt(['email' => $authUser->email, 'password' => $authUser->type_social])) {
            return  redirect::to('/')->with('messageLogin', 'Đã đăng nhập !');
        } else {
            return  redirect::to('/')->with('messageLogin', 'Đăng nhập thất bại !');
        }
    }
    public function CreateUser($users, $provider)
    {
            $account = Customer::create([
                'ten' => $users->name,
                'email' => $users->email,
                'password' =>  Hash::make($provider),
                'id_social' => $users->id,
                'type_social' => $provider,
                'sodienthoai' => '',
                'trangthai' => 1
            ]);
        $account->save();

        $account_name = Customer::where('id', $account->id)->first();
        return $account_name;
    }
    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('get.home');
    }

    public function getInfo()
    {

        $id =  get_user('customer', 'id') ? get_user('customer', 'id') : null;
        if ($id) {
            $user = Customer::find($id);
        }
        return view('client.account.index', ['user' => $user]);
    }


  
}
