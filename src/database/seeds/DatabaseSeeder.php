<?php

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
        // $this->call(UsersTableSeeder::class);
        Movie::truncate();
        Movie::factory()->count(100)->create();
    }
}
