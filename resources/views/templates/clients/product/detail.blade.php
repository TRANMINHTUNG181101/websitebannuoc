@extends('templates.clients.frontend')
@section('content')

<section>
    <div class="container">
        @if($product)
        <div class="row">

            <div class="col-lg-5 col-md-12 col-sm-12">
                
                <div class="img-detail"><img src="{{ asset('uploads/product/'.$product->hinhanh)}}" alt=""></div>
            </div>

            <div class="col-lg-7 col-md-12 col-sm-12">
                <div class="woo_pr_detail">

                    <div class="woo_cats_wrps">
                        <a href="#" class="woo_pr_cats">{{$product->danhmuc->tenloai}}</a>
                    </div>
                    <h2 class="woo_pr_title">{{$product->tensp}}</h2>


                    <div class="woo_pr_price">
            <div class="woo_pr_offer_price">
                <h3>{{currency_format($product->giaban)}}</h3>
            </div>
        </div>

        <div class="woo_pr_short_desc">
            <p>{{$product->mota}}</p>
        </div>

        <div class="woo_pr_color flex_inline_center mb-3">
            <div class="woo_pr_varient">
                <h6>Size:</h6>
            </div>
            <div class="woo_colors_list pl-3">
                @if($product->size)
                @foreach($product->size as $key =>  $value)
                <div class="custom-varient custom-size">
                    <input type="radio" class="custom-control-input" name="sizeRadio" id="sizeRadioOne{{$value->id}}" value="{{$value->id}}" data-toggle="form-caption" data-target="#sizeCaption" {{($key == 0 ? "checked" : "")}}>
                    <label class="custom-control-label" for="sizeRadioOne{{$value->id}}">{{$value->size_name}}</label>
                </div>
                @endforeach
                @endif
            </div>
        </div>

        <div class="woo_btn_action">
            <div class="col-12 col-lg-auto">
                <input type="number"  name="addSl" class="form-control mb-2 full-width" value=1 />
            </div>
        </div>

        <div class="woo_btn_action">
            <div class="col-12 col-lg-auto">
                <button type="submit" id="addCart" data-id="{{$product->id}}" class="btn btn-block btn-dark mb-2">Thêm Vào Giỏ <i class="fas fa-shopping-basket ml-2"></i></button>
            </div>
            <div class="col-12 col-lg-auto">
                <button class="btn btn-gray btn-block mb-2" data-toggle="button">Yêu Thích <i class="fas fa-heart ml-2"></i></button>
            </div>
        </div>

                </div>
            </div>

        </div>

        <!-- Product Description -->
        <div class="row mt-5">
            <div class="col-lg-12 col-md-12">
                <div class="custom-tab style-1">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true" aria-expanded="true">Thông tin</a>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false" aria-expanded="false">Đánh giá</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="description" role="tabpanel" aria-labelledby="description-tab" aria-expanded="true">
                            <p>{{$product->noidung}}</p>
                        </div>
                       
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab" aria-expanded="false">


                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
<!-- =========================== Product Detail =================================== -->

<!-- =========================== Related Products =================================== -->
<section class="gray">
    <div class="container">

        <div class="row">
            <div class="col-lg-12 col-md-12 mb-2">
                <h4 class="mb-0">Sản phẩm liên quan</h4>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12 col-md-12">
                <div class="owl-carousel products-slider owl-theme">
                    @if($related)
                    @foreach($related as $value)

                    <div class="item">
                        <div class="woo_product_grid">

                            <div class="woo_product_thumb">
                                <img src="{{ asset('uploads/product/'.$value->hinhanh)}}" class="img-fluid" alt="" />
                            </div>
                            <div class="woo_product_caption center">
                                <div class="woo_title">
                                    <h4 class="woo_pro_title"><a href="{{route('detail', $value->slug)}}">{{$value->tensp}}</a></h4>
                                </div>
                                <div class="woo_price ">
                                    <h6>{{currency_format($value->giaban)}}<span class="less_price"></span></h6>
                                    <a href="javascript:" class="btn-plus quickView" data-id="{{$value->id}}"><i class="fas fa-plus"></i></i></a>
                                </div>
                            </div>

                        </div>
                    </div>

                    @endforeach
                    @endif

                </div>
            </div>

        </div>

    </div>
</section>
@stop