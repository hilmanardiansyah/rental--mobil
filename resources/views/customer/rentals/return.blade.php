<x-app-layouts title="Penyewaan Aktif Dashboard">
    <div class="card">
        <div class="card-header">
            <h1 class="mb-4">Pengembalian Mobil</h1>
        </div>
        <div class="card-body col-md-8 col-sm">
            <form action="{{ route('customer.rentals.processReturn', $rental->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Gunakan @method('PUT') untuk mengubah request ke PUT -->

                <div class="form-group">
                    <label for="car_plate">Nomor Plat Mobil</label>
                    <input type="text" id="car_plate" name="car_plate" class="form-control" required placeholder="Masukkan nomor plat mobil">
                </div>

                <div class="form-group">
                    <label for="return_date">Tanggal Pengembalian</label>
                    <input type="date" id="return_date" name="return_date" class="form-control" value="{{ now()->format('Y-m-d') }}" required>
                </div>

                <div class="form-group">
                    <label for="late_fee">Biaya Keterlambatan</label>
                    <input type="hidden" id="late_fee" name="late_fee" value="0">
                    <!-- Menampilkan biaya keterlambatan jika ada -->
                    <p>Biaya Keterlambatan: Rp <span id="late-fee-display">0</span></p>
                </div>

                <div class="form-group">
                    <label for="total_cost">Total Biaya Sewa</label>
                    <input type="hidden" id="total_cost" name="total_cost" value="{{ $rental->total_cost }}">
                    <!-- Menampilkan total biaya sewa -->
                    <p>Total Biaya Sewa: Rp <span id="total-cost-display">{{ number_format($rental->total_cost, 0, ',', '.') }}</span></p>
                </div>

                <button type="submit" class="btn btn-success mt-3">Proses Pengembalian</button>
            </form>

        </div>
    </div>
</x-app-layouts>

