@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg p-4 rounded-lg">
        <div class="card-body col-md-8 col-sm pt-10 mt-2">
            <h1 class="mb-4">Penyewaan Aktif</h1>
            @if($activeRentals->isEmpty())
                <p>Anda belum memiliki penyewaan aktif. <a href="{{ route('customer.cars') }}" class="btn btn-primary">Sewa Mobil</a></p>
            @else
                @foreach($activeRentals as $rental)
                <div class="rental-box mb-4 p-4 border rounded-lg shadow-sm">
                    <h3 class="mb-3">{{ $rental->car->name }}</h3>
                    <p><strong>Start Date:</strong> {{ $rental->start_date }}</p>
                    <p><strong>End Date:</strong> {{ $rental->end_date }}</p>
                    <p><strong>Status:</strong> {{ $rental->status }}</p>

                    <!-- Tampilkan teks jika status rental aktif -->
                    @if($rental->status == 'active')
                        <p class="mt-3">Pengembalian msobil dapat dilakukan melalui dashboard Anda. Silakan kunjungi <a href="{{ route('customer.dashboard') }}" class="btn btn-warning mt-2">Dashboard</a> untuk mengelola pengembalian.</p>
                    @endif
                </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
