@extends('templates.clients.frontend')
@section('content')
@if(count($errors) > 0)
<script>
window.onload = () => {
    toastr.error("Lỗi liên hệ.", '', {
        "closeButton": true,
    });
}
</script>
@endif
@if(session()->has('errorContact'))
<script>
window.onload = () => {
    toastr.error("{{session()->get('errorContact')}}");
}
</script>
@endif
@if(session()->has('successContact'))
<script>
window.onload = () => {
    toastr.success("{{session()->get('successContact')}}");
}
</script>
@endif
<section>
    <div class="container">
        <div class="row">

            <div class="col-lg-5 col-md-6 col-sm-12">
                <h2>Giới thiệu về <span class="theme-cl">cửa hàng</span></h2>
                <p style="text-align: justify;">Luôn tâm huyết với việc khai thác nguồn nông sản Việt Nam để tạo ra
                    những ly thức uống tươi ngon, an
                    toàn và giàu giá trị dinh dưỡng, ToCoToCo mở cửa hàng đầu tiên vào năm 2013, mang trong mình lòng
                    đam mê và khát vọng xây dựng một thương hiệu trà sữa thuần Việt, mang đậm hương vị quê
                    hương.ToCoToCo tin rằng thưởng thức một ly trà sữa được pha chế từ trà Mộc Châu, trân châu từ sắn
                    dây Nghệ An hay mứt dâu tằm từ Đà Lạt sẽ là những trải nghiệm hoàn toàn khác biệt và tuyệt vời nhất
                    cho những khách hàng của mình.</p>
                <p style="text-align: justify;">Hành trình đầy đam mê và tâm huyết này sẽ tiếp tục nhân rộng để lan tỏa
                    những ly trà thuần khiết đến
                    với mọi người.</p>
                <a href=" {{ route('product')}}" class="btn btn-theme mt-2">Mua ngay</a>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 ml-auto">
                <div class="about_video">
                    <div class="thumb">
                        <img class="pro_img img-fluid w100" src="assets/img/offer-4.jpg" alt="7.jpg">
                        <div class="overlay_icon">
                            <div class="bb-video-box">
                                <div class="bb-video-box-inner">
                                    <div class="bb-video-box-innerup">
                                        <a href="https://www.youtube.com/watch?v=A8EI6JaFbv4" data-toggle="modal"
                                            data-target="#popup-video" class="theme-cl"><i
                                                class="ti-control-play"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-4">
                <div class="single_testi_box">
                    <div class="row">
                        <div class="col-lg-5 col-md-5">
                            <div class="single_teams_thumb">
                                <img src="{{ asset('img/banner.jpg')}}" class="img-fluid" alt="" />
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <div class="single_teams_wraps">
                                <div class="single_team_caption">
                                    <div class="review_author_box">
                                        <div class="reviews_caption">
                                            <h4 class="testi2_title">MUA HÀNG DỄ DÀNG</h4>
                                        </div>
                                    </div>
                                    <p class="teams_description">Khách hàng có thể dễ dàng mua hàng của chúng tôi thông
                                        qua website chỉ cần đặt hàng là sẽ có ngay sản phẩm mà mình muốn.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 mt-4">
                <div class="single_testi_box">
                    <div class="row ">
                        <div class="col-lg-7 col-md-7">
                            <div class="single_teams_wraps">
                                <div class="single_team_caption">
                                    <div class="review_author_box">
                                        <div class="reviews_caption">
                                            <h4 class="testi2_title">CHẤT LƯỢNG SẢN PHẨM VÀ DỊCH VU CHU ĐÁO</h4>
                                        </div>
                                    </div>
                                    <p class="teams_description">Luôn luôn hỗ trợ khách hàng nhiệt tình và giải đáp tất
                                        cả các thắc mắc của khách hàng nhanh nhất có thể. Và mang đển cho tất cả khách
                                        hàng những sản phẩm tốt và chất lượng nhất.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5">
                            <div class="single_teams_thumb">
                                <img src="{{ asset('img/blog.jpg')}}" class="img-fluid" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">

            <div class="col-lg-4 col-md-4 ">
                <div class="single_facts">
                    <div class="facts_icon">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                    </div>
                    <div class="facts_caption">
                        <h4>DỄ DÀNG MUA HÀNG</h4>
                        <p>Khách hàng dễ dàng chọn mua sản phẩm mình thích.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="single_facts">
                    <div class="facts_icon">
                        <i class="fa fa-headphones" aria-hidden="true"></i>
                    </div>
                    <div class="facts_caption">
                        <h4>DỊCH VỤ CHU ĐÁO</h4>
                        <p>Luôn luôn hỗ trợ khách hàng nhanh nhất có thể.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="single_facts last">
                    <div class="facts_icon">
                        <i class="fa fa-coffee" aria-hidden="true"></i>
                    </div>
                    <div class="facts_caption">
                        <h4>CHẤT LƯỢNG SẢN PHẨM TỐT</h4>
                        <p>Mang đển cho khách hàng các sản phẩm tốt nhất hiện tại.</p>
                    </div>
                </div>
            </div>
        </div>
</section>


<section class="gray">
    <div class="container">

        <div class="row mb-4">

            <div class="col-lg-4 col-md-4">
                <div class="contact-box">
                    <img src="assets/img/us-marker.png" class="mx-auto" alt="">
                    <h4>Địa chỉ liên hệ</h4>
                    {{ $setting->diachi ?? ""}}<br>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="contact-box">
                    <img src="assets/img/india-marker.png" class="mx-auto" alt="">
                    <h4>Email</h4>
                    {{ $setting->email ?? ""}}<br>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="contact-box">
                    <img src="assets/img/uk-marker.png" class="mx-auto" alt="">
                    <h4>Điện thoại</h4>
                    {{ $setting->dienthoai ?? ""}}<br>
                </div>
            </div>

        </div>

        <div class="row mt-5 align-items-center">

            <div class="col-lg-5 col-md-12 hide-91" style="overflow: hidden;">
                {!! $setting->iframemap ?? "" !!}
            </div>

            <div class="col-lg-7 col-md-12">
                <div class="contact-form">
                    <form action="{{ route('send.contact')}}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Tên</label>
                                <input type="text" name="ten" class="form-control" placeholder="Tên">
                                @if($errors->first('ten'))
                                <span class="error text-danger">{{ $errors->first('ten') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email">
                                @if($errors->first('email'))
                                <span class="error text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label>Tiêu đề</label>
                            <input type="text" name="tieude" class="form-control" placeholder="Tiêu dề">
                            @if($errors->first('tieude'))
                            <span class="error text-danger">{{ $errors->first('tieude') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label>Nội dung</label>
                            <textarea rows="6" style="height: unset;" class="form-control" name="noidung"
                                placeholder="Nội dung"></textarea>
                            @if($errors->first('noidung'))
                            <span class="error text-danger">{{ $errors->first('noidung') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <button type="submit" class="btn btn-primary">Gửi</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>

    </div>
</section>

@stop