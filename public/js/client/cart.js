new Vue({
    el: '#app_cart',
    data: {
        listCart: [],
        total: 0,
    },
    created() {
        this.getData();
        this.totalCart();
    },
    methods: {
        getData() {
            axios
                .get('/customer/cart/data')
                .then((res) => {
                    this.listCart = res.data.data;
                });
        },
        donGia(x, y) {
            if (x == 0) {
                return y;
            } else {
                return x;
            }
        },
        remove(id) {
            axios
                .get('/customer/cart/remove/' + id)
                .then((res) => {
                    toastr.success('Xoá thành công!');
                    this.getData();
                    this.totalCart();
                });
        },
        update(value) {
            axios
                .post('/customer/cart/update', value)
                .then((res) => {
                    this.getData();
                    this.totalCart();

                })
                .catch((res) => {
                    var listError = res.response.data.errors;
                    $.each(listError, function (key, value) {
                        toastr.error(value[0]);
                    });
                });
        },
        totalCart() {
            axios
                .get('/customer/cart/total')
                .then((res) => {
                    this.total = res.data.totalCart;
                });
        },
    }
});
