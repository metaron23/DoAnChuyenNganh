$(document).ready(function () {
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
        $.each(dates, function (key, value) {
            dates[key].innerHTML = formatDateTime(dates[key].innerHTML);
        });
    }

    parseDateInvoid();

    function exportExel() {
        window.location.replace('/admin/hoa-don/export');
    };

    $('.detailAccount').click(function () {
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

    $('#exportExelSelect').change(function () {
        if ($('#exportExelSelect').val() == 0) {
            $('.exportExelInput').removeAttr('hidden');
        } else {
            $('.exportExelInput').attr('hidden', 'hidden');
        }
    });
    $('#btn_exportExel').click(function () {
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
    $('.modal #print_invoice').click(function () {
        in_Content('invoice');
    });
});
