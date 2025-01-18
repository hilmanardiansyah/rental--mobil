<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use Carbon\Carbon;
use App\Models\Rental;

class RentalController extends Controller
{
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
}
