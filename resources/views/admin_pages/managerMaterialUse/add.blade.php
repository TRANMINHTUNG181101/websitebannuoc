@extends('templates.admins.layout')
@section('content')
    <div class="title-add">
        <h3>THEM NGUYEN LIEU DUNG</h3>
    </div>
    @if (Session::has('errors_add'))
        <div class="alert alert-danger" style="font-size:24px"> {{ Session::get('errors_add') }}</div>
    @endif
    <div class="content-add">
        <form action="{{route('mmu.addhandle')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-add-material-l">
                <div class="form-group">
                    <label for="">Ten nguyen lieu su dụng</label>
                    <input type="text" name="namemmu">
                </div>
            </div>
            <div class="form-add-material-l">
                <div class="form-group">
                    <label for="">so luong</label>
                    <input type="number" name="quantymmu">
                </div>
            </div>
            <button type="submit" class="btn btn-success">Luu</button>
        </form>
    </div>
@endsection
