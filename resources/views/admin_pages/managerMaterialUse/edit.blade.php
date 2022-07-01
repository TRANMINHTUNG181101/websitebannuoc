@extends('templates.admins.layout')
@section('content')
    <div class="title-add">
        <h3>SUA NGUYEN LIEU DUNG</h3>
    </div>
    {{-- @if (Session::has('errors_add'))
        <div class="alert alert-danger" style="font-size:24px"> {{ Session::get('errors_add') }}</div>
    @endif --}}
    <div class="content-add">
        <form action="{{route('mmu.edithandle',$getmmu->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="id" value="{{$getmmu->id}}" hidden>
            <div class="form-add-material-l">
                <div class="form-group">
                    <label for="">Ten nguyen lieu su dụng</label>
                    <input type="text" name="namemmu" value="{{$namemal}}">
                </div>
            </div>
            <div class="form-add-material-l">
                <div class="form-group">
                    <label for="">so luong</label>
                    <input type="number" name="quantymmu" value="{{$getmmu->so_luong}}">
                </div>
            </div>
            <button type="submit" class="btn btn-success">Luu</button>
        </form>
    </div>
@endsection
