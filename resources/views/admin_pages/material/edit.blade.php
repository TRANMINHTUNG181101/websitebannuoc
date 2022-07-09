@extends('templates.admins.layout')
@section('content')
    <div class="title-edit-show">
        <h3>SỬA NGUYÊN LIỆU</h3>
    </div>
    {{Breadcrumbs::render('Sửa nguyên liệu',$nglieu->slug)}}
    <div class="content-edit-show">
        <form action="{{route('material.edithandle',$nglieu->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-edit-mal">
                <div class="form-edit-left">
                    <input type="text" name="id_nglieu" id="id_nglieu" value="{{ $nglieu->id }}" hidden>
                    <div class="form-group">
                        <label for="">Tên nguyên liệu</label>
                        <input type="text" name="ten_nglieu" id="ten_nglieu" value="{{ $nglieu->ten_nglieu }}">
                    </div>
                    <div class="form-group">
                        <label for="">Giá nhập</label>
                        <input type="text" name="gia_nhap" id="gia_nhap" value="{{ $nglieu->gia_nhap }}">
                    </div>
                    <div class="form-group">
                        <label for="">Số lượng</label>
                        <input type="text" name="so_luong" id="so_luong" value="{{ $nglieu->so_luong }}">
                    </div>
                    <div class="form-group">
                        <label for="">Đơn vị</label>
                        <select name="select_unit">
                            @foreach ($dv_nglieu as $dvnl)
                                @if ($dvnl->ten_don_vi == $nglieu->don_vi_nglieu)
                                    <option name="" id="" selected="selected" value="{{ $dvnl->ten_don_vi }}">
                                        {{ $dvnl->ten_don_vi }}</option>

                                @else{
                                    <option name="" id="" value="{{ $dvnl->ten_don_vi }}">
                                        {{ $dvnl->ten_don_vi }}</option>
                                    }
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Ngày hết hạn</label>
                        <input type="date" name="dateEXP" id="dateEXP" value="{{$fm_date_expi}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Ngày nhập</label>
                        <input type="date" name="dateIn" id="dateIn" value="{{$fm_date_in}}" class="form-control">
                    </div>
                </div>
                <div class="form-edit-right">
                    <div class="form-group">
                        <input type="text" hidden value="{{$nglieu->hinh_anh}}" name="imageOld" id="imageOld">
                    </div>
                    <div class="show-img-mal">
                        <img src="{{ asset('uploads/materials/' . $nglieu->hinh_anh) }}" alt="{{ $nglieu->ten_nglieu }}"
                            id="preview_images" name="preview_images" style="width: 600px;height:300px">
                    </div>
                    <div class="form-group">
                        <input type="file" name="MaterialImage" id="MaterialImage" onchange="preview_image(this)" class="form-control">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success" style="margin-left: 200px">Lưu thay đổi</button>
        </form>

    </div>
@endsection
