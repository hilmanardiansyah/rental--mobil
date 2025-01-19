<x-app-layouts title="Penyewaan Aktif Dashboard">
    <div class="card">
        <div class="card-header">
            <h4>Penyewaan Aktif</h4>
        </div>
        <div class="card-body col-md-8 col-sm">
            <div class="rental-active">

                @if($activeRentals->count() > 0)
                <div class="list-group">
                    @foreach($activeRentals as $rental)
                        <div class="list-group-item">
                            <h5>{{ $rental->car->name }}</h5>
                            <p>Tanggal Mulai: {{ $rental->start_date }}</p>
                            <p>Tanggal Selesai: {{ $rental->end_date }}</p>

                            <a href="{{ route('customer.rentals.return', $rental->id) }}" class="btn btn-warning">Kembalikan Mobil</a>
                        </div>
                    @endforeach
                </div>
            @else
                <p>Anda tidak memiliki penyewaan aktif.</p>
            @endif
            </div>
        </div>
    </div>
</x-app-layouts>
