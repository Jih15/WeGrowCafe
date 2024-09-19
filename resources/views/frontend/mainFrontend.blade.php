<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Reservasi')</title>

    <!-- Memuat CSS dan JS menggunakan Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="p-0 flex flex-col w-full h-auto bg-cover bg-center bg-image-main">

    <!-- Header tetap di bagian atas -->
    <header class="fixed top-0 left-0 w-full z-50">
        @include('frontend.components.headerFront')
    </header>

    <!-- Konten utama -->
    <main class=""> <!-- Menambahkan margin-top agar tidak tertutup oleh header -->
        @yield('content')
    </main>

    <!-- Memuat JS menggunakan Vite -->
    @vite('resources/js/app.js')

    {{-- Footer (bisa ditambahkan jika diperlukan) --}}
    {{-- @include('frontend.components.footerFront') --}}
</body>
</html>
