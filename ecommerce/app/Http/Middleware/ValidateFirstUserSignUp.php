<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class ValidateFirstUserSignUp{

	//use App\User; -> Nos va a decir cuantos usuarios hay
	//use Illuminate\Support\Facades\Auth; -> La fachada de la 
	//autenticacion nos va adecir si existe un usuario que 
	//ya inicio sesion o no

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		//Nos dice cuantos usuarios hay en la tabla users
		$usersCount = User::count();
		if($usersCount > 0 && !Auth::check()){
			return redirect("/");
		}

		return $next($request);
	}
}
