 @extends('layout.layout')
 @section('main')                     
 
 @include('partial.header')    
 
 <div style="position: relative; top: 100px;">
 	<div class="container">

     <div class="row">
           @if ($message = Session::get('success'))

       <div class="green lighten-3 center-align" style="color: white; padding: 8px">
  <i class="material-icons dp48">check</i><h6>{{ $message }}</h6>
</div>

            

        </div>

    @endif
      <div class="row">
      	<div class="col s6">

            <a href="{{route('home')}}">Ir al inicio</a><h6 class="center-align"> ¡ USUARIOS ¡ </h6>

        </div>
      	<div class="col s6">
      		<form action="{{route('usuario.edit','telefono')}}">
      			<input required name="telefono" placeholder="12345678" maxlength="8" type="text">

      			<label for="tel">Buscar por Telefono?</label>
      			<input class="btn" type="submit">
            @if($errors->any())

               <script>
              Android.showToast("{{$errors->first()}}");
              </script>
    @endif
      		</form>
      	</div>
      	 
      </div>
       

       

    </div>

    @if(sizeof($usuarios) > 0)

        <table class="table table-bordered">

            <tr>

                 <th>No</th>
 
                  <th>Nombre</th>
                  <th>Rol</th>
                  <th>Tel</th>
                  <th>PDV</th>

               

                

            </tr>

            @foreach ($usuarios->sortByDesc('id') as $u)

                <tr>

                    <td>{{ ++$i }}</td>

                    <td>{{ $u->name }}</td>
                    <td>{{ $u->rol }}</td>  
                    <td>{{ $u->telefono }}</td>
                     <td>@foreach($u->stores as $es)
                      {{ $es->ubicacion }}
                      @endforeach</td>                         

                    <td>

                        <form action="{{ route('usuario.destroy',$u->id) }}" method="POST">

                          

                            <a class="btn" href="{{ route('usuario.edit',$u->id) }}"><i class="material-icons dp48">edit</i></a>


                            @csrf

                            @method('DELETE')

                            @if($u->rol == 'tienda')
                            <button  type="submit" class="btn red disabled"><i class="material-icons dp48">delete</i></button>
                            @else
                             <button  type="submit" class="btn red"><i class="material-icons dp48">delete</i></button>
                            @endif
                        </form>

                    </td>

                </tr>

            @endforeach

        </table>

    @else

        <div class="center-align">No hay usuarios registrados.</div>

    @endif



 		
 	</div>
    <div class="divider"></div>
   
 </div>


         


              
                       
                        
@endsection                        