<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dinas PUPR Kabupaten Garut')</title>
    <meta name="description" content="@yield('description', 'Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut')">

    <!-- Preload critical resources -->
    <link rel="preload" href="{{ asset('img/logoPU.png') }}" as="image" type="image/png">
    <link rel="preload" href="{{ asset('css/app.css') }}" as="style">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/news-slider.js'])
    
    <!-- Optimized Alpine.js loading -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
    
    @stack('styles')
</head>
<body class="bg-gradient-to-br from-slate-50 to-blue-50 font-sans antialiased">
    
    <!-- Header Component -->
    @include('partials.navbar') 

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    
    <!-- Footer Section -->
    @include('partials.footer')
    
    @stack('scripts')
</body>
</html>
