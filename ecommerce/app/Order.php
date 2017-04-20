<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Order;
use App\Mail\OrderCreated;

class Order extends Model{

	protected $fillable = ['recipient_name','line1','line2','city','country_code','state','postal_code','email','shopping_cart_id','status','total','guide_number'];

	
	public function sendMail(){
		//Esta es la direccion del correo de cliente de paypal
		//NO es el correo del usuario que esta registrado 
		//en la tienda
		Mail::to("imegamamon@gmail.com")->send(new OrderCreated($this));
		//Mail::to($this->email)->send(new OrderCreated()); **Para enviar al comprador
	}


	public function sendUpdatedMail(){
		Mail::to("prueebaamck@gmail.com")->send(new OrderUpdated($this));
	}


	public function shoppingCartID(){
		return $this->shopping_cart->customid;
	}

	public function scopeLatest($query){
		return $query->orderID()->monthly();
	}


	public function scopeOrderID($query){
		return $query->orderBy('id', 'desc');
	}


	public function scopeMonthly($query){
		return $query->whereMonth('created_at','=',date('m'));
	}


	public function address(){
		return "$this->line1 $this->line2";
	}


	public function shopping_cart(){
		return $this->belongsTo('App\ShoppingCart');
	}

	public static function totalMonth(){
		//Dividimos entre 100 para obtener el valor real de lo que hemos ganado
		return Order::monthly()->sum('total')/100;
	}


	public static function totalMonthCount(){
		return Order::monthly()->count();
	}

	public static function createFromPayPalResponse($response,$shopping_cart){

		$payer = $response->payer;
		$orderData = (array) $payer->payer_info->shipping_address;

		$orderData = $orderData[key($orderData)];

		//Mas datos del usuario
		$orderData['email'] = $payer->payer_info->email;
		$orderData['total'] = $shopping_cart->total();
		$orderData['shopping_cart_id'] = $shopping_cart->id;

		return Order::create($orderData);
	}

}
