<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Request; 

class OwnerCartSuccess extends Mailable
{
    use Queueable, SerializesModels;
    public $cart;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cart)
    {
        $this->cart = $cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $cart)
    {
        return $this->subject(__('New order').' #'.$this->cart->id)->view('emails.owner_cart_success')->with(['cart'=>$this->cart]);
    }
}