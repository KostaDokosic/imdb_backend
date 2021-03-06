<?php

namespace App\Http\Resources;

use App\Models\Movie\Movie;
use Illuminate\Http\Resources\Json\JsonResource;

class LikeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'like' => $this->like,
            'totalLikes' => Movie::find($this->movie_id)->total_likes,
            'totalDislikes' => Movie::find($this->movie_id)->total_dislikes
        ];
    }
}
