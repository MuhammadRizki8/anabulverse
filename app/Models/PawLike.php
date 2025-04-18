<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PawLike extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'user_id'];

    /**
     * Relasi ke model Post
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Relasi ke model User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
