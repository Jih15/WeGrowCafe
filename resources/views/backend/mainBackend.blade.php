<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Reservasi')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="p-0 flex flex-col w-full h-auto bg-cover bg-center bg-image-main">

    @include('backend.components.sidebar')

    <main class="p-4 sm:ml-64 overflow-hidden">
        @yield('content')
    </main>

    @vite('resources/js/app.js')

</body>

</html>
