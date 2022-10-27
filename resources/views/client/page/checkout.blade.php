@extends('client.share.master')

@section('content')
    <div class="ht__bradcaump__area bg-image--18">
        <div class="ht__bradcaump__wrap d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">CHECKOUT</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="index.html">home</a>
                                <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
                                <span class="breadcrumb-item active">CHECKOUT</span>
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
                                        href="#shipping-method">1. Shipment Details</a>
                                    <div id="shipping-method" class="collapse">
                                        <div class="accordion-body shipping-method fix">
                                            <h5>Delivery address</h5>
                                            <p id="address_new">@{{ listInfoUser.dia_chi }}</p>
                                            <button class="shipping-form-toggle" v-on:click="showFormAddress()" style="margin-top:16px">Change of Other Address?</button>
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
                                        Payment methods</a>
                                    <div id="payment-method" class="collapse">
                                        <div class="accordion-body payment-method fix">

                                            <ul class="payment-method-list">
                                                <li class="active" v-on:click="showFormPayment()" id="payment_atHome">Payment on delivery</li>
                                                <li class="payment-form-toggle" v-on:click="showFormPayment()" id="payment_online">Online</li>
                                            </ul>

                                            <form action="#" class="payment-form" style="margin-top:16px">
                                                <div class="row">
                                                    <div class="input-box col-12 mb--20">
                                                        <label for="card-name">Name on Card *</label>
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
                                <h2>Your Order</h2>
                                <div class="order-details">
                                    <form action="#">
                                        <ul>
                                            <li>
                                                <p class="strong">Foods</p>
                                            </li>
                                            <div v-for="(value, key) in listCart">
                                                <li>
                                                    <p>@{{ value.ten_mon_an }} x @{{ value.so_luong_mua }}</p>
                                                    <p>@{{ value.don_gia_mua.toLocaleString() }} VND</p>
                                                </li>
                                            </div>
                                            <li>
                                                <p class="strong">CART SUBTOTAL</p>
                                                <p class="strong">@{{ total.toLocaleString() }} VND</p>
                                            </li>
                                            <li>
                                                <p class="strong">Discount Code</p>
                                                <p>0</p>
                                            </li>
                                            <li>
                                                <p class="strong">ORDER TOTAL</p>
                                                <p class="strong">@{{ total.toLocaleString() }} VND</p>
                                            </li>
                                            <li><button class="food__btn" v-on:click="paymentSuccess()">place order</button></li>
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
    <script>
        new Vue({
            el: '#checkout',
            data: {
                listInfoUser: [],
                listCart: [],
                total: 0,
                attr: {
                    display_block: 'display:block',
                },
                addressNew: "",
                statusPayment: 0,
            },
            created() {
                this.getData();
            },
            methods: {
                getData() {
                    axios
                        .get('/customer/checkout/getData')
                        .then((res) => {
                            this.listInfoUser = res.data.user;
                            this.listCart = res.data.listCart;
                            this.total = res.data.totalCart;
                        });
                },
                showFormAddress() {
                    if ($('.checkout-form.shipping-form').css("display") == "none")
                        $('.checkout-form.shipping-form').css("display", "block");
                    else
                        $('.checkout-form.shipping-form').css("display", "none");
                },
                showFormPayment() {
                    if ($('.payment-form').css("display") == "none") {
                        $('.payment-form').css("display", "block");
                        $('#payment_atHome').removeClass('active');
                        $('#payment_online').addClass('active');
                        this.statusPayment = true;
                    } else {
                        $('.payment-form').css("display", "none");
                        $('#payment_atHome').addClass('active');
                        $('#payment_online').removeClass('active');
                        this.statusPayment = false;
                    }
                },
                paymentSuccess() {
                    let payLoad = {
                        'ten_ship': this.listInfoUser.ho_va_ten,
                        'phone_ship': this.listInfoUser.so_dien_thoai,
                        'dia_chi_ship': this.listInfoUser.dia_chi,
                        'trang_thai_thanh_toan': this.statusPayment,
                    };
                    axios
                        .post('/customer/checkout/finish', payLoad)
                        .then((res) => {
                            if (res.data.status) {
                            }
                        })
                        .catch((res) => {
                            var listError = res.response.data.errors;
                            $.each(listError, function(key, value) {
                                toastr.error(value[0]);
                            });
                        });
                },
            },
        });
    </script>
@endsection
