<?php

namespace App\Providers\App\Listeners;

use App\Events\CreditnoteCreatedEvent;
use App\Notifications\CreditnoteCreatedNotification;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreditnoteCreatedListener
{
    /**
     * Handle the event.
     *
     * @param  CreditnoteCreatedEvent  $event
     * @return void
     */
    public function handle(CreditnoteCreatedEvent $event)
    {
        $user = User::where('email', $event->creditnote->staff)->first();

        $user->notify(new CreditnoteCreatedNotification($event->creditnote));
    }
}