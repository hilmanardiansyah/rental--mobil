<x-app-layouts title="Daftar Mobil">
    <!-- Pencarian Mobil -->
    <div class="d-flex justify-content-end mb-4">
    <form action="{{ route('admin.cars.index') }}" method="GET" class="form-inline">
        <input type="text" name="search_plate" class="form-control mr-4 col-md" placeholder="Cari Plate Nomer..">
        <button type="submit" class="btn btn-icon icon-left btn-primary">Cari</button>
    </form>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Daftar Mobil</h4>
            <a href="{{ route('admin.cars.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tambah Mobil
            </a>
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
                        <th>Brand Mobil</th>
                        <th>Model Mobil</th>
                        <th>Plate Nomer</th>
                        <th>Harga per Hari</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cars as $car)
                    <tr>
                        <td>{{ $car->brand }}</td>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->license_plate }}</td>
                        <td>{{ $car->rental_rate_per_day }}</td>
                        <td>
                            @if ($car->image)
                                <img src="{{ asset($car->image) }}" alt="Car Image" style="width: 100px; height: 50px;">
                            @else
                                <p>No image available</p>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layouts>
