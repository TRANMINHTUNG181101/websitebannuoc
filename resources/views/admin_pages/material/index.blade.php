@extends('templates.admins.layout')
@section('content')
    <div class="title-show">
        <h3>Nguyên liệu</h3>
    </div>
    <div class="add-material">
        <a href="{{ route('material.addview') }}">Them Nguyen Lieu</a>
        <div class="form-search-mal">
            <form action="{{ route('material.search') }}" method="post">
                @csrf
                <input type="text" placeholder="Search.." name="search" id="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <a href="{{ route('auth.logout') }}">logout</a>
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
                @foreach ($nglieu as $nl)
                    <tr>
                        <td>{{ $nl->id }}</td>
                        <td>{{ $nl->ten_nglieu }}</td>
                        <td>{{ $nl->gia_nhap }}</td>
                        <td><img style="widtd:100px;height:150px" src="{{ asset('uploads/materials/' . $nl->hinh_anh) }}">
                        </td>
                        <td>{{ $nl->so_luong }}</td>
                        <td>{{ $nl->don_vi_nglieu }}</td>
                        <td>
                            <?php
                            $dateInFM = date('d/m/Y', $nl->ngay_nhap);
                            echo $dateInFM;
                            ?>
                        </td>
                        <td><?php
                        $dateInFM = date('d/m/Y', $nl->ngay_het_han);
                        echo $dateInFM;
                        ?></td>
                        <td>{{ $nl->trang_thai }}</td>

                        <td>
                            <a href="{{ route('material.delete', $nl->id) }}"><i class="material-icons"
                                    style="font-size:24px;color:red">delete</i></a>
                            <a href="{{ route('material.editview', $nl->slug) }}"><i class="fa fa-edit"
                                    style="font-size:24px;color:green"></i></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>

    </div>
    {{-- <span>{{ $nglieu->links() }}</span>
    <style>
        .w-5{
            display: none;
        }
    </style> --}}
@endsection
