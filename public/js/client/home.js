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

    $('#registerButton').click(function() {
        window.location.href = "/register";
    });
    $('#loginButton').click(function() {
        window.location.href = "/login";
    });

    $(".addToCart").click(function(e) {
        e.preventDefault();
        let id_mon_an = $(this).data('id');
        axios
            .get('/customer/cart/add-to-cart/' + id_mon_an)
            .then((res) => {
                if (res.data.status) {
                    toastr.success(res.data.message);
                    $("#countCart").text(res.data.count);
                } else {
                    toastr.error(res.data.message);
                }
            });
    });


});
