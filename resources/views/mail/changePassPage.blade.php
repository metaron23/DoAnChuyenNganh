<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ChangePass</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
</head>

<body>
    <div style="padding: 20px;width:500px">
        <h4>Đổi mật khẩu</h4>
        <div class="form-group">
            <label for="exampleInputEmail1">Nhập vào mật khẩu mới</label>
            <input type="text" class="form-control" id="passNew">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Nhập lại mật khẩu mới</label>
            <input type="text" class="form-control" id="passNewAgain">
        </div>
        <button type="button" class="btn btn-primary" id="changePass">Xác nhận</button>
        <a href="/login" style="margin-left: 220px">Trở lại trang Login?</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="/assets_client/js/vendor/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.2/axios.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#changePass').click(function(e) {
                e.preventDefault();
                if ($('#passNew').val() != $('#passNewAgain').val()) {
                    toastr.error('Mật khẩu nhập lại không giống!');
                } else {
                    let payLoad = {
                        'password': $('#passNew').val(),
                        'hash_reset': {!! json_encode($hash_reset, JSON_HEX_TAG) !!},
                    }
                    axios
                        .post('/confirmChangePass', payLoad)
                        .then((res) => {
                            if(res.data.status){
                                toastr.success('Đổi mật khẩu thành công!');
                            }else{
                                toastr.error("Lỗi không biết!");
                            }
                        })
                        .catch((res) => {
                            var listError = res.response.data.errors;
                            $.each(listError, function(key, value) {
                                toastr.error(value[0]);
                            });
                        });
                }
            });
        });
    </script>
</body>

</html>
