<div class="order">
    <div class="orderInfo">
        <ul>
            <li><span>Mã đơn hàng :</span> {{$order->madh}}</li>
            <li><span>Ngày mua :</span> {{ format_date($order->ngaytao)}}</li>
            <li><span>Tổng :</span> {{currency_format($order->tongtien)}}</li>
            <li><span>Trạng thái :</span>
                <div class="badge badge-{{ $order->getStatus($order->trangthai)['class']}} ">
                    {{ $order->getStatus($order->trangthai)['name']}}
                </div>
            </li>
            <li><span> <i class="fa fa-money" aria-hidden="true"></i> Thông tin thanh toán :</span>
                @if($order->trangthaithanhtoan == 2 )
                <div class="badge badge-warning">Chờ thanh toán</div>
                @else
                <div class="badge badge-success">Đã thanh toán</div>
                @endif

            </li>

        </ul>
    </div>
    <div class="orderCus">
        <ul>
            <li><span>Tên khách hàng :</span> {{$order->hoten}}</li>
            <li><span>Email :</span> {{$order->email}}</li>
            <li><span>SĐT :</span> {{$order->dienthoai}}</li>
            <li><span>Địa chỉ :</span> {{$order->diachi}}</li>
            <li><span>Ghi chú :</span> {{$order->ghichu}}
            </li>

        </ul>
    </div>
</div>
<table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
    <h4 class="h4 mb-2 text-gray-800 mg-tb">Thông tin sản phẩm</h4>
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
<div class="d-flex space-r">
    <div class="sum">
        <div class="info-sum">
            <b> Tổng tiền sản phẩm</b><span class="mrg-l10"> {{currency_format($order->tongtien)}}</span>
        </div>
        <div class="info-sum">
            <b>Tiền phí vận chuyển </b><span class="mrg-l10">
                + {{currency_format($order->Ship->feeship)}}
            </span>
        </div>
        @if($order->Coupon)
        <div class="info-sum">
            @if($order->Coupon->loaigiam === 1)
            <b>Giảm giá </b><span class="mrg-l10"> {{ $order->Coupon->giamgia}}%
                ( -
                {{currency_format($order->tongdonhang *  $order->Coupon->giamgia / 100)}}
                )</span>
            @else
            <b>Giảm giá </b><span class="mrg-l10"> -
                {{currency_format($order->Coupon->giamgia)}}</span>
            @endif
        </div>
        @endif
        <div class="info-sum text-danger">
            <b>Thành tiền </b><span class="mrg-l10"> {{currency_format($order->tongtien)}}</span>
        </div>


    </div>
</div>