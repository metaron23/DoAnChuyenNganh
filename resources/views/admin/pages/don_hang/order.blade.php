@extends('admin.master')

@section('content')
    <style>
        .btn-block {
            display: block;
            width: 200px;
            font-size: 20px;
        }

        #mn_order .btn-block {
            margin: 20px 6px;
        }
<<<<<<< HEAD
        .btn-order-admin{
            opacity: 0.6;
        }
        .img-160{
            width: 160px !important;
        }
        .rating{
            padding-left: 6px;
        }
        .prooduct-details-box .product-name .disable{
=======

        .btn-order-admin {
            opacity: 0.6;
        }

        .img-160 {
            width: 160px !important;
        }

        .rating {
            padding-left: 6px;
        }

        .prooduct-details-box .product-name .disable {
>>>>>>> 4adcecea4d6c04244af5eab8c89833bab82c5c89
            pointer-events: none;
            cursor: default;
        }
    </style>
    <div id="mn_order">
    @section('title')
        <h2>Quản Lý Đơn Hàng</h2>
    @endsection
    <div class="row">
<<<<<<< HEAD
        <button class="btn btn-primary btn-block" type="button" data-id="0" v-on:click="clickTab($event)" v-bind:class="{ 'btn-order-admin' : checkActive == 0 }">
            Chờ Xác Nhận</button>
        <button class="btn btn-primary btn-block" type="button" data-id="1" v-on:click="clickTab($event)" v-bind:class="{ 'btn-order-admin' : checkActive == 1 }">
            Đang Giao</button>
        <button class="btn btn-primary btn-block" type="button" data-id="2" v-on:click="clickTab($event)" v-bind:class="{ 'btn-order-admin' : checkActive == 2 }">
=======
        <button class="btn btn-primary btn-block" type="button" data-id="0" v-on:click="clickTab($event)"
            v-bind:class="{ 'btn-order-admin' : checkActive == 0 }">
            Chờ Xác Nhận</button>
        <button class="btn btn-primary btn-block" type="button" data-id="1" v-on:click="clickTab($event)"
            v-bind:class="{ 'btn-order-admin' : checkActive == 1 }">
            Đang Giao</button>
        <button class="btn btn-primary btn-block" type="button" data-id="2" v-on:click="clickTab($event)"
            v-bind:class="{ 'btn-order-admin' : checkActive == 2 }">
>>>>>>> 4adcecea4d6c04244af5eab8c89833bab82c5c89
            Đã Hoàn Trả</button>
    </div>
    <div class="row" v-if="checkContentOrder==0" id="newOrders">
        <div class="card">
            <div class="card-header">
                <h4>Danh sách đơn hàng chờ xác nhận</h4>
                <a href="#" style="right:0;top:0;position: absolute; margin:46px 20px">
                    <h6>Xác Nhận Tất Cả</h6>
                </a>
            </div>
            <div class="card-body">
                <div class="col-xxl-6 col-md-6" v-for="(value, key) in listNew">
                    <div class="prooduct-details-box">
                        <div class="media">
<<<<<<< HEAD
                            <img class="align-self-center img-fluid img-160" v-bind:src="value.food[0].hinh_anh"
                                alt="#">
                            <div class="media-body ms-3">
                                <div class="product-name">
                                    <a href=""><h6 class="text-danger">Mã đơn hàng: @{{value.ma_don_hang}}</h6></a>
                                    <h6><a class="disable">@{{value.food[0].ten_mon_an}}</a></h6>
=======
                            <a href="#"><img class="align-self-center img-fluid img-160"
                                    v-on:click.prevent="getDetailOrder($event), showModal=true" v-bind:data-id="value.id"
                                    v-bind:src="value.food[0].hinh_anh" alt="#"></a>
                            <div class="media-body ms-3">
                                <div class="product-name">
                                    <a href="#">
                                        <h6 class="text-danger" v-on:click.prevent="getDetailOrder($event), showModal=true" v-bind:data-id="value.id">
                                            Mã đơn hàng: @{{ value.ma_don_hang }}</h6>
                                    </a>
                                    <h6><a class="disable">@{{ value.food[0].ten_mon_an }}</a></h6>
>>>>>>> 4adcecea4d6c04244af5eab8c89833bab82c5c89
                                </div>
                                <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                <div class="price d-flex">
<<<<<<< HEAD
                                    <div class="text-muted me-2">Tổng tiền</div>: @{{value.tong_tien.toLocaleString()}} VND
                                </div>
                                <div class="avaiabilty">
                                    <div class="text-success">@{{value.trang_thai_thanh_toan==1?"Đã thanh toán":"Chưa thanh toán"}}</div>
                                </div><a class="btn btn-primary btn-xs p-2" href="#" data-bs-original-title="" title="">Chờ xác nhận</a>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-x close">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
=======
                                    <div class="text-muted me-2">Tổng tiền</div>: @{{ value.tong_tien.toLocaleString() }} VND
                                </div>
                                <div class="avaiabilty">
                                    <div class="text-success">@{{ value.trang_thai_thanh_toan == 1 ? "Đã thanh toán" : "Chưa thanh toán" }}</div>
                                </div><a class="btn btn-primary btn-xs p-2" href="#" v-bind:data-id="value.id">Chờ xác nhận</a>
>>>>>>> 4adcecea4d6c04244af5eab8c89833bab82c5c89
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" v-if="checkContentOrder==1" id="shippingOrders">
        <div class="card">
            <div class="card-header">
                <h4>Danh sách đơn hàng đang giao</h4>
            </div>
            <div class="card-body">
                <div class="col-xxl-6 col-md-6" v-for="(value, key) in listShipping">
                    <div class="prooduct-details-box">
                        <div class="media">
<<<<<<< HEAD
                            <img class="align-self-center img-fluid img-160" v-bind:src="value.food[0].hinh_anh"
                                alt="#">
                            <div class="media-body ms-3">
                                <div class="product-name">
                                    <a href=""><h6 class="text-danger">Mã đơn hàng: @{{value.ma_don_hang}}</h6></a>
                                    <h6><a class="disable">@{{value.food[0].ten_mon_an}}</a></h6>
=======
                            <a href="#"><img class="align-self-center img-fluid img-160"
                                    v-on:click.prevent="getDetailOrder($event), showModal=true" v-bind:data-id="value.id"
                                    v-bind:src="value.food[0].hinh_anh" alt="#"></a>
                            <div class="media-body ms-3">
                                <div class="product-name">
                                    <a href="#">
                                        <h6 class="text-danger" v-on:click="getDetailOrder($event),showModal=true" v-bind:data-id="value.id">Mã đơn
                                            hàng: @{{ value.ma_don_hang }}</h6>
                                    </a>
                                    <h6><a class="disable">@{{ value.food[0].ten_mon_an }}</a></h6>
>>>>>>> 4adcecea4d6c04244af5eab8c89833bab82c5c89
                                </div>
                                <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                <div class="price d-flex">
<<<<<<< HEAD
                                    <div class="text-muted me-2">Tổng tiền</div>: @{{value.tong_tien.toLocaleString()}} VND
                                </div>
                                <div class="avaiabilty">
                                    <div class="text-success">@{{value.trang_thai_thanh_toan==1?"Đã thanh toán":"Chưa thanh toán"}}</div>
                                </div><a class="btn btn-success btn-xs p-2" href="#" data-bs-original-title="" title="">Đang vận chuyển</a>
                                {{-- <svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-x close">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg> --}}
=======
                                    <div class="text-muted me-2">Tổng tiền</div>: @{{ value.tong_tien.toLocaleString() }} VND
                                </div>
                                <div class="avaiabilty">
                                    <div class="text-success">@{{ value.trang_thai_thanh_toan == 1 ? "Đã thanh toán" : "Chưa thanh toán" }}</div>
                                </div><a class="btn btn-success btn-xs p-2" href="#" v-bind:data-id="value.id">Đang vận chuyển</a>
>>>>>>> 4adcecea4d6c04244af5eab8c89833bab82c5c89
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" v-if="checkContentOrder==2" id="cancelledOrders">
        <div class="card">
            <div class="card-header">
                <h4>Danh sách đơn hàng đã hoàn trả</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xxl-6 col-md-6" v-for="(value, key) in listCancelled">
                        <div class="prooduct-details-box">
                            <div class="media">
<<<<<<< HEAD
                                <img class="align-self-center img-fluid img-160" v-bind:src="value.food[0].hinh_anh"
                                    alt="#">
                                <div class="media-body ms-3">
                                    <div class="product-name">
                                        <a href=""><h6 class="text-danger">Mã đơn hàng: @{{value.ma_don_hang}}</h6></a>
                                        <h6><a class="disable">@{{value.food[0].ten_mon_an}}</a></h6>
=======
                                <a href="#"><img class="align-self-center img-fluid img-160"
                                        v-on:click.prevent="getDetailOrder($event), showModal=true" v-bind:data-id="value.id"
                                        v-bind:src="value.food[0].hinh_anh" alt="#"></a>
                                <div class="media-body ms-3">
                                    <div class="product-name">
                                        <a href="#">
                                            <h6 class="text-danger" v-on:click="getDetailOrder($event),showModal=true" v-bind:data-id="value.id">Mã
                                                đơn hàng: @{{ value.ma_don_hang }}</h6>
                                        </a>
                                        <h6><a class="disable">@{{ value.food[0].ten_mon_an }}</a></h6>
>>>>>>> 4adcecea4d6c04244af5eab8c89833bab82c5c89
                                    </div>
                                    <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                    <div class="price d-flex">
<<<<<<< HEAD
                                        <div class="text-muted me-2">Tổng tiền</div>: @{{value.tong_tien.toLocaleString()}} VND
                                    </div>
                                    <div class="avaiabilty">
                                        <div class="text-success">@{{value.trang_thai_thanh_toan==1?"Đã thanh toán":"Chưa thanh toán"}}</div>
                                    </div><a class="btn btn-danger btn-xs p-2" href="#" data-bs-original-title="" title="">Đơn huỷ</a>
                                    {{-- <svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-x close">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg> --}}
=======
                                        <div class="text-muted me-2">Tổng tiền</div>: @{{ value.tong_tien.toLocaleString() }} VND
                                    </div>
                                    <div class="avaiabilty">
                                        <div class="text-success">@{{ value.trang_thai_thanh_toan == 1 ? "Đã thanh toán" : "Chưa thanh toán" }}</div>
                                    </div><a class="btn btn-danger btn-xs p-2" style="pointer-events: none; cursor: default;">Đơn huỷ</a>
>>>>>>> 4adcecea4d6c04244af5eab8c89833bab82c5c89
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-if="showModal">
        <div class="modal fade show" id="exampleModalXl" tabindex="-1" style="display: block;">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Chi Tiết Đơn Hàng</h4>
                        <button type="button" class="btn-close" v-on:click.prevent="showModal=false"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th class="col">Hình Ảnh</th>
                                        <th class="col">Món Ăn</th>
                                        <th class="col">Giá</th>
                                        <th class="col">Số lượng</th>
                                        <th class="col">Tiền</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr v-for="(value, key) in listDetailOrder.food">
                                        <td><a href="#" data-id="25">
                                                <img v-bind:src="value.hinh_anh" alt="product img" style="width: 100px"></a></td>
                                        <td>@{{ value.ten_mon_an }}</td>
                                        <td>
                                            <span>
                                                @{{ value.don_gia_mua }}
                                            </span>
                                        </td>
                                        <td><input type="text" readonly v-bind:value="value.so_luong_mua">
                                        </td>
                                        <td>
                                            @{{ value.don_gia_mua * value.so_luong_mua }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>TỔNG TIỀN</b></td>
                                        <td><b>@{{ listDetailOrder.tong_tien.toLocaleString() }} VND</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="formGroupExampleInput" class="form-label">Tên người giao</label>
                                <input type="text" class="form-control" v-bind:value="listDetailOrder.ten_ship">
                            </div>
                            <div class="col">
                                <label for="formGroupExampleInput2" class="form-label">Số điện thoại giao hàng</label>
                                <input type="text" class="form-control" v-bind:value="listDetailOrder.phone_ship">
                            </div>
                        </div>
                        <div class="mb-3 mt-2">
                            <label for="formGroupExampleInput2" class="form-label">Địa chỉ giao hàng</label>
                            <input type="text" class="form-control" v-bind:value="listDetailOrder.dia_chi_ship">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    new Vue({
        el: '#mn_order',
        data: {
            checkContentOrder: 0,
            listOrder: [],
            listNew: [],
            listShipping: [],
            listShipped: [],
            listCancelled: [],
<<<<<<< HEAD
            checkActive : 0,
=======
            checkActive: 0,
            showModal: false,
            listDetailOrder: [],
>>>>>>> 4adcecea4d6c04244af5eab8c89833bab82c5c89
        },
        created() {
            this.getData();
        },
        methods: {
            getData() {
                let listNewTest = [];
                let listShippingTest = [];
                let listShippedTest = [];
                let listCancelledTest = [];
                axios
                    .get('/customer/order/get-data')
                    .then((res) => {
                        this.listOrder = res.data.donHang;
                        this.listOrder.forEach(element => {
                            if (element.trang_thai_don_hang == 0)
                                listNewTest.push(element);
                            else if (element.trang_thai_don_hang == 1)
                                listShippingTest.push(element);
                            else if (element.trang_thai_don_hang == 2)
                                listShippedTest.push(element);
                            else
                                listCancelledTest.push(element);
                        });
                        this.listNew = listNewTest;
                        this.listShipping = listShippingTest;
                        this.listShipped = listShippedTest;
                        this.listCancelled = listCancelledTest;
                    });
            },
            clickTab(event) {
                $('.cart__btn__list a').removeAttr('style');
                try {
                    event.target.setAttribute("style", "background: #60ba62 none repeat scroll 0 0;color: #fff");
                    if (event.target.getAttribute('data-id') == 0) {
                        this.checkContentOrder = 0;
                        this.checkActive = 0;
                    } else if (event.target.getAttribute('data-id') == 1) {
                        this.checkContentOrder = 1;
                        this.checkActive = 1;
                    } else {
                        this.checkContentOrder = 2;
                        this.checkActive = 2;
                    }
                } catch {
                    $('mn_order button').first().attr("style", "background: #60ba62 none repeat scroll 0 0;color: #fff");
                }
            },
            getDetailOrder(event) {
                let id = event.target.getAttribute('data-id');
                console.log(id);
                this.listOrder.forEach(element => {
                    if (element.id == id) {
                        this.listDetailOrder = element;
                    }
                });
            },
            changeToShipping(event) {
                let id = event.target.getAttribute('data-id');
                axios
                    .get('/customer/order/get-data')
                    .then((res) => {
                    });
            },
        }
    });
</script>
@endsection
