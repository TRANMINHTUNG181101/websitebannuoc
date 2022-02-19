@extends('templates.clients.frontend')
@section('content')


<section class="">
	<div class="container">

		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="filter_search_opt">
					<a href="javascript:void(0);" onclick="openFilterSearch()"><i class="ti-reload"></i></a>
				</div>
			</div>
		</div>

		<div class="row">

			<!-- Single Product -->
			<div class="col-lg-3 col-md-12">
				<div class="search-sidebar sm-sidebar" id="filter_search" style="left:0;">
					<div class="search-sidebar_header">
						<h4 class="ssh_heading">Close Filter</h4>
						<button onclick="closeFilterSearch()" class="w3-bar-item w3-button w3-large"><i class="ti-close"></i></button>
					</div>
					<div class="search-sidebar-body">

						<!-- Single Option -->
						<div class="single_search_boxed">
							<div class="widget-boxed-header">
								<h3 class="ml-4 mt-4">Danh mục</h3>
							</div>
							<div class="widget-boxed-body">
								<div class="side-list no-border">
									<div class="filter-card" id="shop-categories">

										<!-- Single Filter Card -->
										@if($danhmuc)
										@foreach($danhmuc as $value)
										<div class="single_filter_card">
											<h5><a href="#{{$value->id}}">{{$value->tenloai}}</a></h5>
											<!-- 														
														<div class="collapse" id="shoes" data-parent="#shop-categories">
															<div class="card-body">
																<div class="inner_widget_link">
																	<ul>
																		<li><a href="#">Pumps & high Heals<span>112</span></a></li>
																		<li><a href="#">Sandels<span>82</span></a></li>
																		<li><a href="#">Sneakers<span>56</span></a></li>
																		<li><a href="#">Boots<span>101</span></a></li>
																		<li><a href="#">Casual Shoes<span>212</span></a></li>
																		<li><a href="#">Flats Sandel<span>92</span></a></li>
																	</ul>
																</div>
															</div>
														</div> -->
										</div>
										@endforeach
										@endif


									</div>
								</div>
							</div>
						</div>


					</div>
				</div>
			</div>

			<div class="col-lg-9 col-md-12">

				<!-- Banner -->
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="min_banner mb-5">
							<img src="{{ asset('img/banner1.jpg')}}" class="img-fluid rounded" alt="" />
						</div>
					</div>
				</div>

				<!-- Shorter Toolbar -->
				@if($danhmuc)
				@foreach($danhmuc as $value)
				<div class="row scroll-t-20" id="{{$value->id}}" >
					<div class="col-lg-12 col-md-12">
						<div class="toolbar toolbar-products">
							<div class="toolbar-sorter sorter">
								<label class="sorter-label" for="sorter">{{ $value->tenloai}}</label>
							</div>
						</div>
					</div>
				</div>

				<!-- row -->
				<div class="row">
					@if($product)
					@foreach($product as $val)
					@if($value->id == $val->id_loaisanpham)
					<!-- Single Item -->
					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="item">
							<div class="woo_product_grid">

								<div class="woo_product_thumb">
									<img src="{{ asset('uploads/product/'.$val->hinhanh)}}" class="img-fluid" alt="" />
								</div>
								<div class="woo_product_caption center">
									<div class="woo_title">
										<h4 class="woo_pro_title"><a href="{{route('detail', $val->slug)}}">{{$val->tensp}}</a></h4>
									</div>
									<div class="woo_price ">
										<h6>{{currency_format($val->giaban)}}<span class="less_price"></span></h6>
										<a href="javascript:" class="btn-plus quickView" data-id="{{$val->id}}"><i class="fas fa-shopping-basket"></i></i></a>
									</div>
								</div>

							</div>
						</div>
					</div>
					@endif
					@endforeach
					@endif


				</div>
				<!-- row -->
				@endforeach
				@endif

			</div>

		</div>
	</div>
</section>
@stop