@extends('admin.master')

@section('title')
    <h2>Quản Lý Tài Khoản</h2>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Tạo Mới Tài Khoản</h4>
                </div>
                <div class="card-body overflow-auto" style="height:500px">
                    <form class="form theme-form" id="formCreate">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input class="form-control" id="email" name="email" type="email" placeholder="Nhập vào Email">
                                    <small style="font-weight:600" id="message_email"></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Tên Tài Khoản</label>
                                    <input class="form-control" id="ho_va_ten" name="ho_va_ten" type="text" placeholder="Nhập vào tên tài khoản">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input class="form-control" id="password" name="password" type="password" placeholder="Nhập vào mật khẩu">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Re-Password</label>
                                    <input class="form-control" id="re_password" name="re_password" type="password" placeholder="Nhập lại mật khẩu">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Năm Sinh</label>
                                    <input class="form-control" id="nam_sinh" name="nam_sinh" type="date" placeholder="Nhập vào năm sinh">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Giới Tính</label>
                                    <select class="form-control" id="gioi_tinh" name="gioi_tinh">
                                        <option value="1">Nam</option>
                                        <option value="0">Nữ</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Ảnh Đại Diện</label>
                                    <div class="input-group">
                                        <input class="btn btn-primary" type="button" id="anh_dai_dien" data-input="thumbnail" data-preview="holder"
                                            value="Upload">
                                        <input id="thumbnail" class="form-control" type="text" name="anh_dai_dien">
                                    </div>
                                    <img id="holder" style="margin-top:15px;max-height:100px;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Địa chỉ</label>
                                    <input class="form-control" id="dia_chi" name="dia_chi" type="text" placeholder="Nhập vào địa chỉ">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Số Điện Thoại</label>
                                    <input class="form-control" id="so_dien_thoai" name="so_dien_thoai" type="text"
                                        placeholder="Nhập vào số điện thoại">
                                    <small style="font-weight:600" id="message_so_dien_thoai"></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Tình Trạng</label>
                                    <select class="form-control" id="tinh_trang" name="tinh_trang">
                                        <option value="1">Hoạt Động</option>
                                        <option value="0">Khoá</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Loại Tài Khoản</label>
                                    <select class="form-control" id="loai_tai_khoan" name="loai_tai_khoan">
                                        <option value="0">Admin</option>
                                        <option value="1">Nhân Viên</option>
                                        <option value="2">Khách Hàng</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit" id="createTaiKhoan">Thêm
                                Mới</button>
                            <input class="btn btn-light" type="reset" value="Huỷ">
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Danh Sách Các Danh Mục Món Ăn</h4>
                </div>

                <div class="card-body" style="height:500px;overflow-y:auto">
                    <table class="table table-bordered" id="danhSachTaiKhoan">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Email</th>
                                <th scope="col">Tên Tài Khoản</th>
                                <th scope="col">Năm Sinh</th>
                                <th scope="col">Giới Tính</th>
                                <th scope="col">Số Điện Thoại</th>
                                <th scope="col">Tình Trạng</th>
                                <th scope="col">Loại Tài Khoản</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form class="form theme-form" id="updateTaiKhoan">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Cập Nhập
                                                    Tài Khoản
                                                </h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input id="id" class="form-control" type="text" name="id" hidden>
                                                <div class="mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input class="form-control" id="email_edit" name="email" type_edit="email"
                                                        placeholder="Nhập vào Email">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Tên Tài Khoản</label>
                                                    <input class="form-control" id="ho_va_ten_edit" name="ho_va_ten" type="text"
                                                        placeholder="Nhập vào tên tài khoản">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Password</label>
                                                    <input class="form-control" id="password_edit" name="password" type="text"
                                                        placeholder="Nhập vào password">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Re-Password</label>
                                                    <input class="form-control" id="re_password_edit" name="re_password" type="text"
                                                        placeholder="Nhập vào password">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Năm Sinh</label>
                                                    <input class="form-control" id="nam_sinh_edit" name="nam_sinh" type="date"
                                                        placeholder="Nhập vào năm sinh">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Giới Tính</label>
                                                    <select class="form-control" id="gioi_tinh_edit" name="gioi_tinh">
                                                        <option value="1">Nam</option>
                                                        <option value="0">Nữ</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">Địa chỉ</label>
                                                        <input class="form-control" id="dia_chi_edit" name="dia_chi"_edit type="text"
                                                            placeholder="Nhập vào địa chỉ">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">Số Điện Thoại</label>
                                                        <input class="form-control" id="so_dien_thoai_edit" name="so_dien_thoai" type="text"
                                                            placeholder="Nhập vào số điện thoại">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Ảnh Đại Diện</label>
                                                    <div class="input-group">
                                                        <input class="btn btn-primary" type="button" id="anh_dai_dien_edit"
                                                            data-input="thumbnail_edit" data-preview="holder_edit" value="Upload">
                                                        <input id="thumbnail_edit" class="form-control" type="text" name="anh_dai_dien">
                                                    </div>
                                                    <img id="holder_edit" style="margin-top:15px;max-height:100px;">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Tình Trạng</label>
                                                    <select class="form-control" id="tinh_trang_edit" name="tinh_trang">
                                                        <option value="1">Đang Sử Dụng</option>
                                                        <option value="0">Khoá</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Loại Tài Khoản</label>
                                                    <select class="form-control" id="loai_tai_khoan_edit" name="loai_tai_khoan">
                                                        <option value="0">Admin</option>
                                                        <option value="1">Nhân Viên</option>
                                                        <option value="2">Khách Hàng</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Đóng</button>
                                                <button class="btn btn-secondary" type="submit">Lưu</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </tbody>
                    </table>
                    <div id="links"></div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        $('#anh_dai_dien').filemanager('image');
        $('#anh_dai_dien_edit').filemanager('image');
    </script>

    <script>
        $(document).ready(function() {
            //Hàm thêm mới tài khoản--------------------------------
            $('#formCreate').submit(function(e) {
                e.preventDefault();
                let payLoad = window.getFormData($(this));
                payLoad['kich_hoat']="";
                $.ajax({
                    url: '/admin/tai-khoan/index',
                    type: 'post',
                    data: payLoad,
                    success: function(res) {
                        toastr.success('Đã thêm mới tài khoản thành công!');
                        $("#formCreate").trigger("reset");
                        $('#holder').removeAttr('src');
                        loadListTaiKhoan(numberPages);
                    },
                    error: function(res) {
                        var listError = res.responseJSON.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    },
                });
            });
            //3 hàm này để kiểm tra tồn tại khi vừa rời input----
            $('#email').blur(function() {
                let payLoad = {
                    'email': $('#email').val()
                }
                $.ajax({
                    url: '/admin/tai-khoan/check-email',
                    type: 'post',
                    data: payLoad,
                    success: function(res) {
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
                    error: function(res) {
                        var listError = res.responseJSON.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    },
                });
            });

            $('#so_dien_thoai').blur(function() {
                let payLoad = {
                    'so_dien_thoai': $('#so_dien_thoai').val()
                }
                $.ajax({
                    url: '/admin/tai-khoan/check-so-dien-thoai',
                    type: 'post',
                    data: payLoad,
                    success: function(res) {
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
                    error: function(res) {
                        var listError = res.responseJSON.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    },
                });
            });

            //Hàm chuyển trạng thái từ hiển thị sang tạm tắt------
            $('body').on('click', '.doiTrangThai', function() {
                let id_tai_khoan = $(this).data('id');
                $.ajax({
                    url: '/admin/tai-khoan/update-status/' + id_tai_khoan,
                    type: 'get',
                    success: function(res) {
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
            $('body').on('click', '.edit', function() {
                let id_tai_khoan = $(this).data('id');
                $.ajax({
                    url: '/admin/tai-khoan/edit/' + id_tai_khoan,
                    type: 'get',
                    success: function(res) {
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
            $('#updateTaiKhoan').submit(function(e) {
                e.preventDefault();
                let payLoad = window.getFormData($(this));
                $.ajax({
                    url: '/admin/tai-khoan/update',
                    type: 'post',
                    data: payLoad,
                    success: function(res) {
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
                    error: function(res) {
                        var listError = res.responseJSON.errors;
                        $.each(listError, function(key, value) {
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
                    success: function(res) {
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
                $.each(listTaiKHoan.data, function(key, value) {
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
            $('#links').on('click', 'a', function(event) {
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
    </script>
@endsection
