<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/assets_client/images/icon.png">
    <title>Login-Client</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/vendors/themify.css">
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/style.css">
    <link id="color" rel="stylesheet" href="/admin/assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/responsive.css">
    {{-- Css for login page --}}
    <link rel="stylesheet"  href="/assets_client/style_client_me.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    {{-- axios --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.2/axios.min.js"></script>
</head>
    <style>
        .link{
           color: #dc4545 !important;
        }
    </style>
<body>
    <!-- login page start-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5"><img class="bg-img-cover bg-center" src="//cdn.dribbble.com/users/118246/screenshots/5343519/wifi.gif" alt="looginpage"></div>
            <div class="col-md-7 p-0">
                <div class="login-card">
                    <div>
                        {{-- <div style="width:450px"><a class="logo text-start" href="/home"><img class="img-fluid for-light w-50"
                                    src="/assets_client/images/logo/foody4.png" alt="icon_login"></a>
                        </div> --}}
                        <div class="login-main">
                            <form class="theme-form" id="loginForm">
                                <h4>Đăng nhập tài khoản</h4>
                                <p>Nhập email và mật khẩu để đăng nhập</p>
                                <div class="form-group">
                                    <label class="col-form-label">Email</label>
                                    <input class="form-control" id="user_name" name="user_name" type="email" required=""
                                        placeholder="Nhập vào email">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Mật khẩu</label>
                                    <div class="form-input position-relative">
                                        <input class="form-control" type="password" autocomplete="on" id="password1" name="password" required=""
                                            placeholder="Nhập vào mật khẩu">
                                        <div  class="show-hide"><span class="show"> </span></div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="checkbox1" type="checkbox" value="isRememberMe">
                                        <label class="text-muted" for="checkbox1">Nhớ mật khẩu</label>
                                    </div>
                                    <a class="link" href="#" id="forgetPass" data-bs-toggle="modal" data-bs-target="#exampleModal">Quên mật
                                        khẩu?</a>
                                    <div class="text-center mt-3">
                                        <button class=" btn text-center wit-50" id="login" type="submit">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            đăng nhập
                                        </button>
                                    </div>
                                </div>
                                <p class="mt-4 mb-0 text-center">Chưa có tài khoản?<a class="ms-2" style="color:#dc4545" role="button" id="registerButton">Tạo
                                        mới</a></p>
                            </form>
                            <form class="form theme-form" id="registerForm">
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
                                            <input class="form-control" id="ho_va_ten" name="ho_va_ten" type="text"
                                                placeholder="Nhập vào tên tài khoản">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control" id="password2" name="password" type="password" autocomplete="on"
                                                placeholder="Nhập vào mật khẩu">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">Re-Password</label>
                                            <input class="form-control" id="re_password" name="re_password" type="password" autocomplete="on"
                                                placeholder="Nhập lại mật khẩu">
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
                                <div class="card-footer text-end">
                                    <button class="btn " type="submit" id="createTaiKhoan">Đăng ký</button>
                                    <input class="btn btn-light" type="reset" value="Huỷ">
                                </div>
                                <p class="mt-4 mb-0 text-center">Quay lại trang đăng nhập?<a class="ms-2" style="color: #dc4545" role="button" id="loginButton">Đăng
                                        Nhập</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nhập vào email để đổi mật khẩu!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="form-label">Email</label>
                    <input class="form-control" id="emailForChange" name="emailForChange" type="email" placeholder="Nhập vào Email">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="sendChangePass">Gửi</button>
                </div>
            </div>
        </div>
    </div>
    <!-- latest jquery-->
    <script src="/admin/assets/js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap js-->
    <script src="/admin/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="/admin/assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="/admin/assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <!-- Sidebar jquery-->
    <script src="/admin/assets/js/config.js"></script>
    <!-- Plugins JS start-->
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="/admin/assets/js/script.js"></script>
    <!-- login js-->
    <!-- Plugin used-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script src="\js\app.js"></script>
    <script>
        toastr.options = {
            "timeOut": "1500",
        };
        $(document).ready(function() {
            $('#loginForm').submit(function(e) {
                console.log(1);
                e.preventDefault();
                isRememberMe();
                let payLoad = window.getFormData($(this));
                axios
                    .post('/login', payLoad)
                    .then((res) => {
                        if (res.data.status == 1) {
                            toastr.success('Đã login thành công!');
                            setTimeout(() => {
                                window.location.href = "/home";
                            }, 1000);
                        } else if (res.data.status == 2) {
                            toastr.warning('Tài khoản chưa kích hoạt, vui lòng kiểm tra email!');
                        } else if (res.data.status == 3) {
                            toastr.error('Tài khoản của bạn đã bị khoá!');
                        } else {
                            toastr.error('Đăng nhập thất bại! Kiểm tra email hoặc mật khẩu!');
                        }
                    })
                    .catch((res) => {
                        var listError = res.response.data.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    });
            });

            function prepareEmail(email) {
                if (email.indexOf("+") > 0) {
                    let first = email.substr(0, email.indexOf("+"));
                    let last = email.substr(email.indexOf('@'));
                    email = first.concat(last);
                }
                if (email.indexOf(".") > 0) {
                    let first = email.substr(0, email.indexOf("@"));
                    let last = email.substr(email.indexOf("@"));
                    first = first.split('.').join('');
                    email = first.concat(last);
                    console.log(email);
                }
                return email;
            }

            $('#registerForm').submit(function(e) {
                e.preventDefault();
                let payLoad = window.getFormData($(this));
                payLoad['email'] = prepareEmail(Object.values(payLoad)[0]);
                axios
                    .post('/register', payLoad)
                    .then((res) => {
                        console.log(res);
                        if (res.data.status) {
                            $("#registerForm").trigger("reset");
                            toastr.success('Đăng ký thành công! Vui lòng xem email để kích hoạt tài khoản');
                        }
                    })
                    .catch((res) => {
                        var listError = res.response.data.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    });
            });

            function checkFormLoadLink() {
                let data = {!! json_encode($checkLogin, JSON_HEX_TAG) !!};
                if (data == 1) {
                    $('#registerForm').hide();
                    $('#loginForm').show();
                } else {
                    $('#registerForm').show();
                    $('#loginForm').hide();
                }
            }
            checkFormLoadLink();

            $('#registerButton').click(function() {
                window.location.href = "/register";
            });
            $('#loginButton').click(function() {
                window.location.href = "/login";
            });

            $('.login-main .show-hide').click(function() {
                if ($('.show-hide span').attr('class') == 'show') {
                    $('#password1').attr('type', 'password');
                } else {
                    $('#password1').attr('type', 'text');
                }
            });
            //Save password---------------------------------------------------
            const rmCheck = document.getElementById("checkbox1"),
                emailInput = document.getElementById("user_name"),
                password = document.getElementById("password1");

            if (localStorage.checkbox && localStorage.checkbox !== "") {
                rmCheck.setAttribute("checked", "checked");
                emailInput.value = localStorage.username;
                password.value = localStorage.password;
            } else {
                rmCheck.removeAttribute("checked");
                emailInput.value = "";
                password.value = "";
            }

            function isRememberMe() {
                if (rmCheck.checked && emailInput.value !== "") {
                    localStorage.username = emailInput.value;
                    localStorage.checkbox = rmCheck.value;
                    localStorage.password = password.value;
                } else {
                    localStorage.username = "";
                    localStorage.checkbox = "";
                    localStorage.password = "";
                }
            }
            //save password---------------------------------------------------
            $('#sendChangePass').click(function(e) {
                e.preventDefault();
                let payLoad = {
                    'email': $('#emailForChange').val(),
                }
                axios
                    .post('/changePass', payLoad)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success('Vui lòng kiểm tra hộp thư email để đổi mật khẩu!');
                        } else {
                            toastr.error('Email không tồn tại!');
                        }
                    })
                    .catch((res) => {
                        var listError = res.response.data.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    });
            })
        });
    </script>
</body>

</html>
