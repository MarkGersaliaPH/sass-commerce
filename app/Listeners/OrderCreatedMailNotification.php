<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Mail\OrderSuccess;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class OrderCreatedMailNotification 

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
    public function handle(OrderCreated $event): void
    {
        // 
       Mail::to($event->recipient)->send(new OrderSuccess($event->transaction));
         
    }
}
