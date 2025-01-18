<x-app-layouts title="Mobil yang tersedia">
    <div class="card">
        <div class="card-header">
            <h4>Mobil yang tersedia </h4>
        </div>
        <div class="card-body col-md-8 col-sm">
            <div class="rental-active">
                
                @foreach($availableCars as $car)
                <div class="car-item">
                    <img src="{{ asset( $car->image) }}" alt="{{ $car->brand }}" width="100">
                    <h5>{{ $car->brand }} - {{ $car->model }}</h5>
                    <p>Plat Nomor: {{ $car->license_plate }}</p>
                    <p>Harga per hari: Rp {{ number_format($car->rental_rate_per_day, 0, ',', '.') }}</p>
        
                    <!-- Form untuk menyewa mobil -->
                    <form action="{{ route('customer.rentals.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="car_id" value="{{ $car->id }}">
                        <input type="date" name="start_date" required>
                        <input type="date" name="end_date" required>
                        <button type="submit" class="btn btn-primary">Sewa Mobil</button>
                    </form>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</x-app-layouts>
