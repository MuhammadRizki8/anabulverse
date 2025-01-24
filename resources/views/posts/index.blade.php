@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Posts</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <a href="{{ route('posts.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Create New Post</a>

    <table class="min-w-full bg-white border border-gray-200 rounded">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left border-b">Title</th>
                <th class="px-4 py-2 text-left border-b">Image</th>
                <th class="px-4 py-2 text-left border-b">Caption</th>
                <th class="px-4 py-2 text-left border-b">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border-b">{{ $post->title }}</td>
                    <td class="px-4 py-2 border-b">
                        <img src="{{ $post->image_url }}" alt="image" class="w-24">
                    </td>
                    <td class="px-4 py-2 border-b">{{ $post->caption }}</td>
                    <td class="px-4 py-2 border-b">
                        <a href="{{ route('posts.edit', $post->id) }}" class="text-yellow-500 hover:underline mr-2">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
