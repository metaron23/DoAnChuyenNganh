new Vue({
    el: '#checkout',
    data: {
        listInfoUser: [],
        listCart: [],
        total: 0,
        attr: {
            display_block: 'display:block',
        },
        addressNew: "",
        statusPayment: 0,
    },
    created() {
        this.getData();
    },
    methods: {
        getData() {
            axios
                .get('/customer/checkout/getData')
                .then((res) => {
                    this.listInfoUser = res.data.user;
                    this.listCart = res.data.listCart;
                    this.total = res.data.totalCart;
                });
        },
        showFormAddress() {
            if ($('.checkout-form.shipping-form').css("display") == "none")
                $('.checkout-form.shipping-form').css("display", "block");
            else
                $('.checkout-form.shipping-form').css("display", "none");
        },
        showFormPayment() {
            if ($('.payment-form').css("display") == "none") {
                $('.payment-form').css("display", "block");
                $('#payment_atHome').removeClass('active');
                $('#payment_online').addClass('active');
                this.statusPayment = true;
            } else {
                $('.payment-form').css("display", "none");
                $('#payment_atHome').addClass('active');
                $('#payment_online').removeClass('active');
                this.statusPayment = false;
            }
        },
        paymentSuccess() {
            let payLoad = {
                'ten_ship': this.listInfoUser.ho_va_ten,
                'phone_ship': this.listInfoUser.so_dien_thoai,
                'dia_chi_ship': this.listInfoUser.dia_chi,
                'trang_thai_thanh_toan': this.statusPayment,
            };
            axios
                .post('/customer/checkout/finish', payLoad)
                .then((res) => {
                    if (res.data.status) {
                    }
                })
                .catch((res) => {
                    var listError = res.response.data.errors;
                    $.each(listError, function(key, value) {
                        toastr.error(value[0]);
                    });
                });
        },
    },
});
