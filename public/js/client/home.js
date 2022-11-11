$(document).ready(function() {

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
