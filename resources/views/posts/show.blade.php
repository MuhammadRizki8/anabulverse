<x-app-layout>
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <!-- Judul -->
        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $post->title }}</h1>
    
        <!-- Gambar -->
        <img src="{{ asset('storage/' . $post->image_url) }}" 
             alt="{{ $post->title }}" 
             class="w-full rounded-lg shadow-lg mb-6 object-cover">
    
        <!-- Caption -->
        <p class="text-gray-700 text-lg leading-relaxed mb-6">{{ $post->caption }}</p>

        <!-- Tombol Like -->
        <form action="{{ route('paw-likes.store') }}" method="POST" class="mb-4">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">

            <button type="submit" class="flex items-center gap-2 px-4 py-2 rounded-lg text-white bg-red-600 hover:bg-red-700">
                ❤️ {{ $post->likeCount() }} Suka
            </button>
        </form>


        <!-- Tombol Kembali (Dinamis) -->
        <a href="{{ url("/")}}" class="inline-block px-5 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-800 transition">
            ⬅ Kembali
        </a>
    
        <!-- Tambah Komentar -->
        <div class="mt-6 p-4 border rounded-lg bg-gray-100">
            <h2 class="text-xl font-semibold mb-3">Tambahkan Komentar</h2>
    
            <form action="{{ route('comments.store', $post) }}" method="POST">
                @csrf
                <textarea name="comment" 
                        class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-300" 
                        rows="3" 
                        placeholder="Tulis komentar..."></textarea>
    
                <button type="submit" 
                        class="mt-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Kirim Komentar
                </button>
            </form>
        </div>
        <!-- Daftar Komentar -->
        <div class="mt-6">
            <h2 class="text-xl font-semibold mb-3">Komentar</h2>
            
            @forelse($post->comments as $comment)
                <div class="p-3 border-b">
                    <p class="text-gray-800">
                        <strong>{{ $comment->user ? $comment->user->name : 'Anonim' }}:</strong> 
                        {{ $comment->comment }}
                    </p>
                    <span class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                </div>
            @empty
                <p class="text-gray-500">Belum ada komentar.</p>
            @endforelse
        </div>
    
    </div>
    </x-app-layout>
    