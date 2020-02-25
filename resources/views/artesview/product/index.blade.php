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
        <div class="col s12">

            <h6 class="center-align"> ¡ ARTICULOS ¡ </h6>

        </div>

        <div class="col s12 center-align">

            <a class="btn btn-success orange darken-4 " href="{{ route('product.create') }}"> ADD articulo</a>

        </div>

    </div>

    @if(sizeof($productos) > 0)

        <table class="table table-bordered">

            <tr>

                <th>No</th>

                <th>codigo</th>
                 <th>nombre</th>
                  <th>Acciones</th>

               

                

            </tr>

            @foreach ($productos as $pro)

                <tr>

                    <td>{{ ++$i }}</td>

                    <td>{{ $pro->codigo }}</td>
                    <td>{{ $pro->nombre }}</td>                         

                    <td>

                        <form action="{{ route('product.destroy',$pro->id) }}" method="POST">


                            <a class="btn" href="{{ route('product.show',$pro->id) }}"><i class="material-icons dp48">pageview</i></a>

                            <a class="btn" href="{{ route('product.edit',$pro->id) }}"><i class="material-icons dp48">edit</i></a>


                            @csrf

                            @method('DELETE')


                            <button type="submit" class="btn red"><i class="material-icons dp48">delete</i></button>

                        </form>

                    </td>

                </tr>

            @endforeach

        </table>

    @else

        <div class="center-align">Comience a agregar a la base de datos.</div>

    @endif



 		
 	</div>
    <div class="divider"></div>
    {{ $productos->links() }} 
 </div>