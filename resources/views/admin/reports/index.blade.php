<x-app-layouts title="Laporan Rental Mobil">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <a href="{{ route('admin.reports.export') }}" class="btn btn-primary">Ekspor Laporan ke Excel</a>

            <h4>Laporan Rental Mobil</h4>
            <div>
                <span>Total Pendapatan Bulan Ini: Rp. {{ number_format($totalRevenue, 0, ',', '.') }}</span>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Mobil</th>
                        <th>Pengguna</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Total Biaya</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rentals as $rental)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $rental->car->model }}</td> <!-- Asumsi ada relasi antara Rental dan Car -->
                            <td>{{ $rental->user->name }}</td> <!-- Asumsi ada relasi antara Rental dan User -->
                            <td>{{ $rental->start_date->format('d M Y') }}</td>
                            <td>{{ $rental->end_date->format('d M Y') }}</td>
                            <td>Rp. {{ number_format($rental->total_cost, 0, ',', '.') }}</td>
                            <td>{{ ucfirst($rental->status) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layouts>
