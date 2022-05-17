<?php

namespace App\Models\Genre;

use App\Models\Movie\Movie;
use Database\Factories\GenreFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return GenreFactory::new();
    }

    public function movie()
    {
        return $this->hasMany(Movie::class);
    }

    protected $fillable = ['name'];
}

