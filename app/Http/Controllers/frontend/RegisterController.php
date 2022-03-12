<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgetRequest;
use App\Http\Requests\GetPassword;
use App\Http\Requests\RegisterRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('templates.clients.account.register');
    }

    public function register(RegisterRequest $request) {
        if($request->email) {
            $data['email'] = $request->email;
            $data['password'] = Hash::make($request->password);
            $data['diachi'] = $request->address;
            $data['ten'] = $request->ten;
            $data['token'] = $request->_token;
            if($customer = Customer::create($data)) {
                Mail::send('templates.clients.account.verifyEmail', compact('customer'), function($email) use($customer){
                    $email->subject('Drinks - Web');
                    $email->to($customer->email, ($customer->hoten) ? $customer->hoten : "");
                });
                return redirect()->back()->with('activeAcc', 'Mã xác thực đã được gửi đến email của bạn, Vui lòng kiểm tra email xác thực tài khoản để có thể đăng nhập.');
            }
        }

    }

    public function get() {
        $email = 'phanminhtri11800@gmail.com';
        $password = 'facebook';
        if (Auth::guard('customer')->attempt(['email' => $email, 'password' => $password, 'trangthai' => 1])) {
            dd(get_user('customer'));
        } else {
            dd('hi');
        }
    }

    public function active(Customer $customer, $token) {

        if($customer->token == $token) {
            $customer->update(['trangthai' => 1, 'token' => null]);
            return redirect()->back()->with('activeAcc', 'Tài khoản đã được kích hoạt thành công, bạn có thể đăng nhập');
        }else {
            return redirect()->back()->with('activeAcc', 'Tài khoản kích hoạt thất bại');
        }
    }

      //lấy lại mật khẩu
      public function postforgetPasss(ForgetRequest $request) {
        $token = $request->_token;
        $customer = Customer::where('email', $request->email)->first();
        $customer->update(['token' => $token]);
        Mail::send('templates.clients.account.forgetPassword', compact('customer'), function ($email) use ($customer) {
            $email->subject('Drinks - Lấy Lại Mật Khẩu');
            $email->to($customer->email, ($customer->hoten) ? $customer->hoten : 'Khách hàng');
        });
        return redirect()->back()->with('activeAcc', 'Vui lòng kiểm tra Email của bạn để lấy lại mật khẩu.');

    }
    public function getPass(Customer $customer, $token)
    {
        if ($customer->token == $token) {

            return view('templates.clients.account.getPassword', ['customer' => $customer]);
        } else {
            return redirect()->back()->with('activeAcc', 'Đặt lại mật khẩu không thành công.');
        }
    }

    public function postPass(Customer $customer, GetPassword $request)
    {

        $pass = bcrypt($request->password);
        $customer->update(['password' => $pass, 'token' => null]);
        return redirect()->back()->with('activeAcc', 'Đặt lại mật khẩu thành công, Bạn có thể đăng nhập');
    }
}
