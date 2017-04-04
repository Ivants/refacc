<?php

	namespace App\Http\Controllers;
	use Iluminate\Http\Request;
	use App\Http\Requests;

	class MainController extends Controller{
		public function home(){
			//En los corchetes van los datos que se le quieren enviar a la vista
			//Datos como consultas de la base, un json, etc.
			return view('main.home',["name" => ""]);

		}

	}
?>