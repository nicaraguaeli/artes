@extends('layout.layout')

@section('main')
@include('partial.header')
<script>
            $(document).ready(function() {
            $('select').formSelect();
            $('.tabs').tabs();
            $('.materialboxed').materialbox();
});
        </script>

 <div style="position: relative; top: 60px;">
   
   <div class="container">
      

        
        <div class="tabs-content carousel carousel-slider" style="height: 500px;">
        
         @foreach($ar->pictures as $i)
          
          <div id="test-swipe-{{$i->id}}" class="col s12 carousel-item" style="z-index: ; opacity: ; visibility: visible; transform: translateX() translateX() translateZ(); height: auto;"><img width="500px" class=" materialboxed responsive-img" src="{{asset(''.$i->imagen)}}" alt=""></div>
        @endforeach
        
      </div>
         

         <ul id="tabs-swipe-demo" class="tabs">
         
         @foreach($ar->pictures as $i)
          <li class="tab col s3"><a href="#test-swipe-{{$i->id}}" class="">Imagen</a></li>
          @endforeach
       
        
      </ul>
       
 
<div class="divider"></div>



 
            


<div class="row" style="margin-top: 50px;">
	 <h4>{{$ar->nombre}}</h4>
	<div class="col s4 "><h6>Precio:</h6><h5> C${{$ar->precio}}</h5></div>
	<div class="col s4"><h6>Código:</h6> {{$ar->codigo}}  </div>
	<div class="col s4"><h6>Materiales:</h6> {{$ar->materiales}}</div>


</div>

<div class="row">



<h6>Descripción:</h6> {{$ar->descripcion}}
	
</div>




<div class="row">
		
		<form action="{{route('pedido')}}" method="post">
	    @csrf
	 
            <div class="col s4"><div class="input-field inline">
            <input id="cantidad" name="cantidad" type="number" class="validate">
            
            <label for="cantidad">Cantidad</label>
            
          </div></div>


  
            <div class="input-field col s4">
    <select name="color">
      <option value="" disabled selected>Color</option>
      @foreach($ar->colors as $color)
      <option value="{{$color->nombre_c}}">{{$color->nombre_c}}</option>
      
      @endforeach
    </select>
    
  </div>
    
 

            <div class="input-field col s4">
      <select name="talla">
      <option value="" disabled selected>Talla</option>
      @foreach($size as $t)
      <option value="{{$t}}">{{$t}}</option>
      @endforeach
      
    </select>
    
         </div>





          	
          
          
          
         
     
        
          
          
      




	</div>
<div class="row">
	
	
	<div class="col s6">
    <div >
      <label for="">Consultas</label>
    <a href="https://wa.me/50583218725">
      

          <img width="40px" src="{{asset('/img/thumbnail/WhatsApp_Logo_6.png')}}" alt="">
         </a>
    </div>

	</div>
  <div class="col s6">
    <div class="right-align fixed-action-btn">
      <button class="btn-floating r btn-large waves-effect waves-light green" type="submit" ><i class="material-icons dp48">add_shopping_cart</i></button>
    </div>
    
  </div>

</div>
<input type="hidden" name="ar_id" value="{{$ar->id}}">
<input type="hidden" name="precio" value="{{$ar->precio}}">

</form>
</div>
</div>


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <script>
            	Android.showToast("{{ $error }}");
            </script>
              
            @endforeach
        </ul>
    </div>

@endif

  	
@endsection