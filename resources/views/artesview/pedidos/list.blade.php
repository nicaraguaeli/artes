@extends('layout.layout')
@section('main')
@include('partial.header')



<div style="position: relative; top: 100px;">
	
	<div class="container">
    <div class="row">

@foreach($pedidos->products as $pedido)
<ul class="collection" style="margin: 0;" >

   @php($counter=0)

	@foreach($img as $im)

	 @if($im->product_id == $pedido->id && $counter == 0)
	 <li class="collection-item"><img width="50%" src="{{asset(''.$im->imagen)}}" alt=""></li>

	 @php($counter+=2)  
	 @endif
	
	@endforeach
	
	<li class="collection-item">Codigo: {{$pedido->codigo}}</li>
	<li class="collection-item">Nombre: {{$pedido->nombre}}</li>
	<li class="collection-item">Talla: {{$pedido->pivot->talla}}</li>
	<li class="collection-item">Cantidad: {{$pedido->pivot->cantidad}}</li>
	<li class="collection-item">Color: {{$pedido->pivot->color}}</li>
	<li class="collection-item">Precio: {{$pedido->pivot->precio}}</li>
	<li class="collection-item">@if($bool)
		@else
		<a class="link" href="{{url('retirar/'.$pedido->pivot->id)}}"><i class="material-icons dp48">delete</i></a>
		@endif</li>
</ul>


@endforeach




	
	
@if($bool)
@else
<div style="text-align: center;" >
	<a class="link" href="{{route('categorias')}}"><i class="material-icons dp48">add</i> Seguir agregando?</a>
	<a class="waves-effect waves-purple btn secondary-content" href="{{url('enviar')}}"><i class="material-icons dp48">arrow_forward</i> Enviar</a>
</div>
@endif

@foreach ($errors->all() as $error)
            <script>
            	Android.showToast("{{ $error }}");


            </script>
              
            @endforeach

            </div>
</div>
</div>
<script>
	$(document).ready(function(){
    $('.fixed-action-btn').floatingActionButton();
  });
</script>
 @endsection