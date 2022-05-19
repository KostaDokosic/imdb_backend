<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\MovieResource;
use App\Models\Movie\Movie;
use Illuminate\Http\Request;
use \App\Http\Requests\StoreMovieRequest;

class MovieController extends Controller
{

    public function index(FilterRequest $request)
    {
        $query = Movie::with('genres')->latest();
        if($request->filled('genre_ids')) {
            $query->whereHas('genres', function ($q) use ($request) {
                $q->whereIn('id', $request->genre_ids);
            });
        }

        return MovieResource::collection($query->paginate(8));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMovieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovieRequest $request)
    {
        $data = $request->validated();
        $movie = Movie::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'coverImage' => $data['coverImage'],
        ]);
        $movie->genres()->attach($data['genre_ids']);
        return response('success', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
