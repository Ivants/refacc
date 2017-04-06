<?php

	namespace App\Http\Controllers;
	use Iluminate\Http\Request;
	use App\Http\Requests;
		use App\ShoppingCart;

	class MainController extends Controller{
		public function home(){
			//La primera vez que el usuario entre va a pasar por esta linea pero no tendra la variable
			//shopping_cart_id entonces la variable se va como nula y se va a la siguiente linea
			$shopping_cart_id = \Session::get("shopping_cart_id");
			//En los corchetes van los datos que se le quieren enviar a la vista
			//Datos como consultas de la base, un json, etc.
			//return view('main.home',["name" => ""]);
			
			//Creamos un nuevo carrito y lo almacenamos en la variable
			$shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);

			//Put nos permite escribir una nueva sesion
			//El primer argumento es el id de la sesion y el segundo es lo que vamos a guardar en la sesion
			//o sea el id del carrito de compras
			//
			//Despues de haber creado el carrito lo guardamos en la sesion
			//La siguiente ves que el usuario entre a la pagina ya tendra un carrito de compras y 
			\Session::put("shopping_cart_id", $shopping_cart->id);

			//return view('main.home',["shopping_cart" => $shopping_cart]);
			return view('main.home',[]);

		}

	}
?>