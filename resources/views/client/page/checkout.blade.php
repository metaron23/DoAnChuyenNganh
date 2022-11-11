@extends('client.share.master')

<head>
    <title>Thanh toán</title>
</head>
@section('content')
    <div class="ht__bradcaump__area bg-image--18">
        <div class="ht__bradcaump__wrap d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">Đặt Hàng</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="/home">Trang Chủ</a>
                                <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
                                <span class="breadcrumb-item active">Đặt Hàng</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="checkout">
        <section class="htc__checkout bg--white section-padding--lg">
            <!-- Checkout Section Start-->
            <div class="checkout-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-12 mb-30">
                            <!-- Checkout Accordion Start -->
                            <div id="checkout-accordion">
                                <!-- Shipping Method -->
                                <div class="single-accordion">
                                    <form id="form-order">
                                        <a class="accordion-head collapsed" data-toggle="collapse" data-parent="#checkout-accordion"
                                            href="#shipping-method">
                                            1. Thông tin nhận hàng
                                        </a>
                                        <div id="shipping-method" class="collapse">
                                            <div class="accordion-body shipping-method fix">
                                                <h5>Đia chỉ giao hàng</h5>
                                                <div class="row mb-4 form-address">
                                                    <div class="col-sm-6">
                                                        <input name="ten_ship" readonly id="ten_ship" type="text" placeholder="Tên người nhận"
                                                            value="{{ Auth::guard('customer')->user()->ho_va_ten }}">
                                                    </div>
                                                    <div class="col-sm-6 mb-2">
                                                        <input name="phone_ship" readonly id="phone_ship" type="text"
                                                            placeholder="Số điện thoại người nhận"
                                                            value="{{ Auth::guard('customer')->user()->so_dien_thoai }}">
                                                    </div>
                                                    <div class="col-12">
                                                        <textarea name="dia_chi_ship" readonly id="dia_chi_ship" cols="30" rows="2" placeholder="Địa chỉ người nhận">{{ Auth::guard('customer')->user()->dia_chi }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input class="" type="radio" name="address" id="homeAddress" value="homeAddress" checked>
                                                        <label for="homeAddress">Địa chỉ nhà?</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input class="ml-4" type="radio" name="address" id="recentAddress" value="recentAddress">
                                                        <label for="recentAddress">Địa chỉ đặt gần đây?</label>
                                                    </div>
                                                    <div class="col-md-6 mt-2">
                                                        <div class="food__btn">Sửa</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Xác nhận đặt hàng?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Bạn đã điền đúng thông tin giao hàng và xác nhận đúng danh sách các món ăn?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn-order btn-canceled" data-dismiss="modal">Đóng</button>
                                                        <button type="submit" class="btn-order btn-default">Đặt Hàng</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- Payment Method -->
                                <div class="single-accordion">
                                    <a class="accordion-head collapsed" data-toggle="collapse" data-parent="#checkout-accordion" href="#payment-method">2.
                                        Phương thức thanh toán</a>
                                    <div id="payment-method" class="collapse">
                                        <div class="accordion-body payment-method fix">
                                            <ul class="payment-method-list">
                                                <li class="active" id="payment_atHome">Thanh toán khi nhận hàng</li>
                                                <li class="payment-form-toggle" id="payment_online">Online</li>
                                            </ul>
                                            <form action="#" class="payment-form" style="margin-top:16px">
                                                <div class="row">
                                                    <div class="input-box col-12 mb--20">
                                                        <label for="card-name">Tên thẻ*</label>
                                                        <input type="text" id="card-name">
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Order Details -->
                        <div class="col-lg-6 col-12 mb-30">
                            <div class="order-details-wrapper">
                                <h2>Đơn hàng của bạn</h2>
                                <div class="order-details">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('client.share.footer')
@endsection

@section('js')
    <script src="/js/client/checkout.js"></script>
@endsection
