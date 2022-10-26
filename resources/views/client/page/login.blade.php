<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <!-- Favicons -->
    <link rel="shortcut icon" href="/assets_client/images/favicon.ico">
    <link rel="apple-touch-icon" href="/assets_client/images/icon.png">
    <title>Login-Client</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/style.css">
    <link id="color" rel="stylesheet" href="/admin/assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/responsive.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    {{-- axios --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.2/axios.min.js"></script>
</head>

<body>
    <!-- login page start-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5"><img class="bg-img-cover bg-center" src="/assets_client/images/banner/bann-1/1.png" alt="looginpage"></div>
            <div class="col-md-7 p-0">
                <div class="login-card">
                    <div>
                        <div style="width:450px"><a class="logo text-start" href="/home"><img class="img-fluid for-light w-50"
                                    src="/assets_client/images/logo/foody3.png" alt="icon_login"></a>
                        </div>
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
                                        <div class="show-hide"><span class="show"> </span></div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="checkbox1" type="checkbox">
                                        <label class="text-muted" for="checkbox1">Nhớ mật khẩu</label>
                                    </div><a class="link" href="forget-password.html">Quên mật khẩu?</a>
                                    <div class="text-end mt-3">
                                        <button class="btn btn-primary btn-block w-100" type="submit">Đăng nhập</button>
                                    </div>
                                </div>
                                <p class="mt-4 mb-0 text-center">Chưa có tài khoản?<a class="ms-2" role="button" id="registerButton">Tạo
                                        mới</a></p>
                                <script></script>
                            </form>
                            <form class="form theme-form" id="registerForm">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input class="form-control" id="email" name="email" type="email"
                                                placeholder="Nhập vào Email">
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
                                    <button class="btn btn-primary" type="submit" id="createTaiKhoan">Đăng ký</button>
                                    <input class="btn btn-light" type="reset" value="Huỷ">
                                </div>
                                <p class="mt-4 mb-0 text-center">Quay lại trang đăng nhập?<a class="ms-2" role="button" id="loginButton">Đăng
                                        Nhập</a></p>
                            </form>
                        </div>
                    </div>
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
        $(document).ready(function() {
            $('#loginForm').submit(function(e) {
                e.preventDefault();
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

            // $('body').on('click', '.link-nav', function() {
            //     $('.link-nav').addClass('active');
            // })
        });
    </script>
</body>

</html>
