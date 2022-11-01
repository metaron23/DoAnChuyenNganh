@extends('admin.master')

@section('content')

@section('title')
    <h2>Quản Lý Hoá Đơn</h2>
@endsection
<div id="hoaDonAdmin">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Danh Sách Hoá Đơn</h5>
            </div>
            <div class="card-body">
                <button class="btn btn-success" type="button" v-on:click="exportExel">Xuất Hoá Đơn</button>
                <div class="o-auto" style="width:1114">
                    <table class="table table-bordered text-center m-t-15">
                        <thead>
                            <tr>
                                <th class="fw-bold">#</th>
                                <th class="fw-bold">Mã Hoá Đơn</th>
                                <th class="fw-bold">Tên Khách Hàng</th>
                                <th class="fw-bold">Email</th>
                                <th class="fw-bold">Trạng Thái Thanh Toán</th>
                                <th class="fw-bold">Tổng Tiền</th>
                                <th class="fw-bold">Ngày Tạo</th>
                                <th class="fw-bold">Người Xác Nhận</th>
                                <th class="fw-bold">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value,key) in hoaDon">
                                <th class="fw-bold">@{{ key + 1 }}</th>
                                <td>@{{ value.ma_don_hang }}</td>
                                <td>@{{ value.ten_khach_hang }}</td>
                                <td>@{{ value.email_khach_hang }}</td>
                                <td>@{{ value.trang_thai_thanh_toan == 0 ? "Chưa thanh toán" : "Đã thanh toán" }}</td>
                                <td>@{{ value.tong_tien }}</td>
                                <td>@{{ formatDateTime(value.updated_at) }}</td>
                                <td>@{{ value.ten_nguoi_xac_nhan }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" v-on:click.prevent="showModal=true">Xem Chi Tiết</button>
                                </td>
                            </tr>
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
    <div v-if="showModal">
        <div class="modal fade show" id="exampleModalXl" tabindex="-1" style="display: block;">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Chi Tiết Đơn Hàng</h4>
                        <button type="button" class="btn-close" v-on:click.prevent="showModal=false"></button>
                    </div>
                    <div class="modal-body" style="height:510px; overflow: auto;">
                        <div class="invoice">
                            <div>
                                <div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="media">
                                                <div class="media-left"><img class="media-object rounded-circle img-60" src="../assets/images/user/1.jpg"
                                                        alt=""></div>
                                                <div class="media-body m-l-20">
                                                    <h4 class="media-heading">Johan Deo</h4>
                                                    <p>JohanDeo@gmail.com<br><span>555-555-5555</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="text-md-end text-xs-center">
                                                <h3>Invoice #<span class="counter">1069</span></h3>
                                                <p>Issued: May<span> 27, 2015</span><br> Payment Due: June <span>27, 2015</span></p>
                                            </div>
                                            <!-- End Title-->
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <!-- End InvoiceTop-->
                                <!-- End Invoice Mid-->
                                <div>
                                    <div class="table-responsive invoice-table" id="table">
                                        <table class="table table-bordered table-striped">
                                            <tbody>
                                                <tr>
                                                    <td class="item">
                                                        <h6 class="p-2 mb-0">Các Món Ăn</h6>
                                                    </td>
                                                    <td class="Hours">
                                                        <h6 class="p-2 mb-0">Hours</h6>
                                                    </td>
                                                    <td class="Rate">
                                                        <h6 class="p-2 mb-0">Rate</h6>
                                                    </td>
                                                    <td class="subtotal">
                                                        <h6 class="p-2 mb-0">Sub-total</h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Lorem Ipsum</label>
                                                        <p class="m-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="itemtext">5</p>
                                                    </td>
                                                    <td>
                                                        <p class="itemtext">$75</p>
                                                    </td>
                                                    <td>
                                                        <p class="itemtext">$375.00</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Lorem Ipsum</label>
                                                        <p class="m-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="itemtext">3</p>
                                                    </td>
                                                    <td>
                                                        <p class="itemtext">$75</p>
                                                    </td>
                                                    <td>
                                                        <p class="itemtext">$225.00</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Lorem Ipsum</label>
                                                        <p class="m-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="itemtext">10</p>
                                                    </td>
                                                    <td>
                                                        <p class="itemtext">$75</p>
                                                    </td>
                                                    <td>
                                                        <p class="itemtext">$750.00</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Lorem Ipsum</label>
                                                        <p class="m-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="itemtext">10</p>
                                                    </td>
                                                    <td>
                                                        <p class="itemtext">$75</p>
                                                    </td>
                                                    <td>
                                                        <p class="itemtext">$750.00</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p class="itemtext"></p>
                                                    </td>
                                                    <td>
                                                        <p class="m-0">HST</p>
                                                    </td>
                                                    <td>
                                                        <p class="m-0">13%</p>
                                                    </td>
                                                    <td>
                                                        <p class="m-0">$419.25</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="Rate">
                                                        <h6 class="mb-0 p-2">Total</h6>
                                                    </td>
                                                    <td class="payment">
                                                        <h6 class="mb-0 p-2">$3,644.25</h6>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- End Table-->
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div>
                                                <p class="legal"><strong>Thank you for your business!</strong>&nbsp; Payment is expected within 31
                                                    days; please process this invoice within that time. There will be a 5% interest charge per month
                                                    on late invoices.</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <form class="text-end">
                                                <input type="image" src="../assets/images/other-images/paypal.png" name="submit"
                                                    alt="PayPal - The safer, easier way to pay online!" data-bs-original-title="" title="">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End InvoiceBot-->
                            </div>
                            <div class="col-sm-12 text-center mt-3">
                                <button class="btn btn btn-primary me-2" type="button" onclick="myFunction()" data-bs-original-title=""
                                    title="">Print</button>
                                <button class="btn btn-secondary" type="button" data-bs-original-title="" title="">Cancel</button>
                            </div>
                            <!-- End Invoice-->
                            <!-- End Invoice Holder-->
                            <!-- Container-fluid Ends-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    new Vue({
        el: '#hoaDonAdmin',
        data: {
            hoaDon: [],
            showModal: false,
        },
        created() {
            this.getData();
        },
        methods: {
            getData() {
                axios
                    .get('/admin/hoa-don/get-data')
                    .then((res) => {
                        this.hoaDon = res.data.hoaDon;
                    });
            },
            formatDateTime(fullDay) {
                let time = fullDay.slice(fullDay.indexOf('T') + 1, fullDay.indexOf('.'));
                let date = fullDay.slice(0, fullDay.indexOf('T'));
                let dateArray = date.split('-');
                dateArray.reverse();
                date = dateArray.join('/');
                return time + " | " + date;
            },
            exportExel() {
                window.location.replace('/admin/hoa-don/export');
            },
        }
    });
</script>
@endsection
