$(document).ready(function () {

    function createTableCart(carts) {
        let content = "";
        content += `<div class="row">`;
        content += `<div class="col-md-12 col-sm-12 ol-lg-12">`;
        content += `<form action="#">`;
        content += `<div class="table-content table-responsive">`;
        content += `<table>`;
        content += `<thead>`;
        content += `<tr class="title-top">`;
        content += `<th class="product-thumbnail">Hình ảnh</th> `;
        content += `<th class="product-name"> Món ăn</th>`;
        content += `<th class="product-price">Giá</th> `;
        content += `<th class="product-quantity"> Số lượng</th> `;
        content += `<th class="product-subtotal"> Tổng cộng</th> `;
        content += `<th class="product-remove"> Xóa </th> `;
        content += `</tr> `;
        content += `</thead> `;
        content += `<tbody> `;
        let total = 0;
        carts.forEach(cart => {
            content += `<tr> `;
            content += `<td class="product-thumbnail"><a href="#" data-id="` + cart.id + `">`;
            content += `<a href="/menu/detailFood/` + cart.id_mon_an + `"><img src="` + cart.hinh_anh + `" alt="product img"></a>`;
            content += `</td> `;
            content += `<td class="product-name"> ` + cart.ten_mon_an + `</td> `;
            content += `<td class="product-price"> `;
            content += `<span class="amount"> ` + (cart.don_gia_khuyen_mai == 0 ? cart.don_gia_ban : cart.don_gia_khuyen_mai).toLocaleString() + ` VND`;
            content += `</span> `;
            content += `</td> `;
            content += `<td class="product-quantity"> `;
            content += `<input value = "` + cart.so_luong_mua + `" type = "number" min = 1 data-id="` + cart.id + `"> `;
            content += `</td> `;
            content += `<td class= "product-subtotal">` +
                ((cart.don_gia_khuyen_mai == 0 ? cart.don_gia_ban : cart.don_gia_khuyen_mai) * cart.so_luong_mua)
                    .toLocaleString() + ` VND`;
            content += `</td> `;
            content += `<td class= "product-remove"> `;
            content += `<button class= "food__btn" data-id="` + cart.id + `"><span>Xóa</span></button> `;
            content += `</td> `;
            content += `</tr> `;
            total += (cart.don_gia_khuyen_mai == 0 ? cart.don_gia_ban : cart.don_gia_khuyen_mai) * cart.so_luong_mua;
        });
        content += `</tbody> `;
        content += `</table> `;
        content += `</div> `;
        content += `</form> `;
        content += `</div> `;
        content += `</div> `;
        content += `<div class="row">`;
        content += `<div class="col-md-8">`;
        content += `</div>`;
        content += `<div class="col-md-4">`;
        content += `<div class="cartbox__total__area">`;
        content += `<div class="cart__total__amount">`;
        content += `<span>Thành tiền</span>`;
        content += `<span>` + total.toLocaleString() + ` VND`;
        content += `</span>`;
        content += `</div>`;
        content += `<div class="cart__total__tk">`;
        content += `<div class="cartbox__buttons">`;
        content += `<a class="food__btn" href="/customer/checkout/"><span>đặt hàng</span></a>`;
        content += `</div>`;
        content += `</div>`;
        content += `</div>`;
        content += `</div>`;
        return content;
    };
    function getDataCart() {
        axios
            .get('/customer/cart/data')
            .then((res) => {
                $('.cart-main-area .container').html(createTableCart(res.data.cart));
            });
    }
    getDataCart();

    async function getCountCart() {
        let abc = 0;
        const res = await axios
            .get('/customer/cart/countCart');
        return res.data.countCart;
    }

    $('body').on('click', '.product-remove button', async function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        axios
            .get('/customer/cart/remove/' + id)
            .then((res) => {
                getDataCart();
                toastr.success('Xoá thành công!');
            });
        $('.htc__header #countCart').html(await getCountCart());
    });

    $('body').on('change', '.product-quantity input', function () {
        let payLoad = {
            'id': $(this).data('id'),
            'so_luong_mua': $(this).val(),
        };
        axios
            .post('/customer/cart/update', payLoad)
            .then((res) => {
                if (res.data.status) {
                    toastr.success('Cập nhập thành công!');
                    getDataCart();
                } else {
                    toastr.error('Cập nhập thất bại!');
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
