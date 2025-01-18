<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rental;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        // Mengambil laporan data rental dalam periode tertentu
        $rentals = Rental::whereBetween('start_date', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
                         ->with(['car', 'user']) // Mengambil data terkait mobil dan pengguna
                         ->get();

        // Bisa menambahkan data lain sesuai kebutuhan, misalnya laporan total pendapatan
        $totalRevenue = $rentals->sum('total_cost'); // Total biaya rental bulan ini

        return view('admin.reports.index', compact('rentals', 'totalRevenue'));
    }
}
