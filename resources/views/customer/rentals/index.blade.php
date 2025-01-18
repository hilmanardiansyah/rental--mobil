@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Penyewaan Mobil</h1>

    @if ($rentals->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Mobil</th>
                    <th>Tanggal Sewa</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Total Biaya</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rentals as $rental)
                    <tr>
                        <td>{{ $rental->car->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($rental->rental_start)->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($rental->rental_end)->format('d-m-Y') }}</td>
                        <td>{{ $rental->status }}</td>
                        <td>${{ $rental->total_price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
    <p>Anda belum memiliki penyewaan mobil. <a href="{{ route('customer.cars') }}">Lihat mobil yang tersedia</a></p>

    @endif
</div>
@endsection
