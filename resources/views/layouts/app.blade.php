<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'AnabulVerse') }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-16"> <!-- Tambahkan margin-top -->
        <x-navbar />
        @yield('content')
    </div>

<!-- JavaScript for toggle menu -->
<script>
    const menuToggleButton = document.getElementById('menu-toggle');
    const menu = document.getElementById('navbar-sticky');

    menuToggleButton.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>
</body>
</html>
