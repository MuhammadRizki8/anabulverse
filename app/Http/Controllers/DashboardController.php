<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;       // ⬅️ Import Model Post
use App\Models\PawLike;    // ⬅️ Import Model PawLike
use App\Models\Comment;    // ⬅️ Import Model Comment

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Postingan yang dibuat user
        $myPosts = $user->posts()->latest()->get();

        // Postingan yang user like
        $likedPosts = $user->pawLikes()->with('post')->get()->pluck('post');

        // Komentar yang ditulis user
        $myComments = $user->comments()->with('post')->latest()->get();

        return view('dashboard', compact('myPosts', 'likedPosts', 'myComments', 'user'));
    }
}
