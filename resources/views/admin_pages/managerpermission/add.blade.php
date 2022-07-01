@extends('templates.admins.layout')
@section('content')
    <div class="title-show">
        <h3>Thêm tài khoản</h3>
    </div>
    <div class="add-staff" style="font-weight: bold">
        <form action="{{ route('roles.addstaff') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="">Ten</label>
                <input type="text" name="ten" id="ten">
            </div>
            <div class="form-group">
                <label for="">Mat khau</label>
                <input type="text" name="matkhau" id="matkhau">
            </div>
            <div class="form-group">
                <label for="">So Dien Thoai</label>
                <input type="text" name="dienthoai" id="dienthoai">
            </div>
            <div class="form-group">
                <label>Quyen</label><br>
                <input type="checkbox" id="access" name="roles[]" value="1">
                <label for=""> Truy cap</label><br>
                <input type="checkbox" id="add" name="roles[]" value="2">
                <label for=""> Them</label><br>
                <input type="checkbox" id="del" name="roles[]" value="3">
                <label for=""> Xoa</label><br>
                <input type="checkbox" id="edit" name="roles[]" value="4">
                <label for=""> Sua</label><br><br>
            </div>
            <div class="form-group">
                <label for="">Chon trang</label><br>
                <input type="checkbox" id="pagedash" name="choosepage[]" value="1">
                <label for=""> Dashboard</label><br>
                <input type="checkbox" id="pagemal" name="choosepage[]" value="2">
                <label for=""> Nguyen lieu</label><br>
                <input type="checkbox" id="pagepro" name="choosepage[]" value="3">
                <label for=""> San pham</label><br>
                <input type="checkbox" id="pageorder" name="choosepage[]" value="4">
                <label for=""> Don Hang</label><br>
                <input type="checkbox" id="pagemmu" name="choosepage[]" value="5">
                <label for=""> Quan ly nguyen lieu dung</label><br>
                <input type="checkbox" id="pagerole" name="choosepage[]" value="6">
                <label for=""> Phan quyen</label><br><br>
            </div>

            <div class="type-account">
                <select name="typeaccount" id="">
                    <option value="2" selected>nhan vien ban hang</option>
                    <option value="3">nha vien thu ngan</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Luu</button>
        </form>
    </div>
@endsection
