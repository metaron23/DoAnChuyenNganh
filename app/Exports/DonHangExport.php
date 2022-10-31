<?php

namespace App\Exports;

use App\Models\DonHang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Arr;

class DonHangExport implements FromCollection, WithHeadings, WithStrictNullComparison,ShouldAutoSize, WithStyles
{
    use Exportable;

    public function collection()
    {
        $donHang = DonHang::where('trang_thai_don_hang',2)
                    ->select('ma_don_hang','id_khach_hang','ten_khach_hang','email_khach_hang','phone_khach_hang','ten_ship','phone_ship','dia_chi_ship','trang_thai_thanh_toan','tong_tien','updated_at')->get();
        return $donHang;
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('1')->getFont()->setBold(true);
    }

    public function headings(): array {
        return [
            'Mã Đơn Hàng',
            'ID Khách Hàng',
            'Tên Khách Hàng',
            'Email Khách Hàng',
            'Số Điện Thoại',
            'Tên ngườI nhận',
            'Điện Thoại Người Nhận',
            'Địa Chỉ Nhận',
            'Trạng Thái Thanh Toán',
            'Tổng Tiền',
            'Ngày Tạo',
        ];
      }
}
