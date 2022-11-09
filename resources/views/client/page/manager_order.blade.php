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

                            </div>
                        </div>
                        <div id="shippingOrders">
                            <div class="card-header">
                                <h5>Đang Giao</h5>
                            </div>
                            <div class="card-body">
                            </div>
                        </div>
                        <div id="shippedOrders">
                            <div class="card-header">
                                <h5>Đã Giao</h5>
                            </div>
                            <div class="card-body">
                            </div>
                        </div>
                        <div id="cancelledOrders">
                            <div class="card-header">
                                <h5>Đã Huỷ</h5>
                            </div>
                            <div class="card-body">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div v-if="showModal">
        <div class="modal fade bd-example-modal-lg show" tabindex="-1" style="padding-right: 17px; display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="height:580px;width:100%;overflow:auto; ">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Chi Tiết Đơn Hàng</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                    <th class="product-thumbnail">Hình Ảnh</th>
                                                    <th class="product-name">Món Ăn</th>
                                                    <th class="product-price">Giá</th>
                                                    <th class="product-quantity">Số lượng</th>
                                                    <th class="product-subtotal">Tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="product-thumbnail"><a href="#" data-id="25">
                                                            <img src="" alt="product img"></a></td>
                                                    <td class="product-name">ten_mon_an</td>
                                                    <td class="product-price">
                                                        <span class="amount">
                                                            don_gia_mua
                                                        </span>
                                                    </td>
                                                    <td class="product-quantity"><input type="text" readonly>
                                                    </td>
                                                    <td class="product-subtotal">
                                                        don_gia_mua * value.so_luong_mua
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6 col-sm-6 ol-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên người giao</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 ol-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Số điện thoại giao hàng</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 ol-lg-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Địa chỉ giao hàng</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 offset-lg-6">
                            <div class="cartbox__total__area" style="margin-top:20px">
                                <div class="cart__total__amount"><span>Tổng tiền</span> <span>tong_tien VND
                                    </span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('client.share.footer')
    @endsection
    @section('js')
        <script src="/js/client/manager_order.js"></script>
    @endsection
