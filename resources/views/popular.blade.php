<x-app-layout>
    <div class="container mt-12 mx-auto py-12 px-4">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Popular Posts</h1>

        @if($posts->isEmpty())
            <p class="text-red-500 text-center font-medium">Belum ada post yang populer.</p>
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
    </div>
</x-app-layout>
