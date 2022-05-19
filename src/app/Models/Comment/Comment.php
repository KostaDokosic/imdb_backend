<?php

namespace App\Models\Comment;

use App\Models\Movie\Movie;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    protected $fillable = ['user_id', 'movie_id', 'comment'];
}
