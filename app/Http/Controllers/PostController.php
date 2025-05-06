<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');

        if ($query) {
            $posts = Post::where('title', 'LIKE', "%$query%")
                ->orWhere('caption', 'LIKE', "%$query%")
                ->get();
        } else {
            $posts = Post::all();
        }

        return view('posts.index', compact('posts', 'query'));
    }
    public function browse(Request $request)
    {
        $query = $request->input('search');
    
        $posts = collect(); // Default kosong
    
        if ($query) {
            $posts = Post::where('title', 'LIKE', "%$query%")
                ->orWhere('caption', 'LIKE', "%$query%")
                ->get();
        }
    
        return view('browse', compact('posts'));
    }
    
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'caption' => 'required|string',
        ]);

        $imagePath = $request->file('image')->store('posts', 'public');

        Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'image_url' => $imagePath,
            'caption' => $request->caption,
        ]);

        return redirect()->route('home')->with('success', 'Post created successfully.');
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'caption' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            if ($post->image_url) {
                Storage::delete('public/' . $post->image_url);
            }

            $imagePath = $request->file('image')->store('posts', 'public');
            $post->image_url = $imagePath;
        }

        $post->update([
            'title' => $request->title,
            'caption' => $request->caption,
            'image_url' => $post->image_url,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function destroy(Post $post)
    {
        if ($post->image_url) {
            Storage::delete('public/' . $post->image_url);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function home()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        return view('home', compact('posts'));
    }
    public function popular()
    {
        // Mengambil 10 post dengan jumlah like terbanyak
        $posts = Post::withCount('pawLikes')
            ->orderByDesc('paw_likes_count')
            ->take(10)
            ->get();

        return view('popular', compact('posts'));
    }

}
