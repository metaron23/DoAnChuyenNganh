$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
toastr.options = {
    "timeOut": "3000",
    'progressBar': true,
};
window.onload = function () {
    $('#loginForm').submit(function (e) {
        e.preventDefault();
        let payLoad = window.getFormData($(this));
        axios
            .post('/login', payLoad)
            .then((res) => {
                if (res.data.status == 1) {
                    toastr.success('Đã login thành công!');
                    setTimeout(() => {
                        window.location.href = window.location.pathname;
                    }, 1000);
                } else if (res.data.status == 2) {
                    toastr.warning('Tài khoản chưa kích hoạt, vui lòng kiểm tra email!');
                } else {
                    toastr.error('Đăng nhập thất bại! Kiểm tra email hoặc mật khẩu!');
                }
            })
            .catch((res) => {
                var listError = res.response.data.errors;
                $.each(listError, function (key, value) {
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

    $('#registerForm').submit(function (e) {
        e.preventDefault();
        let payLoad = window.getFormData($(this));
        payLoad['email'] = prepareEmail(Object.values(payLoad)[0]);
        axios
            .post('/register', payLoad)
            .then((res) => {
                if (res.data.status) {
                    $("#registerForm").trigger("reset");
                    toastr.success('Đăng ký thành công! Vui lòng xem email để kích hoạt tài khoản');
                }
            })
            .catch((res) => {
                var listError = res.response.data.errors;
                $.each(listError, function (key, value) {
                    toastr.error(value[0]);
                });
            });
    });

    $('#registerButton').click(function () {
        window.location.href = "/register";
    });
    $('#loginButton').click(function () {
        window.location.href = "/login";
    });
    setTimeout(() => {
        document.getElementById('load').style.visibility = "hidden";
        document.getElementById('contents').style.visibility = "visible";
    }, 1000);
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
        content += "<div style='height:326px; overflow:auto'>";
        carts.forEach(cart => {
            content += `<div class="cartbox__item">`;
            content += `<div class="cartbox__item__thumb">`;
            content += `<a href="/menu/detailFood/` + cart.id_mon_an + `">`;
            content += `<img src="` + cart.hinh_anh + `" alt="small thumbnail" data-id="` + cart.id + `">`;
            content += `</a>`
            content += `</div>`
            content += `<div class="cartbox__item__content">`
            content += `<h5><a href="/menu/detailFood/` + cart.id_mon_an + `" class="product-name" data-id="` + cart.id + `">` +
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
        content += `</div>`;
        content += `<div class="cartbox__total">`;
        content += `<ul>`;
        content += `<li class="grandtotal">Tổng tiền<span class="price">
                                        ` + total.toLocaleString() + ` VND</span></li>`;
        content += `</ul>`;
        $('.shop__qun').html('<span id="countCart">' + countCart + '</span>');
        return content;
    }

    $('body').on('click', '.cartbox__item__remove', function () {
        let id = $(this).data('id');
        axios
            .get('/customer/cart/remove/' + id)
            .then((res) => {
                toastr.success('Xoá thành công!');
                getDataMiniCart();
            });
    });
    $('body').on('click', '.minicart-trigger', function () {
        getDataMiniCart();
    });

    function addColorMenu() {
        console.log(check);
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
};
