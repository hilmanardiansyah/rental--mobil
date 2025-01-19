<x-app-layouts title="Daftar Penyewaan Rental Mobil">
    <div class="container mt-3" style="padding-right: 230px">
        <div class="row d-flex justify-content-center align-items-center" style="min-height: 100vh; " >
            <div class="col-12 col-sm-8 col-md-7 col-lg-6 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Silahkan Daftar</h4>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('register') }}" method="POST" class="needs-validation mt-2" novalidate="">
                            @csrf

                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required autofocus>
                                <div class="invalid-feedback">
                                    Nama tidak boleh kosong.
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input type="text" name="address" class="form-control" id="address" value="{{ old('address') }}" required>
                                <div class="invalid-feedback">
                                    Alamat tidak boleh kosong.
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Nomor Telepon</label>
                                <input type="text" name="phone_number" class="form-control" id="phone_number" value="{{ old('phone_number') }}" required>
                                <div class="invalid-feedback">
                                    Nomor telepon tidak boleh kosong.
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="sim_number">Nomor SIM</label>
                                <input type="text" name="sim_number" class="form-control" id="sim_number" value="{{ old('sim_number') }}" required>
                                <div class="invalid-feedback">
                                    Nomor SIM tidak boleh kosong.
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
                                <div class="invalid-feedback">
                                    Email tidak boleh kosong.
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                                <div class="invalid-feedback">
                                    Password tidak boleh kosong.
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                                <div class="invalid-feedback">
                                    Konfirmasi password tidak boleh kosong.
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Daftar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layouts>
