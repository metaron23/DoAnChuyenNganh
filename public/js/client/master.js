var check = "";
window.onload = function () {
    setTimeout(() => {
        document.getElementById('load').style.visibility = "hidden";
        document.getElementById('contents').style.visibility = "visible";
    }, 800);
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
