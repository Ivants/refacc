@extends('layouts.app')
@section('content')
<div class="container text-center abajo">
	@include('products.product',['product'=>$product])
</div>
@endsection