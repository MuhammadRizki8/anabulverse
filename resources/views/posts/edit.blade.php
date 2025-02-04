@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Post</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $post->title }}" required>
        </div>

        <div class="form-group">
            <label for="image">Current Image</label>
            <br>
            <img src="{{ asset('storage/' . $post->image_url) }}" alt="{{ $post->title }}" class="img-fluid mb-2" width="300">
        </div>

        <div class="form-group">
            <label for="image">Upload New Image (Optional)</label>
            <input type="file" name="image" class="form-control" id="image">
        </div>

        <div class="form-group">
            <label for="caption">Caption</label>
            <textarea name="caption" class="form-control" id="caption" required>{{ $post->caption }}</textarea>
        </div>

        <button type="submit" class="btn btn-success mt-3">Update Post</button>
    </form>
</div>
@endsection
