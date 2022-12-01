$(document).ready(function () {
    function getData() {
        axios
            .get('/customer/order/get-data')
            .then((res) => {
                $('#newOrders .card-body .row').html("");
                $('#shippingOrders .card-body .row').html("");
                $('#shippedOrders .card-body .row').html("");
                $('#cancelledOrders .card-body .row').html("");
                res.data.donHang.forEach(order => {
                    if (order.trang_thai_don_hang == 0) {
                        $('#newOrders .card-body .row').prepend(createOrderItem(order, 'secondary', 'Đang Chờ Xử Lý'));
                    } else if (order.trang_thai_don_hang == 1) {
                        $('#shippingOrders .card-body .row').prepend(createOrderItem(order, 'primary', 'Đang Vận Chuyển'));
                    } else if (order.trang_thai_don_hang == 2) {
                        $('#shippedOrders .card-body .row').prepend(createOrderItem(order, 'success', 'Đã Giao Hàng'));
                    } else {
                        $('#cancelledOrders .card-body .row').prepend(createOrderItem(order, 'danger', 'Đã Huỷ'));
                    }
                });
                $('#newOrders').css('display', 'block');
                $('.container .cart__btn__list>li a[data-id="0"]').css({ 'color': '#fff', 'background-color': '#7ec680' });
                $('#shippingOrders').css('display', 'none');
                $('#shippedOrders').css('display', 'none');
                $('#cancelledOrders').css('display', 'none');

            });
    };
    getData();
    function createOrderItem(order, status, text) {
        let content = "";

        content += `<div class="col-xxl-6 col-md-6">`;
        content += `<div class="prooduct-details-box">`;
        content += `<div class="media">`;
        content += `<a href="#" data-toggle="modal" data-target=".detailOrderModal" data-id="` + order.id + `">
        <img class="align-self-center img-fluid img ml-3" style="height: 100px; width:160px; object-fit:cover" src="` +
            order.food[0].hinh_anh + `" alt="#"></a>`;
        content += `<div class="media-body ms-3">`;
        content += `<div class="product-name d-flex justify-content-between mb-1">`;
        content += `<h5><a href="#" data-toggle="modal" data-target=".detailOrderModal" data-id="` + order.id + `">` + order.food[0].ten_mon_an + `</a>`;
        content += `</h5>`;
        if (order.trang_thai_don_hang == 0) {
            content += `<a href="#" class=""><i class="fa-solid fa-xmark mr-3 h4" data-id=` + order.id + `></i></a>`;
        }
        content += `</div>`;
        content += `<div class="rating mb-1"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                            class="fa fa-star"></i><i class="fa fa-star"></i></div>`;
        content += `<div class="price d-flex mb-1">`;
        content += `<div class="text-muted me-2 mr-1">Tổng Tiền: </div><b>` + order.tong_tien.toLocaleString() + ` VND</b>`;
        content += `</div>`;
        content += `<div class="avaiabilty">`;
        content += `<div class="text-success d-inline-flex align-items-center"><b>` + (order.trang_thai_thanh_toan == 0 ? 'Chưa Thanh Toán' : 'Đã Thanh Toán') +
            `</b></div>`;
        content += `<a class="alert bg-` + status + ` btn-xs mr-3" href="#" data-bs-original-title="" title=""
                            style="pointer-events: none;cursor:default;font-size:12px">`+ text + `</a>`;
        content += `</div>`;
        content += `</div>`;
        content += `</div>`;
        content += `</div>`;
        content += `</div>`;
        return content;
    }
    $('.cart__btn__list a').click(function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        if (id == 0) {
            $('.container .cart__btn__list>li a').css({ 'background-color': '', 'color': '' });
            $('#newOrders').css('display', 'block');
            $('.container .cart__btn__list>li a[data-id="0"]').css({ 'color': '#fff', 'background-color': '#7ec680' });
            $('#shippingOrders').css('display', 'none');
            $('#shippedOrders').css('display', 'none');
            $('#cancelledOrders').css('display', 'none');
        } else if (id == 1) {
            $('.container .cart__btn__list>li a').css({ 'background-color': '', 'color': '' });
            $('#shippingOrders').css('display', 'block');
            $('.container .cart__btn__list>li a[data-id="1"]').css({ 'color': '#fff', 'background-color': '#7ec680' });
            $('#newOrders').css('display', 'none');
            $('#shippedOrders').css('display', 'none');
            $('#cancelledOrders').css('display', 'none');
        } else if (id == 2) {
            $('.container .cart__btn__list>li a').css({ 'background-color': '', 'color': '' });
            $('#shippedOrders').css('display', 'block');
            $('.container .cart__btn__list>li a[data-id="2"]').css({ 'color': '#fff', 'background-color': '#7ec680' });
            $('#shippingOrders').css('display', 'none');
            $('#newOrders').css('display', 'none');
            $('#cancelledOrders').css('display', 'none');
        } else {
            $('.container .cart__btn__list>li a').css({ 'background-color': '', 'color': '' });
            $('#cancelledOrders').css('display', 'block');
            $('.container .cart__btn__list>li a[data-id="3"]').css({ 'color': '#fff', 'background-color': '#7ec680' });
            $('#shippingOrders').css('display', 'none');
            $('#shippedOrders').css('display', 'none');
            $('#newOrders').css('display', 'none');
        }
    });

    $('body').on('click', '.product-name i', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        axios
            .get('/customer/order/deleteOrder/' + id)
            .then((res) => {
                if (res.data.status) {
                    toastr.success('Huỷ đơn hàng thành công!');
                    getData();
                }
            });
    });

    function createModalDetailOrder(order) {
        let content = "";
        content += `<div class="row">`;
        content += `<div class="col-md-12 col-sm-12 ol-lg-12">`;
        content += `<form action="#">`;
        content += `<div class="table-content table-responsive">`;
        content += `<table>`;
        content += `<thead>`;
        content += `<tr class="title-top">`;
        content += `<th class="product-thumbnail">Hình Ảnh</th>`;
        content += `<th class="product-name">Món Ăn</th>`;
        content += `<th class="product-price">Giá</th>`;
        content += `<th class="product-quantity">Số lượng</th>`;
        content += `<th class="product-subtotal">Tiền</th>`;
        content += `</tr>`;
        content += `</thead>`;
        content += `<tbody>`;
        order.food.forEach(food => {
            content += `<tr>`;
            content += `<td class="product-thumbnail">`;
            content += `<a href="/menu/detailFood/`+food.id_mon_an+`"><img class="img-100 img-cover" src="` + food.hinh_anh + `" alt="product img"></a></td>`;
            content += `<td class="product-name">` + food.ten_mon_an + `</td>`;
            content += `<td class="product-price">`;
            content += `<span class="amount">
                        `+ food.don_gia_mua + ``;
            content += `</span>`;
            content += `</td>`;
            content += `<td class="product-quantity">
                        <input type="text" readonly value="`+food.so_luong_mua+`">`;
            content += `</td>`;
            content += `<td class="product-subtotal">`+food.so_luong_mua*food.don_gia_mua+``;
            content += `</td>`;
            content += `</tr>`;
        });
        content += `</tbody>`;
        content += `</table>`;
        content += `</div>`;
        content += `</form>`;
        content += `</div>`;
        content += `</div>`;
        content += `<div class="row mt-2">`;
        content += `<div class="col-md-6 col-sm-6 ol-lg-6">`;
        content += `<div class="form-group">`;
        content += `<label for="exampleInputEmail1">Tên người nhận</label>`;
        content += `<input type="text" class="form-control" readonly value="`+order.ten_ship+`">`;
        content += `</div>`;
        content += `</div>`;
        content += `<div class="col-md-6 col-sm-6 ol-lg-6">`;
        content += `<div class="form-group">`;
        content += `<label for="exampleInputPassword1">Số điện thoại người nhận</label>`;
        content += `<input type="text" class="form-control" readonly value="`+order.phone_ship+`">`;
        content += `</div>`;
        content += `</div>`;
        content += `<div class="col-md-12 col-sm-12 ol-lg-12">`;
        content += `<div class="form-group">`;
        content += `<label for="exampleInputPassword1">Địa chỉ nhận hàng</label>`;
        content += `<input type="text" class="form-control" readonly value="`+order.dia_chi_ship+`">`;
        content += `</div>`;
        content += `</div>`;
        content += `</div>`;
        content += `<div class="col-lg-6 offset-lg-6">`;
        content += `<div class="cartbox__total__area" style="margin-top:20px">`;
        content += `<div class="cart__total__amount"><span>Tổng tiền</span>
                    <span>`+order.tong_tien.toLocaleString()+` VND`;
        content += `</span></div>`;
        content += `</div>`;
        content += `</div>`;
        return content;
    }

    $('body').on('click', '.media a[data-target=".detailOrderModal"]', function () {
        let id = $(this).data('id');
        axios
            .get('/customer/order/get-data/' + id)
            .then((res) => {
                console.log(res.data.donHang);
                $('.detailOrderModal .modal-body').html(createModalDetailOrder(res.data.donHang));
            });
    });
});
