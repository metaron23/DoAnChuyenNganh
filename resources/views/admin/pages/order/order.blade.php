@extends('admin.master')

@section('content')
    <div class="modal fade bd-example-modal-lg" tabindex="-1" style="display:none;" id="detailOrder">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Chi Tiết Đơn Hàng</h4>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-xl-12 xl-100">
        <div class="row p-20">
            <h3>Quản lý đơn hàng</h3><span>Xem, Xác nhận <code>các đơn hàng</code></span>
        </div>
        <div class="row p-20">
            <ul class="nav nav-tabs border-tab nav-primary" id="info-tab" role="tablist">
                <li class="nav-item"><a class="nav-link active" id="orderNews-info-tab" data-bs-toggle="tab" href="#info-orderNews" role="tab"
                        aria-controls="info-home" aria-selected="true" data-bs-original-title="" title=""><i class="icofont icofont-ui-home"></i>Đơn
                        Mới</a></li>
                <li class="nav-item"><a class="nav-link" id="orderShipping-info-tab" data-bs-toggle="tab" href="#info-orderShipping" role="tab"
                        aria-controls="info-profile" aria-selected="false" data-bs-original-title="" title=""><i
                            class="icofont icofont-man-in-glasses"></i>Đang Giao</a></li>
                <li class="nav-item"><a class="nav-link" id="orderCancelled-info-tab" data-bs-toggle="tab" href="#info-orderCancelled" role="tab"
                        aria-controls="info-contact" aria-selected="false" data-bs-original-title="" title=""><i
                            class="icofont icofont-contacts"></i>Đơn Huỷ</a></li>
            </ul>
            <div class="tab-content" id="info-tabContent">
                <div class="tab-pane fade active show" id="info-orderNews" role="tabpanel">
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <h4>Danh sách đơn hàng chờ xác nhận</h4>
                                <a href="#" style="right:0;top:0;position: absolute; margin:46px 20px" class="confirmAllToShipping">
                                    <h6>Xác Nhận Tất Cả</h6>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="info-orderShipping" role="tabpanel">

                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <h4>Danh sách đơn hàng đang giao</h4>
                                <a href="#" style="right:0;top:0;position: absolute; margin:46px 20px">
                                    <h6 class="confirmAllToShipped">Xác Nhận Tất Cả</h6>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="info-orderCancelled" role="tabpanel">

                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <h4>Danh sách đơn hàng đã huỷ</h4>
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
@endsection

@section('js')
<script src="/js/admin/order.js"></script>
@endsection
