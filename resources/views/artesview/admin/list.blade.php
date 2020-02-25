@extends('layout.layout')
@section('main')
@include('partial.header')

<div style="position: relative; top: 100px;">
	<div class="container">
		
		<table class="highlight">
			<thead>
				<tr>
					<th>Cod</th>
					<th>Nombre</th>
					<th>Descr</th>
					<th>Prec</th>
					<th>Edit</th>
					<th>Borrar</th>
				</tr>
			</thead>
			<tbody>
				@foreach($productos as $p)
				<tr>
					<td>{{$p->codigo}}</td>
					<td>{{$p->nombre}}</td>
					 <td>{{$p->descripcion}}</td>
					 <td>C$: {{$p->precio}}</td>
					  <td><form method="get" action="{{route('viewProducts')}}">
					  	
					  	<input type="hidden" name="id" value="{{$p->id}}">
					  	<button><i class="material-icons dp48">edit</i></button>
					  </form></td>
					  <td><a  class="link" href="#modal{{$p->id}}"><i class="material-icons dp48">delete</i></a></td>
					 
					  <div id="modal{{$p->id}}" class="modal">
    <div class="modal-content">
      <h4>Estas seguro?</h4>
      <p>El registro sera eliminado de la base de datos</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
      <a onclick="eliminar('{{$p->id}}')" class="modal-close waves-effect waves-green btn-flat">Proceder </a>
    </div>
  </div>
			    @endforeach
				</tr>
			</tbody>
		</table>

	</div>
	{{$productos->links()}}
</div>

<script>
	$(document).ready(function(){
    $('.modal').modal();
  });
</script>
@endsection