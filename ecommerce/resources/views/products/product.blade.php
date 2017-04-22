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
			<div class="col-sm-6 col xs 12">
				
               @if($product->extension)
                  <img src="{{url("/products/images/$product->id.$product->extension")}}" class="product-avatar" >

               @endif

		<!--	<img class="imagen2" src="https://s-media-cache-ak0.pinimg.com/originals/03/ba/be/03babef8420c80bfb0ef96ca0ba49fa4.jpg" alt=""> -->


			</div>
			<div class="col-sm-6 col xs 12">
				<p>
					<strong>Marca/Modelo</strong>
				</p>
				<p>{{$product->description}}</p>
				<p>
					<!-- carpeta en donde se encuentra nuestra vista -->
					@include("in_shopping_carts.form",["product" => $product])
				</p>
				<p>
					<strong>Precio</strong>
				</p>
				<p>{{$product->pricing}}</p>
			</div>
		</div>
	</div>