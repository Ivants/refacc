@extends("layouts.app");

@section("content")
	<div class="big-padding text-center blue-grey white-text">
		<h1>Productos</h1>
	</div>
	<div class="container">
		<table class="table table-bordered">
			<thead>
				<tr>
					<td>ID</td>
					<td>Título</td>
					<td>Descripcion</td>
					<td>Precio</td>
					<td>Acciones</td>
				</tr>
			</thead>
			<tbody>
				@foreach ($products as $product)
					<tr>
						<td>{{$product->id}}</td>
						<td>{{$product->title}}</td>
						<td>{{$product->descripcion}}</td>
						<td>{{$product->precio}}</td>
						<td>Acciones</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection