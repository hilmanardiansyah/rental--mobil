<x-app-layouts title="Riwayat Penyewaan">
    <div class="card">
        <div class="card-header">
            <h4>Riwayat Penyewaan</h4>
        </div>
        <div class="card-body col-md-8 col-sm">
            <div class="rental-active">
                
                @forelse($riwayat_penyewaan as $penyewaan)
                <div class="card">
                    <h3>{{ $penyewaan->car->nama_mobil }}</h3>
                    <p><strong>Start Date:</strong> {{ $penyewaan->start_date->format('d M Y') }}</p>
                    <p><strong>End Date:</strong> {{ $penyewaan->end_date->format('d M Y') }}</p>
                    <p><strong>Total Cost:</strong> Rp. {{ number_format($penyewaan->total_cost, 0, ',', '.') }}</p>
                    <p><strong>Status:</strong> Selesai</p>
                </div>
            @empty
                <p>Anda tidak memiliki riwayat penyewaan.</p>
            @endforelse
            </div>
        </div>
    </div>
</x-app-layouts>
