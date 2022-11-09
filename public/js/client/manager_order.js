$(document).ready(function () {
    function getData() {
        axios
            .get('/customer/order/get-data')
            .then((res) => {
                res.data.donHang.forEach(order => {
                    if (order.trang_thai_don_hang == 0) {
                        $('#newOrders .card-body').html("");
                        $('#newOrders .card-body').prepend(createOrderItem(order, 'secondary', 'Đang Chờ Xử Lý'));
                    } else if (order.trang_thai_don_hang == 1) {
                        $('#shippingOrders .card-body').html("");
                        $('#shippingOrders .card-body').prepend(createOrderItem(order, 'primary', 'Đang Vận Chuyển'));
                    } else if (order.trang_thai_don_hang == 2) {
                        $('#shippedOrders .card-body').html("");
                        $('#shippedOrders .card-body').prepend(createOrderItem(order, 'success', 'Đã Giao Hàng'));
                    } else {
                        $('#cancelledOrders .card-body').html("");
                        $('#cancelledOrders .card-body').prepend(createOrderItem(order, 'danger', 'Đã Huỷ'));
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
        content += `<div class="row">`;
        content += `<div class="col-xxl-6 col-md-6">`;
        content += `<div class="prooduct-details-box">`;
        content += `<div class="media">`;
        content += `<img class="align-self-center img-fluid img img-thumbnail ml-3" style="height: 100px" src="` +
            order.food[0].hinh_anh + `" alt="#">`;
        content += `<div class="media-body ms-3">`;
        content += `<div class="product-name d-flex justify-content-between mb-1">`;
        content += `<h5><a href="#">` + order.food[0].ten_mon_an + `</a>`;
        content += `</h5>`;
        if (order.trang_thai_don_hang == 0) {
            content += `<a href="#" class=""><i class="fa-solid fa-xmark mr-3 h4"></i></a>`;
        }
        content += `</div>`;
        content += `<div class="rating mb-1"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                            class="fa fa-star"></i><i class="fa fa-star"></i></div>`;
        content += `<div class="price d-flex mb-1">`;
        content += `<div class="text-muted me-2 mr-1">Tổng Tiền: </div><b>` + order.tong_tien.toLocaleString() + ` VND</b>`;
        content += `</div>`;
        content += `<div class="avaiabilty">`;
        content += `<div class="text-success"><b>` + (order.trang_thai_thanh_toan == 0 ? 'Chưa Thanh Toán' : 'Đã Thanh Toán') +
            `</b></div>`;
        content += `</div>`;
        content += `<a class="btn btn-` + status + ` btn-xs mr-1" href="#" data-bs-original-title="" title=""
                        style="pointer-events: none;cursor:default;font-size:12px">`+ text + `</a>`;
        content += `<div class="cancel_order">`;
        content += `<a href="">`;
        content += `</a>`;
        content += `</div>`;
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
            $('.container .cart__btn__list>li a').css({'background-color':'', 'color':''});
            $('#newOrders').css('display', 'block');
            $('.container .cart__btn__list>li a[data-id="0"]').css({ 'color': '#fff', 'background-color': '#7ec680' });
            $('#shippingOrders').css('display', 'none');
            $('#shippedOrders').css('display', 'none');
            $('#cancelledOrders').css('display', 'none');
        } else if (id == 1) {
            $('.container .cart__btn__list>li a').css({'background-color':'', 'color':''});
            $('#shippingOrders').css('display', 'block');
            $('.container .cart__btn__list>li a[data-id="1"]').css({ 'color': '#fff', 'background-color': '#7ec680' });
            $('#newOrders').css('display', 'none');
            $('#shippedOrders').css('display', 'none');
            $('#cancelledOrders').css('display', 'none');
        } else if (id == 2) {
            $('.container .cart__btn__list>li a').css({'background-color':'', 'color':''});
            $('#shippedOrders').css('display', 'block');
            $('.container .cart__btn__list>li a[data-id="2"]').css({ 'color': '#fff', 'background-color': '#7ec680' });
            $('#shippingOrders').css('display', 'none');
            $('#newOrders').css('display', 'none');
            $('#cancelledOrders').css('display', 'none');
        } else {
            $('.container .cart__btn__list>li a').css({'background-color':'', 'color':''});
            $('#cancelledOrders').css('display', 'block');
            $('.container .cart__btn__list>li a[data-id="3"]').css({ 'color': '#fff', 'background-color': '#7ec680' });
            $('#shippingOrders').css('display', 'none');
            $('#shippedOrders').css('display', 'none');
            $('#newOrders').css('display', 'none');
        }
    });
});


// new Vue({
//     el: '#order',
//     data: {
//         listOrder: [],
//         listNew: [],
//         listShipped: [],
//         listShipping: [],
//         listCancelled: [],
//         showModal: false,
//         listDetailOrder: [],
//     },
//     created() {
//         this.getData(0);
//         this.clickTab(event);
//     },
//     methods: {
//         getData() {
//             let listNewTest = [];
//             let listShippedTest = [];
//             let listShippingTest = [];
//             let listCancelledTest = [];
//             axios
//                 .get('/customer/order/get-data')
//                 .then((res) => {
//                     this.listOrder = res.data.donHang;
//                     this.listOrder.forEach(element => {
//                         if(element.trang_thai_don_hang == 0){
//                             listNewTest.push(element);
//                         }else if(element.trang_thai_don_hang == 1){
//                             listShippingTest.push(element);
//                         }else if(element.trang_thai_don_hang == 2){
//                             listShippedTest.push(element);
//                         }else{
//                             listCancelledTest.push(element);
//                         }
//                     });
//                     this.listNew = listNewTest;
//                     this.listShipped = listShippedTest;
//                     this.listShipping = listShippingTest;
//                     this.listCancelled = listCancelledTest;
//                 });
//         },
//         clickTab(event) {
//             $('.cart__btn__list a').removeAttr('style');
//             try {
//                 event.target.setAttribute("style", "background: #60ba62 none repeat scroll 0 0;color: #fff");
//                 if (event.target.getAttribute('data-id') == 0) {
//                     $('#newOrders').show();
//                     $('#shippingOrders').hide();
//                     $('#shippedOrders').hide();
//                     $('#cancelledOrders').hide();
//                 } else if (event.target.getAttribute('data-id') == 1) {
//                     $('#newOrders').hide();
//                     $('#shippingOrders').show();
//                     $('#shippedOrders').hide();
//                     $('#cancelledOrders').hide();
//                 } else if (event.target.getAttribute('data-id') == 2) {
//                     $('#newOrders').hide();
//                     $('#shippingOrders').hide();
//                     $('#shippedOrders').show();
//                     $('#cancelledOrders').hide();
//                 } else {
//                     $('#newOrders').hide();
//                     $('#shippingOrders').hide();
//                     $('#shippedOrders').hide();
//                     $('#cancelledOrders').show();
//                 }
//             } catch {
//                 $('.cart__btn__list a').first().attr("style", "background: #60ba62 none repeat scroll 0 0;color: #fff");
//                 $('#newOrders').show();
//                 $('#shippingOrders').hide();
//                 $('#shippedOrders').hide();
//                 $('#cancelledOrders').hide();
//             }
//         },
//         changeIconClose(event) {
//             event.target.setAttribute('class', "fa-solid fa-xmark");
//         },
//         changeIconProcess(event) {
//             event.target.setAttribute('class', "fa fa-spin fa-spinner");
//         },
//         deleteOrder(event) {
//             let id = event.target.getAttribute('data-id');
//             axios
//                 .get('/customer/order/deleteOrder/' + id)
//                 .then((res) => {
//                     if (res.data.status)
//                         toastr.success('Huỷ đơn hàng thành công!');
//                     this.getData();

//                 });
//         },
//         getDetailOrder(event) {
//             let id = event.target.getAttribute('data-id');
//             this.listOrder.forEach(element => {
//                 if (element.id == id) {
//                     this.listDetailOrder = element;
//                 }
//             });
//         }
//     }
// });
