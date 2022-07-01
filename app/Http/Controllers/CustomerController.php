<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestAddCustomer;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = Customer::all();
        return view('admin_pages.customer.index', ['customer' => $customer]);
    }

    public function delete($id)
    {
        $customer = Customer::find($id);
        if ($customer) {
            $customer->delete();
        }
        return redirect()->back();
    }
    public function updateStatus($id)
    {
        $customer = Customer::find($id);
        if ($customer) {
            $customer->trangthai = $customer->trangthai === 1 ? 2 : 1;
            $customer->save();
            return redirect()->back()->with('successStatus', 'Cập nhật thành công.');
        }
        return redirect()->back()->with('successStatus', 'Cập nhật không thành công.');
    }

    public function add()
    {
        return view('admin_pages.customer.add');
    }
    public function saveCustomer(RequestAddCustomer $request)
    {
        $data['ten'] = $request->ten;
        $data['email'] = $request->email;
        $data['sodienthoai'] = $request->sodienthoai;
        $data['diachi'] = $request->diachi;
        $data['password'] = Hash::make($request->password);
        Customer::create($data);
        return redirect()->route('show.customer');
    }
    public function getEditCustomer($id)
    {
        $customer = Customer::find($id);
        return view('admin_pages.customer.edit', ['customer' => $customer]);
    }
    public function saveEditCustomer($id, RequestAddCustomer $request)
    {
        $data = Customer::find($request->id);
        if ($data) {
            $data['ten'] = $request->ten;
            $data['sodienthoai'] = $request->sodienthoai;
            $data['diachi'] = $request->diachi;
            $data['password'] = Hash::make($request->password);
            $data->save();
        }
        return redirect()->route('show.customer');
    }
}