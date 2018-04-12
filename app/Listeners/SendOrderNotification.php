<?php

namespace App\Listeners;

use App\Events\OrderMade;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendOrderNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  OrderMade  $event
     * @return void
     */
    public function handle(OrderMade $event)
    {
        $order = $event->order;
        $user = User::findOrFail($order->user_id);
        $orderWithRelations = Order::find($order->id);
        $products = $orderWithRelations->products()->get();
        Mail::send('emails.order', ['order' => $orderWithRelations, 'products' => $products], function ($message) use ($user)
        {
            $message->subject('Order confirmation');
            $message->from('noreply@shop.test', 'Eimantas Pauzuolis');

            $message->to($user->email);

        });


    }
}
