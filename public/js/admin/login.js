$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {
    $('#login').click(function () {
        let payLoad = {
            'username': $('#user_name').val(),
            'password': $('#password').val(),
        };
        $.ajax({
            url: '/admin/login',
            type: 'post',
            data: payLoad,
            success: function (res) {
                if (res.status) window.location.href = "/admin/danh-muc-mon-an/index";
                else toastr.error('Đăng nhập thất bại!');
            },
            error: function (res) {
                var listError = res.responseJSON.errors;
                $.each(listError, function (key, value) {
                    toastr.error(value[0]);
                });
            },
        });
    });

    $('body').on('click', '.link-nav', function () {
        $('.link-nav').addClass('active');
    })
});
