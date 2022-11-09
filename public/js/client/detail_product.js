new Vue({
    el: '#detailFood',
    data: {
        detailFood: [],
        amountCart: 1,
        linkDetailFood: "",
    },
    created() {
        this.getdetailFood();
    },
    methods: {
        getdetailFood() {
            this.detailFood = {!! json_encode($detailFood, JSON_HEX_TAG) !!};
        },
        update(value) {
            value['so_luong_mua'] = this.amountCart;
            axios
                .post('/customer/cart/addCartFromDetail', value)
                .then((res) => {
                    this.linkDetailFood = "/menu/detailFood/"+value.id;
                    if(res.data.status) toastr.success('Thêm vào giỏ hàng thành công!');
                })
                .catch((res) => {
                    var listError = res.response.data.errors;
                    $.each(listError, function(key, value) {
                        toastr.error(value[0]);
                    });
                });
        },
    }
});
