@extends('templates.admins.layout')
@section('content')
<div class="container-fluid coupon form_ql">
    <div class="card_1">
        <h3 class="card-title">Liên hệ</h3>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col"><input type="checkbox" /></th>
                    <th>STT</th>
                    <th style="width: 20%;">Tên</th>
                    <th>Email</th>
                    <th>Tiêu đề</th>
                    <th>Ngày tạo</th>
                    <th>Tình trạng</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if(isset($contact) && count($contact))
                @foreach($contact as $key => $value)
                <tr>
                    <td scope=" col"><input type="checkbox" /></>
                    <td scope="row">{{$key + 1}}</td>
                    <td><span class='nowrap'>{{$value->ten}}</span></td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->tieude}}</td>
                    <td>
                        <?php
                        echo gmdate('d/m/Y', strtotime($value->created_at))
                        ?>
                    </td>
                    <td>

                        @if($value->trangthai === 1 )
                        <div class=" badge badge-success">Đang hoạt động
                        </div>
                        @else
                        <div class="badge badge-warning">Đã hết hạn</div>
                        @endif

                    </td>
                    <td>

                        <a href="{{ route('detail.contact', $value->id)}}" class="btn btn-info mgr-5" id="edit">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>

                        <a href="{{ route('delete.contact', $value->id)}}" class="btn btn-danger mgr-5" id="edit">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </td>

                </tr>

                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>


@stop