@extends('layouts.app')
@section('content')
<div class="container text-center abajo">
	<div class="card product text-left">

		<!-- COn check podemos evaluar si el usuario ha iniciado sesión -->
		@if(Auth::check() && $product->user_id == Auth::user()->id)
		<div class="absolute actions">
		<!-- Solo es necesario llamar los componentes de editar y eliminar para no 
			escribir y estar repitiendo código -->
			<a href="{{url('products/'.$product->id.'/edit')}}">Editar</a>
			@include('products.delete',['product' => $product])
		</div>
		@endif



		<h1>{{$product->title}}</h1>
		<div class="row">
			<div class="col-sm-6 col xs 12"></div>
			<div class="col-sm-6 col xs 12">
				<p>
					<strong>Descripción</strong>
				</p>
				<p>{{$product->description}}</p>
				<p>
					<a href="#" class="btn btn-success">Agregar al carrito</a>
				</p>
			</div>
		</div>
	</div>
</div>
@endsection