<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShoppingCart;
use App\PayPal;
use App\Order;


class PaymentsController extends Controller{

	public function __construct(){
		$this->middleware("shoppingcart");
	}
    
    public function store(Request $request){

		//La busqueda se hace en el middleware y los datos quedan aquí
		$shopping_cart = $request->shopping_cart;
		$paypal =  new PayPal($shopping_cart);
		$response = $paypal->execute($request->paymentId,$request->PayerID);

		if ($response->state = 'approved') {
			//Eliminamos la sesion del carrito de compras despues del cobro satisfactorio
			\Session::remove('shopping_cart_id');
			$order = Order::createFromPayPalResponse($response,$shopping_cart);
			$shopping_cart->approve();
			$order->sendMail();
		}
		
		//dd($order);
		return view('shopping_carts.completed',['shopping_cart' => $shopping_cart, 'order' => $order]);

    }
}