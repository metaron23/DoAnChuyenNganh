@extends('admin.master')

@section('title')
    <h2>Quản Lý Món Ăn</h2>
@endsection

@section('content')
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLongTitle" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Cập nhập Món Ăn</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="text" id="id_edit" hidden>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Mã Món Ăn</label>
                                <input tabindex="1" class="form-control" id="ma_mon_an_edit" name="ma_mon_an_edit" type="text"
                                    placeholder="Nhập vào mã Món Ăn">
                                <small style="font-weight:600" id="message_ma_mon_an_edit"></small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Tên Món Ăn</label>
                                <input tabindex="2" class="form-control" id="ten_mon_an_edit" name="ten_mon_an_edit" type="text"
                                    placeholder="Nhập vào tên Món Ăn">
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
                                <input tabindex="3" class="form-control" id="don_gia_ban_edit" name="don_gia_ban_edit" type="number"
                                    placeholder="Nhập vào đơn giá bán">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Đơn giá khuyến mãi</label>
                                <input tabindex="4" class="form-control" id="don_gia_khuyen_mai_edit" name="don_gia_khuyen_mai_edit" type="number"
                                    placeholder="Nhập vào đơn giá khuyến mãi">
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
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" data-bs-original-title="" title="">Đóng</button>
                    <button class="btn btn-primary" id="updateMonAn" type="button" data-bs-original-title="" title=""
                        data-bs-dismiss="modal">Lưu</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    <div class="row p-t-20 b-b-light">
        <div class="row p-20 p-r-0">
            <h4>Tạo Món Ăn Mới</h4>
        </div>
        <div class="row p-20 p-r-0">
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
                            <img id="holder" style="margin-top:15px;max-height:100px;object-fit: cover;">
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
                <div class="row text-end">
                    <div class="mb-3">
                        <button tabindex="9" class="btn btn-primary" type="button" id="createMonAn">Thêm
                            Mới Món Ăn</button>
                        <input class="btn btn-light" type="reset" value="Huỷ">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="row p-20 p-r-0 m-t-10">
            <h4>Danh Sách Các Món Ăn</h4>
        </div>
        <div class="row p-20 p-l-30 p-r-10" style="height: 704px; overflow: auto;">
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

                </tbody>
            </table>
        </div>
        <div id='links' style="display:flex !important; justify-content: left; padding:10px 18px;">
        </div>
    </div>
@endsection

@section('js')
<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script src="/js/admin/food.js"></script>
@endsection
