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
        Movie::factory(50)->create();
    }
}
