$(document).ready(function () {
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
                        $('#info-orderNews .card-body .row').append(createContent(element, 'primary', 'Chờ Xác Nhận'));
                    }
                    if (element.trang_thai_don_hang == 1) {
                        $('#info-orderShipping .card-body .row').append(createContent(element, 'success', 'Đang Giao'));
                    }
                    if (element.trang_thai_don_hang == 3) {
                        $('#info-orderCancelled .card-body .row').append(createContent(element, 'danger', 'Đã Huỷ'));
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
                <div class="text-success"></div>`;
        if (status == 'danger') {
            content += `</div><a class="btn btn-` + status + ` btn-xs p-2 disabledButton" href="#" data-id="` + donHang.id + `">` +
                message + `</a>`;
        } else {
            content += `</div><a class="btn btn-` + status + ` btn-xs p-2" href="#" data-id="` + donHang.id + `">` + message + `</a>`;
        }
        content += `
                </div>
                </div>
                </div>
                </div>
                `;
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

    $('body').on('click', '.showModalDetail', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        axios
            .get('/admin/don-hang/get-dataDetail/' + id)
            .then((res) => {
                let donHang = res.data.donHangDetail;
                $('.modal .modal-body').html(createContentModal(donHang));
            });
    });
    $('body').on('click', '.price .btn-primary', function () {
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
    $('body').on('click', '.price .btn-success', function () {
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
    $('body').on('click', '.confirmAllToShipping', function () {
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
    $('body').on('click', '.confirmAllToShipped', function () {
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
