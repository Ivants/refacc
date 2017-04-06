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
Route::get('/', 'MainController@home');

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