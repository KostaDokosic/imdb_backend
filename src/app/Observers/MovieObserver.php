<?php

namespace App\Observers;

use App\Models\Movie\Movie;
use App\Models\Movie\MovieLogs;

class MovieObserver
{
    /**
     * Handle the Movie "created" event.
     *
     * @param  \App\Models\Movie\Movie  $movie
     * @return void
     */
    public function created(Movie $movie)
    {
        MovieLogs::create([
            'movie_id' => $movie->id,
            'user_id' => $movie->user->id
        ]);
    }

    /**
     * Handle the Movie "updated" event.
     *
     * @param  \App\Models\Movie\Movie  $movie
     * @return void
     */
    public function updated(Movie $movie)
    {

    }

    /**
     * Handle the Movie "deleted" event.
     *
     * @param  \App\Models\Movie\Movie  $movie
     * @return void
     */
    public function deleted(Movie $movie)
    {
        //
    }

    /**
     * Handle the Movie "restored" event.
     *
     * @param  \App\Models\Movie\Movie  $movie
     * @return void
     */
    public function restored(Movie $movie)
    {
        //
    }

    /**
     * Handle the Movie "force deleted" event.
     *
     * @param  \App\Models\Movie\Movie  $movie
     * @return void
     */
    public function forceDeleted(Movie $movie)
    {
        //
    }
}
