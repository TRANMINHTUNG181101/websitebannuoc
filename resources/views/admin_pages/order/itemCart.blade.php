@if(Session::has('cartAD') != null && Session::get('cartAD')->products)
<table class="table table-pro">
    <thead>
        <tr>
            <th>Sản phẩm</th>
            <th>Size</th>
            <th>Số lượng</th>
            <th>Giảm giá</th>
            <th>Giá bán</th>
        </tr>
    </thead>
    <tbody>
        @foreach(Session::get('cartAD')->products as $key => $value)
        <tr>
            <th style="display: flex;gap: 10px;">
                <img style="width: 70px;height: 70px;object-fit: cover;border-radius: 4px;"
                    src="{{ asset('uploads/product').'/'.$value['productInfo']->hinhanh }}" class="img-fluid" alt="" />
                <span>{{$value['productInfo']->tensp}}</span>
            </th>
            <th>{{$value['size']->size_name}}</th>
            <th>{{$value['quanty']}}</th>
            <th>Giảm giá</th>
            <th>{{ currency_format($value['productInfo']->giaban)}}</th>
        </tr>
        @endforeach
    </tbody>
</table>
@endif