<x-app-layouts title="Penyewaan Aktif">
    <div class="card">
        <div class="card-header">
            <h4>Penyewaan Aktif</h4>
        </div>
        <div class="card-body col-md-8 col-sm">
            <div class="rental-active">
                
                @if($penyewaan_aktif)
                    <div class="card">
                        <h3>{{ $penyewaan_aktif->car->nama_mobil }}</h3> <!-- Menampilkan nama mobil -->
                        <p><strong>Start Date:</strong> {{ $penyewaan_aktif->start_date->format('d M Y') }}</p>
                        <p><strong>End Date:</strong> {{ $penyewaan_aktif->end_date->format('d M Y') }}</p>
                        <p><strong>Total Cost:</strong> Rp. {{ number_format($penyewaan_aktif->total_cost, 0, ',', '.') }}</p>
                        <p><strong>Status:</strong> Aktif</p>
                    </div>
                @else
                    <p>Anda tidak memiliki penyewaan aktif saat ini.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layouts>
