<?php

namespace App\Listeners;

use App\Events\SeriesCreated as EventSeriesCreated;
use App\Mail\SeriesCreated;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class EmailAboutSeriesCreated implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(EventSeriesCreated $event): void
    {
        $users = User::all();

        foreach ($users as $index => $user) {
            $email = new SeriesCreated(
                $event->seriesName,
                $event->seriesId,
                $event->seasonsQty,
                $event->episodesPerSeason
            );
            $when = now()->addSeconds($index*10);
            Mail::to($user)->later($when, $email);
        }
    }
}
