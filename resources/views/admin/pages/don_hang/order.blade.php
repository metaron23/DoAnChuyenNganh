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
    </style>
    <div id="mn_order">
    @section('title')
        <h2>Quản Lý Đơn Hàng</h2>
    @endsection
    <div class="row">
        <button class="btn btn-primary btn-block" type="button" data-id="0" v-on:click="clickTab($event)">Chờ Xác Nhận</button>
        <button class="btn btn-primary btn-block" type="button" data-id="1" v-on:click="clickTab($event)">Đang Giao</button>
        <button class="btn btn-primary btn-block" type="button" data-id="2" v-on:click="clickTab($event)">Đã Hoàn Trả</button>
    </div>
    <div class="row" v-if="checkContentOrder==0" id="newOrders">
        <div class="card">
            <div class="card-header">
                <h4>Danh sách đơn hàng chờ xác nhận</h4>
            </div>
            <div class="card-body">
            </div>
        </div>
    </div>
    <div class="row" v-if="checkContentOrder==1" id="shippingOrders">
        <div class="card">
            <div class="card-header">
                <h4>Danh sách đơn hàng đang giao</h4>
            </div>
            <div class="card-body">
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
                    <div class="col-xxl-4 col-md-6">
                        <div class="prooduct-details-box">
                            <div class="media"><img class="align-self-center img-fluid img-60" src="../assets/images/ecommerce/product-table-6.png"
                                    alt="#">
                                <div class="media-body ms-3">
                                    <div class="product-name">
                                        <h6><a href="#" data-bs-original-title="" title="">Fancy Women's Cotton</a></h6>
                                    </div>
                                    <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                    <div class="price d-flex">
                                        <div class="text-muted me-2">Price</div>: 210$
                                    </div>
                                    <div class="avaiabilty">
                                        <div class="text-success">In stock</div>
                                    </div><a class="btn btn-primary btn-xs" href="#" data-bs-original-title="" title="">Processing</a><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-x close">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                            </div>
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
            listCancelled: [],
        },
        created() {

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
                        this.checkContentOrder = 0;
                    } else if (event.target.getAttribute('data-id') == 1) {
                        this.checkContentOrder = 1;
                    } else {
                        this.checkContentOrder = 2;
                    }

                } catch {
                    $('mn_order button').first().attr("style", "background: #60ba62 none repeat scroll 0 0;color: #fff");
                }
            },
        }
    });
</script>
@endsection
