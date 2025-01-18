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
        $featuredCars = Car::where('is_available', true)->take(6)->get(); // Ambil 6 mobil yang tersedia
        if (Auth::check() && Auth::user()->role === 'customer') {
            return redirect()->route('customer.dashboard');
        }
        return view('customer.home', compact('featuredCars')); // Kirim data mobil ke view
    }

    // Dashboard untuk customer (sudah login)
    public function dashboard()
    {
        return view('customer.dashboard'); // View dashboard customer
    }

    // Menampilkan daftar mobil yang tersedia
    public function listCars(Request $request)
    {
        $query = Car::query();

        if ($request->has('search')) {
            $query->where('brand', 'like', '%' . $request->search . '%')
                ->orWhere('model', 'like', '%' . $request->search . '%');
        }

        $cars = $query->where('is_available', true)->get();

        return view('customer.cars.index', compact('cars'));
    }

    // Detail mobil
    public function carDetails($id)
    {
        $car = Car::findOrFail($id);
        return view('customer.cars.details', compact('car'));
    }

    // Form peminjaman mobil
    public function rentForm($id)
    {
        $car = Car::findOrFail($id);
        return view('customer.rent.create', compact('car'));
    }

    // Proses peminjaman mobil
    public function rent(Request $request, $carId)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $car = Car::findOrFail($carId);

        if (!$car->is_available) {
            return back()->withErrors('Mobil tidak tersedia untuk disewa.');
        }

        Rental::create([
            'user_id' => Auth::id(),
            'car_id' => $car->id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        $car->update(['is_available' => false]);

        return redirect()->route('customer.rentals');
    }

    // Daftar penyewaan
    public function rentals()
    {
        $rentals = Rental::where('user_id', Auth::id())->with('car')->get();
        return view('customer.rentals.index', compact('rentals'));
    }

    // Form pengembalian mobil
    public function returnForm($rentalId)
    {
        $rental = Rental::findOrFail($rentalId);
        return view('customer.return.create', compact('rental'));
    }

    // Proses pengembalian mobil
    public function returnCar(Request $request, $rentalId)
    {
        $request->validate(['return_date' => 'required|date']);

        $rental = Rental::findOrFail($rentalId);

        if ($rental->user_id != Auth::id()) {
            return back()->withErrors('Anda tidak berhak mengembalikan mobil ini.');
        }

        $returnDate = $request->return_date;
        $rentalDuration = \Carbon\Carbon::parse($rental->start_date)->diffInDays($returnDate) ?: 1;
        $car = $rental->car;

        $totalCost = $rentalDuration * $car->rental_rate_per_day;

        $rental->update([
            'return_date' => $returnDate,
            'total_cost' => $totalCost,
        ]);

        $car->update(['is_available' => true]);

        return redirect()->route('customer.rentals')->with('success', 'Mobil berhasil dikembalikan.');
    }
}
