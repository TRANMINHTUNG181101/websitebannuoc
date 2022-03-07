<!DOCTYPE html>
<!DOCTYPE html>
<html lang="vn">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-family: DejaVu Sans, sans-serif;
        }

        .content {
            text-align: center;
            width: 100%;
            margin: 0 auto;
            margin-top: 50px;
        }

        .header span {
            display: block;
            margin-top: 10px;
        }

        .content .header h1 {
            margin-bottom: 10px;
        }
        .content .header h2 {
            margin-top: 10px;
        }
        .w-50 {
            float: left;
            width: 50%;
        }

        .detail {
            clear: both;
        }

        .info ul {
            list-style: none;
            text-align: left;
            padding: 0px;
        }

        .info ul li {
            margin: 10px 0px;
            font-weight: bold;
        }

        .info ul li span {
            font-weight: 500;
        }
        .sum {
            text-align: right;
            margin-top: 20px;
            padding-right: 60px;
        }
        .sum b{
            float: left;
        }

        .sum .info-sum {
            display: block;
            padding: 10px;
            border-bottom: 1px solid gray;
        }
        table tr td {
            padding: 10px 0px;
        }
        .footer {
            margin-top: 50px;
        }
        table tr th {
            text-align: left;
        }
      
     
    </style>
</head>

<body>
    <div class="content">
        <div class="header">
            <h1>DRINKS ORDERS</h1>
            <h2>HOÁ ĐƠN THANH TOÁN</h2>
            <span>Địa chỉ : Đ. Lê Lợi, Phường Bến Thành, Quận 1, Thành phố Hồ Chí Minh</span>
            <span>Điện thoại :<b> 033 420 2221</b></span>
        </div>
        <div class="info">
            <div class="w-50">
                <ul>
                    <li>Khách hàng : <span>{{$order->hoten}}</span></li>
                    <li>Thời gian : <span>{{ format_date($order->ngaytao)}}</span></li>
                    <li>Thu ngân : <span>Admin</span></li>
                </ul>
            </div>
            <div class="w-50">
                <ul>
                    <li>Số hoá đơn : <span>{{$order->madh}}</span></li>
                </ul>
            </div>
        </div>
        <div class="detail">
            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá bán</th>
                    </tr>
                </thead>
                <tbody>
                    @if($orderDetail && count($orderDetail))
                    @foreach($orderDetail as $key => $value)
                    <tr>
                        <td>
                            {{ $key + 1}}
                        </td>
                        <td>{{ $value->product->tensp ?? "[]" }} ({{ $value->size->size_name }})</td>
                        <td>
                            {{ $value->soluong }}
                        </td>
                        <td>
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
                        <b>Tiền phí vận chuyển </b><span class="mrg-l10"> 0đ</span>
                    </div>
                    <div class="info-sum">
                        <b>Giảm giá </b><span class="mrg-l10"> 0đ</span>
                    </div>
                    <div class="info-sum text-danger ">
                        <b>Thành tiền </b><span class="mrg-l10"> {{currency_format($order->tongtien)}}</span>
                    </div>


                </div>
            </div>
        </div>

        <div class="footer">
            <h4>!! Xin cảm ơn quý khách !!</h2>
        </div>
    </div>
</body>

</html>