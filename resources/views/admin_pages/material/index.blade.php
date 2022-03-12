@extends('templates.admins.layout')
@section('content')
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Notify</strong>
        </div>
        <div class="toast-body" id="conten-msg">
            qweqeqweqweqwe
        </div>
    </div>

    <div class="title-show">
        <h3>Nguyên liệu</h3>
    </div>
    <div class="add-material">
        <a href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=""
            id="btn-show-addmal">Them Nguyen
            Lieu</a>
        <div class="form-search-mal">
            <form action="{{ route('material.search') }}" method="post">
                @csrf
                <input type="text" placeholder="Search.." name="search" id="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    {{-- <a href="{{ route('auth.logout') }}">logout</a> --}}
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
                    <th>id</th>
                    <th>ten nguyen lieu</th>
                    <th>gia nhap</th>
                    <th>Hinh anh</th>
                    <th>so luong</th>
                    <th>Don vi</th>
                    <th>ngay nhap</th>
                    <th>han su dung</th>
                    <th>trang thai</th>
                    <th>thao tac</th>
                </tr>
            </thead>
            <tbody>
           @foreach ($nglieu as $item)
           <td>{{$item->id}}</td>
           <td>{{$item->ten_nglieu}}</td>
           <td>{{$item->gia_nhap}}</td>
           <td>{{$item->hinh_anh}}</td>
           <td>{{$item->so_luong}}</td>
           <td>{{$item->don_vi}}</td>
           <td>{{$item->ngay_nhap}}</td>
           <td>{{$item->ngay_het_han}}</td>
           <td>{{$item->trang_thai}}</td>
           <td>del</td>
           @endforeach
            </tbody>
        </table>
    </div>
    <span>{{ $nglieu->links() }}</span>
    <style>
        .w-5{
            display: none;
        }
    </style>

    <!-- Modal Add new materials-->
    <div class="modal fade" id="addMaterialModal" tabindex="-1" aria-labelledby="addMaterialModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titleAddMaterial">Thêm nguyên liệu mới</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" action="#" id="form-addmalt">
                        <div class="form-group">
                            <label for="tennguyenlieu1" class="">Ten nguyen lieu</label>
                            <div class="">
                                <input type="text" class="form-control" id="inputNameMal"
                                    placeholder="Nhap ten nguyen lieu">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tennguyenlieu1" class="">Don vi nguyen lieu</label>
                            <div class="">
                                <select name="" id="selectUnit"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="">So luong</label>
                            <div class="">
                                <input type="text" class="form-control" id="soluong" placeholder="So luong">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="">Giá nhap</label>
                            <div class="">
                                <input type="text" class="form-control" id="gia_nhap" placeholder="So luong">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="">Ngay het han</label>
                            <div class="">
                                <input type="date" class="form-control" id="ngay_het_han" placeholder="Ngay het han">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn-add-mal">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    {{-- Delete Modal --}}
    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xoá Nguyên liệu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Bạn có thực sự muốn xoá</h4>
                    <input type="hidden" id="deleteing_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary delete_student">Đồng ý</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End - Delete Modal --}}


{{-- Edit material --}}
<div class="modal fade" id="editMaterialModal" tabindex="-1" aria-labelledby="editMaterialModalLabel"
aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="titleAddMaterial">Sửa nguyên liệu mới</h5>
        </div>
        <div class="modal-body">
            <form method="POST" action="#" id="form-addmalt">
                <div class="form-group">
                    <label for="tennguyenlieu1" class="">Ten nguyen lieu</label>
                    <div class="">
                        <input type="text" class="form-control" id="inputNameMal">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="">Don vi nguyen lieu</label>
                    <div class="">
                        <select name="" id="selectUnit"></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="">So luong</label>
                    <div class="">
                        <input type="text" class="form-control" id="soluong" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="">Giá nhap</label>
                    <div class="">
                        <input type="text" class="form-control" id="gia_nhap" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="">Ngay het han</label>
                    <div class="">
                        <input type="date" class="form-control" id="ngay_het_han" >
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="btn-add-mal">Save changes</button>
        </div>
    </div>
</div>
</div>

{{-- End Material --}}
    
@endsection
