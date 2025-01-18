<?php

namespace App\Exports;

use App\Models\Rental;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RentalReportExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Rental::all(); // Ambil semua data rental
    }

    public function headings(): array
    {
        return [
            'No',
            'Mobil',
            'Pengguna',
            'Tanggal Mulai',
            'Tanggal Selesai',
            'Total Biaya',
            'Status',
        ];
    }
}
