@extends('templates.admins.layout')
@section('content')
    <div class="title-show">
        <h3>Quản lý nguyên liệu sử dụng</h3>
    </div>
    <div class="them-nguyen-lieu-dung">
        <button class="btn btn-success">Them nguyen lieu su dung</button>
    </div>
    <br>
    <div class="sap-xep-nguyen-lieu-sd">
        <input type="date" name="dateSort" id="dateSort">
        <button onclick="sortByDay()">Lọc</button>

    </div>
    <br>
    <div class="content-show">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Nguyên Liệu</th>
                    <th>Số Lượng</th>
                    <th>Đơn Giá</th>
                    <th>Ngày Tổng Kết</th>
                    <th>Trang Thai</th>
                    <th>thanh tien</th>
                    <th>Thao Tac</th>
                </tr>
            </thead>
            <tbody id="show-manager-material-use">
                @foreach ($managerM as $m)
                    <tr>
                        <td>{{ $m->id }}</td>
                        <td>
                            @foreach ($nameM as $n)
                                @if ($n->id == $m->id_nguyen_lieu)
                                    {{ $n->ten_nglieu }}
                                @endif
                            @endforeach
                        </td>
                        <td>{{ $m->so_luong }}</td>
                        <td>{{ $m->don_gia }}</td>
                        <td>{{ $m->ngay_tong_ket }}</td>
                        <td>{{ $m->trang_thai }}</td>
                        <td>{{ $m->so_luong * $m->don_gia }}</td>
                        <td>
                            <a href="{{ route('managermaterial.del', $m->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                              </svg></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
