<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function add(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'coverImage' => 'required',
            'genre' => 'required'
        ]);
        Movie::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'coverImage' => $data['coverImage'],
            'genre' => $data['genre'],
        ]);
        return response('success', 200);
    }

    public function getall()
    {
        return response(Movie::all(), 200);
    }
}
