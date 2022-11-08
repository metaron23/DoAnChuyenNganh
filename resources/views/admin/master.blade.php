<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.share.head')
</head>

<body>
    <div id="load"></div>
    <div id="contents">
        <!-- tap on top starts-->
        <div class="tap-top"><i data-feather="chevrons-up"></i></div>
        <!-- tap on tap ends-->
        <!-- page-wrapper Start-->
        <div class="page-wrapper compact-sidebar" id="pageWrapper">
            <!-- Page Header Start-->
            @include('admin.share.top')
            <!-- Page Header Ends-->
            <!-- Page Body Start-->
            <div class="page-body-wrapper">
                <!-- Page Sidebar Start-->
                @include('admin.share.menu')
                <!-- Page Sidebar Ends-->
                <div class="page-body">
                    <!-- Container-fluid starts-->
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                    <!-- Container-fluid Ends-->
                </div>
                <!-- footer start-->
                @include('admin.share.foot')
            </div>
        </div>
        @include('admin.share.bottom')
    </div>
    <script src="\js\app.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        document.onreadystatechange = function() {
            var state = document.readyState;
            if (state == 'complete') {
                document.getElementById('load').style.visibility = "hidden";
                document.getElementById('contents').style.visibility = "visible";
            }
        }
        $(document).ready(function() {
            let check = {!! json_encode($checkMenu, JSON_HEX_TAG) !!};
            let menuList = $('.sidebar-main .sidebar-list');
            for (const child of menuList) {
                if (child.getAttribute('data-id') == check) {
                    child.classList.add('active_background_menu');
                    $('.sidebar-main .sidebar-list[data-id="'+check+'"]>a i').addClass('active_color_menu');
                    $('.sidebar-main .sidebar-list[data-id="'+check+'"]>a span').addClass('active_color_menu');
                }
            }
        });
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

    @yield('js')
</body>

</html>
