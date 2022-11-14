@extends('client.share.master')


@section('content')
    <div class="container px-4 mt-2 mb-3 caret-input">
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">
                        <h6>Ảnh đại diện</h6>
                    </div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <form method="post" id="formUpload" enctype="multiart / form-data">
                            <img id="holder" class="img-account-profile rounded-circle mb-2 preview"
                                src="{{ Auth::guard('customer')->user()->anh_dai_dien }}" alt="Thêm ảnh đại diện" class="icon_login">
                            <!-- Profile picture help block-->
                            <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                            <!-- Profile picture upload button-->
                            <input class="btn" type="file" id="avatar" accept="image/png, image/jpeg" hidden name="link">
                            <input type="button" class="btn" name="anh_dai_dien" onclick="$('#avatar').click()" value="Thêm Ảnh">
                        </form>
                        {{-- edit --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4 ">
                    <div class="card-header">
                        <h6>Thông tin tài khoản</h6>
                    </div>
                    <div class="card-body">
                        <form id="edit_form" method="post">
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Tên tài khoản</label>
                                <input class="form-control" readonly id="ho_va_ten" type="name"
                                    value="{{ Auth::guard('customer')->user()->ho_va_ten }}" name="ho_va_ten">
                            </div>

                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">Năm sinh</label>
                                    <input class="form-control" readonly id="inputOrgName" type="date"
                                        value="{{ Auth::guard('customer')->user()->nam_sinh }}" name="nam_sinh">
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">Địa chỉ</label>
                                    <input class="form-control" readonly id="inputLocation" type="text"
                                        value="{{ Auth::guard('customer')->user()->dia_chi }}" name="dia_chi">
                                </div>
                            </div>
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Địa chỉ Email</label>
                                <input class="form-control" readonly id="inputEmailAddress" type="email"
                                    value="{{ Auth::guard('customer')->user()->email }}">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Số điện thoại</label>
                                    <input class="form-control" readonly id="inputPhone" type="tel"
                                        value="{{ Auth::guard('customer')->user()->so_dien_thoai }}" name="so_dien_thoai">
                                </div>
                                <!-- Form Group (birthday)-->
                                <div class="col-md-6">
                                    <label class="small" for="inputBirthday">Giới tính</label>
                                    <select class="form-control" style="padding:0px 18px" disabled name="gioi_tinh" name="gioi_tinh">
                                        @if (Auth::guard('customer')->user()->gioi_tinh == 0)
                                            <option value="0" selected>Nữ</option>
                                            <option value="1">Nam</option>
                                        @else
                                            <option value="0">Nữ</option>
                                            <option value="1" selected>Nam</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <!-- Save changes button-->
                            <button class="food__btn grey--btn mt-4" type="button" id="editFormAccount">Sửa</button>
                            <button class="food__btn  mt-4" type="submit" id="saveFormAccount" hidden>Lưu thay đổi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('client.share.footer')
@endsection

@section('js')
    <script src="/js/client/user_profile.js"></script>
@endsection
