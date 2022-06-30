@extends('templates.admins.layout')
@section('content')
    <div class="title-show">
        <h3>Thông tin tài khoản</h3>
    </div>
    @if (session('change_pass'))
        <div class="notify-del-mal" id="notify-del-mal">
            <h4 style="background: green;padding: 10px;text-align:center;width: 500px;color: white;">
                thay doi mat khau thanh cong</h4>
               <?php unset($_SESSION['change_pass']);?>
        </div>
    @endif

    <div class="infologin" style="font-weight: bold">
        @foreach ($getLogin as $item)
            <div class="infolog">
                Email: {{ $item->email }}
            </div>
            <div class="infolog">
                Ten nhan vien: {{ $item->name_staff }}
            </div>
            <div class="infolog">
                So Dien Thoai: {{ $item->phone_number }}
            </div>
        @endforeach
        <a href="">Sua thong tin</a>
        <a href="{{ route('viewupdatepass') }}">Doi mat Khau</a>
        <a href="{{ route('showDashboard') }}">quay lai</a>
    </div>
@endsection
