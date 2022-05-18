<?php

namespace App\Models\Movie;

use App\Models\Genre\Genre;
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

    protected $fillable = ['title', 'description', 'coverImage', 'genre'];
}