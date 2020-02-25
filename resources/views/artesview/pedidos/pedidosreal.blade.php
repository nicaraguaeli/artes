@extends('layout.layout')
@section('main')
@include('partial.header')



<div style="position: relative;

top: 100px;">
	
<div class="container">
@if($errors->any())
<div class="green lighten-3 center-align" style="color: white; padding: 8px">
  <i class="material-icons dp48">check</i><h6>{{$errors->first()}}</h6>
</div>
@endif
<table class="highlight">
  <thead>
    @if(Auth::user()->rol == 'admin')
    
    <tr>
    <th>Codigo</th>
    <th>Nombre</th>
    <th>Estado</th>
    <th>Detalle</th>
    <th>Anular?</th>
    @foreach($pr as $p)
    </tr>
  </thead>
    <td>{{$p->created_at}}
</td>
        
        
        
    <td>{{$p->name}} {{$p->ubicacion}} {{$p->telefono}} </td>

        
   
    <td>@if($p->confirmado == 1)
      <i style="color: #00d500;" class="material-icons dp48">check_circle</i>
      @else 
      <div class="switch">
    <label>
     
      <input value="{{$p->idped}}"  type="checkbox">
      <span class="lever"></span>
      
    </label>
  </div>
      @endif</td>
    <td><form action="{{url('list')}}" method="get">
      <input name="id" value="{{$p->idped}}" type="hidden">
      <button>ver</button>
    </form></td>
    <td><!-- Modal Trigger -->
   <a class="waves-effect waves-light btn modal-trigger" href="#modal{{$p->idped}}"><i class="material-icons dp48">delete</i></a>
    <!-- Modal Structure -->
  <div id="modal{{$p->idped}}" class="modal">
    <div class="modal-content">
     <h4>Estas seguro?</h4>
      <p>El registro sera eliminado de la base de datos</p>
   
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
      <a onclick="eliminar('{{$p->idped}}')" class="modal-close waves-effect waves-green btn-flat">Proceder </a>
    </div>
  </div>
  <!-- END Modal Structure -->
  

       
     
    </td>
  </tr>
 @endforeach

    @else
    <thead>
      <tr>
    <th>Fecha</th>
    <th>Enviado</th>
    <th>Entregado</th>
    <th>Detalle</th>
  </tr>
     </thead>
    @foreach($pr as $p)
   <tbody>
  <tr>
    <td>{{$p->created_at}}
</td>
  
    <td>@if($p->enviado == 1)
      <i style="color: #00d500;" class="material-icons dp48">check_circle</i>
      @else 
    <i style="color: red;" class="material-icons dp48">cancel</i>

      @endif</td>
    <td>@if($p->confirmado == 1)
      <i style="color: #00d500;" class="material-icons dp48">check_circle</i>
      @else 
    <i style="color: red;" class="material-icons dp48">cancel</i>
      @endif</td>
    <td><form action="{{url('list')}}" method="get">
      <input name="id" value="{{$p->id}}" type="hidden">
      <button>ver</button>
    </form></td>
  </tr>
 @endforeach
   
    @endif
  </tr>
  </tbody>
  
</table>
{{ $pr->links() }}
 

  
  
      <script>

function eliminar(id)
{
      $.ajax({
  url: "{{url('/switchDelete')}}",
  type: "get", //send it through get method
  data: { 
  id: id, 
    
  },
  success: function(response) {
    //Do Something

    Android.showToast(response);

    location.reload(); 
  },
  error: function(xhr) {
    //Do Something to handle error

  }
});
}
        






$(document).ready(function() {



  // Or with jQuery

  $(document).ready(function(){
    
   $('.modal').modal();

  });





  $("input").change(function() {
    if($(this).is(":checked")) {
      

      
      $.ajax({
  url: "{{url('/switchUpdate')}}",
  type: "get", //send it through get method
  data: { 
    id: $(this).val(), 
    
  },
  success: function(response) {
    //Do Something

    Android.showToast("Actualizado");

    location.reload(); 
  },
  error: function(xhr) {
    //Do Something to handle error

  }
});


    
    }
    
  })
});

      </script>  

</div>
</div>
@endsection