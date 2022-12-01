@extends('admin.master')

@section('title')
    <h2>Quản Lý Danh Mục Món Ăn</h2>
@endsection

@section('content')
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
                        <input class="form-control" id="ma_danh_muc_edit" name="ma_danh_muc_edit" type="text" placeholder="Nhập vào mã danh mục">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tên Danh Mục</label>
                        <input class="form-control" id="ten_danh_muc_edit" name="ten_danh_muc_edit" type="text" placeholder="Nhập vào tên danh mục">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Slug Danh Mục</label>
                        <input class="form-control" id="slug_danh_muc_edit" name="slug_danh_muc_edit" type="text" placeholder="Nhập vào slug danh mục">
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
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    <div class="row b-b-light p-t-20">
        <div class="col-md-4 b-r-light">
            <div class="row p-20 p-l-5">
                <h4>Tạo Danh Mục Món Ăn Mới</h4>
            </div>
            <div class="row p-20 p-l-5">
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
                    <div class="row text-end">
                        <div class="col">
                            <button class="btn btn-primary" type="button" id="createDanhMuc">Thêm
                                Mới</button>
                            <input class="btn btn-light" type="reset" value="Huỷ">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row p-20">
                <h4>Danh Sách Các Danh Mục Món Ăn</h4>
            </div>
            <div class="row p-20 p-r-5" style="height:500px;overflow-y:auto">
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

                    </tbody>
                </table>

            </div>

        </div>
    </div>
@endsection

@section('js')
    <script src="/js/admin/food_list.js"></script>
@endsection
