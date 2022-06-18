<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestContact;
use App\Models\Contact;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('templates.clients.about.index');
    }

    public function contact(RequestContact $request)
    {
        $data = $request->except('_token');
        $data['trangthai'] = 0;
        $contact = Contact::create($data);
        if ($contact) {
            return redirect()->back()->with('successContact', 'Đã gửi liên thệ thành công.');
        }
        return redirect()->back()->with('successContact', 'Đã gửi liên thệ thành công.');
    }
}