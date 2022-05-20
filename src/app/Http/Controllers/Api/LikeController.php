<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LikeRequest;
use App\Models\Like\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LikeRequest $request)
    {
        $data = $request->validated();

        $oldLikes = Like::all()->where('movie_id', $data['movie_id'])->where('user_id', $request->user()->id);
        if($oldLikes->count() > 0) {
            $oldLike = $oldLikes->first();
            if($oldLike->like == $data['like']) return response(1, 200);
            else {
                $oldLike->like = $data['like'];
                return response(1, 200);
            }
        }

        Like::create([
            'movie_id' => $data['movie_id'],
            'user_id' => $request->user()->id,
            'like' => $data['like']
        ]);
        return response(1, 200);
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
