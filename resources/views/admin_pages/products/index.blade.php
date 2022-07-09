@extends('templates.admins.layout')
@section('content')
<div class="title-show">
    <h3>SẢN PHẨM</h3>
</div>


<div class="add-material">
    <a href="{{ route('products.addview') }}" class="btn btn-success">THÊM SẢN PHẨM</a>
    <div class="form-search-mal">
        {{-- <form action="{{ route('material.search') }}" method="post">
            @csrf
            <input type="text" placeholder="Search.." name="search" id="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form> --}}
    </div>
</div>
@if (session('success_del_mal'))
    <div class="notify-del-mal" id="notify-del-mal">
        <h4 style="background: green;padding: 10px;text-align:center;width: 500px;color: white;">
            xoa thanh cong</h4>
        <?php Session::flush(); ?>
    </div>
@endif

<div class="content-show" style="font-weight: bold">
    <table class="table table-bordered">
        <thead >
            <tr >
                <th style="background-color: #dee2e6">STT</th>
                <th>TÊN SẢN PHẨM</th>
                <th>GIÁ BÁN</th>
                <th>HÌNH ẢNH</th>
                <th>KÍCH CỠ</th>
                <th>TRẠNG THÁI</th>
                <th>SẢN PHẨM</th>
                <th>THAO TÁC</th> 
            </tr>
        </thead>
        <tbody style="position: sticky">
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
</div>    <span>{{ $spham->links() }}</span>
<style>
    .w-5 {
        display: none;
    }
</style>

@endsection