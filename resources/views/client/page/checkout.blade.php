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
                            <h2 class="bradcaump-title">Thanh toán</h2>
                            <nav class="bradcaump-inner">
                                <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
                                <a class="breadcrumb-item" href="/customer/cart">Đơn hàng</a>
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
                                    <a class="accordion-head collapsed" data-toggle="collapse" data-parent="#checkout-accordion"
                                        href="#shipping-method">1. Thông tin nhận hàng</a>
                                    <div id="shipping-method" class="collapse">
                                        <div class="accordion-body shipping-method fix">
                                            <h5>Đia chỉ giao hàng</h5>
                                            <p id="address_new">@{{ listInfoUser.dia_chi }}</p>
                                            <button class="shipping-form-toggle" v-on:click="showFormAddress()" style="margin-top:16px">Thay đổi địa chỉ giao hàng ?</button>
                                            <form action="#" class="shipping-form checkout-form">
                                                <div class="row">
                                                    <div class="col-12 mb--20">
                                                        <input id="ten_ship" type="text" placeholder="Tên người nhận"
                                                            v-model="listInfoUser.ho_va_ten">
                                                    </div>
                                                    <div class="col-12 mb--20">
                                                        <input id="phone_ship" type="text" placeholder="Số điện thoại người nhận"
                                                            v-model="listInfoUser.so_dien_thoai">
                                                    </div>
                                                    <div class="col-12 mb--20">
                                                        <textarea id="dia_chi_ship" cols="30" rows="10" placeholder="Địa chỉ người nhận" v-model="listInfoUser.dia_chi"></textarea>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Payment Method -->
                                <div class="single-accordion">
                                    <a class="accordion-head collapsed" data-toggle="collapse" data-parent="#checkout-accordion" href="#payment-method">2.
                                        Phương thức thanh toán</a>
                                    <div id="payment-method" class="collapse">
                                        <div class="accordion-body payment-method fix">

                                            <ul class="payment-method-list">
                                                <li class="active" v-on:click="showFormPayment()" id="payment_atHome">Thanh toán khi nhận hàng</li>
                                                <li class="payment-form-toggle" v-on:click="showFormPayment()" id="payment_online">Online</li>
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

                            </div><!-- Checkout Accordion Start -->
                        </div>

                        <!-- Order Details -->
                        <div class="col-lg-6 col-12 mb-30">

                            <div class="order-details-wrapper">
                                <h2>Đơn hàng của bạn</h2>
                                <div class="order-details">
                                    <form action="#">
                                        <ul>
                                            <li>
                                                <p class="strong">Món ăn</p>
                                            </li>
                                            <div v-for="(value, key) in listCart">
                                                <li>
                                                    <p>@{{ value.ten_mon_an }} x @{{ value.so_luong_mua }}</p>
                                                    <p>@{{ value.don_gia_mua.toLocaleString() }} VND</p>
                                                </li>
                                            </div>
                                            <li>
                                                <p class="strong">THÀNH TIỀN</p>
                                                <p class="strong">@{{ total.toLocaleString() }} VND</p>
                                            </li>
                                            <li>
                                                <p class="strong">MÃ GIẢM GIÁ</p>
                                                <p>0</p>
                                            </li>
                                            <li>
                                                <p class="strong">TỔNG TIỀNL</p>
                                                <p class="strong">@{{ total.toLocaleString() }} VND</p>
                                            </li>
                                            <li><button class="food__btn" v-on:click="paymentSuccess()">Xác nhận đặt</button></li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
<script src="/js/client/checkout.js"></script>
@endsection
