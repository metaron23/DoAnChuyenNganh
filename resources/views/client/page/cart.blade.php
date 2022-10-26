@extends('client.share.master')

@section('content')
    <div id="app_cart">
        <div class="ht__bradcaump__area bg-image--18">
            <div class="ht__bradcaump__wrap d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">cart page</h2>
                                <nav class="bradcaump-inner">
                                    <a class="breadcrumb-item" href="index.html">home</a>
                                    <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
                                    <span class="breadcrumb-item active">cart page</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cart-main-area section-padding--lg bg--white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 ol-lg-12">
                        <form action="#">
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr class="title-top">
                                            <th class="product-thumbnail">Image</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(value, key) in listCart">
                                            <td class="product-thumbnail"><a href="#" v-bind:data-id="value.id_mon_an"><img
                                                        v-bind:src="value.hinh_anh" alt="product img"></a>
                                            </td>
                                            <td class="product-name">@{{ value.ten_mon_an }}</td>
                                            <td class="product-price">
                                                <span class="amount">@{{ donGia(value.don_gia_khuyen_mai, value.don_gia_ban).toLocaleString() }} VND
                                                </span>
                                            </td>
                                            <td class="product-quantity">
                                                <input v-on:change="update(value)" v-model="value.so_luong_mua" type="number" min=1>
                                            </td>
                                            <td class="product-subtotal">
                                                @{{ (donGia(value.don_gia_khuyen_mai, value.don_gia_ban) * value.so_luong_mua).toLocaleString() }} VND
                                            </td>
                                            <td class="product-remove">
                                                <button class="food__btn" v-on:click.prevent="remove(value.id)"><span>Remove</span></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 offset-lg-6">
                        <div class="cartbox__total__area">
                            <div class="cartbox-total d-flex justify-content-between">
                                <ul class="cart__total__list">
                                    <li>Cart total</li>
                                    <li>Discount</li>
                                </ul>
                                <ul class="cart__total__tk">
                                    <li>@{{ total.toLocaleString() }} VND
                                    </li>
                                    <li>0</li>
                                </ul>
                            </div>
                            <div class="cart__total__amount">
                                <span>Grand Total</span>
                                <span>@{{ total.toLocaleString() }} VND
                                </span>
                            </div>
                            <div class="cart__total__tk">
                                <div class="cartbox__buttons" style="width:24%;float: right;">
                                    <a class="food__btn" href="/customer/checkout/"><span>Checkout</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('client.share.footer')
@endsection

@section('js')
    <script>
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
                            $.each(listError, function(key, value) {
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
    </script>
@endsection
