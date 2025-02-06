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
            <img id="currentImage" src="{{ asset('storage/' . $post->image_url) }}" alt="{{ $post->title }}" class="mt-3 rounded shadow-md w-48">

        </div>
        

        <div>
            <label for="dropzone-file" class="block text-sm font-medium text-gray-700">Upload New Image (Optional)</label>
            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input id="dropzone-file" type="file" name="image" class="hidden" />
                </label>
            </div>
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
            let output = document.getElementById('imagePreview'); // Pratinjau gambar baru
            let currentImage = document.getElementById('currentImage'); // Gambar yang sedang ada
            
            // Ubah gambar pratinjau
            output.src = reader.result;
            output.classList.remove('hidden');

            // Jika ada gambar saat ini, ubah juga ke gambar baru
            if (currentImage) {
                currentImage.src = reader.result;
            }
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@endsection
