<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
	//Campos llamados Mass assignment
	//Este arreglo permite usar el parametro de create, si no existiera no podemos hacer uso
	//de el elemento status y modificarlo en create
	protected $fillable = ["status"];

	public function productsSize(){
		return $this->id;
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
