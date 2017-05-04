<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">


</head>
<body>
<h1>¡Hola!</h1>
<p>Te enviamos los datos de tu compra realizada en VIVET</p>


<table>
	<thead>
       <tr>
         <th>Producto</th>
          <th>Costo</th>
      </tr>
    </thead>

  <tbody>
	@foreach($products as $product)
     <tr>
     	<td>{{$product->title}}</td>
     	<td>{{$product->pricing}}</td>

     </tr>
	@endforeach
        <tr>
         <th>Total</th>
          <th>{{$order->total}}</th>
      </tr>

   </tbody>
</table>
</body>
</html>

