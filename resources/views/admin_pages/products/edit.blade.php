@extends('templates.admins.layout')
@section('content')
    <div class="title-edit-show">
        <h3>Sửa sản phẩm</h3>
    </div>
    <div class="content-edit-show">
        <form action="{{ route('products.edithandle', $spham->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-edit-mal">
                <div class="form-edit-left">
                    <input type="text" name="id_spham" id="id_spham" value="{{ $spham->id }}" hidden>
                    <div class="form-group">
                        <label for="">ten san pham</label>
                        <input type="text" name="ten_spham" id="ten_spham" value="{{ $spham->tensp }}">
                    </div>
                    <div class="form-group">
                        <label for="">gia ban</label>
                        <input type="text" name="giaban" id="giaban" value="{{ $spham->giaban }}">
                    </div>
                    <div class="form-group">
                        <label for="">mo ta</label>
                        <input type="text" name="mota" id="mota" value="{{ $spham->mota }}">
                    </div>
                    <div class="form-group">
                        <label for="">loai san pham</label>
                        <select name="select_cat">
                            @foreach ($catetype as $dvnl)
                                @if ($dvnl->id == $spham->id_loaisanpham)
                                    <option name="" id="" selected="selected"
                                        value="{{ $dvnl->id }}">
                                        {{ $dvnl->tenloai }}</option>

                                @else{
                                    <option name="" id="" value="{{ $dvnl->id }}">
                                        {{ $dvnl->tenloai }}</option>
                                    }
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-edit-right">
                        <div class="form-group">
                            <input type="text" hidden value="{{ $spham->hinhanh }}" name="imageOld" >
                        </div>
                        <div class="show-img-mal">
                            <img src="{{ asset('uploads/product/' . $spham->hinhanh) }}"
                                alt="{{ $spham->ten_spham }}" id="preview_images" name="preview_images"
                                style="width: 600px;height:300px">
                        </div>
                        <div class="form-group">
                            <input type="file" name="ProductImage" id="ProductImage" onchange="preview_image(this)"
                                class="form-control">
                        </div>

                    </div>
                    <button type="submit" class="btn btn-success" style="margin-left: 200px">Luu</button>
                </div>

        </form>

    </div>
@endsection
