@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Edit Post</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" value="{{ $post->title }}"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2"
                   required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Current Image</label>
            <img src="{{ asset('storage/' . $post->image_url) }}" alt="{{ $post->title }}" class="mt-3 rounded shadow-md w-48">
        </div>

        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Upload New Image (Optional)</label>
            <input type="file" name="image" id="image" accept="image/*" onchange="previewImage(event)"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2">
            <img id="imagePreview" class="mt-3 hidden rounded shadow-md w-48">
        </div>

        <div>
            <label for="caption" class="block text-sm font-medium text-gray-700">Caption</label>
            <textarea name="caption" id="caption" rows="4" 
                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2"
                      required>{{ $post->caption }}</textarea>
        </div>

        <button type="submit" 
                class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded shadow">
            Update Post
        </button>
    </form>
</div>

<script>
    function previewImage(event) {
        let reader = new FileReader();
        reader.onload = function() {
            let output = document.getElementById('imagePreview');
            output.src = reader.result;
            output.classList.remove('hidden');
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
