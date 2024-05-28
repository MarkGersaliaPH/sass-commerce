<?php
 
namespace App\Events;
 
use App\Models\Order;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
 
class OrderCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
 
    public $transaction;
    public $recipient;
    /**
     * Create a new event instance.
     */
    public function __construct($transaction,$recipient
    ) {
        $this->transaction = $transaction;
        $this->recipient = $recipient; 
    }
}