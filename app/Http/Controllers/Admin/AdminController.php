<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $total_mobil = Car::count(); // Hitung total mobil
        $mobil_tersedia = Car::where('is_available', 1)->count(); // Mobil yang tersedia
        $peminjaman_aktif = Rental::where('start_date', '<=', Carbon::now())
                                    ->where('end_date', '>=', Carbon::now())
                                    ->count();

        $riwayat_peminjaman = Rental::where('end_date', '<', Carbon::now())->count();
        $total_pelanggan = User::role('customer')->count();
        $pendapatan_bulanan = Rental::whereMonth('created_at', now()->month)->sum('total_cost'); // Pendapatan bulan in

        return view('admin.dashboard', compact(
            'total_mobil',
            'mobil_tersedia',
            'peminjaman_aktif',
            'riwayat_peminjaman',
            'total_pelanggan',
            'pendapatan_bulanan'
        ));
    }
}
