@extends('client.share.master')

@section('content')
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area bg-image--24">
        <div class="ht__bradcaump__wrap d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="bradcaump__inner text-center brad__white">
                            <h2 class="bradcaump-title">Liên hệ</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="/home">Trang chủ</a>
                                <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
                                <span class="breadcrumb-item active">liên hệ</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- Start Contact Map -->
    <div class="contact__map__area">
        <div class="contact__map__wrapper">
            <div class="contact__map__left">
                <div class="map__thumb">
                    <img src="images/banner/contact/1.jpg" alt="images">
                </div>
            </div>
            <div class="contact__map__right">
                <div class="htc__google__map">
                    <div class="map-contacts">
                        <div id="googlemap"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Map -->
    <!-- Start Address -->
    <div class="food__contact">
        <div class="food__contact__wrapper d-flex flex-wrap flex-lg-nowrap">
            <!-- Start Single Contact -->
            <div class="contact">
                <div class="ct__icon">
                    <i class="zmdi zmdi-phone"></i>
                </div>
                <div class="ct__address">
                    <p><a href="#">+84 01673 453290</a></p>
                    <p><a href="#">+84 01773 453290</a></p>
                </div>
            </div>
            <!-- End Single Contact -->
            <!-- Start Single Contact -->
            <div class="contact">
                <div class="ct__icon">
                    <i class="zmdi zmdi-home"></i>
                </div>
                <div class="ct__address">
                    <p>254 Nguyễn văn Linh<br> Đà Nẵng, Việt Nam</p>
                </div>
            </div>
            <!-- End Single Contact -->
            <!-- Start Single Contact -->
            <div class="contact">
                <div class="ct__icon">
                    <i class="zmdi zmdi-email"></i>
                </div>
                <div class="ct__address">
                    <p><a href="#">brestaurant@gmail.com</a></p>
                    <p><a href="#">bdelivery@email.com</a></p>
                </div>
            </div>
            <!-- End Single Contact -->
        </div>
    </div>
    <!-- End Address -->
    <section class="food__contact__form bg--white section-padding--lg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__wrap">
                        <h2>Bạn hãy điền thông tin để gửi liên lạc cho B-restaurant</h2>
                        <div class="contact__form__inner">
                            <form id="contact-form" action="https://demo.hasthemes.com/aahar-preview/aahar/mail.php" method="post">
                                <div class="single-contact-form">
                                    <div class="contact-box name d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">
                                        <input type="text" name="name" placeholder="Họ tên">
                                        <input type="email" name="email" placeholder="Email">
                                        <input type="text" name="phone" placeholder="Số điện thoại">
                                    </div>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box message">
                                        <textarea name="message" placeholder="Nội dung*"></textarea>
                                    </div>
                                </div>
                                <div class="contact-btn">
                                    <button type="submit" class="food__btn">Gửi</button>
                                </div>
                            </form>
                        </div>
                        <div class="form-output">
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Start Footer Area -->
    @include('client.share.footer')
@endsection


@section('js')
@endsection
