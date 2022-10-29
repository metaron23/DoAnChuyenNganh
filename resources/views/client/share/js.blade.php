<script src="/assets_client/js/vendor/jquery-3.2.1.min.js"></script>
<script src="/assets_client/js/popper.min.js"></script>
<script src="/assets_client/js/bootstrap.min.js"></script>
<script src="/assets_client/js/plugins.js"></script>
<script src="/assets_client/js/active.js"></script>
{{-- link toastr js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script src="\js\app.js"></script>

<script>
    toastr.options = {
        "timeOut": "3000",
        'progressBar' : true,
    };
    $(document).ready(function() {
        $('.log__in img').hover(function() {
            let data = `</li><a href="">Quản lí tài khoản</a></li>
            </li><a href="/customer/order">Quản lý đơn hàng</a></li>
            </li><a href="/customer/cart">Quản lý giỏ hàng</a></li>
            </li><a href="/logout" id="logout_home">Đăng xuất</a></li>`
            $('.log__in .dropdown__menu').html(data);
        });
        $('.log__in').mouseleave(function() {
            $('.log__in .dropdown__menu').html("");
        });
    });

</script>

