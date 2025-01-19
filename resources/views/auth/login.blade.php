<x-app-layouts title="Login Inventory">
    <style>
        /* Menghapus gaya validasi bawaan browser */
        input:valid, textarea:valid, select:valid {
            box-shadow: none;
            border-color: initial;
        }
        input:invalid, textarea:invalid, select:invalid {
            box-shadow: none;
            border-color: initial;
        }
        .is-invalid {
            border-color: #dc3545; /* Warna merah untuk error */
        }
    </style>

    <div class="container mt-3">
        <div class="row d-flex">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-2 col-xl-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Silahkan Login</h4>
                    </div>
                    <div class="card-body">
                        {{-- Flash message --}}
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

                        {{-- Form login --}}
                        <form method="POST" action="{{ route('login') }}" novalidate>

                            @csrf
                            {{-- Input email --}}
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email"
                                       name="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       id="email"
                                       tabindex="1"
                                       value="{{ old('email') }}"
                                       required
                                       autofocus>
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            {{-- Input password --}}
                            <div class="form-group">
                                <label for="password" class="control-label">Password</label>
                                <input type="password"
                                       name="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       id="password"
                                       tabindex="2"
                                       required>
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            {{-- Tombol submit --}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="3">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layouts>
