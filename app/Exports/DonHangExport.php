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

class DonHangExport implements FromCollection, WithHeadings, WithStrictNullComparison,ShouldAutoSize, WithStyles
{
    use Exportable;

    public function collection()
    {
        return DonHang::all();
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('1')->getFont()->setBold(true);
    }

    public function headings(): array {
        return [
            '#',
            'ma_don_hang',
            'id_khach_hang',
            'ten_khach_hang',
            'email_khach_hang',
            'phone_khach_hang',
            'ten_ship',
            'phone_ship',
            'dia_chi_ship',
            'trang_thai_thanh_toan',
            'trang_thai_don_hang',
            'tong_tien',
            'Ngày Tạo',
        ];
      }
}
