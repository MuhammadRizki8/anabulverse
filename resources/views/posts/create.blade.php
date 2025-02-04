@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Create New Post</h1>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" 
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                   required>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Upload Image</label>
            <input type="file" name="image" id="image" 
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                   required>
        </div>

        <div class="mb-4">
            <label for="caption" class="block text-sm font-medium text-gray-700">Caption</label>
            <textarea name="caption" id="caption" rows="4" 
                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                      required></textarea>
        </div>

        <button type="submit" 
                class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded shadow">
            Save Post
        </button>
    </form>
</div>
@endsection
