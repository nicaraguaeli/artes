    @extends('layout.layout')
@section('main')
@include('partial.header') 
<div style="position: relative; top: 100px;">
    
<div class="container">
    <div class="row">

        <div class="col s12">

            <h6>Detalle Categoria</h6>

        </div>

        <div class="col s12 " style="margin-top:10px;margin-bottom: 10px;">

            <a class="btn " href="{{ route('categoria.index') }}"><-regresar</a>

        </div>

    </div>
<div class="row">
    
    <div class="col s12">
        

 <table>
       <thead>
           <th>Nombre</th>
           <th>Genero</th>
            <th>Descripcion</th>
             <th>Imagen</th>
       </thead>
       <tbody>
           <tr>
               <td>{{$categoria->nombre}}</td>
                 <td>{{$categoria->gender}}</td>
               <td>{{$categoria->descripcion}}</td>
               <td><img src="{{asset(''.$categoria->imagen)}}" alt=""></td>
           </tr>
       </tbody>
   </table>

    </div>
</div>


   
</div>
</div>
@endsection