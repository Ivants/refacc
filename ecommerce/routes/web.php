<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/* Sustituimos la nueva vista por el welcome laravel que viene por defecto
Route::get('/', function () {
    return view('welcome');
});
*/
//Route::get('/', 'MainController@home');
Route::get('/', function () {
    return view('welcome');
});

//Ruta individual
Route::get('/carrito', 'ShoppingCartsController@index');
Route::post('/carrito', 'ShoppingCartsController@checkout');
Route::get('/payments/store','PaymentsController@store');

Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

/*
	GET /products => index
	POST /products => Store
	GET /products/create => formulario para crear

	GET /products:id => mostrar un productos con id
	GET /products/:id/edit => formulario de edicion
	PUT/PATCH /products/:id
	DELETE /products/:id
 */
Route::resource('products','ProductsController');

/*
	POST /products => Store
	DELETE /products/:id
 */
Route::resource('in_shopping_carts','InShoppingCartsController',['only' => ['store','destroy']]);
	
Route::resource('compras','ShoppingCartsController',['only' => ['show']]);

Route::resource('orders','OrdersController',['only' => ['index', 'update']]);

//Rutas de las imagenes
Route::get('products/images/{filename}', function($filename){

	$path = storage_path("app/images/$filename");
	dd($path);

	if(!\File::exists($path)) abort (404);

	//Obtenemos el archivo
	$file = \File::get($path);
	//dd($file);
	//Obtenemos el tipo de archivo
	$type = \File::mimeType($path);
	//Todo salio bien con el 200
	$response = Response::make($file,200);
	//COlocamos el tipo del archivo
	$response->header('Content-Type',$type);
	//Descargamos el archivo
	return dd($response);

});