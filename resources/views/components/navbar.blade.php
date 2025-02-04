<nav class="bg-white shadow-md">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <!-- Kiri: Logo -->
        <a href="{{ url('/') }}" class="text-2xl font-bold text-gray-800 flex items-center">
            <img src="{{ asset('images/logo.png') }}" alt="AnabulVerse" class="h-8 mr-2">
            AnabulVerse
        </a>

        <!-- Kanan: Menu -->
        <div class="flex items-center space-x-6">
            <a href="{{ url('/browse') }}" class="text-gray-600 hover:text-gray-900">Browse</a>
            <a href="{{ url('/popular') }}" class="text-gray-600 hover:text-gray-900">Popular</a>
            <a href="{{ url('/help') }}" class="text-gray-600 hover:text-gray-900">Help</a>

            <a href="{{ url('/post') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Post
            </a>
        </div>
    </div>
</nav>
