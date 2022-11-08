@extends('client.share.master')

@section('content')
    <!-- Start Slider Area -->
    <div class="slider__area slider--three">
        <div class="slider__activation--1">
            <!-- Start Single Slide -->
            <div class="slide slider__fixed--height bg-image--11 poss--relative">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="slider__content">
                                <div class="slider__inner">
                                    <h2>Chúng tôi là,</h2>
                                    <h1 style="font-size: 120px;">"B-restaurant"</h1>
                                    <div class="slider__btn">
                                        <a class="food__btn" href="/blog">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide__pizza--2 wow fadeInLeft" data-wow-delay="0.4s">
                    <img style="opacity: 1;" src="/assets_client/images/shape/sli-2.png" alt="pizza images">
                </div>
                <div class="slide__pizza--3 wow fadeInRight" data-wow-delay="0.4s">
                    <img style="opacity: 1;" src="/assets_client/images/shape/sli-3.png" alt="pizza images">
                </div>
            </div>
            <!-- End Single Slide -->
        </div>
    </div>

    <!-- End Slider Area -->
    <!-- Start Feature Area -->
    <section class="food__feature__area section-padding--lg bg--white">
        <div class="container">
            <div class="row">
                <!-- Start Single Feature -->
                <div class="col-md-6 col-lg-4 col-sm-12">
                    <div class="square">
                        <div class="feature text-center">
                            <div class="feature__thumb">
                                <a href="/gallery">
                                    <img src="/assets_client/images/service/1.png" alt="feature images">
                                </a>
                            </div>
                            <div class="feature__details">
                                <h4><a href="/gallery">Bữa sáng</a></h4>
                                <h6>Tất cả các món đều đã sẵn sàng chờ bạn !</h6>
                                <p>Đã có B-restaurant đây rồi, bạn sẽ không phải đau đầu suy nghĩ xem mỗi ngày phải ăn gì hoặc nấu món gì vừa ngon vừa dinh dưỡng. </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Feature -->
                <!-- Start Single Feature -->
                <div class="col-md-6 col-lg-4 col-sm-12 sm--mt--40">
                    <div class="square">
                        <div class="feature text-center">
                            <div class="feature__thumb">
                                <a href="/gallery">
                                    <img src="/assets_client/images/service/2.png" alt="feature images">
                                </a>
                            </div>
                            <div class="feature__details">
                                <h4><a href="/gallery">Buổi trưa</a></h4>
                                <h6>Tất cả các món đều đã sẵn sàng chờ bạn !</h6>
                                <p>Đã có B-restaurant đây rồi, bạn sẽ không phải đau đầu suy nghĩ xem mỗi ngày phải ăn gì hoặc nấu món gì vừa ngon vừa dinh dưỡng. </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Feature -->
                <!-- Start Single Feature -->
                <div class="col-md-6 col-lg-4 col-sm-12 sm--mt--40 md--mt--40">
                    <div class="square">
                        <div class="feature text-center">
                            <div class="feature__thumb">
                                <a href="/gallery">
                                    <img src="/assets_client/images/service/3.png" alt="feature images">
                                </a>
                            </div>
                            <div class="feature__details">
                                <h4><a href="/gallery">Buổi tối</a></h4>
                                <h6>Tất cả các món đều đã sẵn sàng chờ bạn !</h6>
                                <p>Đã có B-restaurant đây rồi, bạn sẽ không phải đau đầu suy nghĩ xem mỗi ngày phải ăn gì hoặc nấu món gì vừa ngon vừa dinh dưỡng. </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Feature -->
                <!-- End Single Feature -->
            </div>
        </div>
    </section>
    <!-- End Feature Area -->
    <!-- Start Choose us Area -->
    <section class="food__choose__us__area section-padding--lg bg__cat--4 poss--relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-lg-12">
                    <div class="section__title title__style--2 service__align--center">
                        <h2 class="title__line">Hãy đến với chúng tôi</h2>
                        <p>Với những quy trình dịch vụ</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="choose__wrap text-center mt--50">

                        <ul class="fd__choose__list d-flex justify-content-center">
                            <li>1. Giao hàng đúng giờ.</li>
                            <li>2. Phí giao hàng miễn phí.</li>
                            <li>3. Chất lượng dịch vụ tốt nhất.</li>
                        </ul>
                        <p>B-restaurant là chuỗi nhà hàng nổi tiếng nhất miền Trung, được xây dựng vào đầu thu năm 2022. Với những món ăn đặc trưng
                            bạn chỉ có thể tìm thấy ở nhà hàng chúng tôi.
                        </p>
                        <div class="chooseus__btn">
                            <a class="food__btn" href="/menu">Xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="choose__img--1 wow fadeInRight" data-wow-delay="0.2s">
            <img src="/assets_client/images/banner/bann-1/1.png" alt="banner images">
        </div>
        <div class="choose__img--2 wow fadeInLeft" data-wow-delay="0.3s">
            <img src="/assets_client/images/banner/bann-1/2.png" alt="banner images">
        </div>
    </section>
    <!-- End Choose us Area -->
    <!-- Start Special Offer -->
    <section class="food__special__offer bg--white section-padding--lg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="section__title title__style--2 service__align--center">
                        <h2 class="title__line">Những món mới đặc biệt của chúng tôi</h2>
                        <p>Quy trình dịch vụ của chúng tôi</p>
                    </div>
                </div>
            </div>
            <div class="row mt--40">
                <!-- Start Single Offer -->
                @foreach ($monAnMoi as $key => $value)
                    <div class="col-md-6 col-sm-12 col-lg-3" style="height:500px">
                        <div class="food__offer text-center foo">
                            <div class="offer__thumb poss--relative">
                                <a href="/menu/detailFood/{{ $value->id }}"><img src="{{ $value->hinh_anh }}" alt="offer images"></a>
                                <div class="offer__product__prize">
                                    <span>{{ number_format($value->don_gia_khuyen_mai != null ? $value->don_gia_khuyen_mai : $value->don_gia_ban, 0) }}đ</span>
                                </div>
                            </div>
                            <div class="offer__details">
                                <div style="min-height: 166px">
                                    <h2 style="height: 50px;display: -webkit-box;-webkit-line-clamp: 6;-webkit-box-orient: vertical;overflow: hidden;">
                                        <a href="/menu/detailFood/{{ $value->id }}">{{ $value->ten_mon_an }}</a>
                                    </h2>
                                    <div style="display: -webkit-box;-webkit-line-clamp: 4;-webkit-box-orient: vertical;overflow: hidden;">
                                        {!! $value->mo_ta_ngan !!}
                                    </div>
                                </div>
                                <div class="offer__btn">
                                    @if (Auth::guard('customer')->check())
                                        <a class="food__btn grey--btn mid-height addToCart mt-4" href="" data-id={{ $value->id }}>Đặt
                                            món</a>
                                    @else
                                        <a class="food__btn grey--btn mid-height accountbox-trigger mt-4" href="" data-id={{ $value->id }}>Đặt món</a>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Start Single Offer -->
            </div>
        </div>
        <div style="text-align:center;font-size:18px;font-weight:600; border-bottom:1px solid #ccc; padding-bottom:16px">
            <a href="/menu">Xem tất cả các món</a>
        </div>
        <!-- Start Banner Area -->
        <div class="banner__area mt--40">
            <div class="container">
                <div class="row">
                    <!-- Start Single Banner -->
                    <div class="col-md-6 col-lg-3 col-sm-12">
                        <div class="banner--2 foo">
                            <div class="banner__thumb">
                                <a href="#"><img src="/assets_client/images/banner/bann-2/1.jpg" alt="banner images"></a>
                            </div>
                            <div class="banner__hover__action banner__left__bottom">
                                <div class="banner__hover__inner">
                                    <span>20%</span>
                                    <p>off for festival</p>
                                    <h2 class="coffee-text">off for festival</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Banner -->
                    <!-- Start Single Banner -->
                    <div class="col-md-6 col-lg-3 col-sm-12">
                        <div class="banner--2 foo">
                            <div class="banner__thumb">
                                <a href="#"><img src="/assets_client/images/banner/bann-2/2.jpg" alt="banner images"></a>
                            </div>
                            <div class="banner__hover__action banner__left__top">
                                <div class="banner__hover__inner">
                                    <h4>colorful</h4>
                                    <h2 class="pink-text">donut’s</h2>
                                    <p>get it till the stock full</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Banner -->
                    <!-- Start Single Banner -->
                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="banner--2 foo">
                            <div class="banner__thumb">
                                <a href="#"><img src="/assets_client/images/banner/bann-2/3.jpg" alt="banner images"></a>
                            </div>
                            <div class="banner__hover__action banner__right__bottom">
                                <div class="banner__hover__inner">
                                    <h4 class="vanilla">vanilla</h4>
                                    <h2 class="pink-text">MAFFIN</h2>
                                    <p>Lovely Food for Food lover</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Banner -->
                </div>
            </div>
        </div>
        <!-- End Banner Area -->
    </section>
    <!-- End Special Offer -->
    <!-- Start Popular Food Area -->
    <section class="popular__food__area section-padding--lg bg-image--12">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="section__title title__style--2 service__align--center section__bg__black">
                        <h2 class="title__line">Những ưu đãi đặc biệt</h2>
                        <p>Quy trình dịch vụ của chúng tôi </p>
                    </div>
                </div>
            </div>
            <div class="row mt--30">
                <!-- Start Single Popular Food -->
                <div class="col-lg-4 col-md-6 col-sm-12 foo">
                    <div class="popular__food">
                        <div class="pp_food__thumb">
                            <a href="/gallery">
                                <img src="/assets_client/images/popular/1.jpg" alt="popular food">
                            </a>
                            <div class="pp__food__prize active offer">
                                <span class="new">Mới</span>
                                <span>{{ $value->don_gia_ban }}</span>
                            </div>
                        </div>
                        <div class="pp__food__inner">
                            <div class="pp__fd__icon">
                                <img src="/assets_client/images/popular/icon/1.png" alt="icon images">
                            </div>
                            <div class="pp__food__details">
                                <h4><a href="/gallery">Loại bánh : Donuts</a></h4>
                                <ul class="rating">
                                    <li><i class="zmdi zmdi-star"></i></li>
                                    <li><i class="zmdi zmdi-star"></i></li>
                                    <li><i class="zmdi zmdi-star"></i></li>
                                    <li><i class="zmdi zmdi-star"></i></li>
                                    <li class="rating__opasity"><i class="zmdi zmdi-star"></i></li>
                                </ul>
                                <p>Thời gian giao : 25 min, Free Ship</p>
                                <div class="pp__food__bottom d-flex justify-content-between align-items-center">
                                    <div class="pp__btn">
                                        <a class="food__btn btn--transparent btn__hover--theme btn__hover--theme" href="#">Đặt ngay</a>
                                    </div>
                                    <ul class="pp__meta d-flex">
                                        <li><a href="#"><i class="zmdi zmdi-comment-outline"></i>03</a></li>
                                        <li><a href="#"><i class="zmdi zmdi-favorite-outline"></i>04</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Popular Food -->
                <!-- Start Single Popular Food -->
                <div class="col-lg-4 col-md-6 col-sm-12 foo">
                    <div class="popular__food">
                        <div class="pp_food__thumb">
                            <a href="/gallery">
                                <img src="/assets_client/images/popular/2.jpg" alt="popular food">
                            </a>
                            <div class="pp__food__prize offer">
                                <span class="new">off</span>
                                <span>15%</span>
                            </div>
                        </div>
                        <div class="pp__food__inner">
                            <div class="pp__fd__icon">
                                <img src="/assets_client/images/popular/icon/2.png" alt="icon images">
                            </div>
                            <div class="pp__food__details">
                                <h4><a href="/gallery">Loại bánh : Muffin</a></h4>
                                <ul class="rating">
                                    <li><i class="zmdi zmdi-star"></i></li>
                                    <li><i class="zmdi zmdi-star"></i></li>
                                    <li><i class="zmdi zmdi-star"></i></li>
                                    <li><i class="zmdi zmdi-star"></i></li>
                                    <li class="rating__opasity"><i class="zmdi zmdi-star"></i></li>
                                </ul>
                                <p>Thời gian giao : 25 min, Free Ship</p>
                                <div class="pp__food__bottom d-flex justify-content-between align-items-center">
                                    <div class="pp__btn">
                                        <a class="food__btn btn--transparent btn__hover--theme" href="#">Đặt ngay</a>
                                    </div>
                                    <ul class="pp__meta d-flex">
                                        <li><a href="#"><i class="zmdi zmdi-comment-outline"></i>03</a></li>
                                        <li><a href="#"><i class="zmdi zmdi-favorite-outline"></i>04</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Popular Food -->
                <!-- Start Single Popular Food -->
                <div class="col-lg-4 col-md-6 col-sm-12 foo">
                    <div class="popular__food">
                        <div class="pp_food__thumb">
                            <a href="/gallery">
                                <img src="/assets_client/images/popular/3.jpg" alt="popular food">
                            </a>
                            <div class="pp__food__prize offer">
                                <span class="new">hot</span>
                                <span>{{ $value->don_gia_ban }}</span>
                            </div>
                        </div>
                        <div class="pp__food__inner">
                            <div class="pp__fd__icon">
                                <img src="/assets_client/images/popular/icon/3.png" alt="icon images">
                            </div>
                            <div class="pp__food__details">
                                <h4><a href="/gallery">Loại bánh : Bun</a></h4>
                                <ul class="rating">
                                    <li><i class="zmdi zmdi-star"></i></li>
                                    <li><i class="zmdi zmdi-star"></i></li>
                                    <li><i class="zmdi zmdi-star"></i></li>
                                    <li><i class="zmdi zmdi-star"></i></li>
                                    <li class="rating__opasity"><i class="zmdi zmdi-star"></i></li>
                                </ul>
                                <p>Thời gian giao : 25 min, Free Ship</p>
                                <div class="pp__food__bottom d-flex justify-content-between align-items-center">
                                    <div class="pp__btn">
                                        <a class="food__btn btn--transparent btn__hover--theme" href="#">Đặt ngay</a>
                                    </div>
                                    <ul class="pp__meta d-flex">
                                        <li><a href="#"><i class="zmdi zmdi-comment-outline"></i>03</a></li>
                                        <li><a href="#"><i class="zmdi zmdi-favorite-outline"></i>04</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Popular Food -->
                <!-- Start Single Popular Food -->
                <div class="col-lg-4 col-md-6 col-sm-12 foo">
                    <div class="popular__food">
                        <div class="pp_food__thumb">
                            <a href="/gallery">
                                <img src="/assets_client/images/popular/4.jpg" alt="popular food">
                            </a>
                            <div class="pp__food__prize active">
                                <span>{{ $value->don_gia_ban }}</span>
                            </div>
                        </div>
                        <div class="pp__food__inner">
                            <div class="pp__fd__icon">
                                <img src="/assets_client/images/popular/icon/4.png" alt="icon images">
                            </div>
                            <div class="pp__food__details">
                                <h4><a href="/gallery">Loại bánh : Cup Cake</a></h4>
                                <ul class="rating">
                                    <li><i class="zmdi zmdi-star"></i></li>
                                    <li><i class="zmdi zmdi-star"></i></li>
                                    <li><i class="zmdi zmdi-star"></i></li>
                                    <li><i class="zmdi zmdi-star"></i></li>
                                    <li><i class="zmdi zmdi-star"></i></li>
                                    {{-- <li class="rating__opasity"><i class="zmdi zmdi-star"></i></li> --}}
                                </ul>
                                <p>Thời gian giao : 25 min, Free Ship</p>
                                <div class="pp__food__bottom d-flex justify-content-between align-items-center">
                                    <div class="pp__btn">
                                        <a class="food__btn btn--transparent btn__hover--theme" href="#">Đặt ngay</a>
                                    </div>
                                    <ul class="pp__meta d-flex">
                                        <li><a href="#"><i class="zmdi zmdi-comment-outline"></i>03</a></li>
                                        <li><a href="#"><i class="zmdi zmdi-favorite-outline"></i>04</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Popular Food -->
                <!-- Start Single Popular Food -->
                <div class="col-lg-4 col-md-6 col-sm-12 foo">
                    <div class="popular__food">
                        <div class="pp_food__thumb">
                            <a href="/gallery">
                                <img src="/assets_client/images/popular/5.jpg" alt="popular food">
                            </a>
                            <div class="pp__food__prize">
                                <span>{{ $value->don_gia_ban }}</span>
                            </div>
                        </div>
                        <div class="pp__food__inner">
                            <div class="pp__fd__icon">
                                <img src="/assets_client/images/popular/icon/5.png" alt="icon images">
                            </div>
                            <div class="pp__food__details">
                                <h4><a href="/gallery">Loại bánh : Donuts</a></h4>
                                <ul class="rating">
                                    <li><i class="zmdi zmdi-star"></i></li>
                                    <li><i class="zmdi zmdi-star"></i></li>
                                    <li><i class="zmdi zmdi-star"></i></li>
                                    <li><i class="zmdi zmdi-star"></i></li>
                                    <li class="rating__opasity"><i class="zmdi zmdi-star"></i></li>
                                </ul>
                                <p>Thời gian giao : 25 min, Free Ship</p>
                                <div class="pp__food__bottom d-flex justify-content-between align-items-center">
                                    <div class="pp__btn">
                                        <a class="food__btn btn--transparent btn__hover--theme" href="#">Đặt ngay</a>
                                    </div>
                                    <ul class="pp__meta d-flex">
                                        <li><a href="#"><i class="zmdi zmdi-comment-outline"></i>03</a></li>
                                        <li><a href="#"><i class="zmdi zmdi-favorite-outline"></i>04</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Popular Food -->
                <!-- Start Single Popular Food -->
                <div class="col-lg-4 col-md-6 col-sm-12 foo">
                    <div class="popular__food">
                        <div class="pp_food__thumb">
                            <a href="/gallery">
                                <img src="/assets_client/images/popular/6.jpg" alt="popular food">
                            </a>
                            <div class="pp__food__prize active">
                                <span>{{ $value->don_gia_ban }}</span>
                            </div>
                        </div>
                        <div class="pp__food__inner">
                            <div class="pp__fd__icon">
                                <img src="/assets_client/images/popular/icon/6.png" alt="icon images">
                            </div>
                            <div class="pp__food__details">
                                <h4><a href="/gallery">Loại bánh : Bread</a></h4>
                                <ul class="rating">
                                    <li><i class="zmdi zmdi-star"></i></li>
                                    <li><i class="zmdi zmdi-star"></i></li>
                                    <li><i class="zmdi zmdi-star"></i></li>
                                    <li><i class="zmdi zmdi-star"></i></li>
                                    <li class="rating__opasity"><i class="zmdi zmdi-star"></i></li>
                                </ul>
                                <p>Thời gian giao : 25 min, Free Ship</p>
                                <div class="pp__food__bottom d-flex justify-content-between align-items-center">
                                    <div class="pp__btn">
                                        <a class="food__btn btn--transparent btn__hover--theme" href="#">Đặt ngay</a>
                                    </div>
                                    <ul class="pp__meta d-flex">
                                        <li><a href="#"><i class="zmdi zmdi-comment-outline"></i>03</a></li>
                                        <li><a href="#"><i class="zmdi zmdi-favorite-outline"></i>04</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Popular Food -->
            </div>
        </div>
    </section>
    <!-- End Popular Food Area -->

    <!-- Start Blog Area -->
    <section class="fb__blog__ara section-padding--lg bg--white blog--2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="col-lg-12 col-md-12">
                        <div class="section__title title__style--2 service__align--center">
                            <h2 class="title__line">Bài viết mới nhất</h2>
                            <p>Thơm ngon mời bạn ăn nha !</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt--40">
                <!-- Start Single Blog -->
                <div class="col-md-6 col-sm-12 col-lg-4 foo">
                    <div class="blog">
                        <div class="blog__thumb">
                            <a href="blog-details.html">
                                <img src="/assets_client/images/blog/md-blog/4.jpg" alt="blog images">
                            </a>
                        </div>
                        <div class="blog__details">
                            <h2><a href="blog-details.html">Maxican Food Fev</a></h2>
                            <span>1st Oct, 2o17</span>
                            <p>Món bánh mới nhất của B-restaurant được xem là best-seller của tháng này !!</p>
                            <div class="blog__btn">
                                <a class="food__btn grey--btn theme--hover" href="blog-details.html">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Start Single Blog -->
                <!-- Start Single Blog -->
                <div class="col-md-6 col-sm-12 col-lg-4 foo">
                    <div class="blog">
                        <div class="blog__thumb">
                            <a href="blog-details.html">
                                <img src="/assets_client/images/blog/md-blog/5.jpg" alt="blog images">
                            </a>
                        </div>
                        <div class="blog__details">
                            <h2><a href="blog-details.html">Italian Pizza Fev</a></h2>
                            <span>1st Oct, 2o17</span>
                            <p>Món bánh mới nhất của B-restaurant được xem là best-seller của tháng này !!</p>
                            <div class="blog__btn">
                                <a class="food__btn grey--btn theme--hover" href="blog-details.html">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Start Single Blog -->
                <!-- Start Single Blog -->
                <div class="col-md-6 col-sm-12 col-lg-4 foo">
                    <div class="blog">
                        <div class="blog__thumb">
                            <a href="blog-details.html">
                                <img src="/assets_client/images/blog/md-blog/6.jpg" alt="blog images">
                            </a>
                        </div>
                        <div class="blog__details">
                            <h2><a href="blog-details.html">Asian Food F</a></h2>
                            <span>1st Oct, 2o17</span>
                            <p>Món bánh mới nhất của B-restaurant được xem là best-seller của tháng này !!</p>
                            <div class="blog__btn">
                                <a class="food__btn grey--btn theme--hover" href="blog-details.html">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Start Single Blog -->
            </div>
        </div>
    </section>
    <!-- End Blog Area -->
    <!-- Start Testimonial Area -->
    <section class="food__testimonial__area testimonial--3 bg-image--13">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-9 col-sm-12">
                    <div class="testimonia__activation testimonia__activation--3 owl-carousel owl-theme">
                        <!-- Start Single Testimonial -->
                        <div class="testimonial-inner--3">
                            <div class="testimonial__inner">
                                <div class="testimonial__content">
                                   <p> Với món Salad đặc biệt sẽ mang tới lợi ích của việc ăn uống lành mạnh, kiểm soát được lượng calo in –
                                    calo out là “chìa khóa”
                                    giảm cân bền vững và duy trì cân nặng hợp lý.</p>
                                    <div class="test__info">
                                        <h4>Chuyên gia B-restaurant</h4>
                                        <span>Food Lovers</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Testimonial -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Testimonial Area -->
    <!-- Start Our Brand Area -->
    <div class="food__brand__area section-padding--lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="brand__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between pb--60">
                        <li><a href="#"><img src="/assets_client/images/brand/1.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="/assets_client/images/brand/2.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="/assets_client/images/brand/3.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="/assets_client/images/brand/4.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="/assets_client/images/brand/5.png" alt="brand images"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Our Brand Area -->
    <!-- Start Subscribe Area -->
    <section class="fd__subscribe__wrapper bg__cat--6 poss--relative">
        <div class="fd__subscribe__area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="subscribe__inner subscribe--3">
                            <h2>Hãy đóng góp ý kiến của bạn cho chúng tôi nhé !</h2>
                            <div id="mc_embed_signup">
                                <div id="enter__email__address">
                                    <form action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef"
                                        method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate"
                                        target="_blank" novalidate>
                                        <div id="mc_embed_signup_scroll" class="htc__news__inner">
                                            <div class="news__input">
                                                <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL"
                                                    placeholder="Enter Your E-mail Address" required>
                                            </div>
                                            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text"
                                                    name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                                            <div class="clearfix subscribe__btn"><input type="submit" value="Gửi" name="subscribe"
                                                    id="mc-embedded-subscribe" class="sign__up food__btn">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="subs__address__content d-flex justify-content-between">
                                <div class="subs__address d-flex">
                                    <div class="sbs__address__icon">
                                        <i class="zmdi zmdi-home"></i>
                                    </div>
                                    <div class="subs__address__details">
                                        <p>254 Nguyen Van Linh <br> Da Nang, Viet Nam</p>
                                    </div>
                                </div>
                                <div class="subs__address d-flex">
                                    <div class="sbs__address__icon">
                                        <i class="zmdi zmdi-phone"></i>
                                    </div>
                                    <div class="subs__address__details">
                                        <p><a href="#">+84 01673-453290</a></p>
                                        <p><a href="#">+88 01773-458290</a></p>
                                    </div>
                                </div>
                                <div class="subs__address d-flex">
                                    <div class="sbs__address__icon">
                                        <i class="zmdi zmdi-email"></i>
                                    </div>
                                    <div class="subs__address__details">
                                        <p><a href="#">brestaurt@email.com</a></p>
                                        <p><a href="#">bdelivery@email.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <span id="countCart"></span>
    <!-- End Subscribe Area -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#loginForm').submit(function(e) {
                e.preventDefault();
                let payLoad = window.getFormData($(this));
                axios
                    .post('/login', payLoad)
                    .then((res) => {
                        if (res.data.status == 1) {
                            toastr.success('Đã login thành công!');
                            setTimeout(() => {
                                window.location.href = "/home";
                            }, 1000);
                        } else if (res.data.status == 2) {
                            toastr.warning('Tài khoản chưa kích hoạt, vui lòng kiểm tra email!');
                        } else {
                            toastr.error('Đăng nhập thất bại! Kiểm tra email hoặc mật khẩu!');
                        }
                    })
                    .catch((res) => {
                        var listError = res.response.data.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    });
            });

            function prepareEmail(email) {
                if (email.indexOf("+") > 0) {
                    let first = email.substr(0, email.indexOf("+"));
                    let last = email.substr(email.indexOf('@'));
                    email = first.concat(last);
                }
                if (email.indexOf(".") > 0) {
                    let first = email.substr(0, email.indexOf("@"));
                    let last = email.substr(email.indexOf("@"));
                    first = first.split('.').join('');
                    email = first.concat(last);
                    console.log(email);
                }
                return email;
            }

            $('#registerForm').submit(function(e) {
                e.preventDefault();
                let payLoad = window.getFormData($(this));
                payLoad['email'] = prepareEmail(Object.values(payLoad)[0]);
                axios
                    .post('/register', payLoad)
                    .then((res) => {
                        console.log(res);
                        if (res.data.status) {
                            $("#registerForm").trigger("reset");
                            toastr.success('Đăng ký thành công! Vui lòng xem email để kích hoạt tài khoản');
                        }
                    })
                    .catch((res) => {
                        var listError = res.response.data.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    });
            });

            $('#registerButton').click(function() {
                window.location.href = "/register";
            });
            $('#loginButton').click(function() {
                window.location.href = "/login";
            });

            $(".addToCart").click(function(e) {
                e.preventDefault();
                let id_mon_an = $(this).data('id');
                axios
                    .get('/customer/cart/add-to-cart/' + id_mon_an)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.message);
                            $("#countCart").text(res.data.count);
                        } else {
                            toastr.error(res.data.message);
                        }
                    });
            });


        });
    </script>
@endsection
