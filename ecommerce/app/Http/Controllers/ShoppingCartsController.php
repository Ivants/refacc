<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\ShoppingCart;
use App\PayPal;

class ShoppingCartsController extends Controller
{
    public function index(){

		$shopping_cart_id = \Session::get("shopping_cart_id");
		$shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);

		//Espera nuestro carrito de compras
		$paypal = new PayPal($shopping_cart);
		$payment = $paypal->generate();

		//return redirect($payment->getApprovalLink());
		return redirect();	

		//Obtenemos los productos que estan en el carrito
		// $products = $shopping_cart->products()->get();

		// $total = $shopping_cart->total();

		// return view("shopping_carts.index",["products" => $products, "total" => $total]);
    }
}
