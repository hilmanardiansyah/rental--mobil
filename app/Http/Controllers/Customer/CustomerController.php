<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rental; // Sesuaikan model
use App\Models\User;

class CustomerController extends Controller
{
    public function dashboard()
    {
          $today = now();
        // Ambil data untuk dashboard
        $penyewaan_aktif = Rental::where('user_id', auth()->id())
        ->where('start_date', '<=', $today)
        ->where('end_date', '>=', $today)
        ->count();

        $riwayat_penyewaan = Rental::where('user_id', auth()->id())
        ->where('end_date', '<', $today)
        ->get();


        $profil_pengguna = User::find(auth()->id());

        return view('customer.dashboard', [
            'penyewaan_aktif' => $penyewaan_aktif,
            'riwayat_penyewaan' => $riwayat_penyewaan,
            'profil_pengguna' => $profil_pengguna,
        ]);
    }

    public function rentalActive()
    {
    $today = now(); // Ambil tanggal saat ini
    $penyewaan_aktif = Rental::where('user_id', auth()->id()) // Filter berdasarkan user yang login
                            ->where('start_date', '<=', $today) // Penyewaan yang sudah mulai
                            ->where('end_date', '>=', $today) // Penyewaan yang belum berakhir
                            ->first(); // Ambil penyewaan pertama (kalau ada)

    return view('customer.rentals.active', [
        'penyewaan_aktif' => $penyewaan_aktif,
    ]);
    }
    public function rentalHistory()
    {
    $today = now();
    // Ambil semua penyewaan yang sudah selesai
    $riwayat_penyewaan = Rental::where('user_id', auth()->id())
                                ->where('end_date', '<', $today) // Penyewaan yang sudah berakhir
                                ->get();

    return view('customer.rentals.history', [
        'riwayat_penyewaan' => $riwayat_penyewaan,
    ]);
    }
    public function profile()
    {
    $profil_pengguna = User::find(auth()->id()); // Ambil data pengguna yang sedang login

    return view('customer.profile', [
        'profil_pengguna' => $profil_pengguna,
    ]);
    }



}
