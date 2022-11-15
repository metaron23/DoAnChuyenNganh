    @if (!isset($checkNav))
        {{ $checkNav = '' }}
    @endif
    <header class="htc__header bg--white">
        <!-- Start Mainmenu Area -->
        <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
            <div class="container">
                <div class="row">
                    <div class="mt-3">
                        <div class="icon-toggle">
                            <a  href="javascript:void(0);" onclick="toggleMenu()">
                                <i class="fa-solid fa-bars" ></i>
                            </a>
                    </div>

                    </div>
                    <div class="col-lg-2 col-sm-2 col-md-6 order-1 order-lg-1">
                        <div class="logo">
                            <a href="/home">
                                <img style=" height: 70px;" src="/assets_client/images/logo/foody4.png" alt="logo images">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-sm-4 col-md-2 order-3 order-lg-2">
                        <div class="main__menu__wrap">
                            <nav class="main__menu__nav d-none d-lg-block">
                                <ul class="mainmenu">
                                    <li><a href="/home" id="home">Trang Chủ</a>
                                    </li>
                                    <li><a href="/menu" id="menu">Thực đơn</a>
                                    </li>
                                    <li><a href="/about" id="about">Thông tin</a>
                                    </li>
                                    <li><a href="/gallery" id="gallery">Hình Ảnh</a>
                                    </li>
                                    <li><a href="/blog" id="blog">Bài viết</a>
                                    </li>
                                    <li><a href="/contact" id="contact">Liên hệ</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="col-lg-1 col-sm-4 col-md-4 order-2 order-lg-3">
                        <div class="header__right d-flex justify-content-end">
                            @if (Auth::guard('customer')->check())
                                <div class="log__in">
                                    <img src="{{ Auth::guard('customer')->user()->anh_dai_dien }}" alt="" class="icon_login">
                                    <p class="typed-out">{{ Auth::guard('customer')->user()->ho_va_ten }}</p>
                                    <ul class="dropdown__menu">
                                        <a class='drop-link' href="/customer/account">
                                            <div class="icon-drop">
                                                <i class="fa-solid fa-user"></i>
                                            </div>
                                            <span>Quản lí tài khoản</span>
                                        </a>
                                        <a class='drop-link' href="/customer/order">
                                            <div class="icon-drop">
                                                <i class="fa-solid fa-mug-saucer"></i>
                                            </div>
                                            <span>Quản lí đơn hàng</span>
                                        </a>
                                        <a class='drop-link' href="/customer/cart">
                                            <div class="icon-drop">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                            </div>
                                            <span>Quản lí giỏ hàng</span>
                                        </a>
                                        <a class='drop-link' href="/logout" id="logout_home">
                                            <div class="icon-drop">
                                                <i class="fa-solid fa-right-to-bracket"></i>
                                            </div>
                                            <span>Đăng xuất</span>
                                        </a>
                                    </ul>
                                </div>
                                <div class="shopping__cart">
                                    <a class="minicart-trigger" href=""><i class="zmdi zmdi-shopping-basket"></i></a>
                                    <div class="shop__qun">
                                    </div>
                                </div>
                                @else
                                <div class="log__in">
                                    <a href="/login"><i class="zmdi zmdi-account-o"></i></a>
                                </div>
                                <div class="shopping__cart">
                                    <a class="minicart-trigger" href=""><i class="zmdi zmdi-shopping-basket"></i></a>
                                    <div class="shop__qun">
                                        <span id="countCart">0</span>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Mobile Menu -->

                <!-- Mobile Menu -->
            </div>
            <div  class="mobile-menu-2">
                <div class="main__mobile">
                        <ul class="mainmobile" onclick="myanimation()" id="nav-mobile">
                            <li><a href="/home" id="home">Trang Chủ</a>
                            </li>
                            <li><a href="/menu" id="menu">Thực đơn</a>
                            </li>
                            <li><a href="/about" id="about">Thông tin</a>
                            </li>
                            <li><a href="/gallery" id="gallery">Hình Ảnh</a>
                            </li>
                            <li><a href="/blog" id="blog">Bài viết</a>
                            </li>
                            <li><a href="/contact" id="contact">Liên hệ</a>
                            </li>
                        </ul>
                </div>
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
            <button class="cartbox-close"><i class="zmdi zmdi-close"></i></button>
            <div class="cartbox__inner text-left">
                <div class="cartbox__items">
                </div>
                <div class="cartbox__buttons">
                    <a class="food__btn" href="/customer/cart"><span>Xem giỏ hàng</span></a>
                    <a class="food__btn" href="/customer/checkout"><span>Đặt hàng</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- //Cartbox -->
    <script>
        function toggleMenu() {
            var x = document.getElementById("nav-mobile");
            const animation = document.getElementById("nav-mobile")
            if(x.style.display == "none"){
                x.style.display = "block";
            }else{
                x.style.display = "none";

            //    return x.style.display
            }
        }
    </script>
    <script>
        function myanimtion(){
            document.getElementById("nav-mobile").style.animation = "myAnimation";
        }
    </script>
    <script>

        setTimeout(() => {
            $(document).ready(function() {
                function getDataMiniCart() {
                    axios
                        .get('/customer/cart/data')
                        .then((res) => {
                            if (res.data.status) {
                                $('.cartbox__items').html("");
                                $('.cartbox__items').prepend(createMiniCart(res.data.cart));
                            }
                        });
                }
                getDataMiniCart();

                function createMiniCart(carts) {
                    let content = "";
                    let total = 0;
                    let countCart = 0;
                    carts.forEach(cart => {
                        content += `<div class="cartbox__item">`;
                        content += `<div class="cartbox__item__thumb">`;
                        content += `<a href="product-details.html">`;
                        content += `<img src="` + cart.hinh_anh + `" alt="small thumbnail" data-id="` + cart.id + `">`;
                        content += `</a>`
                        content += `</div>`
                        content += `<div class="cartbox__item__content">`
                        content += `<h5><a href="product-details.html" class="product-name" data-id="` + cart.id + `">` +
                            cart.ten_mon_an + `</a></h5>`;
                        content += `<p>Số lượng: <span>` + cart.so_luong_mua + `</span></p>`
                        content += `<span class="price">` +
                            cart.don_gia_mua.toLocaleString() + ` VND
                                    </span>`;
                        content += `</div>`;
                        content += `<button class="cartbox__item__remove" data-id="` + cart.id + `">`;
                        content += `<i class="fa fa-trash"></i>`;
                        content += `</button>`;
                        content += `</div>`;
                        total += cart.don_gia_mua;
                        countCart += 1;
                    });
                    content += `</div>`;
                    content += `<div class="cartbox__total">`;
                    content += `<ul>`;
                    content += `<li><span class="cartbox__total__title">Tổng tiền</span><span class="price">
                                ` + total.toLocaleString() + ` VND</span></li>`;
                    content += `<li class="shipping-charge"><span class="cartbox__total__title">Phí giao hàng</span>
                                    <span class="price">0</span></li>`;
                    content += `<li class="grandtotal">Thành tiền<span class="price">
                                        ` + total.toLocaleString() + ` VND</span></li>`;
                    content += `</ul>`;
                    $('.shop__qun').html('<span id="countCart">' + countCart + '</span>');
                    return content;
                }

                $('body').on('click', '.cartbox__item__remove', function() {
                    let id = $(this).data('id');
                    axios
                        .get('/customer/cart/remove/' + id)
                        .then((res) => {
                            toastr.success('Xoá thành công!');
                            getDataMiniCart();
                        });
                });
                $('body').on('click', '.minicart-trigger', function() {
                    getDataMiniCart();
                });

                function addColorMenu() {
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
                };
                addColorMenu();
            });
        }, 400);

    </script>
