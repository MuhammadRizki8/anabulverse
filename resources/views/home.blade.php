@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-center">Welcome to AnabulVerse</h1>
    <p class="mt-2 text-gray-600 text-center">Share and discover amazing pets from around the world!</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-6">
        @foreach($posts as $post)
            <a href="{{ route('posts.show', $post) }}" class="relative block group">
                <!-- Gambar Post -->
                <img src="{{ asset('storage/' . $post->image_url) }}" 
                     alt="{{ $post->title }}" 
                     class="w-full h-64 object-cover rounded-lg shadow-lg transition-transform transform group-hover:scale-105">

                <!-- Overlay setengah bagian bawah -->
                <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-4 opacity-0 group-hover:opacity-100 transition-opacity rounded-b-lg">
                    <h2 class="text-lg font-bold truncate">{{ $post->title }}</h2>
                    <p class="text-sm text-gray-300 line-clamp-2">
                        {{ Str::limit($post->caption, 60, '...') }}
                    </p>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
