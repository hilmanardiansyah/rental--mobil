<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    // Landing page untuk customer (belum login)
    public function home()
    {
        $cars = Car::all(); // Mengambil semua mobil dari database
        $brands = Car::distinct()->pluck('brand');
        $models = Car::distinct()->pluck('model');
        $prices = Car::distinct()->pluck('rental_rate_per_day');
        return view('customer.home', compact('cars','brands', 'models','prices')); // Kirim data mobil ke view
    }

    // Dashboard untuk customer (sudah login)

}
