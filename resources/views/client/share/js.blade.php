<script src="/assets_client/js/vendor/jquery-3.2.1.min.js"></script>
<script src="/assets_client/js/popper.min.js"></script>
<script src="/assets_client/js/bootstrap.min.js"></script>
<script src="/assets_client/js/plugins.js"></script>
<script src="/assets_client/js/active.js"></script>
{{-- link toastr js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script src="\js\app.js"></script>
<style>

    .drop-link{
        display:block;
        text-align:left;
        text-decoration:none;
        font-size:15px;
        padding:10px 15px;
        transition:all 0.3s ease;
        color:#000;
    }

    .drop-link:hover{
        font-size:18px;
        background: #d4dade;
    }

    .drop-link:last-of-type{
        border-radius:0px 0px 7px 7px;
    }

    .drop-link:not(:first-child){
        border-top:1px solid #d4dade;
    }


</style>
<script>
    toastr.options = {
        "timeOut": "3000",
        'progressBar' : true,
    };
    $(document).ready(function() {
        $('.log__in img').hover(function() {
            let data =

            `<div class='dropdown'>
                <a class='drop-link' href='#'>Link1</a>
                <a class='drop-link' href='#'>Link2</a>
                <a class='drop-link' href='#'>Link3</a>
                <a class='drop-link' href='#'>Link4</a>
                <a class='drop-link' href='#'>Link5</a>
            // </div>`
            // `</li><a href="/customer/account">Quản lí tài khoản</a></li>
            // </li><a href="/customer/order">Quản lý đơn hàng</a></li>
            // </li><a href="/customer/cart">Quản lý giỏ hàng</a></li>
            // </li><a href="/logout" id="logout_home">Đăng xuất</a></li>`
            $('.log__in .dropdown').html(data);
        });
        $('.log__in').mouseleave(function() {
            $('.log__in .dropdownu').html("");
        });
    });

</script>

