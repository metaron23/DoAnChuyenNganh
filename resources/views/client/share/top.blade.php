<div id="app_miniCart">
    @if (isset($checkNav))

    @else
        {{$checkNav = ""}}
    @endif
    <header class="htc__header bg--white">
        <!-- Start Mainmenu Area -->
        <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-4 col-md-6 order-1 order-lg-1">
                        <div class="logo">
                            <a href="/home">
                                <img style="width:140x; height: 70px;" src="/assets_client/images/logo/foody3.png" alt="logo images">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-4 col-md-2 order-3 order-lg-2">
                        <div class="main__menu__wrap">
                            <nav class="main__menu__nav d-none d-lg-block">
                                <ul class="mainmenu">
                                    <li><a href="/home" id="home">Home</a>
                                    </li>
                                    <li><a href="/about" id="about">About</a>
                                    </li>
                                    <li><a href="/menu" id="menu">Menu</a>
                                    </li>
                                    <li><a href="/gallery" id="gallery">Gallery</a>
                                    </li>
                                    <li><a href="/blog" id="blog">Blog</a>
                                    </li>
                                    <li><a href="/contact" id="contact">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-1 col-sm-4 col-md-4 order-2 order-lg-3">
                        <div class="header__right d-flex justify-content-end">
                            <div class="log__in">
                                @if (Auth::guard('customer')->check())
                                    <img src="{{ Auth::guard('customer')->user()->anh_dai_dien }}" alt="" class="icon_login">
                                @else
                                    <a href="/login"><i class="zmdi zmdi-account-o"></i></a>
                                @endif
                                <ul class="dropdown__menu">
                                </ul>
                            </div>
                            <div class="shopping__cart">
                                <a class="minicart-trigger" href="" v-on:click="refreshCart"><i class="zmdi zmdi-shopping-basket"></i></a>
                                <div class="shop__qun">
                                    <span id="countCart">@{{ countCart }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu -->
                <div class="mobile-menu d-block d-lg-none"></div>
                <!-- Mobile Menu -->
            </div>
        </div>
        <!-- End Mainmenu Area -->
    </header>
    <!-- Login Form -->
    <div class="accountbox-wrapper">
        <div class="accountbox text-left">
            <ul class="nav accountbox__filters" id="myTab" role="tablist">
                <li>
                    <a class="active" id="log-tab" data-toggle="tab" href="#log" role="tab" aria-controls="log"
                        aria-selected="true">Login</a>
                </li>
                <li>
                    <a id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Register</a>
                </li>
            </ul>
            <div class="accountbox__inner tab-content" id="myTabContent">
                <div class="accountbox__login tab-pane fade show active" id="log" role="tabpanel" aria-labelledby="log-tab">
                    <form class="theme-form" id="loginForm">
                        <div class="single-input">
                            <input class="cr-round--lg" id="user_name" name="user_name" type="email" required="" placeholder="Nhập vào email">
                        </div>
                        <div class="single-input">
                            <div class="form-input position-relative">
                                <input class="cr-round--lg" type="password" autocomplete="on" name="password" required=""
                                    placeholder="Nhập vào mật khẩu">
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="checkbox p-0">
                                <input id="checkbox1" type="checkbox">
                                <label class="text-muted" for="checkbox1">Nhớ mật khẩu</label>
                                <a class="link" href="forget-password.html" style="float: right">Quên mật khẩu?</a>
                            </div>
                            <div class="text-end mt-3">
                                <button class="food__btn" type="submit">Đăng nhập</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="accountbox__register tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form class="form theme-form" id="registerForm">
                        <div class="single-input">
                            <input class="cr-round--lg" id="email" name="email" type="email" placeholder="Nhập vào Email">
                            <small style="font-weight:600" id="message_email"></small>
                        </div>
                        <div class="single-input">
                            <input class="cr-round--lg" id="ho_va_ten" name="ho_va_ten" type="text" placeholder="Nhập vào tên tài khoản">
                        </div>

                        <div class="single-input">
                            <input class="cr-round--lg" autocomplete="on" name="password" type="password" placeholder="Nhập vào mật khẩu">
                        </div>

                        <div class="single-input">
                            <input class="cr-round--lg" name="re_password" autocomplete="on" type="password" placeholder="Nhập lại mật khẩu">
                        </div>

                        <div class="single-input">
                            <input class="cr-round--lg" id="so_dien_thoai" name="so_dien_thoai" type="text"
                                placeholder="Nhập vào số điện thoại">
                            <small style="font-weight:600" id="message_so_dien_thoai"></small>
                        </div>
                        <div class="text-end mt-3">
                            <button class="food__btn" type="submit" id="createTaiKhoan" style="width:100%">Đăng ký</button>
                        </div>
                        <div class="text-end mt-3">
                            <button class="food__btn" type="reset" style="width:100%">Huỷ</button>
                        </div>
                    </form>
                </div>
                <span class="accountbox-close-button"><i class="zmdi zmdi-close"></i></span>
            </div>
        </div>
    </div>
    <!-- //Login Form -->
    <!-- Cartbox -->
    <div class="cartbox-wrap">
        <div class="cartbox text-right">
            <button class="cartbox-close"><i class="zmdi zmdi-close" v-on:click="loadCountCart"></i></button>
            <div class="cartbox__inner text-left">
                <div v-for="(value, key) in listCart" class="cartbox__items">
                    <!-- Cartbox Single Item -->
                    <div class="cartbox__item">
                        <div class="cartbox__item__thumb">
                            <a href="product-details.html">
                                <img v-bind:src="value.hinh_anh" alt="small thumbnail">
                            </a>
                        </div>
                        <div class="cartbox__item__content">
                            <h5><a href="product-details.html" class="product-name">@{{ value.ten_mon_an }}</a></h5>
                            <p>Qty: <span>@{{ value.so_luong_mua < 1 ? 0 : value.so_luong_mua }}</span></p>
                            <span class="price">@{{ (donGia(value.don_gia_khuyen_mai, value.don_gia_ban) * value.so_luong_mua).toLocaleString() }} VND</span>
                        </div>
                        <button class="cartbox__item__remove">
                            <i class="fa fa-trash" v-on:click.prevent="remove(value.id)"></i>
                        </button>
                    </div>
                </div>
                <div class="cartbox__total">
                    <ul>
                        <li><span class="cartbox__total__title">Subtotal</span><span class="price">@{{ total.toLocaleString() }} VND</span></li>
                        <li class="shipping-charge"><span class="cartbox__total__title">Shipping Charge</span><span class="price"></span></li>
                        <li class="grandtotal">Total<span class="price">@{{ total.toLocaleString() }} VND</span></li>
                    </ul>
                </div>
                <div class="cartbox__buttons">
                    <a class="food__btn" href="/customer/cart"><span>View cart</span></a>
                    <a class="food__btn" href="/customer/checkout"><span>Checkout</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //Cartbox -->
<script>
    new Vue({
        el: '#app_miniCart',
        data: {
            listCart: [],
            total: 0,
            countCart: 0,
        },
        created() {
            this.getData();
            this.totalCart();
            this.loadCountCart();
            this.addColorMenu();
        },
        methods: {
            getData() {
                axios
                    .get('/customer/cart/data')
                    .then((res) => {
                        if (res.data.data == undefined)
                            this.listCart = 0;
                        else
                            this.listCart = res.data.data;
                    });
            },
            donGia(x, y) {
                if (x == 0) {
                    return y;
                } else {
                    return x;
                }
            },
            remove(id) {
                axios
                    .get('/customer/cart/remove/' + id)
                    .then((res) => {
                        toastr.success('Xoá thành công!');
                        this.getData();
                        this.totalCart();
                        this.loadCountCart();
                    });
            },
            totalCart() {
                axios
                    .get('/customer/cart/total')
                    .then((res) => {
                        if (res.data.totalCart == undefined)
                            this.total = 0;
                        else
                            this.total = res.data.totalCart;
                    });
            },
            refreshCart() {
                this.getData();
                this.totalCart();
                this.loadCountCart();
            },
            loadCountCart() {
                axios
                    .get('/home/countCart')
                    .then((res) => {
                        this.countCart = res.data.countCart;
                        $('#countCart').html(this.countCart);
                    });
            },
            addColorMenu() {
                setTimeout(() => {
                    let check = {!! json_encode($checkNav, JSON_HEX_TAG) !!};
                    if (check == 'home') {
                        $('#home').css("color", "#d50c0d");
                    } else
                    if (check == 'about') {
                        $('#about').css("color", "#d50c0d");
                    } else
                    if (check == 'menu') {
                        $('#menu').css("color", "#d50c0d");
                    } else
                    if (check == 'gallery') {
                        $('#gallery').css("color", "#d50c0d");
                    } else
                    if (check == 'blog') {
                        $('#blog').css("color", "#d50c0d");
                    } else
                    if (check == 'contact') {
                        $('#contact').css("color", "#d50c0d");
                    };
                }, 500);
            },
        }
    });
</script>
