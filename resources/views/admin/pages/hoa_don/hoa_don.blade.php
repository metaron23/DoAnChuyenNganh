@extends('admin.master')

@section('content')
    <div id="hoaDonAdmin">
        <div class="row p-t-20">
            <div class="row p-20">
                <h4>Quản Lý Hoá Đơn</h4>
            </div>
            <div class="row p-20 p-r-0">
                <div class="col-md-2 m-b-20">
                    <select class="form-select" id="exportExelSelect" data-container="body" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-original-title="Chọn số bản ghi muốn xuất">
                        <option value="all">Tất Cả</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="0">Khác</option>
                    </select>
                </div>
                <div class="col-md-2 m-b-20 d-flex p-l-0">
                    <input type="number" class="exportExelInput img-60" hidden>
                    <button class="btn btn-primary m-l-10" id="btn_exportExel">Xuất Exel</button>
                </div>
                <div class="respoTable">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" class="img-30">#</th>
                                <th scope="col">Thao Tác</th>
                                <th scope="col">Mã Hoá Đơn</th>
                                <th scope="col">Email Khác Hàng</th>
                                <th scope="col">Tên Khách Hàng</th>
                                <th scope="col">Địa Chỉ</th>
                                <th scope="col">Tình Trạng Thanh Toán</th>
                                <th scope="col">Tổng Tiền</th>
                                <th scope="col">Ngày Tạo</th>
                                <th scope="col">Email Người Xác Nhận</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hoaDon as $key => $value)
                                <tr>
                                    <th scope="row" class="img-30">{{ $key + 1 }}</th>
                                    <td>
                                        <button data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" class="detailAccount"
                                            data-id="{{ $value->id }}"><i class="fa fa-eye"></i></button>
                                    </td>
                                    <td>{{ $value->ma_don_hang }}</td>
                                    <td>{{ $value->email_khach_hang }}</td>
                                    <td>{{ $value->ten_khach_hang }}</td>
                                    <td>{{ $value->dia_chi_ship }}</td>
                                    @if ($value->trang_thai_thanh_toan == 1)
                                        <td>
                                            <span class="badge rounded-pill badge-success">Đã Thanh Toán</span>
                                        </td>
                                    @else
                                        <td>
                                            <span class="badge rounded-pill badge-danger">Chưa Thanh Toán</span>
                                        </td>
                                    @endif
                                    <td>{{ $value->tong_tien }}</td>
                                    <td id="dateInvoid">{{ $value->updated_at }}</td>
                                    <td>
                                        <span class="badge rounded-pill badge-info">{{ $value->email_nguoi_xac_nhan }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div style="margin-right:12px">
            {{ $hoaDon->links('pagination::bootstrap-5') }}
        </div>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Chi Tiết Hoá Đơn</h4>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title=""
                            title=""></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                        </div>
                        <div class="col-sm-12 text-center mt-3">
                            <button class="btn btn btn-primary me-2" id="print_invoice" type="button" data-bs-original-title=""
                                title="">Print</button>
                            <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancel</button>
                        </div>`
                    </div>`
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            function formatDateTime(fullDay) {
                let time = fullDay.slice(fullDay.indexOf(' ') + 1);
                let date = fullDay.slice(0, fullDay.indexOf(' '));
                let dateArray = date.split('-');
                dateArray.reverse();
                date = dateArray.join('/');
                return time + " | " + date;
            };

            function formatDateTimeToJS(fullDay) {
                let time = fullDay.slice(fullDay.indexOf('T') + 1, fullDay.indexOf('.'));
                let timeArray = time.split(':');
                timeArray[0] = Number(timeArray[0]) + 7;
                time = timeArray.join(':');
                let date = fullDay.slice(0, fullDay.indexOf('T'));
                let dateArray = date.split('-');
                dateArray.reverse();
                date = dateArray.join('/');
                return time + " | " + date;
            };

            function parseDateInvoid() {
                let dates = $('td#dateInvoid');
                $.each(dates, function(key, value) {
                    dates[key].innerHTML = formatDateTime(dates[key].innerHTML);
                });
            }

            parseDateInvoid();

            function exportExel() {
                window.location.replace('/admin/hoa-don/export');
            };

            $('.detailAccount').click(function() {
                let id = $(this).data('id');
                axios
                    .get("/admin/hoa-don/getData/" + id)
                    .then((res) => {
                        $('body .modal-body>.row').html(createModal(res.data.hoaDon));
                    });
            });

            function createModal(donHang) {
                let content = "";
                content += `<div id="invoice">`
                content += `    <div class="row">`
                content += `        <div class="col-sm-6">`
                content += `            <div class="media">`
                content += `                <div class="media-body m-l-16">`
                content += `                    <h4 class="media-heading">Người Nhận</h4>
                                            <h6 class="media-heading">Tên: ` + donHang.ten_ship + `</h6>`
                content += `                    <p><span>Số điện thoại: ` + donHang.phone_ship + `</span><br>Đặt bởi: ` + donHang.ten_khach_hang +
                    ", " + donHang.email_khach_hang + `</p>`
                content += `                </div>`
                content += `            </div>`
                content += `        </div>`
                content += `        <div class="col-sm-6">`
                content += `            <div class="text-md-end text-xs-center">`
                content += `                <h3>Mã HD #<span class="counter">` + donHang.ma_don_hang + `</span></h3>`
                content += `                <p>Thời gian tạo: ` + formatDateTimeToJS(donHang.updated_at) + `</p>`
                content += `            </div>`
                content += `        </div>`
                content += `    </div>`
                content += `    <hr>`
                content += `    <div>`
                content += `        <div class="table-responsive invoice-table" id="table">`
                content += `            <table class="table table-bordered table-striped">`
                content += `                <tbody>`
                content += `                    <tr>`
                content += `                        <th class="m-t-2">`
                content += `                            Hình Ảnh`
                content += `                        </th>`
                content += `                        <th class="m-t-2">`
                content += `                            Tên Món`
                content += `                        </th>`
                content += `                        <th class="m-t-2">`
                content += `                            Số Lượng`
                content += `                        </th>`
                content += `                        <th class="m-t-2">`
                content += `                            Đơn Giá`
                content += `                        </th>`
                content += `                        <th class="m-t-2">`
                content += `                            Thành Tiền`
                content += `                        </th>`
                content += `                    </tr>`
                donHang.food.forEach(element => {
                    content += `                    <tr>`
                    content += `                        <td>`
                    content += `                            <img src="` + element.hinh_anh + `" alt="ảnh món ăn" style="width:100px">`
                    content += `                        </td>`
                    content += `                        <td>`
                    content += `                            <label>` + element.ten_mon_an + `</label>`
                    content += `                        </td>`
                    content += `                        <td>`
                    content += `                            <p class="itemtext">` + element.so_luong_mua + `</p>`
                    content += `                        </td>`
                    content += `                        <td>`
                    content += `                            <p class="itemtext">` + element.don_gia_mua + `</p>`
                    content += `                        </td>`
                    content += `                        <td>`
                    content += `                            <p class="itemtext">` + (element.so_luong_mua * element.don_gia_mua)
                        .toLocaleString() + `</p>`
                    content += `                        </td>`
                    content += `                    </tr>`
                });
                content += `                    <tr>`
                content += `                        <td colspan="3"></td>`
                content += `                        <td class="Rate">`
                content += `                            <b>Tổng Tiền</b>`
                content += `                        </td>`
                content += `                        <td class="payment">`
                content += `                           <b>` + donHang.tong_tien.toLocaleString() + ` VND</b>`
                content += `                        </td>`
                content += `                    </tr>`
                content += `                </tbody>`
                content += `            </table>`
                content += `        </div>`
                content += `        <div class="row">`
                content += `            <div class="col-md-12">`
                content += `                <div>`
                content += `                    <p class="legal"><strong>Cảm ơn quý khách hàng đã đặt món tại B-Restaurant!</strong>&nbsp; Hoá đơn chỉ có tác
                                    dụng trong
                                    ngày, nếu có gì sai vui lòng đem đến cửa hàng sớm nhất. Cảm ơn quý khách và hẹn gặp lại</p>`
                content += `                </div>`
                content += `            </div>`
                content += `        </div>`
                content += `    </div>`
                return content;
            }

            $('#exportExelSelect').change(function() {
                if ($('#exportExelSelect').val() == 0) {
                    $('.exportExelInput').removeAttr('hidden');
                } else {
                    $('.exportExelInput').attr('hidden', 'hidden');
                }
            });
            $('#btn_exportExel').click(function() {
                let amount = $('#exportExelSelect').val();
                if (amount == 0) {
                    amount = $('.exportExelInput').val();
                }
                window.location.href = "/admin/hoa-don/export/" + amount;
            });

            function in_Content(strid) {
                var prtContent = document.getElementById(strid);
                var WinPrint = window.open("");
                WinPrint.document.write(prtContent.innerHTML);
                WinPrint.print();
                WinPrint.document.close();
            };
            $('.modal #print_invoice').click(function() {
                in_Content('invoice');
            });
        });
    </script>
@endsection
