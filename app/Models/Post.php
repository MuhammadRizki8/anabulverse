<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'image_url', 'caption',
    ];

    // Relasi ke User (Pembuat Post)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Komentar
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Relasi ke PawLike (Like pada Post)
    public function pawLikes()
    {
        return $this->hasMany(PawLike::class, 'post_id');
    }

    // Hitung jumlah Like
    public function likeCount()
    {
        return $this->pawLikes()->count();
    }
}
