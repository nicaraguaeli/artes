@extends('layout.layout')

@section('main')
@include('partial.header')
<div style="  font-weight: bold;  height: 100%;">
	  
  
            

	  <div style="padding: 15px; padding-top: 100px; text-align: center; ">
	  	  
	  	  <nav>
    <div class="nav-wrapper tit  cyan darken-3">
      <div class="col s12">
        <a href="{{url('categorias')}}" class="CAtep">Categorias</a>
        <a href="#!" class="breadcrumb">{{$cat[0]->gender}}</a>
        <a href="#!" class="breadcrumb">{{$cat[0]->nombre}}</a>
      </div>
    </div>
  </nav>
<div class="container" >
        @foreach ($articulos->sortByDesc('id') as $ar)
           
           
          
           	
<a href="{{url('catal/'.$ar->id)}}">
            <div class="card ">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="{{asset(''.$ar->pictures[0]->thumbnail)}}">
    </div>
     </a>    
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">{{$ar->nombre}}</span>
      <p><a href="{{url('catal/'.$ar->id)}}">Más Detalle</a></p>
    </div>
    
  </div>
        
       @endforeach
 </div>

	  </div>
{{ $articulos->links()}}
</div>
@endsection