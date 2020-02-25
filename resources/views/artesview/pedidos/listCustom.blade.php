@extends('layout.layout')
@section('main')
@include('partial.header')



<div style="position: relative; top: 100px;">
	
	<div class="container">
    <div class="row">

@foreach($custom as $pedido)
	<ul class="collection" style="margin: 0;" >

	@php($counter=0)

		
		<li class="collection-item"><img width="50%" src="{{asset(''.$pedido->imagen)}}" alt=""></li>	
		<li class="collection-item">Descripcion: {{$pedido->descripcion}}</li>
		<li class="collection-item">
			@if($bool)
			@else
			<a class="link" href="{{url('retirar/'.$pedido->idped)}}"><i class="material-icons dp48">delete</i></a>
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