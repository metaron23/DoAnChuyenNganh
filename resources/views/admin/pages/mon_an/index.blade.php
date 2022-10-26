@extends('admin.master')

@section('title')
    <h2>Quản Lý Món Ăn</h2>
@endsection

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h4>Tạo Món Ăn Mới</h4>
            </div>
            <div class="card-body">
                <form id="formCreate" class="form theme-form">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Mã Món Ăn</label>
                                <input tabindex="1" class="form-control" id="ma_mon_an" name="ma_mon_an" type="text"
                                    placeholder="Nhập vào mã Món Ăn">
                                <small style="font-weight:600" id="message_ma_mon_an"></small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Tên Món Ăn</label>
                                <input tabindex="2" class="form-control" id="ten_mon_an" name="ten_mon_an" type="text"
                                    placeholder="Nhập vào tên Món Ăn">
                                <small style="font-weight:600" id="message_ten_mon_an"></small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Slug Món Ăn</label>
                                <input class="form-control" id="slug_mon_an" name="slug_mon_an" type="text" placeholder="Nhập vào slug Món Ăn">
                                <small style="font-weight:600" id="message_slug_mon_an"></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Tình Trạng Món Ăn</label>
                                <select class="form-control" id="tinh_trang_mon_an" name="tinh_trang_mon_an">
                                    <option value="1">Hiển thị</option>
                                    <option value="0">Tạm tắt</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Đơn giá bán</label>
                                <input tabindex="3" class="form-control" id="don_gia_ban" name="don_gia_ban" type="number"
                                    placeholder="Nhập vào đơn giá bán">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Đơn giá khuyến mãi</label>
                                <input tabindex="4" class="form-control" id="don_gia_khuyen_mai" name="don_gia_khuyen_mai" type="number"
                                    placeholder="Nhập vào đơn giá khuyến mãi">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Hình Ảnh</label>
                                <div class="input-group">
                                    <input class="btn btn-primary" type="button" id="hinh_anh" data-input="thumbnail" data-preview="holder"
                                        value="Upload">
                                    <input id="thumbnail" class="form-control" type="text" name="filepath">
                                </div>
                                <img id="holder" style="margin-top:15px;max-height:100px;">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Danh Mục</label>
                                <select tabindex="7" class="form-control" id="danh_muc" name="danh_muc">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="mo_ta_ngan">Mô Tả Ngắn</label>
                                <textarea tabindex="8" class="form-control" id="mo_ta_ngan" rows="5" name='mo_ta_ngan' placeholder="Nhập vào mô tả ngắn"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="mo_ta_chi_tiet">Mô Tả Chi Tiết</label>
                                <textarea tabindex="9" class="form-control" id="mo_ta_chi_tiet" rows="8" name='mo_ta_chi_tiet' placeholder="Nhập vào mô tả chi tiết"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button tabindex="9" class="btn btn-primary" type="button" id="createMonAn">Thêm
                            Mới Món Ăn</button>
                        <input class="btn btn-light" type="reset" value="Huỷ">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h4>Danh Sách Các Món Ăn</h4>
            </div>
            <div class="card-body" style="height: 900px; overflow: auto;">
                <table class="table table-bordered" id="danhSachMonAn">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Mã Món Ăn</th>
                            <th scope="col">Tên Món Ăn</th>
                            <th scope="col">Slug Món Ăn</th>
                            <th scope="col">Danh Mục Món Ăn</th>
                            <th scope="col">Giá Bán</th>
                            <th scope="col">Giá Khuyến Mãi</th>
                            <th scope="col">Hình Ảnh</th>
                            <th scope="col">Tình Trạng</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLongTitle" style="display: none;"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Cập nhập Món Ăn</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title=""
                                            title=""></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <input type="text" id="id_edit" hidden>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Mã Món Ăn</label>
                                                    <input tabindex="1" class="form-control" id="ma_mon_an_edit" name="ma_mon_an_edit"
                                                        type="text" placeholder="Nhập vào mã Món Ăn">
                                                    <small style="font-weight:600" id="message_ma_mon_an_edit"></small>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Tên Món Ăn</label>
                                                    <input tabindex="2" class="form-control" id="ten_mon_an_edit" name="ten_mon_an_edit"
                                                        type="text" placeholder="Nhập vào tên Món Ăn">
                                                    <small style="font-weight:600" id="message_ten_mon_an_edit"></small>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Slug Món Ăn</label>
                                                    <input class="form-control" id="slug_mon_an_edit" name="slug_mon_an_edit" type="text"
                                                        placeholder="Nhập vào slug Món Ăn">
                                                    <small style="font-weight:600" id="message_slug_mon_an_edit"></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Tình Trạng Món Ăn</label>
                                                    <select class="form-control" id="tinh_trang_mon_an_edit" name="tinh_trang_mon_an_edit">
                                                        <option value="1">Hiển thị</option>
                                                        <option value="0">Tạm tắt</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Đơn giá bán</label>
                                                    <input tabindex="3" class="form-control" id="don_gia_ban_edit" name="don_gia_ban_edit"
                                                        type="number" placeholder="Nhập vào đơn giá bán">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Đơn giá khuyến mãi</label>
                                                    <input tabindex="4" class="form-control" id="don_gia_khuyen_mai_edit"
                                                        name="don_gia_khuyen_mai_edit" type="number" placeholder="Nhập vào đơn giá khuyến mãi">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Hình Ảnh</label>
                                                    <div class="input-group">
                                                        <input class="btn btn-primary" type="button" id="hinh_anh_edit" data-input="thumbnail_edit"
                                                            data-preview="holder_edit" value="Upload">
                                                        <input id="thumbnail_edit" class="form-control" type="text" name="filepath">
                                                    </div>
                                                    <img id="holder_edit" style="margin-top:15px;max-height:100px;">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Danh Mục</label>
                                                    <select tabindex="7" class="form-control" id="danh_muc_edit" name="danh_muc_edit">

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="mo_ta_ngan">Mô Tả Ngắn</label>
                                                    <textarea tabindex="8" class="form-control" id="mo_ta_ngan_edit" rows="5" name='mo_ta_ngan_edit' placeholder="Nhập vào mô tả ngắn"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="mo_ta_chi_tiet">Mô Tả Chi Tiết</label>
                                                    <textarea tabindex="9" class="form-control" id="mo_ta_chi_tiet_edit" rows="8" name='mo_ta_chi_tiet_edit'
                                                        placeholder="Nhập vào mô tả chi tiết"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" data-bs-original-title=""
                                            title="">Đóng</button>
                                        <button class="btn btn-primary" id="updateMonAn" type="button" data-bs-original-title="" title=""
                                            data-bs-dismiss="modal">Lưu</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Xoá Món Ăn
                                        </h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-2">
                                        <input type="text" id="id_mon_an_delete" hidden>
                                        <div class="alert alert-danger" role="alert">
                                            <p>Bạn có chắc chắn muốn xoá?</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Huỷ</button>
                                        <button class="btn btn-secondary" id="deleteMonAn" type="button" data-bs-dismiss="modal">Xoá</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tbody>
                </table>
                <div id='links'>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script src="https://unpkg.com/sticky-table-headers"></script>
    <script>
        $('#hinh_anh').filemanager('image');
        $('#hinh_anh_edit').filemanager('image');
        CKEDITOR.replace('mo_ta_chi_tiet');
        CKEDITOR.replace('mo_ta_chi_tiet_edit');
    </script>

    <script>
        $('table').stickyTableHeaders();
        $(document).ready(function() {
            //Chuyển chuỗi string sang slug----------------------
            function convertToSlug(str) {
                str = str.toLowerCase();
                str = str.normalize('NFD') //chuyển chuỗi sang unicode tổ hợp
                    .replace(/[\u0300-\u036f]/g, ''); // xoá các ký tự đầu sau khi tách tổ hợp
                //thay kí tự dĐ
                str = str.replace(/[đĐ]/g, 'd');
                //xoá kí tự đặc biệt
                str = str.replace(/([^0-9a-z-\s])/g, '');
                //xoá khoảng trắng thay bằng kí tự
                str = str.replace(/(\s+)/g, '-');
                //xoá kí tự - liên tiếp
                str = str.replace(/-+/g, '-');
                //xoá phần dư - ở đầu và cuối
                str = str.replace(/^-+|-+$/g, '');
                return str;
            };
            //Dùng keyup để nhập từ động sang slug---------------
            $('#ten_mon_an').keyup(function() {
                let ten_mon_an = $('#ten_mon_an').val();
                let slug = convertToSlug(ten_mon_an);
                $('#slug_mon_an').val(slug);
            });
            //Hàm thêm mới món ăn--------------------------------
            $('#createMonAn').click(function() {
                var payLoad = {
                    'ma_mon_an': $('#ma_mon_an').val(),
                    'ten_mon_an': $('#ten_mon_an').val(),
                    'slug_mon_an': $('#slug_mon_an').val(),
                    'tinh_trang': $('#tinh_trang_mon_an').val(),
                    'don_gia_ban': $('#don_gia_ban').val(),
                    'don_gia_khuyen_mai': $('#don_gia_khuyen_mai').val(),
                    'hinh_anh': $('#thumbnail').val(),
                    'mo_ta_ngan': $('#mo_ta_ngan').val(),
                    'mo_ta_chi_tiet': CKEDITOR.instances['mo_ta_chi_tiet'].getData(),
                    'id_danh_muc': $('#danh_muc').val(),
                }
                $.ajax({
                    url: '/admin/mon-an/index',
                    type: 'post',
                    data: payLoad,
                    success: function(res) {
                        toastr.success('Đã thêm mới món ăn thành công!');
                        CKEDITOR.instances['mo_ta_chi_tiet'].setData('');
                        $("#formCreate").trigger("reset");
                        $('#holder').removeAttr('src');
                        loadListMonAn(numberPages);
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
            $('#ma_mon_an').blur(function() {
                let payLoad = {
                    'ma_mon_an': $('#ma_mon_an').val()
                }
                $.ajax({
                    url: '/admin/mon-an/check-ma-mon-an',
                    type: 'post',
                    data: payLoad,
                    success: function(res) {
                        if (res.status) {
                            $('#message_ma_mon_an').text(
                                "Mã món ăn đã tồn tại");
                            $('#ma_mon_an').addClass(
                                'border border-danger');
                            $('#message_ma_mon_an').addClass('text-danger');
                            $('#createMonAn').prop('disabled', true);
                        } else {
                            $('#message_ma_mon_an').text(
                                "");
                            $('#ma_mon_an').removeClass(
                                'border border-danger');
                            $('#message_ma_mon_an').removeClass(
                                'text-danger');
                            $('#createMonAn').prop('disabled', false)
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

            $('#ten_mon_an').blur(function() {
                let payLoad = {
                    'ten_mon_an': $('#ten_mon_an').val()
                }
                $.ajax({
                    url: '/admin/mon-an/check-ten-mon-an',
                    type: 'post',
                    data: payLoad,
                    success: function(res) {
                        if (res.status) {
                            $('#message_ten_mon_an').text(
                                "Tên món ăn đã tồn tại");
                            $('#ten_mon_an').addClass(
                                'border border-danger');
                            $('#message_ten_mon_an').addClass(
                                'text-danger');
                            $('#createMonAn').prop('disabled', true);
                        } else {
                            $('#message_ten_mon_an').text(
                                "");
                            $('#ten_mon_an').removeClass(
                                'border border-danger');
                            $('#message_ten_mon_an').removeClass(
                                'text-danger');
                            $('#createMonAn').prop('disabled', false)
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

            $('#slug_mon_an').blur(function() {
                let payLoad = {
                    'slug_mon_an': $('#slug_mon_an').val()
                }
                $.ajax({
                    url: '/admin/mon-an/check-slug-mon-an',
                    type: 'post',
                    data: payLoad,
                    success: function(res) {
                        if (res.status) {
                            $('#message_slug_mon_an').text(
                                "Slug món ăn đã tồn tại");
                            $('#slug_mon_an').addClass(
                                'border border-danger');
                            $('#message_slug_mon_an').addClass(
                                'text-danger');
                            $('#createMonAn').prop('disabled', true);
                        } else {
                            $('#message_slug_mon_an').text(
                                "");
                            $('#slug_mon_an').removeClass(
                                'border border-danger');
                            $('#message_slug_mon_an').removeClass(
                                'text-danger');
                            $('#createMonAn').prop('disabled', false)
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
                let id_mon_an = $(this).data('id');
                $.ajax({
                    url: '/admin/mon-an/update-status/' + id_mon_an,
                    type: 'get',
                    success: function(res) {
                        if (res.status) {
                            toastr.success('Đổi trạng thái thành công!');
                            console.log(numberPages);
                            loadListMonAn(numberPages);
                        } else {
                            toastr.error('Đã có lỗi xảy ra!');
                        }
                    },
                });
            });
            //Get data về để show lên modal khi ấn sửa------------
            $('body').on('click', '.edit', function() {
                let id = $(this).data('id');
                loadDanhMuc('danh_muc_edit');
                $.ajax({
                    url: '/admin/mon-an/edit/' + id,
                    type: 'get',
                    success: function(res) {
                        if (res.status) {
                            $('#id_edit').val(res.data.id);
                            $('#ma_mon_an_edit').val(res.data.ma_mon_an);
                            $('#ten_mon_an_edit').val(res.data.ten_mon_an);
                            $('#slug_mon_an_edit').val(res.data.slug_mon_an);
                            $('#tinh_trang_mon_an_edit').val(res.data.tinh_trang);
                            $('#don_gia_ban_edit').val(res.data.don_gia_ban);
                            $('#don_gia_khuyen_mai_edit').val(res.data.don_gia_khuyen_mai);
                            $('#thumbnail_edit').val(res.data.hinh_anh);
                            $('#holder_edit').attr("src", res.data.hinh_anh);
                            $('#mo_ta_ngan_edit').val(res.data.mo_ta_ngan);
                            CKEDITOR.instances.mo_ta_chi_tiet_edit.setData(res.data.mo_ta_chi_tiet);
                            $('#danh_muc_edit').val(res.data.id_danh_muc);
                        } else {
                            toastr.error('Có lỗi xảy ra!');
                        }
                    },
                });
            });
            //Ấn lưu chạy hàm để cập nhập data từ modal vào database
            $('#updateMonAn').click(function() {
                let payLoad = {
                    'id': $('#id_edit').val(),
                    'ma_mon_an': $('#ma_mon_an_edit').val(),
                    'ten_mon_an': $('#ten_mon_an_edit').val(),
                    'slug_mon_an': $('#slug_mon_an_edit').val(),
                    'tinh_trang': $('#tinh_trang_mon_an_edit').val(),
                    'don_gia_ban': $('#don_gia_ban_edit').val(),
                    'don_gia_khuyen_mai': $('#don_gia_khuyen_mai_edit').val(),
                    'hinh_anh': $('#thumbnail_edit').val(),
                    'mo_ta_ngan': $('#mo_ta_ngan_edit').val(),
                    'mo_ta_chi_tiet': CKEDITOR.instances.mo_ta_chi_tiet_edit.getData(),
                    'id_danh_muc': $('#danh_muc_edit').val(),
                };
                $.ajax({
                    url: '/admin/mon-an/update',
                    type: 'post',
                    data: payLoad,
                    success: function(res) {
                        toastr.success('Đã cập nhập thành công!');
                        loadListMonAn(numberPages);
                    },
                    error: function(res) {
                        var listError = res.responseJSON.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    },
                });
            });
            //Hiện modal hỏi đồng ý xoá hay ko
            $('body').on('click', '.nof-delete', function() {
                let id = $(this).data('id');
                $('#id_mon_an_delete').val(id);
            });
            //Đồng ý thì chạy hàm để xoá
            $('#deleteMonAn').click(function() {
                let id = $('#id_mon_an_delete').val();
                $.ajax({
                    url: '/admin/mon-an/destroy/' + id,
                    type: 'get',
                    success: function(res) {
                        if (res.status) {
                            toastr.success('Đã xoá thành công!');
                            loadListMonAn(numberPages);
                        } else {
                            toastr.error('Món Ăn không tồn tại!');
                        }
                    }
                });
            });
            //Hàm load danh mục lên các potion danh mục
            function loadDanhMuc(id) {
                $.ajax({
                    url: '/admin/danh-muc-mon-an/get-data',
                    type: 'get',
                    success: function(res) {
                        var contentDanhMuc = '';
                        $.each(res.data, function(key, value) {
                            contentDanhMuc += '<option value=' + value.id +
                                '>' + value.ten_danh_muc + '</option>'
                        })
                        $("#" + id + "").html(contentDanhMuc);
                    },
                });
            }
            loadDanhMuc('danh_muc');
            //Hàm tạo mới các row ở bảng
            function createRow(monAn, stt) {
                let content = '';
                content += `<tr class="align-middle text-center">`;
                content += `<th>` + stt + `</th>`;
                content += `<td>` + monAn.ma_mon_an + `</td>`;
                content += `<td>` + monAn.ten_mon_an + `</td>`;
                content += `<td>` + monAn.slug_mon_an + `</td>`;
                content += `<td>` + monAn.ten_danh_muc + `</td>`;
                content += `<td>` + monAn.don_gia_ban + `</td>`;
                content += `<td>` + monAn.don_gia_khuyen_mai + `</td>`;
                content += `<td style="padding:4px">`
                content += `<img src="` + monAn.hinh_anh + `"
                        alt="anh_cua_hap_xa" style="width:200px">`;
                content += `</td>`;
                content += `<td>`;
                if (monAn.tinh_trang == 1) {
                    content += `<button class="btn btn-primary doiTrangThai" data-id=` + monAn.id + `>Hiển Thị</button>`;
                } else {
                    content += `<button class="btn btn-danger doiTrangThai" data-id=` + monAn.id + `>Tạm tắt</button>`;
                }
                content += `</td>`;
                content += `<td>`;
                content += `<button class="btn btn-info m-2 edit" data-id=` + monAn.id +
                    ` data-bs-toggle="modal" data-bs-target="#editModal">Sửa</button>`;
                content += `<button class="btn btn-danger m-2 nof-delete" data-id=` + monAn.id +
                    ` data-bs-toggle="modal" data-bs-target="#deleteModal">Xoá</button>`;
                content += `</td>`;
                content += `</tr>`;
                return content;
            }
            //Khai báo 2 biến để làm điều hướng trang
            var numberTotalPages = 0;
            var numberPages = 0;
            //Hàm load lại list với số page truyền vào
            function loadListMonAn(page) {
                $.ajax({
                    url: '/admin/mon-an/get-data?page=' + page,
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
            loadListMonAn(1);
            //Lấy data đổ lên html
            function viewTable(listdanhMuc) {
                var content = '';
                $.each(listdanhMuc.data, function(key, value) {
                    content += createRow(value, key + 1);
                });
                $("#danhSachMonAn tbody").html(content);
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
                    loadListMonAn(number);
                    numberPages = number;
                }

                if ($(this).attr('aria-label') == 'Head') {
                    loadListMonAn(1);
                    $('a[data-id="1"]').parentsUntil("page-item").addClass('active');
                    numberPages = 1;
                }

                if ($(this).attr('aria-label') == 'Last') {
                    loadListMonAn(numberTotalPages);
                    $('a[data-id=' + numberTotalPages + ']').parentsUntil("page-item").addClass('active');
                    numberPages = numberTotalPages;
                }
            });
        });
    </script>
@endsection
