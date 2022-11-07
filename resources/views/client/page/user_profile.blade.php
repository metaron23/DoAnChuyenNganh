@extends('client.share.master')

<head>
    <title>Quản lí tài khoản</title>
</head>
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
                                <input class="form-control" readonly id="inputUsername" type="name" placeholder="Enter your username"
                                    value="{{ Auth::guard('customer')->user()->ho_va_ten }}">
                            </div>

                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">Năm sinh</label>
                                    <input class="form-control" readonly id="inputOrgName" type="date" placeholder="Enter your organization name"
                                        value="{{ Auth::guard('customer')->user()->nam_sinh }}" name="ho_va_ten">
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">Địa chỉ</label>
                                    <input class="form-control" readonly id="inputLocation" type="text" placeholder="Enter your location"
                                        value="{{ Auth::guard('customer')->user()->dia_chi }}" name="dia_chi">
                                </div>
                            </div>
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Địa chỉ Email</label>
                                <input class="form-control" readonly id="inputEmailAddress" type="email" placeholder="Enter your email address"
                                    value="{{ Auth::guard('customer')->user()->email }}" name="email">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Số điện thoại</label>
                                    <input class="form-control" readonly id="inputPhone" type="tel" placeholder="Enter your phone number"
                                        value="{{ Auth::guard('customer')->user()->so_dien_thoai }}" name="so_dien_thoai">
                                </div>
                                <!-- Form Group (birthday)-->
                                <div class="col-md-6">
                                    <label class="small " for="inputBirthday">Giới tính</label>
                                    <select class="form-control" style="padding:0px 18px; height: 50px !important;" value="{{ Auth::guard('customer')->user()->gioi_tinh }}"
                                        disabled name="gioi_tinh">
                                        <option value="1">Nam</option>
                                        <option value="0">Nữ</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Save changes button-->
                            <button class="btn mt-4" type="button" id="editFormAccount">Sửa</button>
                            <button class="btn mt-4" type="submit" id="saveFormAccount">Lưu thay đổi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            var getFormData;

            function showImage() {
                const fileInput = document.querySelector('input[type="file"]');
                const preview = document.querySelector('img.preview');
                const reader = new FileReader();

                function handleEvent(event) {
                    if (event.type === "load") {
                        preview.src = reader.result;
                        getFormData = uploadServer();
                        console.log(getFormData.getAll('file'));
                    }
                }

                function addListeners(reader) {
                    reader.addEventListener('load', handleEvent);
                    reader.addEventListener('change', handleEvent);
                }

                function handleSelected(e) {
                    const selectedFile = fileInput.files[0];
                    if (selectedFile) {
                        addListeners(reader);
                        reader.readAsDataURL(selectedFile);
                    }
                }
                fileInput.addEventListener('change', handleSelected);
            }
            showImage();
            // document.getElementById("avatar").addEventListener ("click", uploadServer);
            function uploadServer() {
                let check = document.querySelector('input[type="file"]').files[0];
                let formData = new FormData();
                formData.append('file', document.querySelector('input[type="file"]').files[0]);
                formData.append('name', document.querySelector('input[type="file"]').files[0].name);
                console.log(formData.getAll('name'));
                return formData;
            };
            $('#saveFormAccount').click(function() {
                let settings = {
                    headers: {
                        'content-type': 'multiart / form-data'
                    }
                }
                console.log(getFormData.getAll('file'));
                axios
                    .post('/customer/account/', getFormData, settings)
                    .then((res) => {

                    })
                    .catch((res) => {
                        var listError = res.response.data.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    });
            });
            $('#editFormAccount').click(function() {
                if ($('#edit_form .form-control').attr('readonly') == 'readonly') {
                    $('#edit_form .form-control').removeAttr("readonly");
                    $('#edit_form select').removeAttr("disabled");
                } else {
                    $('#edit_form .form-control').attr('readonly', 'readonly');
                    $('#edit_form select').attr('disabled', 'disabled');
                }
            });

            $('#edit_form').submit(function() {

            });
        });
    </script>
@endsection
