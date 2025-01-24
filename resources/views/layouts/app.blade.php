<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'AnabulVerse') }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto">
        <!-- Navbar atau menu bisa ditambahkan di sini -->
        @yield('content')
    </div>
</body>
</html>
