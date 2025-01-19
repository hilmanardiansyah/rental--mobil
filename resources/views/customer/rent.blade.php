@extends('layouts.app')

@section('content')
<div class="container"> <!-- Menambahkan margin top dan bottom -->
    <div class="card shadow-lg p-4 rounded-lg "> <!-- Memberikan shadow dan padding -->
        <div class="card-body col-md-8 col-sm pt-10 mt-2">
            <h1 class="mb-4">{{ $car->name }}</h1> <!-- Menambahkan margin bottom -->
            <div class="text-center mb-4"> <!-- Menambahkan margin bottom dan membuat gambar terpusat -->
                <img src="{{ asset($car->image) }}" alt="{{ $car->name }}" class="img-fluid rounded">
            </div>
            <p class="mb-4">Price per day: Rp.{{ $car->rental_rate_per_day }}</p>
            <p class="mb-4">{{ $car->description }}</p>

            <form action="{{ route('customer.rent.store', $car->id) }}" method="POST">
                @csrf
                <!-- Input untuk memilih tanggal mulai dan selesai sewa -->
                <div class="mb-3">
                    <label for="start_date" class="form-label">Start Date:</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="end_date" class="form-label">End Date:</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Book Now</button>
            </form>
        </div>
    </div>
</div>
@endsection
