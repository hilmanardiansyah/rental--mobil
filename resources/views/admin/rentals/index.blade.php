<x-app-layouts title="Daftar Rental">

    <div class="d-flex justify-content-end mb-4">
        <form action="{{ route('admin.rentals.index') }}" method="GET" class="form-inline">
            <input type="text" name="search" class="form-control mr-4 col-md" placeholder="Cari Mobil/Pengguna..">
            <button type="submit" class="btn btn-icon icon-left btn-primary">Cari</button>
        </form>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Daftar Rental</h4>
        </div>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
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
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rentals as $rental)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $rental->car->model }}</td> <!-- Asumsi ada relasi antara Rental dan Car -->
                <td>{{ $rental->user->name }}</td> <!-- Asumsi ada relasi antara Rental dan User -->
                <td>{{ $rental->start_date }}</td>
                <td>{{ $rental->end_date }}</td>
                <td>{{ number_format($rental->total_cost, 0, ',', '.') }}</td>
                <td>{{ ucfirst($rental->status) }}</td>
                <td>
                    @if($rental->status == 'pending')
                        <a href="{{ route('admin.rentals.verify', $rental->id) }}" class="btn btn-success">Verifikasi</a>
                        <a href="{{ route('admin.rentals.cancel', $rental->id) }}" class="btn btn-danger">Batal</a>
                    @else
                        <p>Sudah {{ ucfirst($rental->status) }}</p>
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
    </div>
</x-app-layouts>
