<x-app-layouts title="Dashboard Customer">
    <div class="row">

        <!-- Info Customer -->
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-muted">Info Customer</h6>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <img src="{{ auth()->user()->foto == 'default.png' ? auth()->user()->pictureDefault : auth()->user()->picture }}"
                            alt="{{ auth()->user()->nama }}" style="width: 10em" class="img-fluid rounded mb-3">
                    </div>

                    <div class="list-group">
                        <a href="/profile" class="list-group-item list-group-item-action">
                            <div class="d-flex justify-content-center">
                                <h6 class="mb-1">Lihat Profil</h6>
                            </div>
                        </a>
                        <a href="/search" class="list-group-item list-group-item-action">
                            <div class="d-flex justify-content-center">
                                <h6 class="mb-1">Cari Mobil</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistik -->
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-muted">Dashboard Customer</h6>
                </div>
                <div class="card-body">
                    <div class="row">

                        <!-- Penyewaan Aktif -->
                        <div class="col-12 col-md-6">
                            <div class="card" style="cursor: pointer" onclick="window.location.href='/rental/active'">
                                <div class="card-body">
                                    <div class="text-center">
                                        <i class="fa fa-hourglass-half fa-3x"></i>
                                        <div class="mt-3 font-weight-bold">
                                            <h5>Penyewaan Aktif</h5>
                                        </div>
                                        <div class="text-small text-muted">
                                            <h5>{{ $penyewaan_aktif }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Riwayat Penyewaan -->
                        <div class="col-12 col-md-6">
                            <div class="card" style="cursor: pointer" onclick="window.location.href='/rental/history'">
                                <div class="card-body">
                                    <div class="text-center">
                                        <i class="fa fa-history fa-3x"></i>
                                        <div class="mt-3 font-weight-bold">
                                            <h5>Riwayat Penyewaan</h5>
                                        </div>
                                        <div class="text-small text-muted">
                                            <h5>{{ $riwayat_penyewaan }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Akses Pencarian atau Penyewaan Baru -->
                        <div class="col-12">
                            <div class="card" style="cursor: pointer" onclick="window.location.href='/search'">
                                <div class="card-body">
                                    <div class="text-center">
                                        <i class="fa fa-search fa-3x"></i>
                                        <div class="mt-3 font-weight-bold">
                                            <h5>Cari Mobil Baru</h5>
                                        </div>
                                        <div class="text-small text-muted">
                                            <h5>Temukan mobil sesuai kebutuhan Anda.</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layouts>
