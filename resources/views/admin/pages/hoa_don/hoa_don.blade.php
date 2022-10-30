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
                <button class="btn btn-success" type="button">Xuất Hoá Đơn</button>
                <div class="o-auto" style="width:1114">
                    <table class="table table-bordered text-center m-t-15" >
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
                                <td>@{{ value.trang_thai_thanh_toan }}</td>
                                <td>@{{ value.tong_tien }}</td>
                                <td>@{{ formatDateTime(value.updated_at) }}</td>
                                <td>@{{ value.ten_nguoi_xac_nhan }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary">Xem Chi Tiết</button>
                                </td>
                            </tr>
                        </tbody>

                    </table>

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
                let time = fullDay.slice(fullDay.indexOf('T')+1, fullDay.indexOf('.'));
                let date = fullDay.slice(0, fullDay.indexOf('T'));
                let dateArray = date.split('-');
                dateArray.reverse();
                date = dateArray.join('/');
                return time +" | "+date;
            },

        }
    });
</script>
@endsection
