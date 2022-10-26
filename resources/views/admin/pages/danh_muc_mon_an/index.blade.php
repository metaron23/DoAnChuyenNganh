@extends('admin.master')

@section('title')
    <h2>Quản Lý Danh Mục Món Ăn</h2>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Tạo Danh Mục Món Ăn Mới</h4>
                </div>
                <div class="card-body">
                    <form class="form theme-form" id="formCreate">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Mã Danh Mục</label>
                                    <input class="form-control" id="ma_danh_muc" name="ma_danh_muc" type="text" placeholder="Nhập vào mã danh mục">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Tên Danh Mục</label>
                                    <input class="form-control" id="ten_danh_muc" name="ten_danh_muc" type="text" placeholder="Nhập vào tên danh mục">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Slug Danh Mục</label>
                                    <input class="form-control" id="slug_danh_muc" name="slug_danh_muc" type="text"
                                        placeholder="Nhập vào slug danh mục">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Tình Trạng Danh Mục</label>
                                    <select class="form-control" id="tinh_trang_danh_muc" name="tinh_trang_danh_muc">
                                        <option value="1">Hiển thị</option>
                                        <option value="0">Tạm tắt</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="button" id="createDanhMuc">Thêm
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
                    <table class="table table-bordered" id="danhSachDanhMuc">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Mã Danh Mục</th>
                                <th scope="col">Tên Danh Mục</th>
                                <th scope="col">Slug Danh Mục</th>
                                <th scope="col">Tình Trạng</th>
                                <th scope="col">Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Cập Nhập
                                                Thông Tin Danh Mục
                                            </h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input id="id" class="form-control" type="text" name="id" hidden>
                                            <div class="mb-3">
                                                <label class="form-label">Mã Danh Mục</label>
                                                <input class="form-control" id="ma_danh_muc_edit" name="ma_danh_muc_edit" type="text"
                                                    placeholder="Nhập vào mã danh mục">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Tên Danh Mục</label>
                                                <input class="form-control" id="ten_danh_muc_edit" name="ten_danh_muc_edit" type="text"
                                                    placeholder="Nhập vào tên danh mục">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Slug Danh Mục</label>
                                                <input class="form-control" id="slug_danh_muc_edit" name="slug_danh_muc_edit" type="text"
                                                    placeholder="Nhập vào slug danh mục">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Tình Trạng Danh Mục</label>
                                                <select class="form-control" id="tinh_trang_danh_muc_edit" name="tinh_trang_danh_muc_edit">
                                                    <option value="1">Hiển thị</option>
                                                    <option value="0">Tạm tắt</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Đóng</button>
                                            <button class="btn btn-secondary" id="updateDanhMuc" type="button" data-bs-dismiss="modal">Lưu</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Xoá Danh
                                                Mục Sản Phẩm
                                            </h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" id="id_danh_muc_delete" hidden>
                                            <div class="alert alert-danger dark alert-dismissible fade show" role="alert"><strong>Nguy Hiểm !
                                                </strong> Bạn có
                                                chắc chắn muốn xoá không?
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Huỷ</button>
                                            <button class="btn btn-secondary" id="deleteDanhMuc" type="button" data-bs-dismiss="modal">Xoá</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#createDanhMuc").click(function() {
                let danhMuc = {
                    'ma_danh_muc': $('#ma_danh_muc').val(),
                    'ten_danh_muc': $('#ten_danh_muc').val(),
                    'slug_danh_muc': $('#slug_danh_muc').val(),
                    'tinh_trang_danh_muc': $('#tinh_trang_danh_muc').val()
                };
                console.log(danhMuc);

                $.ajax({
                    url: '/admin/danh-muc-mon-an/index',
                    type: 'post',
                    data: danhMuc,
                    success: function(res) {
                        console.log(res.status);
                        if (res.status) {
                            toastr.success(
                                'Đã thêm mới Danh Mục Món Ăn thành công!'
                            );
                            $("#formCreate").trigger("reset");
                        }
                    },
                    error: function(res) {
                        var listError = res.responseJSON.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    },
                });
                loadListDanhMuc();
            });

            $('body').on('click', '.doiTrangThai', function() {
                let id_danh_muc = $(this).data('id');
                $.ajax({
                    url: '/admin/danh-muc-mon-an/update-status/' + id_danh_muc,
                    type: 'get',
                    success: function(res) {
                        if (res.status) {
                            toastr.success(
                                "Đã cập nhập trạng thái Danh Mục Món Ăn thành công!"
                            );
                            loadListDanhMuc();
                        } else {
                            toastr.error("Có lỗi không mong muốn xảy ra!");
                        }
                    },
                });
            });

            $('body').on('click', '.edit', function() {
                let id_danh_muc = $(this).data('id');
                $.ajax({
                    url: '/admin/danh-muc-mon-an/edit/' + id_danh_muc,
                    type: 'get',
                    success: function(res) {
                        if (res.status) {
                            $("#id").val(res.data.id);
                            $("#ma_danh_muc_edit").val(res.data
                                .ma_danh_muc);
                            $("#ten_danh_muc_edit").val(res.data
                                .ten_danh_muc);
                            $("#slug_danh_muc_edit").val(res.data
                                .slug_danh_muc);
                            $("#tinh_trang_danh_muc_edit").val(res.data
                                .tinh_trang_danh_muc);
                        } else {
                            toastr.error('Có lỗi xảy ra');
                        }
                    }
                });
            });

            $('body').on('click', '.delete', function() {
                let id_danh_muc = $(this).data('id');
                $('#id_danh_muc_delete').val(id_danh_muc);
            });

            $('#deleteDanhMuc').click(function() {
                let id_danh_muc = $('#id_danh_muc_delete').val();
                $.ajax({
                    url: '/admin/danh-muc-mon-an/destroy/' + id_danh_muc,
                    type: 'get',
                    success: function(res) {
                        if (res.status) {
                            toastr.success('Đã xoá thành công!');
                            loadListDanhMuc();
                        } else {
                            toastr.error('Danh Mục không tồn tại!');
                        }
                    }
                });
            });

            $('#updateDanhMuc').click(function() {
                let danhMuc = {
                    'id': $("#id").val(),
                    'ma_danh_muc': $("#ma_danh_muc_edit").val(),
                    'ten_danh_muc': $("#ten_danh_muc_edit").val(),
                    'slug_danh_muc': $("#slug_danh_muc_edit").val(),
                    'tinh_trang_danh_muc': $("#tinh_trang_danh_muc_edit").val(),
                };
                $.ajax({
                    url: '/admin/danh-muc-mon-an/update',
                    type: 'post',
                    data: danhMuc,
                    success: function(res) {
                        toastr.success(
                            'Đã cập nhập danh mục món ăn thành công!');
                        loadListDanhMuc();
                    },
                    error: function(res) {
                        var listError = res.responseJSON.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    }
                });

            });

            function createRow(danhMuc, stt) {
                var content = '';
                content += '<tr class = "align-middle text-center" >';
                content += '<th scope = "row" >' + stt + '</th>';
                content += '<td>' + danhMuc.ma_danh_muc + '</td>';
                content += '<td>' + danhMuc.ten_danh_muc + '</td>';
                content += '<td > ' + danhMuc.slug_danh_muc + '</td>';
                content += '<td>';
                if (danhMuc.tinh_trang_danh_muc == 1)
                    content +=
                    '<button class = "btn btn-primary doiTrangThai" data-id=' +
                    danhMuc
                    .id + '>Hiển Thị</button>';
                else
                    content +=
                    '<button class = "btn btn-danger doiTrangThai" data-id=' +
                    danhMuc
                    .id + '>Tạm Ẩn</button>';
                content += '</td>';
                content += '<td>';
                content +=
                    '<button class="btn btn-info m-1 edit" data-id=' + danhMuc
                    .id +
                    ' data-bs-toggle="modal" data-bs-target="#editModal"> Sửa </button>';
                content += '<button class = "btn btn-danger m-1 delete" data-id=' + danhMuc
                    .id +
                    ' data-bs-toggle="modal" data-bs-target="#deleteModal"> Xoá </button>';
                content += '</td>';
                content += '</tr>';
                return content;
            }

            function loadListDanhMuc() {
                $.ajax({
                    url: '/admin/danh-muc-mon-an/get-data',
                    type: 'get',
                    success: function(res) {
                        viewTable(res.data);
                    },
                });
            }

            function viewTable(listdanhMuc) {
                var content = '';
                $.each(listdanhMuc, function(key, value) {
                    content += createRow(value, key + 1);
                });
                $("#danhSachDanhMuc tbody").html(content);
            }
            loadListDanhMuc();
        });
    </script>
@endsection
