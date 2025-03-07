<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Browse Posts') }}
        </h2>
    </x-slot>
    <div class="container mx-auto py-12 px-4">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Browse Posts</h1>

        <!-- Search Bar -->
        <form action="{{ route('browse') }}" method="GET" class="max-w-3xl mx-auto mb-6">
            <div class="flex items-center bg-white shadow-sm border border-gray-300 rounded-lg overflow-hidden">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari post..."
                    class="w-full px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold hover:bg-blue-700 transition">
                    Cari
                </button>
            </div>
        </form>
        
        @if(request('search'))
            <p class="text-gray-600 mb-4 text-center">
                Menampilkan hasil pencarian untuk: <strong>{{ request('search') }}</strong>
            </p>

            @if($posts->isEmpty())
                <p class="text-red-500 text-center font-medium">Tidak ada hasil yang ditemukan.</p>
            @else
                <!-- Masonry Grid -->
                <div class="container mx-auto px-4 sm:px-6 md:px-8 max-w-screen-lg">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mt-12">
                        @foreach($posts as $post)
                            <x-post-card :post="$post" />
                        @endforeach
                    </div>
                </div>
            @endif
        @endif
    </div>
</x-app-layout>
