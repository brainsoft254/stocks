<?php

namespace App\Providers;

use Illuminate\Notifications\Events\NotificationSent;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        NotificationSent::class => [
           App\Listeners\LogNotification::class,
        ],
        \App\Events\CreditnoteCreatedEvent::class => [
            App\Listeners\CreditnoteCreatedListener::class,
        ],
        \App\Events\CreditnoteUpdatedEvent::class => [
            App\Listeners\CreditnoteUpdatedListener::class,
        ],
        \App\Events\ReturnCreatedEvent::class => [
            App\Listeners\ReturnCreatedListener::class,
        ],
        \App\Events\ReturnUpdatedEvent::class => [
            App\Listeners\ReturnUpdatedListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}