<x-app-layouts title="Detail Penyewaan Mobil">
    <div class="card">
        <div class="card-header">
            <h4>Detail Penyewaan</h4>
        </div>
        <div class="card-body col-md-8 col-sm">
            <table class="table table-hover table-bordered">
                <tr>
                    <th>Mobil</th>
                    <td>{{ $rental->car->model }}</td> <!-- Asumsi ada relasi antara Rental dan Car -->
                </tr>
                <tr>
                    <th>Pengguna</th>
                    <td>{{ $rental->user->name }}</td> <!-- Asumsi ada relasi antara Rental dan User -->
                </tr>
                <tr>
                    <th>Tanggal Mulai</th>
                    <td>{{ $rental->start_date }}</td>
                </tr>
                <tr>
                    <th>Tanggal Selesai</th>
                    <td>{{ $rental->end_date }}</td>
                </tr>
                <tr>
                    <th>Total Biaya</th>
                    <td>{{ number_format($rental->total_cost, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ ucfirst($rental->status) }}</td>
                </tr>
            </table>

            @if($rental->status == 'pending')
                <a href="{{ route('admin.rentals.verify', $rental->id) }}" class="btn btn-success">Verifikasi</a>
                <a href="{{ route('admin.rentals.cancel', $rental->id) }}" class="btn btn-danger">Batal</a>
            @endif
        @endsection
        </div>
    </div>
</x-app-layouts>
