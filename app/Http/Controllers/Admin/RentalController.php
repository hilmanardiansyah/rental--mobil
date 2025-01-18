<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rental;

class RentalController extends Controller
{
    public function index(Request $request)
    {
        $query = Rental::query();

        // Jika ada pencarian berdasarkan 'search' di input
        if ($request->has('search') && $request->search != '') {
            $query->whereHas('car', function ($q) use ($request) {
                $q->where('model', 'like', '%' . $request->search . '%'); // Cari mobil berdasarkan model
            })->orWhereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%'); // Cari pengguna berdasarkan nama
            });
        }

        $rentals = $query->get();

        return view('admin.rentals.index', compact('rentals'));
    }

    public function show($id)
    {
        // Menampilkan detail penyewaan
        $rental = Rental::findOrFail($id);
        return view('admin.rentals.show', compact('rental'));
    }
    public function verify($id)
    {
        // Verifikasi penyewaan
        $rental = Rental::findOrFail($id);
        $rental->status = 'verified';
        $rental->save();
        return redirect()->route('admin.rentals.index')->with('success', 'Penyewaan berhasil diverifikasi');
    }

    public function cancel($id)
    {
        // Pembatalan penyewaan
        $rental = Rental::findOrFail($id);
        $rental->status = 'cancelled';
        $rental->save();
        return redirect()->route('admin.rentals.index')->with('success', 'Penyewaan berhasil dibatalkan');
    }
}
