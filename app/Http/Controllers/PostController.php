<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
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

        // Simpan file gambar
        $imagePath = $request->file('image')->store('posts', 'public');

        Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'image_url' => $imagePath, // Simpan path gambar
            'caption' => $request->caption,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'caption' => 'required|string',
        ]);
    
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($post->image_url) {
                Storage::delete('public/' . $post->image_url);
            }
    
            // Simpan file baru
            $imagePath = $request->file('image')->store('posts', 'public');
            $post->image_url = $imagePath; // Update path gambar
        }
    
        // Update data post
        $post->update([
            'title' => $request->title,
            'caption' => $request->caption,
            'image_url' => $post->image_url, // Tetap gunakan gambar lama jika tidak ada yang baru
        ]);
    
        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }


    public function destroy(Post $post)
    {
        // Hapus file gambar dari storage
        if ($post->image_url) {
            Storage::delete('public/' . $post->image_url);
        }

        // Hapus data post dari database
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
    public function home()
    {
        $posts = Post::all(); // Ambil semua data post
        return view('home', compact('posts')); // Kirim data ke view home.blade.php
    }
    
}
