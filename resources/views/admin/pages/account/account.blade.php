@extends('admin.master')

@section('title')
    <h2>Quản Lý Tài Khoản</h2>
@endsection

@section('content')
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
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
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input class="form-control" id="email_edit" name="email" type="email" placeholder="Nhập vào Email" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tên Tài Khoản</label>
                                <input class="form-control" id="ho_va_ten_edit" name="ho_va_ten" type="text" placeholder="Nhập vào tên tài khoản">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Password</label>
                                <input class="form-control" id="password_edit" name="password" type="text" placeholder="Nhập vào password">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Re-Password</label>
                                <input class="form-control" id="re_password_edit" name="re_password" type="text" placeholder="Nhập vào password">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Năm Sinh</label>
                                <input class="form-control" id="nam_sinh_edit" name="nam_sinh" type="date" placeholder="Nhập vào năm sinh">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Giới Tính</label>
                                <select class="form-control" id="gioi_tinh_edit" name="gioi_tinh">
                                    <option value="1">Nam</option>
                                    <option value="0">Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Địa chỉ</label>
                                <input class="form-control" id="dia_chi_edit" name="dia_chi"_edit type="text" placeholder="Nhập vào địa chỉ">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Số Điện Thoại</label>
                                <input class="form-control" id="so_dien_thoai_edit" name="so_dien_thoai" type="text"
                                    placeholder="Nhập vào số điện thoại">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="form-label">Ảnh Đại Diện</label>
                            <div class="input-group">
                                <input class="btn btn-primary" type="button" id="anh_dai_dien_edit" data-input="thumbnail_edit"
                                    data-preview="holder_edit" value="Upload">
                                <input id="thumbnail_edit" class="form-control" type="text" name="anh_dai_dien">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <img id="holder_edit" class="img-thumbnail" style="object-fit:cover;width:auto;height:200px">
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Tình Trạng</label>
                                <select class="form-control" id="tinh_trang_edit" name="tinh_trang">
                                    <option value="1">Đang Sử Dụng</option>
                                    <option value="0">Khoá</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Loại Tài Khoản</label>
                                <select class="form-control" id="loai_tai_khoan_edit" name="loai_tai_khoan">
                                    <option value="0">Admin</option>
                                    <option value="1">Nhân Viên</option>
                                    <option value="2">Khách Hàng</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Huỷ</button>
                        <button class="btn btn-secondary" type="submit">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row p-t-20">
        <div class="col-md-12 b-b-light">
            <div class="row p-20">
                <h4>Tạo Mới Tài Khoản</h4>
            </div>
            <div class="row p-20">
                <form class="form theme-form" id="formCreate">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input class="form-control" id="email" name="email" type="email" placeholder="Nhập vào Email">
                                <small style="font-weight:600" id="message_email"></small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Tên Tài Khoản</label>
                                <input class="form-control" id="ho_va_ten" name="ho_va_ten" type="text" placeholder="Nhập vào tên tài khoản">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Năm Sinh</label>
                                <input class="form-control" id="nam_sinh" name="nam_sinh" type="date" placeholder="Nhập vào năm sinh">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input class="form-control" id="password" name="password" type="password" placeholder="Nhập vào mật khẩu">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Re-Password</label>
                                <input class="form-control" id="re_password" name="re_password" type="password" placeholder="Nhập lại mật khẩu">
                            </div>
                        </div>
                        <div class="col-md-4">
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
                        <div class="col-md-4">
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
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Địa chỉ</label>
                                <input class="form-control" id="dia_chi" name="dia_chi" type="text" placeholder="Nhập vào địa chỉ">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Số Điện Thoại</label>
                                <input class="form-control" id="so_dien_thoai" name="so_dien_thoai" type="text"
                                    placeholder="Nhập vào số điện thoại">
                                <small style="font-weight:600" id="message_so_dien_thoai"></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Tình Trạng</label>
                                <select class="form-control" id="tinh_trang" name="tinh_trang">
                                    <option value="1">Hoạt Động</option>
                                    <option value="0">Khoá</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
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
                    <div class="row text-end">
                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit" id="createTaiKhoan">Thêm
                                Mới</button>
                            <input class="btn btn-light" type="reset" value="Huỷ">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-12 b-b-light">
            <div class="row p-20 p-r-0">
                <h4>Danh Sách Các Danh Mục Món Ăn</h4>
            </div>
            <div class="row p-20" style="height:400px;overflow-y:auto">
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

                    </tbody>
                </table>
                <div id="links" class="p-t-20" style="margin-left:-10px"></div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script src="/js/admin/account.js"></script>
@endsection
