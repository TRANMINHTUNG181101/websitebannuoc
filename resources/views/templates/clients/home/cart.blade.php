@if(Session::has('cart') != null)

<div class="cart_select_items">
    @foreach(Session::get('cart')->products as $key => $value)
    <div class="cart_selected_single">
        <div class="cart_selected_single_thumb">
            <a href="#"><img src="{{ asset('uploads/product').'/'.$value['productInfo']->hinhanh }}" class="img-fluid" alt="" /></a>
        </div>
        <div class="cart_selected_single_caption">
            <a href="javascript:" id="upCart" data-key="{{$key}}">
                <h4 class="product_title">{{$value['productInfo']->tensp}}</h4>
            </a>
						<span class="numberof_item">Số lượng : {{$value['quanty']}}</span>
						<span class="sizeof_item">Size : {{$value['size']->size_name}} - {{ currency_format($value['productInfo']->giaban)}}</span>
						<a href="#" class="text-danger btn-cart-del" id="delItemCart" data-id="{{$key}}">Xoá</a>
        </div>
    </div>
    @endforeach
</div>

<div class="cart_subtotal priceTotal">
    <h6>Tổng<span class="theme-cl carsub">{{currency_format(Session::get('cart')->totalPrice, ' VNĐ')}}</span></h6>
    <input id="totalPrice" hidden type="number" data-price="{{currency_format(Session::get('cart')->totalPrice, ' VNĐ')}}" value="">
    <input id="totalQuanty" hidden type="number" value="{{ Session::get('cart')->totalQuanty}}">
</div>
@endif