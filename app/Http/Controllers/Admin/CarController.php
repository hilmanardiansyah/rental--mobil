<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data mobil dengan query builder
        $query = Car::query();

        // Mengecek apakah ada pencarian berdasarkan plate number
        if ($request->has('search_plate') && $request->search_plate != '') {
            // Filter berdasarkan plate number
            $query->where('license_plate', 'like', '%' . $request->search_plate . '%');
        }

        // Ambil semua mobil yang sudah difilter
        $cars = $query->get();

        // Kembalikan ke view dengan data mobil yang sudah difilter
        return view('admin.cars.index', compact('cars'));
    }


    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'license_plate' => 'required',
            'rental_rate_per_day' => 'required|numeric',
            'image' => 'nullable|image',
            'is_available' => 'required|boolean',

        ]);

        $car = new Car();
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->license_plate = $request->license_plate;
        $car->rental_rate_per_day = $request->rental_rate_per_day;
        $car->is_available = $request->is_available;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // Menentukan path untuk menyimpan gambar
            $imagePath = 'admin/mobil/' . $image->getClientOriginalName();
            // Menyimpan gambar di public/admin/mobil
            $image->move(public_path('admin/mobil'), $image->getClientOriginalName());
            $car->image = $imagePath;
        }


        $car->save();
        return redirect()->route('admin.cars.index')->with('success', 'Mobil berhasil ditambahkan');
    }
    public function edit($id)
{
    // Mencari mobil berdasarkan ID
    $car = Car::findOrFail($id);

    // Menampilkan halaman edit dengan membawa data mobil
    return view('admin.cars.edit', compact('car'));
}

    public function update(Request $request, $id)
{
    $car = Car::findOrFail($id);

    $request->validate([
        'brand' => 'required',
        'model' => 'required',
        'license_plate' => 'required',
        'rental_rate_per_day' => 'required|numeric',
        'image' => 'nullable|image',
        'is_available' => 'required|boolean',
    ]);

    $car->brand = $request->brand;
    $car->model = $request->model;
    $car->license_plate = $request->license_plate;
    $car->rental_rate_per_day = $request->rental_rate_per_day;
    $car->is_available = $request->is_available;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        // Menentukan path untuk menyimpan gambar
        $imagePath = 'admin/mobil/' . $image->getClientOriginalName();
        // Menyimpan gambar di public/admin/mobil
        $image->move(public_path('admin/mobil'), $image->getClientOriginalName());
        $car->image = $imagePath;
    }


    $car->save();
    return redirect()->route('admin.cars.index')->with('success', 'Mobil berhasil diperbarui');
}

    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
        return redirect()->route('admin.cars.index')->with('success', 'Mobil berhasil dihapus');
    }
}
