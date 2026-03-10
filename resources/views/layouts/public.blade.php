<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    {{-- Tailwind & SweetAlert --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- Alpine.js (Wajib untuk efek scroll) --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <title>Pustaka Cendil - Tige Kubok</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-slate-50 text-slate-800">

    {{-- Logika Ganti Navbar Otomatis --}}
    @if (View::hasSection('navbar'))
        @yield('navbar')
    @else
        @include('components.navbar-public')
    @endif

    <main>
        @yield('content')
    </main>

    @include('components.footer-public')

    @stack('scripts')

</body>
</html>