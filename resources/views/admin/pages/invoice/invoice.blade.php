@extends('admin.master')

@section('content')
    <div id="hoaDonAdmin">
        <div class="row p-t-20">
            <div class="row p-20">
                <h4>Quản Lý Hoá Đơn</h4>
            </div>
            <div class="row p-20 p-r-0">
                <div class="col-md-2 m-b-20">
                    <select class="form-select" id="exportExelSelect" data-container="body" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-original-title="Chọn số bản ghi muốn xuất">
                        <option value="all">Tất Cả</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="0">Khác</option>
                    </select>
                </div>
                <div class="col-md-2 m-b-20 d-flex p-l-0">
                    <input type="number" class="exportExelInput img-60" hidden>
                    <button class="btn btn-primary m-l-10" id="btn_exportExel">Xuất Exel</button>
                </div>
                <div class="respoTable">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" class="img-30">#</th>
                                <th scope="col">Thao Tác</th>
                                <th scope="col">Mã Hoá Đơn</th>
                                <th scope="col">Email Khác Hàng</th>
                                <th scope="col">Tên Khách Hàng</th>
                                <th scope="col">Địa Chỉ</th>
                                <th scope="col">Tình Trạng Thanh Toán</th>
                                <th scope="col">Tổng Tiền</th>
                                <th scope="col">Ngày Tạo</th>
                                <th scope="col">Email Người Xác Nhận</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hoaDon as $key => $value)
                                <tr>
                                    <th scope="row" class="img-30">{{ $hoaDon->currentPage()*4 - 4 + 1 + $key}}</th>
                                    <td>
                                        <button data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" class="detailAccount"
                                            data-id="{{ $value->id }}"><i class="fa fa-eye"></i></button>
                                    </td>
                                    <td>{{ $value->ma_don_hang }}</td>
                                    <td>{{ $value->email_khach_hang }}</td>
                                    <td>{{ $value->ten_khach_hang }}</td>
                                    <td>{{ $value->dia_chi_ship }}</td>
                                    @if ($value->trang_thai_thanh_toan == 1)
                                        <td>
                                            <span class="badge rounded-pill badge-success">Đã Thanh Toán</span>
                                        </td>
                                    @else
                                        <td>
                                            <span class="badge rounded-pill badge-danger">Chưa Thanh Toán</span>
                                        </td>
                                    @endif
                                    <td>{{ $value->tong_tien }}</td>
                                    <td id="dateInvoid">{{ $value->updated_at }}</td>
                                    <td>
                                        <span class="badge rounded-pill badge-info">{{ $value->email_nguoi_xac_nhan }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div style="margin-right:12px">
            {{ $hoaDon->links('pagination::bootstrap-5') }}
        </div>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Chi Tiết Hoá Đơn</h4>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title=""
                            title=""></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                        </div>
                        <div class="col-sm-12 text-center mt-3">
                            <button class="btn btn btn-primary me-2" id="print_invoice" type="button" data-bs-original-title=""
                                title="">Print</button>
                            <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancel</button>
                        </div>`
                    </div>`
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('js')
    <script src="/js/admin/invoice.js"></script>
@endsection

