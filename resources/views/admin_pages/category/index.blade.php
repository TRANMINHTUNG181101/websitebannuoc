@extends('templates.admins.layout')
@section('content')
    <div class="title-show">
        <h3>Category</h3>
    </div>
    <div class="them-nguyen-lieu-dung">
        <button class="btn btn-success"> <a href="{{ route('categories.addview') }}" style="color:white" id="addModalMMU">Them danh
                muc
            </a> </button>
    </div>
    <div class="content-show">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên Loại</th>
                    <th>Mô tả</th>
                    <th>Hình ảnh</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody id="show-manager-material-use "style="font-size:16px;font-weight:bold">
                <?php $i = 1; ?>
                @foreach ($getCat as $m)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $m->tenloai }}
                        </td>
                        <td>{{ $m->mota }}</td>
                        <td> <img style="widtd:80px;height:120px"
                                src="{{ asset('uploads/categories/' . $m->hinhanh) }}"></td>
                                <td>{{$m->trangthai}}</td>
                        <td>
                            <a href="{{ route('categories.del', $m->id) }}">Xoa</a>
                            <a href="{{ route('categories.editview', $m->slug) }}">sua</a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
