@props(['post'])

<a href="{{ route('posts.show', $post) }}" 
   class="relative block group rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-transform transform hover:scale-[1.03] duration-300 ease-in-out">
    
    <!-- Gambar Post -->
    <div class="relative">
        <img src="{{ asset('storage/' . $post->image_url) }}" 
             alt="{{ $post->title }}" 
             class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
        
        <!-- Overlay Gradient -->
        <div class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-black via-black/50 to-transparent"></div>
    </div>

    <!-- Informasi Post -->
    <div class="absolute bottom-0 left-0 right-0 p-4 text-white opacity-100 transition-opacity duration-300">
        <!-- Judul (Truncate untuk teks panjang) -->
        <h2 class="text-lg font-bold truncate bg-black/50 px-3 py-1 rounded-md inline-block max-w-[90%]">
            {{ Str::limit($post->title, 50, '...') }}
        </h2>

        <!-- Deskripsi (Truncate lebih panjang untuk responsivitas) -->
        <p class="text-sm text-gray-300 mt-2 line-clamp-2 max-w-full bg-black/40 px-2 py-1 rounded-md">
            {{ Str::limit($post->caption, 100, '...') }}
        </p>
    </div>
</a>
