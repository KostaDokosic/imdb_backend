<?php

namespace App\Models\Movie;

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

    protected $fillable = ['title', 'description', 'coverImage', 'genre'];
}
