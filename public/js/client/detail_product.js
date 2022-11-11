$(document).ready(function () {
    $('body').on('click', '.addToCart', function (e) {
        e.preventDefault();
        let payLoad = {
            'id_mon_an' : $(this).data('id'),
            'so_luong_mua' : $('.cart-plus-minus input[type="number"]').val()
        }
        axios
            .post('/customer/cart/addCartFromDetail', payLoad)
            .then((res) => {
                if (res.data.status){
                    $('.htc__header #countCart').html(res.data.count);
                    toastr.success('Thêm vào giỏ hàng thành công!');
                }
            })
            .catch((res) => {
                var listError = res.response.data.errors;
                $.each(listError, function (key, value) {
                    toastr.error(value[0]);
                });
            });
    });
});
