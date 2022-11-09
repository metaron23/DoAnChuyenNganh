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
