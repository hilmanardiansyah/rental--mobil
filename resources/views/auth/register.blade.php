<form action="{{ route('register') }}" method="POST">
    @csrf
    <div>
        <label for="name">Nama</label>
        <input type="text" name="name" id="name" required>
    </div>
    <div>
        <label for="address">Alamat</label>
        <input type="text" name="address" id="address" required>
    </div>
    <div>
        <label for="phone_number">Nomor Telepon</label>
        <input type="text" name="phone_number" id="phone_number" required>
    </div>
    <div>
        <label for="sim_number">Nomor SIM</label>
        <input type="text" name="sim_number" id="sim_number" required>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
    </div>
    <div>
        <label for="password_confirmation">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>
    </div>
    <div>
        <button type="submit">Daftar</button>
    </div>
</form>
