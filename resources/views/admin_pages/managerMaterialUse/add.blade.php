@extends('templates.admins.layout')
@section('content')
    <div class="title-add">
        <h3>them nguyen lieu dung</h3>
    </div>
    <div class="content-add">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-add-material-l">
                <div class="form-group">
                    <label for="">Ten nguyen lieu su dụng</label>
                    <input type="text">
                </div>
            </div>
            <div class="form-add-material-l">
                <div class="form-group">
                    <label for="">so luong</label>
                    <input type="number">
                </div>
            </div>
            <button type="submit" class="btn btn-success">Luu</button>
        </form>
    </div>
@endsection
