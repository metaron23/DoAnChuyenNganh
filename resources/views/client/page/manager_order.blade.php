@extends('client.share.master')
@section('content')
    <div id="order">
        <div class="ht__bradcaump__area bg-image--18">
            <div class="ht__bradcaump__wrap d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">order</h2>
                                <nav class="bradcaump-inner">
                                    <a class="breadcrumb-item" href="index.html">Home</a>
                                    <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
                                    <span class="breadcrumb-item active">order</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12 col-sm-12 ol-lg-12">
                    <div class="container-fluid mt-4 mb-4">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="cartbox__btn">
                                        <ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">
                                            <li><a href="#" data-id="0" v-on:click.prevent="clickTab($event)">New Orders</a></li>
                                            <li><a href="#" data-id="1" v-on:click.prevent="clickTab($event)">Shipped Orders</a></li>
                                            <li><a href="#" data-id="2" v-on:click.prevent="clickTab($event)">Cancelled Orders</a></li>
                                        </ul>
                                    </div>
                                    <div id="newOrders">
                                        <div class="card-header">
                                            <h5>New Orders</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xxl-4 col-md-6" v-for="(value, key) in listNew">
                                                    <div class="prooduct-details-box">
                                                        <div class="media">
                                                            <img class="align-self-center img-fluid" v-on:click="getDetailOrder($event), showModal=true"
                                                                v-bind:data-id="value.id" style="height: 100px" v-bind:src="value.food[0].hinh_anh"
                                                                alt="#">
                                                            <div class="media-body ms-3">
                                                                <div class="product-name">
                                                                    <h6><a href="#" v-on:click.prevent="getDetailOrder($event), showModal=true"
                                                                            data-bs-original-title="" v-bind:data-id="value.id"
                                                                            title="">@{{ value.food[0].ten_mon_an }}</a>
                                                                    </h6>
                                                                </div>
                                                                <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                                        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                                                <div class="price d-flex">
                                                                    <div class="text-muted me-2">Price</div>: @{{ value.tong_tien.toLocaleString() }} VND
                                                                </div>
                                                                <div class="avaiabilty">
                                                                    <div class="text-success">@{{ value.trang_thai_thanh_toan == 0 ? "Not Paid" : "Paid" }}</div>
                                                                </div>
                                                                <a class="btn btn-primary btn-xs" href="#" data-bs-original-title="" title=""
                                                                    style="pointer-events: none;cursor: default;font-size:14px">Processing</a>
                                                                <div class="cancel_order">
                                                                    <a href="">
                                                                        <i class="fa fa-spin fa-spinner" v-bind:data-id="value.id"
                                                                            v-on:click.prevent="deleteOrder($event)"
                                                                            v-on:mouseleave="changeIconProcess($event)"
                                                                            v-on:mouseover="changeIconClose($event)"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="shippedOrders">
                                        <div class="card-header">
                                            <h5>Shipped Orders</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xxl-4 col-md-6" v-for="(value, key) in listShipped">
                                                    <div class="prooduct-details-box">
                                                        <div class="media">
                                                            <img class="align-self-center img-fluid" v-on:click="getDetailOrder($event), showModal=true"
                                                                v-bind:data-id="value.id" style="height: 100px" v-bind:src="value.food[0].hinh_anh"
                                                                alt="#">
                                                            <div class="media-body ms-3">
                                                                <div class="product-name">
                                                                    <h6><a href="#" v-on:click.prevent="getDetailOrder($event), showModal=true"
                                                                            data-bs-original-title="" v-bind:data-id="value.id"
                                                                            title="">@{{ value.food[0].ten_mon_an }}</a>
                                                                    </h6>
                                                                </div>
                                                                <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                                        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                                                </div>
                                                                <div class="price d-flex">
                                                                    <div class="text-muted me-2">Price</div>: @{{ value.tong_tien.toLocaleString() }} VND
                                                                </div>
                                                                <div class="avaiabilty">
                                                                    <div class="text-success">@{{ value.trang_thai_thanh_toan == 0 ? "Not Paid" : "Paid" }}</div>
                                                                </div>
                                                                <a class="btn btn-success btn-xs" href="#" data-bs-original-title=""
                                                                    title=""
                                                                    style="pointer-events: none;cursor: default;font-size:14px">Shipped</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="cancelledOrders">
                                        <div class="card-header">
                                            <h5>Cancelled Orders</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xxl-4 col-md-6" v-for="(value, key) in listCancelled">
                                                    <div class="prooduct-details-box">
                                                        <div class="media">
                                                            <img class="align-self-center img-fluid" v-on:click="getDetailOrder($event),showModal=true"
                                                                v-bind:data-id="value.id" style="height: 100px" v-bind:src="value.food[0].hinh_anh"
                                                                alt="#">
                                                            <div class="media-body ms-3">
                                                                <div class="product-name">
                                                                    <h6><a href="#" v-on:click.prevent="getDetailOrder($event), showModal=true"
                                                                            data-bs-original-title="" v-bind:data-id="value.id"
                                                                            title="">@{{ value.food[0].ten_mon_an }}</a>
                                                                    </h6>
                                                                </div>
                                                                <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                                        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                                                </div>
                                                                <div class="price d-flex">
                                                                    <div class="text-muted me-2">Price</div>: @{{ value.tong_tien.toLocaleString() }} VND
                                                                </div>
                                                                <div class="avaiabilty">
                                                                    <div class="text-success">@{{ value.trang_thai_thanh_toan == 0 ? "Not Paid" : "Paid" }}</div>
                                                                </div>
                                                                <a class="btn btn-danger btn-xs" href="#" data-bs-original-title=""
                                                                    title=""
                                                                    style="pointer-events: none;cursor: default;font-size:14px">Cancelled</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="showModal">
            <div class="modal fade bd-example-modal-lg show" tabindex="-1" style="padding-right: 17px; display: block;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content" style="height:580px;width:100%;overflow:auto; ">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Detail Order</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on:click.prevent="showModal=false">
                                <span aria-hidden="true" style="font-size: 40px">×</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-12 col-sm-12 ol-lg-12">
                                    <form action="#">
                                        <div class="table-content table-responsive">
                                            <table>
                                                <thead>
                                                    <tr class="title-top">
                                                        <th class="product-thumbnail">Image</th>
                                                        <th class="product-name">Product</th>
                                                        <th class="product-price">Price</th>
                                                        <th class="product-quantity">Quantity</th>
                                                        <th class="product-subtotal">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(value, key) in listDetailOrder.food">
                                                        <td class="product-thumbnail"><a href="#" data-id="25">
                                                                <img v-bind:src="value.hinh_anh" alt="product img"></a></td>
                                                        <td class="product-name">@{{ value.ten_mon_an }}</td>
                                                        <td class="product-price">
                                                            <span class="amount">
                                                                @{{ value.don_gia_mua }}
                                                            </span>
                                                        </td>
                                                        <td class="product-quantity"><input type="text" readonly v-bind:value="value.so_luong_mua">
                                                        </td>
                                                        <td class="product-subtotal">
                                                            @{{ value.don_gia_mua * value.so_luong_mua }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 offset-lg-6">
                                <div class="cartbox__total__area" style="margin-top:20px">
                                    <div class="cart__total__amount"><span>Grand Total</span> <span>@{{ listDetailOrder.tong_tien.toLocaleString() }} VND
                                        </span></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('client.share.footer')
    @endsection

    @section('js')
        <script>
            new Vue({
                el: '#order',
                data: {
                    listOrder: [],
                    listNew: [],
                    listShipped: [],
                    listCancelled: [],
                    showModal: false,
                    listDetailOrder: [],
                },
                created() {
                    this.getData(0);
                    this.clickTab(event);
                },
                methods: {
                    getData() {
                        let listNewTest = [];
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
                                        listShippedTest.push(element);
                                    else
                                        listCancelledTest.push(element);
                                });
                                this.listNew = listNewTest;
                                this.listShipped = listShippedTest;
                                this.listCancelled = listCancelledTest;
                            });
                    },
                    clickTab(event) {
                        $('.cart__btn__list a').removeAttr('style');
                        try {
                            event.target.setAttribute("style", "background: #60ba62 none repeat scroll 0 0;color: #fff");
                            if (event.target.getAttribute('data-id') == 0) {
                                $('#newOrders').show();
                                $('#shippedOrders').hide();
                                $('#cancelledOrders').hide();
                            } else if (event.target.getAttribute('data-id') == 1) {
                                $('#newOrders').hide();
                                $('#shippedOrders').show();
                                $('#cancelledOrders').hide();
                            } else {
                                $('#newOrders').hide();
                                $('#shippedOrders').hide();
                                $('#cancelledOrders').show();
                            }

                        } catch {
                            $('.cart__btn__list a').first().attr("style", "background: #60ba62 none repeat scroll 0 0;color: #fff");
                            $('#newOrders').show();
                            $('#shippedOrders').hide();
                            $('#cancelledOrders').hide();
                        }
                    },
                    changeIconClose(event) {
                        event.target.setAttribute('class', "fa-solid fa-xmark");
                    },
                    changeIconProcess(event) {
                        event.target.setAttribute('class', "fa fa-spin fa-spinner");
                    },
                    deleteOrder(event) {
                        let id = event.target.getAttribute('data-id');
                        axios
                            .get('/customer/order/deleteOrder/' + id)
                            .then((res) => {
                                if (res.data.status)
                                    toastr.success('Huỷ đơn hàng thành công!');
                                this.getData();

                            });
                    },
                    getDetailOrder(event) {
                        let id = event.target.getAttribute('data-id');
                        this.listOrder.forEach(element => {
                            if (element.id == id) {
                                this.listDetailOrder = element;
                            }
                        });
                    }
                }
            });
        </script>
    @endsection
