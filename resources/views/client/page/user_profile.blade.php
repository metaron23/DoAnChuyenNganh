@extends('client.share.master')
<head>
    <title>Quản lí tài khoản</title>
</head>
@section('content')
    <style>
        .btn{
            background-color:#d50c0d;
            color: white;
        }
        .caret-input{
            caret-color: #d50c0d;
        }
        .img-account-profile{
            width: 305px;
            height: 305px;
        }

    </style>
<div class="container px-4 mt-2 mb-3 caret-input">
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Ảnh đại diện</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    @if (Auth::guard('customer')->check())
                    <img class="img-account-profile rounded-circle mb-2" src="{{ Auth::guard('customer')->user()->anh_dai_dien }}" alt="{{ Auth::guard('customer')->user()->ho_va_ten }}" class="icon_login">
                @else
                    <a src="http://bootdey.com/img/Content/avatar/avatar1.png" ><i class="zmdi zmdi-account-o"></i></a>
                @endif
                    <img  alt="">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <!-- Profile picture upload button-->
                    <button  class="btn" type="button">Upload new image</button>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4 ">
                <div class="card-header">Thông tin tài khoản</div>
                <div class="card-body">
                    <form>
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Tên tài khoản</label>
                            <input class="form-control" id="inputUsername" type="name" placeholder="Enter your username" value="{{ Auth::guard('customer')->user()->ho_va_ten }}">
                        </div>

                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">Năm sinh</label>
                                <input class="form-control" id="inputOrgName" type="date" placeholder="Enter your organization name" value="{{ Auth::guard('customer')->user()->nam_sinh }}">
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Địa chỉ</label>
                                <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value="{{ Auth::guard('customer')->user()->dia_chi }}">
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Địa chỉ Email</label>
                            <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="{{ Auth::guard('customer')->user()->email }}">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Số điện thoại</label>
                                <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="{{ Auth::guard('customer')->user()->so_dien_thoai }}">
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small " for="inputBirthday">Giới tính</label>
                                <select class="form-control" style=" height: 45px !important;" value="{{ Auth::guard('customer')->user()->gioi_tinh }}" >
                               <option>Nam</option>
                               <option>Nữ</option>
                                </select>
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <button class="btn" type="submit">Lưu thay đổi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

