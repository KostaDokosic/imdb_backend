<?php

use App\Models\Genre\Genre;
use App\Models\Movie\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Movie::factory(20)->create();

        $moviesData = json_decode(Storage::get('movies-list.json'));
        $genreList = $moviesData->genres;
        foreach ($genreList as $genre) {
            Genre::create([
                'name' => $genre
            ]);
        }

        foreach (Movie::all() as $movie) {
            foreach ($moviesData->movies as $movieData) {
                if($movieData->title === $movie->title) {
                    $movieGenres = array_values($movieData->genres);
                    foreach ($movieGenres as $genre) {
                        $genreData = Genre::all()->where('name', $genre);
                        $movie->genres()->attach($genreData->pluck('id'));
                    }
                }
            }
        }
    }
}
