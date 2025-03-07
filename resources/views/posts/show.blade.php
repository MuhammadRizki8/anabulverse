<x-app-layout>
    <div class="container mx-auto px-4 py-20 max-w-2xl">
        <!-- Judul -->
        <!-- Judul -->
        <h1 class="text-5xl font-extrabold text-black mb-6 leading-snug text-center shadow-md">
            {{ $post->title }}
        </h1>

    
        <!-- Gambar -->
        <div class="rounded-lg overflow-hidden shadow-md">
            <img src="{{ asset('storage/' . $post->image_url) }}" 
                 alt="{{ $post->title }}" 
                 class="w-full object-cover">
        </div>

        <!-- Caption -->
        <p class="text-gray-700 text-lg leading-relaxed mt-6 mb-6">
            {{ $post->caption }}
        </p>

        <div class="flex justify-between items-center mb-6">
            <!-- Tombol Kembali -->
            <a href="{{ url('/') }}" 
               class="inline-flex items-center gap-2 px-5 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-900 transition">
                ⬅ Kembali
            </a>

            <!-- Tombol Like -->
            <form action="{{ route('paw-likes.store') }}" method="POST">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
        
                <button type="submit" 
                        class="flex items-center gap-2 px-5 py-2 rounded-lg text-white bg-red-600 hover:bg-red-700 transition">
                    ❤️ <span class="font-semibold">{{ $post->likeCount() }}</span> Suka
                </button>
            </form>
        
            
        </div>        
    
        <!-- Tambah Komentar -->
        <div class="mt-8 p-5 border rounded-lg bg-gray-100">
            <h2 class="text-xl font-semibold mb-3">Tambahkan Komentar</h2>
    
            <form action="{{ route('comments.store', $post) }}" method="POST">
                @csrf
                <textarea name="comment" 
                          class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-300" 
                          rows="3" 
                          placeholder="Tulis komentar..."></textarea>
    
                <button type="submit" 
                        class="mt-3 px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    ✉️ Kirim Komentar
                </button>
            </form>
        </div>

        <!-- Daftar Komentar -->
        <div class="mt-8">
            <h2 class="text-xl font-semibold mb-4">Komentar</h2>
            
            @forelse($post->comments as $comment)
                <div class="p-4 border-b border-gray-200 bg-white shadow-sm rounded-lg mb-2">
                    <p class="text-gray-800">
                        <strong class="text-blue-600">{{ $comment->user ? $comment->user->name : 'Anonim' }}:</strong> 
                        {{ $comment->comment }}
                    </p>
                    <span class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                </div>
            @empty
                <p class="text-gray-500 text-center italic">Belum ada komentar.</p>
            @endforelse
        </div>
    
    </div>
</x-app-layout>
