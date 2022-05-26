<?php

namespace App\Listeners;

use App\Events\SendEmailWhenMovieIsCommented;
use App\Mail\MovieCommentedEmail;
use App\Models\User\User;
use Illuminate\Support\Facades\Mail;

class SendEmailWhenMovieIsCommentedFire
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SendEmailWhenMovieIsCommented  $event
     * @return void
     */
    public function handle(SendEmailWhenMovieIsCommented $event)
    {
        $users = User::whereIn('id', $event->commentators)->get();
        foreach ($users as $key => $user) {
            Mail::to($user->email)->send(new MovieCommentedEmail($user));
        }
    }
}
