
$('#anh_dai_dien').filemanager('image');
$('#anh_dai_dien_edit').filemanager('image');

$(document).ready(function () {
    //Hàm thêm mới tài khoản--------------------------------
    $('#formCreate').submit(function (e) {
        e.preventDefault();
        let payLoad = window.getFormData($(this));
        payLoad['kich_hoat'] = "";
        $.ajax({
            url: '/admin/tai-khoan/index',
            type: 'post',
            data: payLoad,
            success: function (res) {
                toastr.success('Đã thêm mới tài khoản thành công!');
                $("#formCreate").trigger("reset");
                $('#holder').removeAttr('src');
                loadListTaiKhoan(numberPages);
            },
            error: function (res) {
                var listError = res.responseJSON.errors;
                $.each(listError, function (key, value) {
                    toastr.error(value[0]);
                });
            },
        });
    });
    //3 hàm này để kiểm tra tồn tại khi vừa rời input----
    $('#email').blur(function () {
        let payLoad = {
            'email': $('#email').val()
        }
        $.ajax({
            url: '/admin/tai-khoan/check-email',
            type: 'post',
            data: payLoad,
            success: function (res) {
                if (res.status) {
                    $('#message_email').text("Email đã tồn tại");
                    $('#email').addClass('border border-danger');
                    $('#message_email').addClass('text-danger');
                    $('#createTaiKHoan').prop('disabled', true);
                } else {
                    $('#message_email').text("");
                    $('#email').removeClass('border border-danger');
                    $('#message_email').removeClass('text-danger');
                    $('#createTaiKHoan').prop('disabled', false)
                }
            },
            error: function (res) {
                var listError = res.responseJSON.errors;
                $.each(listError, function (key, value) {
                    toastr.error(value[0]);
                });
            },
        });
    });

    $('#so_dien_thoai').blur(function () {
        let payLoad = {
            'so_dien_thoai': $('#so_dien_thoai').val()
        }
        $.ajax({
            url: '/admin/tai-khoan/check-so-dien-thoai',
            type: 'post',
            data: payLoad,
            success: function (res) {
                if (res.status) {
                    $('#message_so_dien_thoai').text(
                        "Số điện thoại đã tồn tại");
                    $('#so_dien_thoai').addClass(
                        'border border-danger');
                    $('#message_so_dien_thoai').addClass(
                        'text-danger');
                    $('#createTaiKHoan').prop('disabled', true);
                } else {
                    $('#message_so_dien_thoai').text(
                        "");
                    $('#so_dien_thoai').removeClass(
                        'border border-danger');
                    $('#message_so_dien_thoai').removeClass(
                        'text-danger');
                    $('#createTaiKHoan').prop('disabled', false)
                }
            },
            error: function (res) {
                var listError = res.responseJSON.errors;
                $.each(listError, function (key, value) {
                    toastr.error(value[0]);
                });
            },
        });
    });

    //Hàm chuyển trạng thái từ hiển thị sang tạm tắt------
    $('body').on('click', '.doiTrangThai', function () {
        let id_tai_khoan = $(this).data('id');
        $.ajax({
            url: '/admin/tai-khoan/update-status/' + id_tai_khoan,
            type: 'get',
            success: function (res) {
                if (res.message) {
                    toastr.warning(res.message);
                } else {
                    if (res.status) {
                        toastr.success('Đổi trạng thái thành công!');
                        console.log(numberPages);
                        loadListTaiKhoan(numberPages);
                    } else {
                        toastr.error('Đã có lỗi xảy ra!');
                    }
                }
            },
        });
    });
    //Get data về để show lên modal khi ấn sửa------------
    $('body').on('click', '.edit', function () {
        let id_tai_khoan = $(this).data('id');
        $.ajax({
            url: '/admin/tai-khoan/edit/' + id_tai_khoan,
            type: 'get',
            success: function (res) {
                if (res.status) {
                    $('#id').val(res.data.id);
                    $('#email_edit').val(res.data.email);
                    $('#ho_va_ten_edit').val(res.data.ho_va_ten);
                    $('#nam_sinh_edit').val(res.data.nam_sinh);
                    $('#gioi_tinh_an_edit').val(res.data.gioi_tinh);
                    $('#dia_chi_edit').val(res.data.dia_chi);
                    $('#so_dien_thoai_edit').val(res.data.so_dien_thoai);
                    $('#thumbnail_edit').val(res.data.anh_dai_dien);
                    $('#holder_edit').attr("src", res.data.anh_dai_dien);
                    $('#loai_tai_khoan_edit').val(res.data.loai_tai_khoan);
                    $('#tinh_trang_edit').val(res.data.tinh_trang);
                } else {
                    toastr.error('Có lỗi xảy ra!');
                }
            },
        });
    });
    //Ấn lưu chạy hàm để cập nhập data từ modal vào database
    $('#updateTaiKhoan').submit(function (e) {
        e.preventDefault();
        let payLoad = window.getFormData($(this));
        $.ajax({
            url: '/admin/tai-khoan/update',
            type: 'post',
            data: payLoad,
            success: function (res) {
                console.log(res.status);
                if (res.status == 0) {
                    toastr.warning(res.message);
                } else {
                    toastr.success('Đã cập nhập thành công!');
                    $('#editModal').modal('toggle');
                    $("#updateForm").trigger("reset");
                    $('#holder_edit').removeAttr('src');
                    loadListTaiKhoan(numberPages);
                }
            },
            error: function (res) {
                var listError = res.responseJSON.errors;
                $.each(listError, function (key, value) {
                    toastr.error(value[0]);
                });
            },
        });
    });
    //Hàm tạo mới các row ở bảng
    function createRow(taiKhoan, stt) {
        let content = "";
        content += `<tr class = "align-middle text-center" >`;
        content += `<th scope = "row">` + stt + `</th>`;
        content += `<td>` + taiKhoan.email + `</td>`;
        content += `<td>` + taiKhoan.ho_va_ten + `</td>`;
        content += `<td>` + taiKhoan.nam_sinh + `</td>`;
        if (taiKhoan.gioi_tinh == 1)
            content += `<td>Nam</td>`;
        else
            content += `<td>Nữ</td>`;
        content += `<td>` + taiKhoan.so_dien_thoai + `</td>`;
        content += `<td>`;
        if (taiKhoan.tinh_trang == 1)
            content += `<button class = "btn btn-primary doiTrangThai" data-id='` + taiKhoan.id + `''>Hoạt Động</button>`;
        else
            content += `<button class = "btn btn-danger doiTrangThai" data-id='` + taiKhoan.id + `''>Khoá</button>`;
        content += `</td>`;
        if (taiKhoan.loai_tai_khoan == 0)
            content += `<td>Admin</td>`;
        else if (taiKhoan.loai_tai_khoan == 1)
            content += `<td>Nhân Viên</td>`;
        else
            content += `<td>Khách Hàng</td>`;
        content += `<td>`;
        content += `<button class="btn btn-info m-1 edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id='` + taiKhoan.id +
            `'> Sửa </button>`;
        content += `</tr>`;
        return content;
    }
    //Khai báo 2 biến để làm điều hư)ớng trang
    var numberTotalPages = 0;
    var numberPages = 0;
    //Hàm load lại list với số page truyền vào
    function loadListTaiKhoan(page) {
        $.ajax({
            url: '/admin/tai-khoan/get-data?page=' + page,
            type: 'get',
            success: function (res) {
                viewTable(res.data);
                numberTotalPages = res.data.last_page;
            },
        });
    }
    //Vì hàm load list chưa chạy xong sẽ sinh ra totalpage = 0
    //Nên dùng settimeout để đợi 1s r mới viewLinks
    setTimeout(() => {
        viewLinks(numberTotalPages);
        $('a[data-id="1"]').parentsUntil("page-item").addClass('active');
    }, 1500);
    //Load lần đầu khi refresh page
    loadListTaiKhoan(1);
    //Lấy data đổ lên html
    function viewTable(listTaiKHoan) {
        var content = '';
        $.each(listTaiKHoan.data, function (key, value) {
            content += createRow(value, key + 1);
        });
        $("#danhSachTaiKhoan tbody").html(content);
    }
    //Lấy data tạo ra link phân trang
    function viewLinks(totalLink) {
        let content = "";
        content += `<nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Head">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>`;
        for (let i = 1; i <= totalLink; i++) {
            content += `<li class="page-item">
                        <a class="page-link" href="#" data-id=` + i + `>` + i + `</a>
                    </li>`;
        }

        content += `
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Last">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
            </ul>
        </nav>`
        $('body #links').html(content);
    }
    //Hàm xử lý các nút phân trang và set active
    $('#links').on('click', 'a', function (event) {
        event.preventDefault();
        $('#links .page-item').removeClass('active');
        if ($(this).attr('aria-label') == null) {
            let number = $(this).data('id');
            $(this).parentsUntil("page-item").addClass('active');
            loadListTaiKhoan(number);
            numberPages = number;
        }

        if ($(this).attr('aria-label') == 'Head') {
            loadListTaiKhoan(1);
            $('a[data-id="1"]').parentsUntil("page-item").addClass('active');
            numberPages = 1;
        }

        if ($(this).attr('aria-label') == 'Last') {
            loadListTaiKhoan(numberTotalPages);
            $('a[data-id=' + numberTotalPages + ']').parentsUntil("page-item").addClass('active');
            numberPages = numberTotalPages;
        }
    });
});