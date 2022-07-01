@extends('templates.admins.layout')
@section('content')
    <div class="title-add">
        <h3>them nguyen lieu</h3>
    </div>
    @if (Session::has('failadd'))
        <div class="alert alert-danger" style="font-size:24px"> {{ Session::get('failadd') }}</div>
    @endif
    <div class="content-add">
        <form action="{{ route('material.addhandle') }}" method="post" id="form-add-material" enctype="multipart/form-data">
            @csrf
            <div class="form-input" style="display: flex;justify-content: space-between">
                <div class="form-add-material-l" style="width: 100%">
                    <div class="form-group">
                        <label for="">ten nguyen lieu</label>
                        <input type="text" name="MaterialName" id="MaterialName" class="form-control" value="{{session('oldname')}}">
                        @if ($errors->first('MaterialName'))
                            <div class="btn-danger">
                                {{ $errors->first('MaterialName') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">giá nhập</label>
                        <input type="number" name="ImportPrice" id="ImportPrice" class="form-control" value="{{session('oldprice')}}"
                            onkeyup="formatMoney()">

                        @if ($errors->first('ImportPrice'))
                            <div class="btn-danger">
                                {{ $errors->first('ImportPrice') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">so luong</label>
                        <input type="text" name="MaterialQuantily" id="MaterialQuantily" class="form-control" value="{{session('oldquantity')}}">
                        @if ($errors->first('MaterialQuantily'))
                            <div class="btn-danger">
                                {{ $errors->first('MaterialQuantily') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Hinh anh</label>
                        <input type="file" name="MaterialImage" id="MaterialImage" class="form-control"
                            onchange="preview_image_add()">
                        @if ($errors->first('MaterialImage'))
                            <div class="btn-danger">
                                {{ $errors->first('MaterialImage') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Don vi nguyen lieu</label>
                        {{-- <input type="text" name="MaterialUnit" id="MaterialUnit" class="form-control"> --}}
                        <select name="select_unit">
                            @foreach ($dv_nglieu as $dvnl)
                                <option name="" id="" value="{{ $dvnl->ten_don_vi }}">
                                    {{ $dvnl->ten_don_vi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">han su dung</label>
                        <input type="date" name="ExpiredDate" id="ExpiredDate" class="form-control" value="{{session('olddate')}}">
                    </div>
                </div>

                <div class="show-img-mal">
                    <img src="{{ asset('uploads/materials/noimage.jpg') }}" name="hinh_anh_add" id="hinh_anh_add"
                        style="width: 600px;height:300px">

                </div>
            </div>
            <button type="submit" class="btn btn-success" onclick="checkInputMaterial()" id="btn-add-material">Luu</button>
        </form>
    </div>
@endsection
