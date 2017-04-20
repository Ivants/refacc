<!-- Formulario -->
<!-- En url pongo lo que venga en la variable url y method desde create o edit-->
{!! Form::open(['url' => $url,'method' => $method]) !!}

	<div class="form-group">
	<!-- Despues del nombre del campo pongo los datos que vienen desde la base de datos-->
		{{Form::text('title',$product->title, ['class' => 'form-control', 'placeholder' => 'Titulo...'])}}
	</div>
	<div class="form-group">
		{{Form::number('pricing',$product->pricing,['class' => 'form-control', 'placeholder' => 'Precio de tu producto en centavos'])}}
	</div>
	<div class="form-grup">
		{{Form::file('cover')}}
	</div>
	<div class="form-group">
		{{Form::textarea('description',$product->description,['class' => 'form-control', 'placeholder' => 'Describe tu producto'])}}
	</div>
	<div class="form-group text-right">
		<a href="{{url('/products')}}">Regresar al listado de productos</a>
		<input type="submit" name="" value="Enviar" placeholder="" class="btn btn-success">
	</div>

{!! Form::close() !!}