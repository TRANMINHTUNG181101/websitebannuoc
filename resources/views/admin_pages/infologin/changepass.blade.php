@extends('templates.admins.layout')
@section('content')
    <div class="title-show">
        <h3>Doi Mat Khau</h3>
    </div>
    <div class="infologin" style="font-weight: bold">
        <form action="{{ route('changepass') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="">nhap mat khau cu </label>
                <input type="password" name="oldpass" id="oldpass">
            </div>
            <div class="form-group">
                <label for="">nhap mat khau moi </label>
                <input type="password" name="newpass" id="newpass">
            </div>
            <button type="submit">Luu</button>
        </form>

    </div>
@endsection
