<x-app-layouts title="Dashboard Admin" >
    <div class="row">
        <!-- Info Admin -->
        <div class="col-12 col-md-5">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-muted">Info Admin</h6>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <img src="{{ auth()->user()->foto == 'default.png' ? auth()->user()->pictureDefault : auth()->user()->picture }}"
                            alt="{{ auth()->user()->nama }}" style="width: 10em" class="img-fluid rounded mb-3">
                    </div>

                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex justify-content-center">
                                <h6 class="mb-1">Panduan Admin</h6>
                            </div>
                        </a>
                        <a href="#" target="_blank" class="list-group-item list-group-item-action">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-1"><img width="36" height="36" alt="YouTube"
                                        src="https://cdn3.iconfinder.com/data/icons/2018-social-media-logotypes/1000/2018_social_media_popular_app_logo_youtube-512.png">
                                </h6>
                                <h6 class="mb-1">YouTube</h6>
                            </div>
                        </a>
                        <a href="https://github.com/hilmanardiansyah/rental-mobil" target="_blank"
                            class="list-group-item list-group-item-action">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-1"><img width="40" height="40" alt="GitHub"
                                        src="https://github.githubassets.com/images/modules/logos_page/GitHub-Mark.png">
                                </h6>
                                <h6 class="mb-1 mt-2">GitHub</h6>
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
                    <h6 class="text-muted">Statistik Rental Mobil</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Total Mobil -->
                        <div class="col-12 col-md-6">
                            <div class="card" style="cursor: pointer">
                                <div class="card-body">
                                    <div class="text-center">
                                        <i class="fa fa-car fa-3x"></i>
                                        <div class="mt-3 font-weight-bold">
                                            <h5>Total Mobil</h5>
                                        </div>
                                        <div class="text-small text-muted">
                                            <h5>{{ $total_mobil }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Mobil Tersedia -->
                        <div class="col-12 col-md-6">
                            <div class="card" style="cursor: pointer">
                                <div class="card-body">
                                    <div class="text-center">
                                        <i class="fa fa-check-circle fa-3x"></i>
                                        <div class="mt-3 font-weight-bold">
                                            <h5>Mobil Tersedia</h5>
                                        </div>
                                        <div class="text-small text-muted">
                                            <h5>{{ $mobil_tersedia }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Peminjaman Aktif -->
                        <div class="col-12 col-md-6">
                            <div class="card" style="cursor: pointer">
                                <div class="card-body">
                                    <div class="text-center">
                                        <i class="fa fa-hourglass-half fa-3x"></i>
                                        <div class="mt-3 font-weight-bold">
                                            <h5>Peminjaman Aktif</h5>
                                        </div>
                                        <div class="text-small text-muted">
                                            <h5>{{ $peminjaman_aktif }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Riwayat Peminjaman -->
                        <div class="col-12 col-md-6">
                            <div class="card" style="cursor: pointer">
                                <div class="card-body">
                                    <div class="text-center">
                                        <i class="fa fa-history fa-3x"></i>
                                        <div class="mt-3 font-weight-bold">
                                            <h5>Riwayat Peminjaman</h5>
                                        </div>
                                        <div class="text-small text-muted">
                                            <h5>{{ $riwayat_peminjaman }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Pelanggan -->
                        <div class="col-12 col-md-6">
                            <div class="card" style="cursor: pointer">
                                <div class="card-body">
                                    <div class="text-center">
                                        <i class="fa fa-users fa-3x"></i>
                                        <div class="mt-3 font-weight-bold">
                                            <h5>Total Pelanggan</h5>
                                        </div>
                                        <div class="text-small text-muted">
                                            <h5>{{ $total_pelanggan }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pendapatan -->
                        <div class="col-12 col-md-6">
                            <div class="card" style="cursor: pointer">
                                <div class="card-body">
                                    <div class="text-center">
                                        <i class="fa fa-money-bill-wave fa-3x"></i>
                                        <div class="mt-3 font-weight-bold">
                                            <h5>Pendapatan Bulanan</h5>
                                        </div>
                                        <div class="text-small text-muted">
                                            <h5>Rp {{ number_format($pendapatan_bulanan, 0, ',', '.') }}</h5>
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

