@extends('client.share.master')

<head>
    <title>Quản lí giỏ hàng</title>
</head>
@section('content')
    <div class="ht__bradcaump__area bg-image--18">
        <div class="ht__bradcaump__wrap d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">đơn hàng</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="/home">trang chủ</a>
                                <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
                                <span class="breadcrumb-item active">đơn hàng</span>
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
                    <div class="card">
                        <div class="cartbox__btn">
                            <ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">
                                <li><a href="#" data-id="0">Chờ Xác Nhận</a></li>
                                <li><a href="#" data-id="1">Đang Giao</a></li>
                                <li><a href="#" data-id="2">Đã Giao</a></li>
                                <li><a href="#" data-id="3">Đã Huỷ</a></li>
                            </ul>
                        </div>
                        <div id="newOrders">
                            <div class="card-header">
                                <h5>Chờ Xác Nhận</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                </div>
                            </div>
                        </div>
                        <div id="shippingOrders">
                            <div class="card-header">
                                <h5>Đang Giao</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                </div>
                            </div>
                        </div>
                        <div id="shippedOrders">
                            <div class="card-header">
                                <h5>Đã Giao</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                </div>
                            </div>
                        </div>
                        <div id="cancelledOrders">
                            <div class="card-header">
                                <h5>Đã Huỷ</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade detailOrderModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-content" style="height:580px;width:100%;overflow:auto; ">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Chi Tiết Đơn Hàng</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="font-size: 40px">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('client.share.footer')
@endsection

@section('js')
    <script src="/js/client/manager_order.js"></script>
@endsection
