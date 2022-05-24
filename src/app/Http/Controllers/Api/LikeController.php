<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LikeRequest;
use App\Http\Resources\LikeResource;
use App\Models\Like\Like;
use App\Models\Movie\Movie;
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

    public function store(LikeRequest $request)
    {
        $data = $request->validated();

        $oldLikes = Like::all()->where('movie_id', $data['movie_id'])->where('user_id', $request->user()->id);
        if($oldLikes->count() > 0)
        {
            $oldLike = $oldLikes->first();
            if($data['like'] === -1) {
                $oldLike->delete();
                return [
                    'like' => -1,
                    'totalLikes' => Movie::find($data['movie_id'])->likes->where('like', 1)->count(),
                    'totalDislikes' => Movie::find($data['movie_id'])->likes->where('like', 0)->count()
                ];
            }
            else {
                $oldLike->like = $data['like'];
                $oldLike->save();
                return new LikeResource($oldLike);
            }
        }

        $newLike = Like::create([
            'movie_id' => $data['movie_id'],
            'user_id' => $request->user()->id,
            'like' => $data['like']
        ]);
        return new LikeResource($newLike);
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
