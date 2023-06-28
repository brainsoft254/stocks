<?php

namespace App\Providers\App\Listeners;

use App\Events\ReturnUpdatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReturnUpdatedListener
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
     * @param  ReturnUpdatedEvent  $event
     * @return void
     */
    public function handle(ReturnUpdatedEvent $event)
    {
        //
    }
}
