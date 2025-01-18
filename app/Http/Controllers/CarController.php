<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
    // Mengambil semua data mobil dari tabel cars
    $cars = Car::all();
    
    // Mengirim data mobil ke view customer.cars.index
    return view('customer.cars.index', compact('cars'));
    }
    public function rent($carId)
    {
        $car = Car::find($carId);
        // Logika pemesanan mobil atau lanjutkan ke halaman pembayaran
        return view('customer.rent', compact('car'));
    }
    
}
