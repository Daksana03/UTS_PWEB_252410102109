<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Barracks Manager') | Barracks Manager</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    {{-- Navbar hanya tampil setelah login --}}
    @if (!empty($username))
        <x-navbar :username="$username" />
    @endif

    <main class="container">
        @yield('content')
    </main>

    <x-footer />

</body>
</html>
