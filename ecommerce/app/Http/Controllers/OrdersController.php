<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrdersController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(){
		//El metodo latest es un metodo llamad scope 
		//note: investigars
		$orders = Order::latest()->get();
		$totalMonth = Order::totalMonth();
		$totalMonthCount = Order::totalMonthCount();
		return view('orders.index',['orders' => $orders, 'totalMonth' => $totalMonth, 'totalMonthCount' => $totalMonthCount]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$order = Order::find($id);
		$field = $request->name;
		//PHP me permite tomar nombres de variables como atributos
		//de objetos con el mismo nombre
		$order->$field = $request->value;

		$order->save();
		return $order->$field;
	}
}