<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Penyewaan Mobil')</title>

    <!-- Link ke file CSS (misalnya Tailwind CSS) -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- Jika ada custom CSS -->
     <!-- bootstrap css -->
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css')}}">
     <!-- style css -->
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">
     <!-- Responsive-->
     <link rel="stylesheet" href="{{ asset('assets/css/responsive.min.css')}}">
     <!-- fevicon -->
     <link rel="icon" href="{{ asset('assets/images/fevicon.png')}}">
     <!-- font css -->
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Raleway:wght@400;500;600;700;800&display=swap" rel="stylesheet">
     <!-- Scrollbar Custom CSS -->
     <link rel="stylesheet" href="{{ asset('assets/css/jquery.mCustomScrollbar.min.css')}}">
     <!-- Tweaks for older IEs-->
     <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- Favicon dan meta tags lainnya -->
    {{-- <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon"> --}}
    <link rel="icon" href="{{ asset('/assets/logo/logo-rental.png') }}" type="image/png">

</head>
<body class="bg-gray-100">

  <!-- Header Section -->
  <div class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('customer.home') }}" style="font-size: 1.5rem; font-weight: bold; color: #fe5b29;">
                RENTAL-MOBIL
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <!-- Home Link -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customer.home') }}">Home</a>
                    </li>
                    <!-- Cars Link -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customer.cars') }}">Mobil</a>
                    </li>
                    <!-- Rentals Link -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customer.rentals.landing') }}">Penyewaan</a>
                    </li>
                    <!-- Authenticated User Links -->
                    <!-- Authenticated User Links -->
                @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('customer.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <!-- Logout Form -->
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="nav-link" style="background: none; border: none;">Logout</button>
                    </form>
                </li>
                <!-- Guest User Links -->
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth.login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth.register') }}">Registrasi</a>
                </li>
                @endif

                </ul>
            </div>
        </nav>
    </div>
</div>

    <!-- Main Content Section -->
    <main>
        @yield('content') <!-- Bagian ini akan digantikan dengan konten halaman tertentu -->
    </main>

    <!-- Footer Section -->
     <!-- footer section end -->
     <!-- copyright section start -->
     <div class="copyright_section">
        <div class="container">
           <div class="row">
              <div class="col-sm-12">
                 <p class="copyright_text">2025 All Rights Reserved. Design by <a href="#">Hlmnrsyah</a></p>
              </div>
           </div>
        </div>
     </div>
    <!-- Script JS (optional) -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset ('assets/js/popper.min.js')}}"></script>
    <script src="{{asset ('assets/js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset ('assets/js/jquery-3.0.0.min.js')}}"></script>
    <script src="{{asset ('assets/js/plugin.js')}}"></script>
    <!-- sidebar -->
    <script src="{{asset ('assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset ('assets/js/custom.js')}}"></script>
</body>
</html>
