<?php

namespace App\Providers\App\Listeners;

use App\Events\ReturnCreatedEvent;
use App\Notifications\ReturnCreatedNotification;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReturnCreatedListener
{
    /**
     * Handle the event.
     *
     * @param  ReturnCreatedEvent  $event
     * @return void
     */
    public function handle(ReturnCreatedEvent $event)
    {

        $user = User::where('email', $event->return->staff)->first();

        $user->notify(new ReturnCreatedNotification($event->return));
    }
}