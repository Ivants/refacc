<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderCreated extends Mailable{

	use Queueable, SerializesModels;
	
	public $order;
	public $products;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($order){
		//datos de la orden
		$this->order = $order;
		//productos que estoy enviando
		$this->products = $order->shopping_cart->products()->get();
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build(){
		//Podemos poner un alias
		return $this->from('mck@gmail.com')->view('mailers.order');
	}
}
