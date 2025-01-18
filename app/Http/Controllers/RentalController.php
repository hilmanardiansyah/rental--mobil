<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental;

class RentalController extends Controller
{
    public function index()
    {
        // Mengambil data penyewaan yang terkait dengan customer yang sedang login
        $rentals = Rental::where('user_id', auth()->id())->get();

        return view('customer.rentals', compact('rentals'));
    }
}
