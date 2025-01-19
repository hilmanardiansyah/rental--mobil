<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rental; // Sesuaikan model
use App\Models\User;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;


class CustomerController extends Controller
{
    public function home()
    {
        $featuredCars = Car::where('is_available', true)->take(6)->get(); // Ambil 6 mobil yang tersedia
        if (Auth::check() && Auth::user()->role === 'customer') {
            return redirect()->route('customer.dashboard');
        }
        return view('customer.home', compact('featuredCars')); // Kirim data mobil ke view
    }

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
        $activeRentals = Rental::where('user_id', auth()->id())
        ->where('status', 'active')
        ->get(); // Mengambil penyewaan aktif berdasarkan status

// Kirim data ke view
    return view('customer.rentals.active', compact('activeRentals'));

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
