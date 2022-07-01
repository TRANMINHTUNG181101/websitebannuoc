@extends('templates.admins.layout')
@section('content')
<div class="title-show">
    <h3>San pham</h3>
</div>
<div class="add-material">
    <a href="{{ route('products.addview') }}" class="btn btn-success">Them San Pham</a>
    <div class="form-search-mal">
        <form action="{{ route('material.search') }}" method="post">
            @csrf
            <input type="text" placeholder="Search.." name="search" id="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>
<a href="{{ route('auth.logout') }}">logout</a>
@if (session('success_del_mal'))
    <div class="notify-del-mal" id="notify-del-mal">
        <h4 style="background: green;padding: 10px;text-align:center;width: 500px;color: white;">
            xoa thanh cong</h4>
        <?php Session::flush(); ?>
    </div>
@endif

<div class="content-show">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>stt</th>
                <th>ten san pham</th>
                <th>gia ban</th>
                <th>Hinh anh</th>
                <th>size</th>
                <th>trang thai</th>
                <th>mo ta san pham</th>
                <th>thao tac</th> 
            </tr>
        </thead>
        <tbody>
            <?php $i=1;?>
            @foreach ($spham as $sp)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $sp->tensp }}</td>
                    <td>{{ currency_format($sp->giaban) }}</td>
                    <td><img style="widtd:100px;height:150px" src="{{ asset('uploads/product/' . $sp->hinhanh) }}">
                    </td>
                    <td>
                        @foreach($sp->size as $value)
                        {{$value->size_name}}
                        @endforeach
                    </td>
                    <td>{{ $sp->trangthai }}</td>
                    <td>{{$sp->mota}}</td>
                    <td>
                        <a href="{{ route('products.del', $sp->id) }}"><i class="material-icons"
                                style="font-size:24px;color:red">delete</i></a>
                        <a href="{{route('products.editview', $sp->slug) }}"><i class="fa fa-edit"
                                style="font-size:24px;color:green"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection