<?php

namespace App\Providers\App\Listeners;

use App\Events\CreditnoteUpdatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreditnoteUpdatedListener
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
     * @param  CreditnoteUpdatedEvent  $event
     * @return void
     */
    public function handle(CreditnoteUpdatedEvent $event)
    {
        //
    }
}
