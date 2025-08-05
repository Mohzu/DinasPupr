<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dinas PUPR Kabupaten Garut')</title>
    <meta name="description" content="@yield('description', 'Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut')">
    
    <!-- Custom Navbar CSS -->
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

     <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    @stack('styles')
</head>
<body class="bg-gradient-to-br from-slate-50 to-blue-50 font-sans antialiased">
    
    <!-- Header Component -->
    @include('partials.navbar') 

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    
    {{-- Footer Component
    @include('layouts.components.footer') --}}
    
    @stack('scripts')
</body>
</html>
