@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Konfirmasi Penyewaan</h1>
    <p>Terima kasih telah melakukan pemesanan! Berikut adalah detail pemesanan Anda:</p>

    <h3>{{ $car->name }}</h3>
    <p><strong>Start Date:</strong> {{ now()->format('d M Y') }}</p>
    <p><strong>End Date:</strong> {{ now()->addDays(5)->format('d M Y') }}</p> <!-- Contoh, sesuaikan dengan data yang dipilih -->
    <p><strong>Price per Day:</strong> ${{ $car->price_per_day }}</p>

    <!-- Opsi -->
    <a href="{{ route('customer.dashboard') }}" class="btn btn-primary">Kembali ke Dashboard</a>
    <a href="{{ route('customer.rentals.active') }}" class="btn btn-secondary">Lihat Penyewaan Aktif</a>
</div>
@endsection
