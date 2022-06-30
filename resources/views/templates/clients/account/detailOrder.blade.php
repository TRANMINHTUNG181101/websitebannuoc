
<table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
    <h4 class="h4 mb-2 text-gray-800 mg-tb">Thông tin sản phẩm #{{$order->madh}}</h4>
    <thead>
        <tr>
            <th>Mã ĐH</th>
            <th>Sản phẩm</th>
            <th>Size</th>
            <th>Số lượng</th>
            <th class="t-right">Giá bán</th>
        </tr>
    </thead>
    <tbody>
        @if($orderDetail && count($orderDetail))
        @foreach($orderDetail as $value)
        <tr>
            <td>
                {{ $value->order->madh}}
            </td>
            <td>{{ $value->product->tensp ?? "[]" }}</td>
            <td>{{ $value->size->size_name }}</td>
            <td>
                {{ $value->soluong }}
            </td>
            <td class="t-right">
                {{currency_format($value->giaban)}}
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
