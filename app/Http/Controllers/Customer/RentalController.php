<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use Carbon\Carbon;
use App\Models\Rental;
use Illuminate\Support\Facades\DB;

class RentalController extends Controller
{
    public function indexLanding()
    {
        $cars = Car::all(); // Mengambil semua mobil yang tersedia
        $activeRentals = Rental::where('user_id', auth()->id())
                               ->where('status', 'active')
                               ->get(); // Menambahkan data penyewaan aktif

        return view('customer.rentals.rentals_landing', compact('cars', 'activeRentals')); // Kirimkan data
    }

    public function index()
    {
        // Mengambil semua mobil yang tersedia untuk disewa
        $availableCars = Car::where('is_available', true)->get();

        // Mengirimkan data mobil yang tersedia ke view
        return view('customer.rentals.new', compact('availableCars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $car = Car::find($request->car_id);

        // Menghitung jumlah hari sewa
        $start_date = Carbon::parse($request->start_date);
        $end_date = Carbon::parse($request->end_date);
        $days = $end_date->diffInDays($start_date);

        // Menghitung total biaya
        $total_cost = $car->rental_rate_per_day * $days;

        // Membuat penyewaan baru
        Rental::create([
            'user_id' => auth()->user()->id,
            'car_id' => $car->id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_cost' => $total_cost,
        ]);

        return redirect()->route('customer.rentals.active')->with('success', 'Penyewaan berhasil!');
    }

    public function show($id)
    {
        // Ambil data mobil berdasarkan ID
        $car = Car::findOrFail($id);

        // Tampilkan view dengan data mobil
        return view('customer.rent', compact('car'));
    }

    // Method untuk menangani penyewaan dari halaman landing
    public function storeLanding(Request $request, $id)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Temukan mobil berdasarkan ID
        $car = Car::findOrFail($id);

        // Menghitung jumlah hari sewa
        $start_date = Carbon::parse($request->start_date);
        $end_date = Carbon::parse($request->end_date);
        $days = $end_date->diffInDays($start_date);

        // Menghitung total biaya
        $total_cost = $car->rental_rate_per_day * $days;

        // Membuat penyewaan baru
        Rental::create([
            'user_id' => auth()->user()->id,
            'car_id' => $car->id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_cost' => $total_cost,
        ]);

        // Redirect ke halaman konfirmasi penyewaan dengan mengirimkan parameter id mobil
        return redirect()->route('customer.rentals.confirmation', ['id' => $car->id])
                     ->with('success', 'Penyewaan berhasil!');
    }

    // Halaman konfirmasi penyewaan
    public function showConfirmation($carId)
    {
        // Ambil data mobil berdasarkan ID
        $car = Car::findOrFail($carId);

        // Tampilkan halaman konfirmasi dengan data mobil
        return view('customer.rentals.confirmation', compact('car'));
    }
    public function returnForm($rentalId)
    {
        $rental = Rental::findOrFail($rentalId);

        // Pastikan rental ini milik user yang sedang login
        if ($rental->user_id != auth()->id()) {
            return redirect()->route('customer.rentals.active')->with('error', 'Anda tidak memiliki akses ke rental ini.');
        }

        return view('customer.rentals.return', compact('rental')); // Kirimkan data rental ke view
    }

    // Proses Pengembalian Mobil
    public function processReturn($id)
{
    // Ambil rental berdasarkan ID
    $rental = Rental::findOrFail($id);

    // Perbarui status rental dan proses pengembalian
    $rental->status = 'returned';
    $rental->return_date = now();  // Tanggal pengembalian
    $rental->late_fee = 0;  // Misalnya, jika tidak ada keterlambatan
    $rental->save();

    return redirect()->route('customer.rentals.active')->with('success', 'Mobil berhasil dikembalikan.');
}



}
