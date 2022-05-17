<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MovieCollection;
use App\Models\Movie\Movie;
use Illuminate\Http\Request;
use \App\Http\Requests\StoreMovieRequest;
use function PHPUnit\Framework\isNan;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *ß
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pageNumber = $request->get('currentPage');
        $start = $pageNumber * 8;
        if($start != 0) $start++;
        $movies = new MovieCollection(Movie::all()->whereBetween('id', [$start, $start + 8]));
        return response($movies, 200);
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
            'genre' => $data['genre'],
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
