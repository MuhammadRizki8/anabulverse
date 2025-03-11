<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Nama User -->
            <div class="bg-white p-6 shadow rounded-lg">
                <h1 class="text-2xl font-bold">Halo, {{ $user->name }}!</h1>
            </div>
            <!-- Navigasi Cepat -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <a href="{{ route('posts.index') }}" class="p-4 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                    📄 Lihat Semua Postingan
                </a>
                <a href="{{ route('profile.edit') }}" class="p-4 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition">
                    ⚙️ Edit Profil
                </a>
                <a href="{{ route('browse') }}" class="p-4 bg-purple-600 text-white rounded-lg shadow hover:bg-purple-700 transition">
                    🔍 Telusuri Postingan
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full p-4 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 transition">
                        🚪 Logout
                    </button>
                </form>
            </div>
            
            <!-- Postingan Saya -->
            <div class="bg-white p-6 shadow rounded-lg">
                <h2 class="text-xl font-semibold mb-4">📄 Postingan Kamu</h2>
                @forelse($myPosts as $post)
                    <div class="border-b py-2">
                        <a href="{{ route('posts.show', $post->id) }}" class="text-blue-600">{{ $post->title }}</a>
                        <p class="text-gray-500 text-sm">Diposting pada: {{ $post->created_at->format('d M Y') }}</p>
                    </div>
                @empty
                    <p class="text-gray-500">Belum ada postingan.</p>
                @endforelse
            </div>

            <!-- Postingan yang Disukai -->
            <div class="bg-white p-6 shadow rounded-lg">
                <h2 class="text-xl font-semibold mb-4">❤️ Postingan yang Kamu Like</h2>
                @forelse($likedPosts as $likedPost)
                    <div class="border-b py-2">
                        <a href="{{ route('posts.show', $likedPost->id) }}" class="text-blue-600">{{ $likedPost->title }}</a>
                        <p class="text-gray-500 text-sm">Dari: {{ $post->user->name ?? 'Anonim' }}</p>
                    </div>
                @empty
                    <p class="text-gray-500">Belum ada postingan yang kamu like.</p>
                @endforelse
            </div>

            <!-- Komentar Saya -->
            <div class="bg-white p-6 shadow rounded-lg">
                <h2 class="text-xl font-semibold mb-4">💬 Komentar Kamu</h2>
                @forelse($myComments as $comment)
                    <div class="border-b py-2">
                        <p>"{{ $comment->comment }}"</p>
                        <p class="text-gray-500 text-sm">Pada postingan: 
                            <a href="{{ route('posts.show', $comment->post->id) }}" class="text-blue-600">
                                {{ $comment->post->title }}
                            </a>
                        </p>
                    </div>
                @empty
                    <p class="text-gray-500">Belum ada komentar.</p>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
