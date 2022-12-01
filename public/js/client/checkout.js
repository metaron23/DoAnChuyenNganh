$(document).ready(function () {
    function createData(foodCarts) {
        let content = "";
        content += `<ul>`;
        content += `<li>`;
        content += `<p class="strong">Món ăn</p>`;
        content += `</li>`;
        let total = 0;
        foodCarts.forEach(foodCart => {
            content += `<div>`;
            content += `<li>`;
            content += `<p>` + foodCart.ten_mon_an + ` x ` + foodCart.so_luong_mua + `</p>`;
            content += `<p>` + foodCart.don_gia_mua.toLocaleString() + `VND</p>`;
            content += `</li>`;
            content += `</div>`;
            total += foodCart.so_luong_mua * foodCart.don_gia_mua;
        });
        content += `<li>`;
        content += `<p class="strong">THÀNH TIỀN</p>`;
        content += `<p class="strong">` + total.toLocaleString() + ` VND</p>`;
        content += `</li>`;
        content += `<li>`;
        content += `<p class="strong">MÃ GIẢM GIÁ</p>`;
        content += `<p>0</p>`;
        content += `</li>`;
        content += `<li>`;
        content += `<p class="strong">TỔNG TIỀN</p>`;
        content += `<p class="strong">` + total.toLocaleString() + ` VND</p>`;
        content += `</li>`;
        content += `<li><button class="food__btn" data-toggle="modal" data-target="#exampleModal">Xác nhận đặt</button></li>`;
        content += `</ul>`;
        return content;
    }
    function getData() {
        axios
            .get('/customer/checkout/getData')
            .then((res) => {
                $('.order-details').html(createData(res.data.listCart));
            });
    }
    getData();

    function createFormAddress(ho_va_ten, so_dien_thoai, dia_chi) {
        let content = "";
        content += `<div class="col-sm-6">`;
        content += `<input name="ten_ship" readonly id="ten_ship" type="text" placeholder="Tên người nhận"`;
        content += `value="` + ho_va_ten + `">`;
        content += `</div>`;
        content += `<div class="col-sm-6 mb-2">`;
        content += `<input name="phone_ship" readonly id="phone_ship" type="text" placeholder="Số điện thoại người nhận"`;
        content += `value = "` + so_dien_thoai + `" >`;
        content += `</div>`;
        content += `<div class="col-12">`;
        content += `<textarea name="dia_chi_ship" readonly id="dia_chi_ship" cols="30" rows="2" placeholder="Địa chỉ người nhận">` + dia_chi + `</textarea>`;
        content += `</div>`;
        return content;
    }

    $('.accordion-body input[type="radio"]').click(function () {
        axios
            .get('/customer/checkout/getData')
            .then((res) => {
                if ($(this).val() == 'homeAddress') {
                    $('.accordion-body .form-address').html(createFormAddress(res.data.user.ho_va_ten, res.data.user.so_dien_thoai, res.data.user.dia_chi));
                } else {
                    $('.accordion-body .form-address').html(createFormAddress(res.data.recentInvoice.ten_ship, res.data.recentInvoice.phone_ship, res.data.recentInvoice.dia_chi_ship));
                }
            });
    });

    $('body').on('click', '.accordion-body .food__btn', function () {
        $('.form-address input').removeAttr('readonly');
        $('.form-address textarea').removeAttr('readonly');
    });

    $('body').on('submit', '#form-order', function (e) {
        e.preventDefault();
        let payLoad = window.getFormData($(this));
        payLoad['trang_thai_thanh_toan'] = 0;
        axios
            .post('/customer/checkout/finish', payLoad)
            .then((res) => {
                if (res.data.status) {
                    toastr.success(res.data.message);
                    getData();
                } else {
                    toastr.error(res.data.message);
                }
            })
            .catch((res) => {
                var listError = res.response.data.errors;
                $.each(listError, function (key, value) {
                    toastr.error(value[0]);
                });
            });
        $('.btn-order.btn-canceled').click();
    });
});

