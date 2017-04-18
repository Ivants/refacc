<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
	//Campos llamados Mass assignment
	//Este arreglo permite usar el parametro de create, si no existiera no podemos hacer uso
	//de el elemento status y modificarlo en create
	protected $fillable = ['status'];

	public function approve(){
		$this->updateCustomIDAndStatus();
	}


	public function generateCustomID(){
		//No es recomendabble para contraseña
		return md5($this->id.$this->update_at);
	}


	public function updateCustomIDAndStatus(){
		$this->status = 'approved';
		$this->customid = $this->generateCustomID();
		$this->save();
	}



	public function inShoppingCarts(){
		return $this->hasMany('App\InShoppingCart');
	}


	public function products(){
		//Clase con la que estamos haciendo la relacion
		return $this->belongsToMany('App\Product','in_shopping_carts');
	}


	public function order(){
		return $this->hasOne('App\Order')->first();
	}


	public function productsSize(){
		return $this->products()->count();
	}

	public function total(){
		//Hacemos el join de los productos y sumamos todos
		return $this->products()->sum("pricing");
	}


	public function totalUSD(){
		//API REST paypal solo permite el cobro en dolar
		//Se debe hacer la conversion
		//Aquí le voy a poner una variable desde un input en html para insertar
		//las subidas y bajadas del dolar
		return $this->products()->sum("pricing")/100;
	}

	//El comando 'php artisan make:model ShoppingCart -m' crea el modelo y la migracion al mismo tiempo
	public static function findOrCreateBySessionID($shopping_cart_id){
		if ($shopping_cart_id) {
			//Buscamso el carrito de compras con este ng-include src="" scope="" onload=""></ng-include>
			return ShoppingCart::findBySession($shopping_cart_id);
		}else{
			//Como no existe creamos el carrito
			return ShoppingCart::createWithoutSession($shopping_cart_id);
		}

	}

	public static function findBySession($shopping_cart_id){
		return ShoppingCart::find($shopping_cart_id);
	}

	public static function createWithoutSession(){
		//$shopping_cart = new ShoppingCart;
		//$shopping_cart->status = "incopleted";
		//$shopping_cart->save();
		//Para convertirlo en una solo linea podemos usar create
		

		return ShoppingCart::create([
			"status" => "incompleted"
			]);
	}
}
