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
    // CarController.php
    public function search(Request $request)
    {
        // Mengambil semua data brand, model, dan price dari database
        $brands = Car::distinct()->pluck('brand');
        $models = Car::distinct()->pluck('model');
        $prices = Car::distinct()->pluck('rental_rate_per_day');

        // Mencari mobil sesuai dengan filter
        $query = Car::query();

        if ($request->has('brand') && $request->brand != '') {
            $query->where('brand', $request->brand);
        }

        if ($request->has('model') && $request->model != '') {
            $query->where('model', $request->model);
        }

        if ($request->has('price') && $request->price != '') {
            $query->where('rental_rate_per_day', '<=', $request->price);
        }

        // Mendapatkan hasil pencarian mobil
        $cars = $query->get();

        // Mengirimkan data ke view 'cars.index'
        return view('customer.cars.index', compact('cars', 'brands', 'models', 'prices'));
    }



}
