<?php

namespace App\Listeners;

use App\Events\EmailEvent;
use App\Notifications\EmailNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmailListener
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
    public function handle(object $event): void
    {
        
        // dd($event) ;
        dd($user->notify()) ;
        $event->user_id->notify(new EmailNotification() ) ;
    }
}
