<x-app-layouts title="Profile Pengguna">
    <div class="card">
        <div class="card-header">
            <h4>Profile</h4>
        </div>
        <div class="card-body col-md-8 col-sm">
            <div class="rental-active">
                
                <div class="card">
                    <p><strong>Nama:</strong> {{ $profil_pengguna->name }}</p>
                    <p><strong>Email:</strong> {{ $profil_pengguna->email }}</p>
                    <p><strong>Telepon:</strong> {{ $profil_pengguna->phone_number }}</p>
                    <p><strong>Alamat:</strong> {{ $profil_pengguna->address }}</p>
                    <!-- Tambahkan data lainnya sesuai dengan kolom yang ada di tabel User -->
                </div>
        
            </div>
        </div>
    </div>
</x-app-layouts>
