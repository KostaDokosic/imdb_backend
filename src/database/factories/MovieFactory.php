<?php

namespace Database\Factories;

use App\Models\Genre\Genre;
use App\Models\Movie\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class MovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    private $usedTitles = [];
    public function definition(): array
    {
        $movieList = json_decode(Storage::get('movies-list.json'))->movies;
        $rndMovie = Arr::random($movieList);

        while (in_array($rndMovie->title, $this->usedTitles)) {
            $rndMovie = Arr::random($movieList);
        }
        $this->usedTitles[] = $rndMovie->title;
        return [
            'title' => $rndMovie->title,
            'description' => $rndMovie->plot,
            'coverImage' => $rndMovie->posterUrl
        ];
    }
}
