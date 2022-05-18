<?php

use App\Models\Genre\Genre;
use App\Models\Movie\Movie;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Movie::factory(20)->create();
        Genre::factory(5)->create();

        $genres = Genre::all();
        Movie::all()->each(function ($movie) use ($genres) {
            $movie->genres()->attach(
                $genres->random(rand(1, $genres->count()))->pluck('id')->toArray()
            );
        });
    }
}
