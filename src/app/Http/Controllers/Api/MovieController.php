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
        if($request->filled('genre_ids')) {
            return Movie::with('genres')->whereHas('genres', function ($q) use ($request) {
                $q->whereIn('id', $request->genre_ids);
            })->paginate(8);
        }
        return new MovieResource(Movie::with('genres')->paginate(8));
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
        Movie::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'coverImage' => $data['coverImage'],
            'genre' => $data['genre'], //TODO:
        ]);
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
