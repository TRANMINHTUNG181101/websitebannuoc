@extends('templates.admins.layout')
@section('content')

@if(session()->has('successStatus'))
<script>
window.addEventListener('load', (e) => {
    toastr.info("{{session()->get('successStatus')}}");
})
</script>
@endif
@if(session()->has('successSendMail'))
<script>
window.addEventListener('load', (e) => {
    toastr.success("{{session()->get('successSendMail')}}");
})
</script>
@endif
<div class="container-fluid coupon form_ql">
    <form method="post" class="form-submit" action="{{ route('sendmail.all.contact')}}" enctype="multipart/form-data">
        @csrf
        <div class="card_1">
            <h3 class="card-title">Danh sách khách hàng</h3>
            <div class="action">
                <a href="{{ route('get.add.customer')}}" class="btn_add primary">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    Thêm mới
                </a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"><input type="checkbox" name="checkedbox" /></th>
                        <th>STT</th>
                        <th style="width: 20%;">Tên</th>
                        <th>Email</th>
                        <th>Điện thoại</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($customer) && count($customer))
                    @foreach($customer as $key => $value)
                    <tr>
                        <td scope=" col"><input type="checkbox" value="{{ $value->id}}" name="checks[]" /></>
                        <td scope="row">{{$key + 1}}</td>
                        <td><span class='nowrap'>{{$value->ten}}</span></td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->sodienthoai}}</td>
                        <td>

                            @if($value->trangthai === 1 )
                            <a href="{{ route('update.status.customer', $value->id)}}">
                                <div class=" badge badge-success">Hoạt động
                                </div>
                            </a>
                            @else
                            <a href="{{ route('update.status.customer', $value->id)}}">
                                <div class="badge badge-danger">Đang khoá</div>
                            </a>
                            @endif

                        </td>
                        <td>

                            <a href="{{ route('get.edit.customer', $value->id)}}" class="btn btn-info mgr-5" id="edit">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>

                            <a href="{{ route('delete.customer', $value->id)}}" class="btn btn-danger mgr-5" id="edit">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>

                    </tr>

                    @endforeach
                    @endif
                </tbody>
            </table>

        </div>
    </form>
</div>

<script>
window.onload = () => {

    const checkbox = document.querySelector('input[name="checkedbox"]');
    const allCheckBox = document.querySelectorAll('input[name="checks[]"]');
    checkbox.addEventListener('change', (e) => {
        let isCheck = e.target.checked;
        allCheckBox.forEach(item => {
            item.checked = isCheck;
        })
    })

    function getCount() {
        let count = Array.from(allCheckBox).reduce((initial, item) => {
            return item.checked ? initial + 1 : initial;
        }, 0);

        return count;
    }

    allCheckBox.forEach(item => {
        item.addEventListener('change', (e) => {
            checkbox.checked = allCheckBox.length === getCount();
        })
    })
}
</script>

@stop