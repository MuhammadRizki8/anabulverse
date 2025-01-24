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
            <label for="image_url">Image URL</label>
            <input type="text" name="image_url" class="form-control" id="image_url" value="{{ $post->image_url }}" required>
        </div>

        <div class="form-group">
            <label for="caption">Caption</label>
            <textarea name="caption" class="form-control" id="caption" required>{{ $post->caption }}</textarea>
        </div>

        <button type="submit" class="btn btn-success mt-3">Update Post</button>
    </form>
</div>
@endsection
