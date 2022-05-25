<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Resources\MovieResource;
use App\Models\Movie\Movie;
use Illuminate\Http\Request;


class MovieController extends Controller
{

    public function index(FilterRequest $request)
    {
        $query = Movie::with('genres', 'likes')->latest();
        if($request->filled('genre_ids')) {
            $query->whereHas('genres', function ($q) use ($request) {
                $q->whereIn('id', $request->genre_ids);
            });
        }
        if($request->filled('likeFilter')) {
            $query->whereHas('likes', function ($q) use ($request) {
                $q->where('like', $request->likeFilter);
            });
        }

        return MovieResource::collection($query->paginate(8));
    }


    public function store(StoreMovieRequest $request)
    {
        $data = $request->validated();
        if($request->hasFile('coverImage'))
        {
            $imageFile = $request->file('coverImage')->getClientOriginalName();
            $path = 'public/movie_images/';
            $request->file('coverImage')->storeAs($path, $imageFile);

            $movie = Movie::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'coverImage' => 'storage/movie_images/' . $imageFile,
                'creator' => $request->user()->id
            ]);
            $i = 0;
            while($request->filled('genre_ids_' . $i)) {
                $movie->genres()->attach($request->input('genre_ids_' . $i));
                $i++;
            }

            return new MovieResource($movie);
        }
        return ['result' => false];
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
