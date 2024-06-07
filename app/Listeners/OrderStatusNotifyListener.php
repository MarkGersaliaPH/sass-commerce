<?php

namespace App\Listeners;

use App\Events\OrderStatusNotifyEvent;
use App\Mail\OrderStatusNotifyMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class OrderStatusNotifyListener 
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
    public function handle(OrderStatusNotifyEvent $event): void
    {
       Mail::to($event->order->shipping_details->email)->send(new OrderStatusNotifyMail($event->order));
    }
}
