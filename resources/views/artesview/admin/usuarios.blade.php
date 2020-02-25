@extends('layout.layout')
@section('main')
@include('partial.header')

<div style="position: relative; top: 100px;">
<div class="container">
	@if($errors->any())
<div class="green lighten-3 center-align" style="color: white; padding: 8px">
  <i class="material-icons dp48">check</i><h6>{{$errors->first()}}</h6>
  <a href="{{url('admin')}}">Ir a Usuarios</a>
</div>
@endif

	<div class="row">
		     <form action="{{route('updateUsuario')}}" method="post">
		     	@csrf
		     	 <input  value="{{$user->id}}" class="validate"  type="hidden" id="id" name="id">   
			 <div class="input-field col s12">
                    <input required value="{{$user->name}}" class="validate"  type="text" id="name" name="name">   

                    <label for="name">Nombre de Usuario </label>@if($errors->any())
                      
               <script>
            	Android.showToast("{{$errors->first()}}");
              </script>
    @endif
                </div> 

                 <div class="input-field col s12">
                    <input required value="{{$user->telefono}}" class="validate"  type="number" id="telefono" name="telefono">    
                    <label for="telefono">Teléfono </label>
                </div> 

                 <div class="input-field col s12">
                    <input required value="{{$user->email}}" class="validate"  type="email" id="email" name="email">    
                    <label for="email">Correo Electrónico </label>
                </div>   
                 

                 <div class="input-field col s12">
                    <input readonly value="Tienda" class="validate"  type="text" id="rol" name="rol">    
                    <label for="rol">Rol</label>
                 </div> 

                   <div class="input-field col s12">
                    <input placeholder="camoapa" required class="validate"  type="text" id="ubicacion" name="ubicacion">    
                    <label for="ubicacion">Ejemplo (camoapa,boaco,matagalpa)</label>
                  </div>
                  <div class="input-field col s6">
                   <a class="waves-effect waves-light btn-small grey lighten-2">Cancelar</a>
                  </div>
                  <div class="input-field col s6 right-align">
                    
                    <button class="waves-effect waves-light btn-small grey lighten-2" type="submit">Actualizar</button>
                  </div>


		
	</div>

 </form>
</div>

</div>

@endsection