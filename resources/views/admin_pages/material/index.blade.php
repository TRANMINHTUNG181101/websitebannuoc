@extends('templates.admins.layout')
@section('content')
    <div class="show-message-page">
        @if (session('success_add_mal'))
            <div class="show-alert-succes">
                <script type="text/javascript">
                    Swal.fire({
                        title: 'Thêm thành công!',
                        icon: 'success',
                        timer: 2000
                    });
                </script>
            </div>
        @endif
        @if (Session::has('success_del_mal'))
            <div class="alert alert-success" style="font-size:24px">
                <div id="alert-success">{{ Session::get('success_del_mal') }}</div>
            </div>
        @endif
        {{-- @if (session('success_del_mal'))
            <div class="show-alert-del-succes">
                <script type="text/javascript">
                    Swal.fire({
                        title: 'Xoá thành công!',
                        // text: 'Xoá thành công',
                        icon: 'success',
                        timer: 2000
                    });
                </script>
            </div>
        @endif --}}


        <?php
        session_start();
        unset($_SESSION['success_add_mal']);
        unset($_SESSION['success_del_mal']);
        session_destroy();
        ?>





    </div>

    <div class="title-show">
        <h3>Nguyên liệu</h3>
    </div>
    <div class="add-material">
        <a href="{{ route('material.addview') }}" class="btn btn-primary">Them
            Nguyen
            Lieu</a>
        <div class="form-search-mal">
            <form action="{{ route('material.search') }}" method="post">
                @csrf
                <input type="text" placeholder="Search.." name="search" id="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <div class="content-show">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>TEN NGUYEN LIEU</th>
                    <th>GIA NHAP</th>
                    <th>Hinh anh</th>
                    <th>SO LUONG</th>
                    <th>DON VI</th>
                    <th>NGAY NHAP</th>
                    <th>HAN SU DUNG</th>
                    <th>TRANG THAI</th>
                    <th>THAO TAC</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($nglieu as $item)
                    <tr style="font-weight: bold">
                        <td><?php echo $i;
                        $i++; ?></td>
                        <td>{{ $item->ten_nglieu }}</td>
                        <td>{{ $item->gia_nhap }}</td>
                        <td> <img style="widtd:100px;height:150px"
                                src="{{ asset('uploads/materials/' . $item->hinh_anh) }}"></td>

                        <td>{{ $item->so_luong }}</td>
                        <td>{{ $item->don_vi_nglieu }}</td>
                        <td>{{ $item->ngay_nhap }}</td>
                        <td>{{ $item->ngay_het_han }}</td>
                        <td>{{ $item->trang_thai }}</td>
                        <td>
                            <a href="{{ route('material.delete', $item->id) }}">xoa</a>
                            <a href="{{ route('material.editview', $item->slug) }}">sua</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <span>{{ $nglieu->links() }}</span>
    <style>
        .w-5 {
            display: none;
        }
    </style>

    <!-- Modal Add new materials-->
    <div class="modal fade" id="addMaterialModal" tabindex="-1" aria-labelledby="addMaterialModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-primary delete_student">Đồng ý</a> </button>
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
                                <input type="text" class="form-control" id="soluong">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="">Giá nhap</label>
                            <div class="">
                                <input type="text" class="form-control" id="gia_nhap">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="">Ngay het han</label>
                            <div class="">
                                <input type="date" class="form-control" id="ngay_het_han">
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
