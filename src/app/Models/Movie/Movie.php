<?php

namespace App\Models\Movie;

use App\Models\Comment\Comment;
use App\Models\Genre\Genre;
use App\Models\Like\Like;
use App\Models\User\User;
use Database\Factories\MovieFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected static function newFactory(): MovieFactory
    {
        return MovieFactory::new();
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function logs()
    {
        return $this->hasMany(MovieLogs::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = ['title', 'description', 'coverImage', 'genre', 'user_id'];
}