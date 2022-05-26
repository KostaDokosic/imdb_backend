<?php

namespace App\Models\Movie;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieLogs extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'movie_id', 'action'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
