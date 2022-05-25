<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentGetRequest;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(CommentGetRequest $request)
    {
        $data = $request->validated();
        $query = Comment::with('user')->latest()->where('movie_id', $data['movie_id']);
        return CommentResource::collection($query->paginate());
    }

    public function store(CommentRequest $request)
    {
        $data = $request->validated();
        $comment = Comment::create([
            'user_id' => $request->user()->id,
            'movie_id' => $data['movie_id'],
            'comment' => $data['text']
        ]);
        return new CommentResource($comment);
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
