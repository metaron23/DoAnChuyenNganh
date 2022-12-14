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

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    {{-- axios --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.2/axios.min.js"></script>

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
                                <h4>????ng nh???p t??i kho???n</h4>
                                <p>Nh???p email Admin ????? ????ng nh???p trang admin</p>
                                <div class="form-group">
                                    <label class="col-form-label">Email</label>
                                    <input class="form-control" id="user_name" name="user_name" type="email" required=""
                                        placeholder="Nh???p v??o email">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">M???t kh???u</label>
                                    <div class="form-input position-relative">
                                        <input class="form-control" type="password" id="password" name="password" required=""
                                            placeholder="Nh???p v??o m???t kh???u">
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="text-end mt-3">
                                        <button class="btn btn-primary btn-block w-100" type="button" id="login">????ng nh???p</button>
                                    </div>
                                </div>
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
                $.ajax({
                    url: '/admin/login',
                    type: 'post',
                    data: payLoad,
                    success: function(res) {
                        if (res.status) window.location.href = "/admin/danh-muc-mon-an/index";
                        else toastr.error('????ng nh???p th???t b???i!');
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
