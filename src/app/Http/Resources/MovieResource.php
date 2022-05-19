<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'coverImage' => $this->coverImage,
            'genres' => $this->genres->pluck('id'),
            'totalLikes' => $this->likes->count(),
            'userLike' => $this->likes->where('user_id', $request->user()->id)->pluck('like')->first()
        ];
    }
}
