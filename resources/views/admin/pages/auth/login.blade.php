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
    <title>Login-Admin</title>
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
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <!-- login page start-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5"><img class="bg-img-cover bg-center" src="/assets_client/images/banner/bann-1/1.png" alt="looginpage"></div>
            <div class="col-xl-7 p-0">
                <div class="login-card">
                    <div>
                        <div style="width:450px"><a class="logo text-start" href="/home"><img class="img-fluid for-light w-50"
                                    src="/assets_client/images/logo/foody3.png" alt="icon_login"></a>
                        </div>
                        <div class="login-main">
                            <form class="theme-form">
                                <h4>Đăng nhập tài khoản</h4>
                                <p>Nhập email và mật khẩu để đăng nhập</p>
                                <div class="form-group">
                                    <label class="col-form-label">Email Hoặc Số Điện Thoại</label>
                                    <input class="form-control" id="user_name" name="user_name" type="email" required=""
                                        placeholder="Nhập vào email hoặc số điện thoại">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Mật khẩu</label>
                                    <div class="form-input position-relative">
                                        <input class="form-control" type="password" id="password" name="password" required=""
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
                                        <button class="btn btn-primary btn-block w-100" type="button" id="login">Đăng nhập</button>
                                    </div>
                                </div>

                                <p class="mt-4 mb-0 text-center">Chưa có tài khoản?<a class="ms-2" href="sign-up.html">Tạo mới</a></p>
                                <script></script>
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
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('#login').click(function() {
                let payLoad = {
                    'username': $('#user_name').val(),
                    'password': $('#password').val(),
                };
                console.log(payLoad);
                $.ajax({
                    url: '/admin/login',
                    type: 'post',
                    data: payLoad,
                    success: function(res) {
                        if (res.status) window.location.href = "/admin/tai-khoan/index";
                        else toastr.error('Đăng nhập thất bại!');
                    },
                    error: function(res) {
                        var listError = res.responseJSON.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    },
                });
            });

            $('body').on('click', '.link-nav', function() {
                $('.link-nav').addClass('active');
            })
        });
    </script>
</body>

</html>
