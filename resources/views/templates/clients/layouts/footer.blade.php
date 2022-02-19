<footer class="dark-footer skin-dark-footer style-2">
	<div class="before-footer">
		<div class="container">
			<!-- <div class="row">

				<div class="col-lg-4 col-md-4">
					<div class="single_facts">
						<div class="facts_icon">
							<i class="ti-shopping-cart"></i>
						</div>
						<div class="facts_caption">
							<h4>Free Home Delivery</h4>
							<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut</p>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-4">
					<div class="single_facts">
						<div class="facts_icon">
							<i class="ti-money"></i>
						</div>
						<div class="facts_caption">
							<h4>Money Back Guarantee</h4>
							<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut</p>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-4">
					<div class="single_facts last">
						<div class="facts_icon">
							<i class="ti-headphone-alt"></i>
						</div>
						<div class="facts_caption">
							<h4>24x7 Online Support</h4>
							<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut</p>
						</div>
					</div>
				</div>

			</div> -->
		</div>
	</div>

	<div class="footer-middle">
		<div class="container">
			<div class="row">

				<div class="col-lg-4 col-md-4">
					<div class="footer_widget">
						<h4 class="extream">Liên hệ</h4>
						<!-- <p>Liên hệ ngay !!!<a href="#" class="theme-cl">Nếu bạn cần hõ trợ</a></p> -->

						<div class="address_infos">
							<ul>
								<li><i class="fas fa-map-marker-alt"></i>TP. Hồ Chí Minh<br></li>
								<li><i class="fas fa-phone-square"></i>033 420 2221</li>
								<li><i class="fas fa-envelope"></i>pmt111100@gmail.com</li>
							</ul>
						</div>

					</div>
				</div>

				<!-- <div class="col-lg-2 col-md-2">
					<div class="footer_widget">
						<h4 class="widget_title">Categories</h4>
						<ul class="footer-menu">
							<li><a href="#">Organic</a></li>
							<li><a href="#">Grocery</a></li>
							<li><a href="#">Education</a></li>
							<li><a href="#">Furniture</a></li>
						</ul>
					</div>
				</div> -->

				<div class="col-lg-2 col-md-2">
					<div class="footer_widget">
						<h4 class="widget_title">Điều khoản</h4>
						<ul class="footer-menu">
							<li><a href="#">Điều khoản sử dụng</a></li>
							<li><a href="#">Quy tắc bảo mật</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2 col-md-2">
					<div class="footer_widget">
						<h4 class="widget_title">Giới thiệu</h4>
						<ul class="footer-menu">
							<li><a href="#">Về Chúng Tôi</a></li>
							<li><a href="#">Sản phẩm</a></li>
							<li><a href="#">Khuyến mãi</a></li>
							<li><a href="#">Tin tức</a></li>
						</ul>
					</div>
				</div>


			</div>
		</div>
	</div>

	<!-- <div class="footer-bottom">
		<div class="container">
			<div class="row align-items-center">

				<div class="col-lg-6 col-md-8">
					<p class="mb-0">©Copyright 2020 Odex. Designd By <a href="https://bootstrapdesigns.net">BootstrapDesigns</a>.</p>
				</div>

				<div class="col-lg-6 col-md-6 text-right">
					<ul class="footer_social_links">
						<li><a href="#"><i class="ti-facebook"></i></a></li>
						<li><a href="#"><i class="ti-twitter"></i></a></li>
						<li><a href="#"><i class="ti-instagram"></i></a></li>
						<li><a href="#"><i class="ti-linkedin"></i></a></li>
					</ul>
				</div>

			</div>
		</div>
	</div> -->
</footer>
<!-- ============================ Footer End ================================== -->

<!-- cart -->
<div class="w3-ch-sideBar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;" id="rightMenu">
	<div class="rightMenu-scroll">
		<h4 class="cart_heading">Các món đã chọn</h4>
		<button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large"><i class="fas fa-times"></i></button>
		<div class="right-ch-sideBar item-cart" id="side-scroll">
			@if(Session::has('cart') != null)

			<div class="cart_select_items">
				@foreach(Session::get('cart')->products as $key => $value)
				<div class="cart_selected_single">
					<div class="cart_selected_single_thumb">
						<a href="#"><img src="{{ asset('uploads/product').'/'.$value['productInfo']->hinhanh }}" class="img-fluid" alt="" /></a>
					</div>
					<div class="cart_selected_single_caption">
						<h4 class="product_title">{{$value['productInfo']->tensp}}</h4>
						<span class="numberof_item">Số lượng : {{$value['quanty']}}</span>
						<span class="sizeof_item">Size : {{$value['size']->ten}} - {{ currency_format($value['productInfo']->giaban)}}</span>
						<a href="#" class="text-danger btn-cart-del" id="delItemCart" data-id="{{$key}}">Xoá</a>
					</div>
				</div>
				@endforeach
			</div>

			<div class="cart_subtotal">
				<h6>Tổng<span class="theme-cl">{{currency_format(Session::get('cart')->totalPrice, ' đ')}}</span></h6>
				<input id="totalPrice" hidden type="number" data-price="{{currency_format(Session::get('cart')->totalPrice, ' đ')}}" value="">
				<input id="totalQuanty" hidden type="number" value="{{ Session::get('cart')->totalQuanty}}">
			</div>
			@endif

		</div>
		<div class="cart_action">
			<ul>
				<li><a href="{{ route('get.cart')}}" class="btn btn-go-cart btn-theme">Đến giỏ hàng</a></li>
			</ul>
		</div>

	</div>
</div>
<!-- cart -->

<!-- Product View -->
<div class="modal fade" id="viewproduct-over" tabindex="-1" role="dialog" aria-labelledby="add-payment" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content" id="view-product">
			<span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></span>
			<div class="modal-body">
				<div class="row align-items-center data-quickview">

				</div>
			</div>
		</div>
	</div>
</div>

<!-- End Modal -->
<div class="modal fade" id="forgetPass">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></span>
			<div class="modal-body">
				<div class="row align-items-center">

					<div class="login_signup ol-lg-12 col-md-12 col-sm-12">
						<h3 class="login_sec_title">Quên mật khẩu</h3>
						<form action=" {{ route('post.forget')}}" method="post">
							@csrf
							<div class="form-group">
								<label>Nhập Email tài khoản của bạn :</label>
								<input type="email" autocomplete="off" required class="form-control" name="emailforget">
								@if($errors->first('emailforget'))
								<small class="text-danger">{{ $errors->first('email') }}</small>
								@endif
							</div>
							<div class="login_flex">
								<div class="login_flex_1">
									<button type="submit" class="btn btn-md btn-theme">Xác nhận</b>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</div>

@if($errors->first('emailforget'))
<script>
	$("#forgetPass").modal("show");
</script>
@endif