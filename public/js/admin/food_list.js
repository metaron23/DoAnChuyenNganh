$(document).ready(function () {
    $("#createDanhMuc").click(function () {
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
            success: function (res) {
                console.log(res.status);
                if (res.status) {
                    toastr.success(
                        'Đã thêm mới Danh Mục Món Ăn thành công!'
                    );
                    $("#formCreate").trigger("reset");
                }
            },
            error: function (res) {
                var listError = res.responseJSON.errors;
                $.each(listError, function (key, value) {
                    toastr.error(value[0]);
                });
            },
        });
        loadListDanhMuc();
    });

    $('body').on('click', '.doiTrangThai', function () {
        let id_danh_muc = $(this).data('id');
        $.ajax({
            url: '/admin/danh-muc-mon-an/update-status/' + id_danh_muc,
            type: 'get',
            success: function (res) {
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

    $('body').on('click', '.edit', function () {
        let id_danh_muc = $(this).data('id');
        $.ajax({
            url: '/admin/danh-muc-mon-an/edit/' + id_danh_muc,
            type: 'get',
            success: function (res) {
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

    $('body').on('click', '.delete', function () {
        let id_danh_muc = $(this).data('id');
        $('#id_danh_muc_delete').val(id_danh_muc);
    });

    $('#deleteDanhMuc').click(function () {
        let id_danh_muc = $('#id_danh_muc_delete').val();
        $.ajax({
            url: '/admin/danh-muc-mon-an/destroy/' + id_danh_muc,
            type: 'get',
            success: function (res) {
                if (res.status) {
                    toastr.success('Đã xoá thành công!');
                    loadListDanhMuc();
                } else {
                    toastr.error('Danh Mục không tồn tại!');
                }
            }
        });
    });

    $('#updateDanhMuc').click(function () {
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
            success: function (res) {
                toastr.success(
                    'Đã cập nhập danh mục món ăn thành công!');
                loadListDanhMuc();
            },
            error: function (res) {
                var listError = res.responseJSON.errors;
                $.each(listError, function (key, value) {
                    toastr.error(value[0]);
                });
            }
        });

    });

    function createRow(danhMuc, stt) {
        var content = '';
        content += '<tr class="align-middle text-center" >';
        content += '<th scope="row" >' + stt + '</th>';
        content += '<td>' + danhMuc.ma_danh_muc + '</td>';
        content += '<td>' + danhMuc.ten_danh_muc + '</td>';
        content += '<td > ' + danhMuc.slug_danh_muc + '</td>';
        content += '<td>';
        if (danhMuc.tinh_trang_danh_muc == 1)
            content +=
                '<button class="btn btn-primary doiTrangThai" data-id=' +
                danhMuc
                    .id + '>Hiển Thị</button>';
        else
            content +=
                '<button class="btn btn-danger doiTrangThai" data-id=' +
                danhMuc
                    .id + '>Tạm Ẩn</button>';
        content += '</td>';
        content += '<td>';
        content +=
            '<button class="btn btn-info m-1 edit" data-id=' + danhMuc
                .id +
            ' data-bs-toggle="modal" data-bs-target="#editModal"> Sửa </button>';
        content += '<button class="btn btn-danger m-1 delete" data-id=' + danhMuc
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
            success: function (res) {
                viewTable(res.data);
            },
        });
    }

    function viewTable(listdanhMuc) {
        var content = '';
        $.each(listdanhMuc, function (key, value) {
            content += createRow(value, key + 1);
        });
        $("#danhSachDanhMuc tbody").html(content);
    }
    loadListDanhMuc();
});
