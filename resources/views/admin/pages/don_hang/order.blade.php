@extends('admin.master')

@section('content')
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
            <div class="modal fade bd-example-modal-lg" tabindex="-1" style="display:none;" id="detailOrder">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Chi Tiết Đơn Hàng</h4>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title=""
                                title=""></button>
                        </div>
                        <div class="modal-body">...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            function getData() {
                axios
                    .get('/admin/don-hang/get-data')
                    .then((res) => {
                        let donHangs = res.data.donHang;
                        $('#info-orderNews .card-body .row').html('');
                        $('#info-orderShipping .card-body .row').html('');
                        $('#info-orderCancelled .card-body .row').html('');
                        donHangs.forEach(element => {
                            if (element.trang_thai_don_hang == 0) {
                                $('#info-orderNews .card-body .row').append(createContent(element, 'primary', 'Chờ xác nhận'));
                            }
                            if (element.trang_thai_don_hang == 1) {
                                $('#info-orderShipping .card-body .row').append(createContent(element, 'success', 'Đang giao'));
                            }
                            if (element.trang_thai_don_hang == 3) {
                                $('#info-orderCancelled .card-body .row').append(createContent(element, 'danger', 'Đã huỷ'));
                            }
                        });
                    });
            };

            getData();

            function createContent(donHang, status, message) {
                let content = "";
                content +=
                    `
                        <div class="col-xxl-6 col-md-6">
                        <div class="prooduct-details-box">
                        <div class="media">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#detailOrder" data-id="` + donHang.id + `" class="showModalDetail"><img
                        class="align-self-center img-fluid img-160" alt="#" src="` + donHang.food[0].hinh_anh + `"></a>
                        <div class="media-body ms-3">
                        <div class="product-name">
                        <a href="#" data-id="` + donHang.id + `" class="showModalDetail" data-bs-toggle="modal" data-bs-target="#detailOrder">
                        <span class="badge badge-secondary f-14">Mã đơn hàng: ` + donHang.ma_don_hang + `</span>
                        </a>
                        <h6 class="m-t-10"><a class="disable">` + donHang.food[0].ten_mon_an + `</a></h6>
                        </div>
                        <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                        class="fa fa-star"></i><i class="fa fa-star"></i></div>
                        <div class="price d-flex">
                        <div class="text-muted me-2 f-w-600 m-t-5 f-16">Tổng tiền: ` + donHang.tong_tien.toLocaleString() + ` VND
                        </div>
                        <div class="avaiabilty">
                        <div class="text-success"></div>
                        </div><a class="btn btn-` + status + ` btn-xs p-2" href="#" data-id="` + donHang.id + `">` + message + `</a>
                        </div>
                        </div>
                        </div>
                        </div>
                        `
                return content;
            }

            function createContentModal(donHang) {
                let content = "";
                content += `<div class="row">
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
                        <tbody class="text-center">`;
                donHang.food.forEach(element => {
                    content += `
                            <tr>
                            <td><a href="#" data-id="25">
                                <img src="` + element.hinh_anh + `" alt="product img" style="width: 100px"></a>
                            </td>
                            <td>` + element.ten_mon_an + `</td>
                            <td>
                                <span>
                                    ` + element.don_gia_mua + `
                                </span>
                            </td>
                            <td><input type="text" readonly value="` + element.so_luong_mua + `">
                            </td>
                            <td>
                                ` + element.don_gia_mua * element.so_luong_mua + `
                            </td>
                        </tr>`
                });

                content += `<tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><b>TỔNG TIỀN</b></td>
                            <td><b>` + donHang.tong_tien.toLocaleString() + ` VND</b></td>
                            </tr>
                            </tbody>
                            </table>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <label for="formGroupExampleInput" class="form-label">Tên người giao</label>
                                    <input type="text" class="form-control" value="` + donHang.ten_ship + `">
                                </div>
                                <div class="col">
                                    <label for="formGroupExampleInput2" class="form-label">Số điện thoại giao hàng</label>
                                    <input type="text" class="form-control" value="` + donHang.phone_ship + `">
                                </div>
                            </div>
                            <div class="mb-3 mt-2">
                                <label for="formGroupExampleInput2" class="form-label">Địa chỉ giao hàng</label>
                                <input type="text" class="form-control" value="` + donHang.dia_chi_ship + `">
                            </div>`
                return content;
            }

            $('body').on('click', '.showModalDetail', function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                axios
                    .get('/admin/don-hang/get-dataDetail/' + id)
                    .then((res) => {
                        let donHang = res.data.donHangDetail;
                        $('.modal .modal-body').html(createContentModal(donHang));
                    });
            });
            $('body').on('click', '.price .btn-primary', function() {
                let id = $(this).data('id');
                axios
                    .get('/admin/don-hang/changeToShipping/' + id)
                    .then((res) => {
                        if (res.data.status) {
                            getData();
                            toastr.success("Xác nhận thành công!");
                        } else {
                            toastr.error("Không có đơn hàng nào để xác nhận!");
                        }
                    });
            });
            $('body').on('click', '.price .btn-success', function() {
                let id = $(this).data('id');
                axios
                    .get('/admin/don-hang/changeToShipped/' + id)
                    .then((res) => {
                        if (res.data.status) {
                            getData();
                            toastr.success("Xác nhận thành công!");
                        } else {
                            toastr.error("Không có đơn hàng nào để xác nhận!");
                        }
                    });
            });
            $('body').on('click', '.confirmAllToShipping', function() {
                axios
                    .get('/admin/don-hang/changeToShippingAll')
                    .then((res) => {
                        if (res.data.status) {
                            getData();
                            toastr.success("Xác nhận thành công!");
                        } else {
                            toastr.error("Không có đơn hàng nào để xác nhận!");
                        }
                    });
            });
            $('body').on('click', '.confirmAllToShipped', function() {
                axios
                    .get('/admin/don-hang/changeToShippedAll')
                    .then((res) => {
                        if (res.data.status) {
                            getData();
                            toastr.success("Xác nhận thành công!");
                        } else {
                            toastr.error("Không có đơn hàng nào để xác nhận!");
                        }
                    });
            });
        });
    </script>
@endsection
