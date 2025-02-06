<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'comment' => 'required|string|max:500',
        ]);

        Comment::create([
            'post_id' => $post->id,
            'user_id' => Auth::check() ? Auth::id() : null,
            'comment' => $request->comment,
        ]);

        return redirect()->route('posts.show', $post)->with('success', 'Komentar berhasil ditambahkan!');
    }
}
