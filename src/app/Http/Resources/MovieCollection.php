<?php

namespace App\Http\Resources;

use App\Models\Movie\Movie;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MovieCollection extends ResourceCollection
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
            'movies' => parent::toArray($request),
            'total' => Movie::all()->count()
        ];
    }
}
