@extends('templates.clients.frontend')
@section('content')


			<!-- =========================== Breadcrumbs =================================== -->
			
			
			<!-- =========================== Account Settings =================================== -->
            @if($user)
			<section class="gray mgt">
				<div class="container">
					<div class="row">
					
						<div class="col-lg-4 col-md-3">
							<nav class="dashboard-nav mb-10 mb-md-0">
							  <div class="list-group list-group-sm list-group-strong list-group-flush-x">
								<a class="list-group-item  " href="order.html">
								  Lịch sử mua hàng
								</a>
								<a class="list-group-item  " href="wishlist.html">
								  Yêu thích
								</a>

								<a class="list-group-item  " href="login-signup.html">
								  Đăng xuất
								</a>
							  </div>
							</nav>
						</div>
						
						<div class="col-lg-8 col-md-9">
							<!-- Total Items -->
							<div class="card style-2">
								<div class="card-header">
									<h4 class="mb-0">Tài khoản của bạn</h4>
								</div>
								<div class="card-body">
									<form class="submit-page">
										<div class="row">
										
											<div class="col-12 ">
											  <!-- Email -->
											  <div class="form-group">
												<label>Họ và tên</label>
												<input class="form-control" type="text" placeholder="Họ tên" value="{{$user->ten}}" required="">
											  </div>

											</div>
										
										
											<div class="col-12">
												<!-- Email -->
												<div class="form-group">
													<label> Email</label>
													<input class="form-control" type="email" placeholder="Email" value="{{$user->email}}" required="">
												</div>
											</div>
										
											<div class="col-12">
												<!-- Password -->
												<div class="form-group">
													<label>Số điện thoại</label>
													<input class="form-control" type="number" placeholder="Số điện thoại"  value="{{$user->sodienthoai}}">
												</div>
											</div>
										
											<div class="col-12">
												<!-- Gender -->
												<div class="form-group mb-8">
													<label>Giới tính</label>
													<div class="btn-group-toggle mt-2 d-flex bd-highlight">
														<div class="mr-2">
															<input id="male" class="radio-custom" name="gen" type="radio">
															<label for="male" class="radio-custom-label">Nam</label>
														</div>
														<div class="ml-1">
															<input id="female" class="radio-custom" name="gen" type="radio">
															<label for="female" class="radio-custom-label">Nữ</label>
														</div>
													</div>
												</div>
											</div>
											
											<div class="col-12">
											  <button class="btn btn-dark" type="submit">Cập nhật</button>
											</div>
										
										</div>
									</form>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</section>
            @endif
@stop