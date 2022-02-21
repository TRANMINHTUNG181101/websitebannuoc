@extends('templates.admins.layout')
@section('content')
    <div class="title-add">
        <h3>them san pham</h3>
    </div>
    <div class="content-add">
        <form action="{{ route('products.addhandle') }}" method="post" id="form-add-material"
            enctype="multipart/form-data">
            @csrf
            <div class="form-add-material-l">
                <div class="form-group">
                    <label for="">Ten san pham</label>
                    <input type="text" name="ProductName" id="ProductName" class="form-control">
                    @if ($errors->first('ProductName'))
                        <div class="btn-danger">
                            {{ $errors->first('ProductName') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="">Gia ban</label>
                    <input type="text" name="SellPrice" id="SellPrice" class="form-control">
                    @if ($errors->first('SellPrice'))
                        <div class="btn-danger">
                            {{ $errors->first('SellPrice') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for=""><strong>kich thuoc</strong></label><br>
                    @foreach ($size as $s)
                        <label for=""><input type="checkbox" name="sizePro[]" id="sizeChoose"
                                value="{{ $s->id }}">{{ $s->size_name }}</label>
                    @endforeach

                    @if ($errors->first('sizeChoose'))
                        <div class="btn-danger">
                            {{ $errors->first('sizeChoose') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="">mo ta san pham</label><br>
                    <textarea name="Description" id="Description" style="width:100%" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Hinh anh</label>
                    <input type="file" name="ProductImage" id="ProductImage" class="form-control">
                    @if ($errors->first('ProductImage'))
                        <div class="btn-danger">
                            {{ $errors->first('ProductImage') }}
                        </div>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-success" id="btn-add-material">Luu</button>
        </form>
    </div>
@endsection
