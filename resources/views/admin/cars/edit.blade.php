<x-app-layouts title="Edit Mobil">
    <div class="card">
        <div class="card-header">
            <h4>Form Edit Mobil</h4>
        </div>
        <div class="card-body col-md-8 col-sm">
            <form action="{{ route('admin.cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="brand">Brand Mobil</label>
                    <input type="text" name="brand" id="brand" class="form-control" value="{{ old('brand', $car->brand) }}" required>
                </div>

                <div class="form-group">
                    <label for="model">Model Mobil</label>
                    <input type="text" name="model" id="model" class="form-control" value="{{ old('model', $car->model) }}" required>
                </div>

                <div class="form-group">
                    <label for="license_plate">Nomor Plat Mobil</label>
                    <input type="text" name="license_plate" id="license_plate" class="form-control" value="{{ old('license_plate', $car->license_plate) }}" required>
                </div>

                <div class="form-group">
                    <label for="rental_rate_per_day">Harga Sewa per Hari</label>
                    <input type="number" name="rental_rate_per_day" id="rental_rate_per_day" class="form-control" value="{{ old('rental_rate_per_day', $car->rental_rate_per_day) }}" required>
                </div>

                <div class="form-group">
                    <label for="is_available">Ketersediaan</label>
                    <select name="is_available" id="is_available" class="form-control" required>
                        <option value="1" {{ old('is_available', $car->is_available) == 1 ? 'selected' : '' }}>Tersedia</option>
                        <option value="0" {{ old('is_available', $car->is_available) == 0 ? 'selected' : '' }}>Tidak Tersedia</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">Gambar Mobil</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @if ($car->image)
                        <img src="{{ asset('admin/mobil/' . $car->image) }}" alt="{{ $car->model }}" width="100">
                    @endif
                </div>


                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</x-app-layouts>
