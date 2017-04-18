<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShoppingCart;
use App\PayPal;
use App\Order;


class PaymentsController extends Controller{
    
    public function store(Request $request){
    	$shopping_cart_id = \Session::get("shopping_cart_id");
		$shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);

		$paypal =  new PayPal($shopping_cart);
		$response = $paypal->execute($request->paymentId,$request->PayerID);

		if ($response->state = 'approved') {
			//Eliminamos la sesion del carrito de compras despues del cobro satisfactorio
			\Session::remove('shopping_cart_id');
			$order = Order::createFromPayPalResponse($response,$shopping_cart);
			$shopping_cart->approve();
		}

		//Encriptamos el shopping_cart
		

		//dd($order);
		return view('shopping_carts.completed',['shopping_cart' => $shopping_cart, 'order' => $order]);

    }
}