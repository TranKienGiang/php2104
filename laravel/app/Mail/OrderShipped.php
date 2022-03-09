<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $cartData = session('cart');
        $cartData = collect($cartData);
        $productData = $cartData->pluck('quantity', 'id')->toArray();
        $delivery = 0;
        $discount = 0;
        $total = 0;
        
        return $this->subject('Rosé Shop')
                    ->view('viewfashion.send-mail')
                    ->with([
                        'productData' => $productData,
                        'total' => $total,
                        'delivery' => $delivery,
                        'discount' => $discount,
                        'nameOrder' => $this->order->name,
                        'phoneOrder' => $this->order->phone,
                        'addressOrder' => $this->order->address,
                        'emailOrder' => $this->order->email,
                        'toTalFinalCheckout' => $this->order->toTalFinalCheckout,
                    ]);
    }
}
