@extends('templates.admins.layout')
@section('content')
    <div class="title-show">
        <h3>Thông tin tài khoản</h3>
    </div>
    @if (session('change_pass'))
        <div class="notify-del-mal" id="notify-del-mal">
            <h4 style="background: green;padding: 10px;text-align:center;width: 500px;color: white;">
               Thay đổi mật khẩu thành công</h4>
               
        </div>
    @endif
    {{ Session::forget('change_pass') }}
    <div class="infologin" style="font-weight: bold">
        {{-- @foreach ($getLogin as $item) --}}
            <div class="infolog">
                Email: {{ $getLogin->email }}
            </div>
            <div class="infolog">
               Tên nhân viên: {{ $getLogin->name_staff }}
            </div>
            <div class="infolog">
                Số điện thoại: {{ $getLogin->phone_number }}
            </div>
        {{-- @endforeach --}}
        <a href="">Sửa thông tin</a>
        <a href="{{ route('viewupdatepass') }}">Đổi mật khẩu</a>
        <a href="{{ route('showDashboard') }}">Quay lạ<i></i></a>
    </div>
@endsection
