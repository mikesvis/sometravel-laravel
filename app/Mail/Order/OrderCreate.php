<?php

namespace App\Mail\Order;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderCreate extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $is_for_admin;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, $is_for_admin = false)
    {
        $this->order = $order;
        $this->is_for_admin = $is_for_admin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Заказ на сайте '.config('app.name'))->markdown('emails.order.create');
    }
}
