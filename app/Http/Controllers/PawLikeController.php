<?php

namespace App\Http\Controllers;

use App\Models\PawLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PawLikeController extends Controller
{
    /**
     * Menampilkan semua like
     */
    public function index()
    {
        return response()->json(PawLike::all());
    }

    /**
     * Menyimpan like baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
        ]);

        PawLike::create([
            'post_id' => $request->post_id,
            'user_id' => Auth::check() ? Auth::id() : null,
        ]);

        return redirect()->back();
    }

    /**
     * Menampilkan like berdasarkan ID
     */
    public function show($id)
    {
        $pawLike = PawLike::findOrFail($id);
        return response()->json($pawLike);
    }

    /**
     * Menghapus like berdasarkan ID
     */
    public function destroy($id)
    {
        $pawLike = PawLike::findOrFail($id);
        $pawLike->delete();

        return response()->json(['message' => 'Like berhasil dihapus']);
    }

}
