@extends('templates.admins.layout')
@section('content')
<div class="content-order">
    <div class="container-fluid p-0">
        <h1 class="h6 mb-3">Chi tiết tin liên hệ</h1>
        <form action="{{ route('post.static')}}" method="post" class="form-submit submit-create-order form_ql">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0"><i class="fa fa-info"></i>Thông tin chung</h5>
                        </div>
                        <div class="card-body row">
                            <div class="col-6">
                                <div class="form_group">
                                    <label>Tên người gửi</label>
                                    <input name="ten" value="{{$contact->ten}}" autocomplete='off'
                                        class="form_control" />
                                </div>
                                @if($errors->first('ten'))
                                <span class="error text-danger">{{ $errors->first('ten') }}</span>
                                @endif
                            </div>
                            <div class="col-6">
                                <div class="form_group">
                                    <label>Email</label>
                                    <input readonly name="email" type="email" value="{{$contact->email}}"
                                        autocomplete='off' class="form_control" />
                                </div>
                                @if($errors->first('email'))
                                <span class="error text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="col-12">
                                <div class="form_group">
                                    <label>Tiêu đề</label>
                                    <input name="tieude" value="{{$contact->tieude}}" autocomplete='off'
                                        class="form_control" />
                                </div>
                                @if($errors->first('tieude'))
                                <span class="error text-danger">{{ $errors->first('tieude') }}</span>
                                @endif
                            </div>
                            <div class="col-12">
                                <div class="form_group">
                                    <label>Nội dung</label>
                                    <textarea name="noidung" class="form_control" rows="4">
                                    {{$contact->noidung}}
                                    </textarea>
                                </div>
                                @if($errors->first('noidung'))
                                <span class="error text-danger">{{ $errors->first('noidung') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-4">

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0"><i class="fa fa-info"></i> Gửi email trả lờI</h5>
                        </div>
                        <div class="card-body row">
                            <div class="col-12">
                                <div class="form_group">
                                    <label>Tiêu dề</label>
                                    <input name="tieudeemail" value="{{$contact->ten}}" autocomplete='off'
                                        class="form_control" />
                                </div>
                                @if($errors->first('tieudeemail'))
                                <span class="error text-danger">{{ $errors->first('tieudeemail') }}</span>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        Lưu thông tin
                    </button>
                </div>
            </div>
        </form>

    </div>

</div>
</div>


@stop