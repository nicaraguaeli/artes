@extends('layout.layout')
@section('main')

@include('partial.header')
<script>
	

$(document).ready(function(){
    
     $('select').material_select();
    $('.modal').modal();
   
  });
	 

</script>

<div style="position: relative; top: 100px;">
	


<div class="container" >
	    
  
            
	    <div class="row">
		
		<div class="col s12"><h6>En esta sección puede asignar tus punto de venta <br>o bien eliminar usuarios no deseados.</h6>
		<h6>Para asignar un punto de venta, empieza buscando por el número telefónico</h6></div>
		<div class="col s12">
			
		</div>

	</div>


<form action="{{url('buscarUsuario')}}">
	<input name="telefono" required type="number" placeholder="12345678">
	<input type="submit">
	@if($errors->any())

               <script>
            	Android.showToast("{{$errors->first()}}");
              </script>
    @endif
</form>
<div class="divider"></div>

<table>
	
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Roles</th>
			<th>Telefono</th>
			<th>PDV</th>
			
		</tr>
		<tbody>
			@foreach($usuarios as $u)
			<tr>
				<td>{{$u->name}}</td>
				<td>@if($u->rol != 'cliente')
					<div class="switch">
    <label>
     Cliente
      <input checked="checked"  type="checkbox">
      <span class="lever"></span>
      Tienda
    </label>
  </div>
					@else
					<div class="switch">
    <label>
     Cliente
      <input   type="checkbox">
      <span class="lever"></span>
      Tienda
    </label>
  </div>
					@endif

					</td>
				<td>{{$u->telefono}}</td>
				
				
				<td>@foreach($u->stores as $ubi)
					{{$ubi->ubicacion}}
					@endforeach
				</td>
				    
				    <td  class="asignar"><a href="#modal{{$u->id}}" class="waves-effect waves-circle btn-floating secondary-content  "><i class="material-icons">add</i></a></td>

				  

			@endforeach
			
			</tr>
		</tbody>
	</thead>


</table>

{{ $usuarios->links() }}
</div>

</div>

@endsection

