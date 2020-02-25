@extends('layout.layout')
@section('main')

@include('partial.header')
<div style="position: relative; top: 100px;">
<div class="container">
	



<div class="row">
	
	    	<div class="col s12">
		      <ul class="tabs">
		        <li class="tab col s3"><a class="active" href="#test1">Datos Generales</a></li>
		        <li class="tab col s3"><a  href="#test2">Caracteristicas</a></li>
		        <li class="tab col s3"><a href="#test4">Confirmar</a></li>
		      </ul>
		    </div>

</div>



<h5>Nuevo Artículo</h5>
	<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
	@csrf
		<div id="test1" class="col s12">
		    	
		    	<div class="row">
			        <div class="input-field col s12">
			           <input id="codigo"  value="BA22" name="codigo" type="text" class="validate">
			          <label for="codigo">Código</label>
			           @error('codigo')
                                    <span  role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
			        </div>

		    	</div>

		    	<div class="row">
		    			<div class="input-field col s12">
			           <input id="nombre" value="2" name="nombre" type="text" class="validate">
			          <label for="nombre">Nombre</label>
			          @error('nombre')
                                    <span  role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
			        </div>
		    	</div>

		    	<div class="row">
			    	<div class="input-field col s12">
			           <input id="precio" value="2" name="precio" type="number" class="validate">
			          <label for="precio">Precio</label>
			          @error('precio')
                                    <span  role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
			        </div>
		    	</div>

		    	<div class="row">
			    	<div class="input-field col s12">
			        	 <textarea id="descripcion" name="descripcion" class="materialize-textarea">vad</textarea>
          				<label for="descripcion">Descripcion</label>
          				@error('descripcion')
                                    <span  role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
			        </div>
		    	</div>

		    	<div class="row">
			    	<div class="input-field col s12">
			      	<input id="materiales" value="2" name="materiales" type="text" class="validate">
			          <label for="materiales">Materiales</label>
			          @error('materiales')
                                    <span  role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
			        </div>
		    	</div>

		    	
		    </div>


		    <div id="test2" class="col s12">
		    	
		    	<div class="row">
		    		
		    		  <div class="input-field col s12">
					    <select id="size_id" name="size_id">
					      <option value="" disabled selected>Selecciona una talla</option>
						@foreach($talla as $cat)
						<option id="{{$cat->id}}" value="{{$cat->id}}">{{$cat->nombre_s}} / {{$cat->sizes}}</option>
						@endforeach
					    </select>
					   
					    
					  </div>

					  @error('size_id')
                                    <span  role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
		    	</div>

		    	
		    		<div class="row">
		    		  <div class="input-field col s12">
					    <select name="category_gender_id" id="cate">
					      <option value="" disabled selected>Selecciona una categoria</option>
						@foreach($categoria as $cat)
						<option id="{{$cat->id}}" value="{{$cat->id}}">{{$cat->gender}} / {{$cat->nombre}}</option>
						@endforeach
					    </select>
					      
					  </div>
					  @error('category_gender_id')
                                    <span  role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
		    	</div>
  
		    	<div class="row">
		    		<div class="input-field col s12">
    <select required="" multiple name="colores[]" id="colores">
      <option value="" disabled >Colores</option>
      @foreach($colores as $color)
      
      <option value="{{$color->id}}">{{$color->nombre_c}}</option>

      @endforeach
     </select>
   <span>No estan los colores  que buscas? agrega uno <!-- Modal Trigger -->
  <a class="waves-effect waves-light btn modal-trigger orange darken-4" href="#modal1"><i class="material-icons dp48">add</i></a> </span>
  </div>
		  </div>



		    	

  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
     <h4>Colores</h4>
      <p>Agregue un nuevo color</p>
      <div class="row">
      	
		    			<div class="input-field col s12">
		    				<label >Escriba el Color</label>
			           <input  maxlength="15" id="color"   type="text" class="validate">
			          
			          
			        </div>
		    	
      </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat orange darken-4">Cancelar</a>
      <a id="btn-color"  class="modal-close waves-effect waves-green btn-flat orange darken-4">Guardar </a>
    </div>
  </div>

		    	  
				<div class="row">
					<div class="col s12">

						<div class="file-field input-field">
			      <div class="btn orange darken-4">
			        <span>Imagenes</span>
			        <input accept="image/jpeg,image/png" type="file" id="imagen[]" name="imagen[]" multiple>
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate"  id="imagen" name="imagen" type="text">
			      </div>
			    </div></div>
				</div>
		    	

			    @error('imagen')
                                    <span  role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  

		    </div>


        
		    <div id="test4" class="col s12">
		    	 <div  style="height: 50vh;">
		    	 	
		    	 	<div class="row" style="margin-top: 50%;">

		    	 		<div class="col s6">
		    	 			<div class="center-align">
		    	 				<a href="{{route('product.index')}}" class="btn waves-effect waves-light orange darken-4 " type="submit" name="action">Cancelar
			   
  					</a >
		    	 			</div>
		    	 			
		    	 		
		    	 		</div>
		    	 		
		    	 		<div class="col s6">
		    	 			<div class="center-align">
		    	 				<button class="btn waves-effect waves-light orange darken-4" type="submit" name="action">Guardar
			    <i class="material-icons right">send</i>
  					</button >
		    	 			</div>
		    	 			
		    	 		
		    	 		</div>

		    	 		
		    	 		


		    	 	</div>
		    	 	
		    	 </div>
		    	  
		    </div>
	  	</div>
	
		</form>
	
</div>
@foreach ($errors->all() as $error)
            <script>
            	Android.showToast("{{ $error }}");


            </script>
              
            @endforeach
  
</div>
<script type="text/javascript">
 

$(document).ready(function(){
    
    $('select').formSelect();
    $('.tabs').tabs();

     $('.modal').modal();


  $( "#btn-color" ).click(function() {
    

     $.ajax({
  url: "{{url('/colores')}}",
  type: "get", //send it through get method
  data: { 
  id: $('#color').val(), 
    
  },
  success: function(response) {
    //Do Something
 	

    location.reload(); 

    Android.showToast(response);

    
  },
  error: function(xhr) {
    //Do Something to handle error

    Android.showToast("No ha sido posible");

  }
});



});



  });


</script>
@endsection
