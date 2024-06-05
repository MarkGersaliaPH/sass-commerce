<?php

namespace App\Mail;

use App\Enums\OrderStatus;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderStatusNotifyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    /**
     * Create a new message instance.
     */
    public function __construct($order)
    {
        // 
        $this->order = $order;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $markdown_blade = $this->getMarkDownBlade($this->order->status);
        return new Envelope(
            subject: $markdown_blade['subject'],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $markdown_blade = $this->getMarkDownBlade($this->order->status);
        return new Content(
            markdown: $markdown_blade['mark_down'],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function getMarkDownBlade($status)
    {
        switch ($status) {
            case OrderStatus::Shipped:
                return ["mark_down" => "mails.orders.shipped", "subject" => "Your Order Is Shipped"];
            case OrderStatus::Processing:
                return ["mark_down" => "mails.orders.processing", "subject" => "Your Order Is Now Processing"];
            case OrderStatus::Completed:
                return ["mark_down" => "mails.orders.completed", "subject" => "Order Complete"];
        }
    }
}
