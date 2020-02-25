@extends('layout.layout')
@section('main')

@include('partial.header')
<div style="position: relative; top: 100px;">
<div class="container">
	
	<nav class="row">
		<div class="nav-wrapper teal darken-4">
		  <div class="col s12">
			<a href="{{route('listarProduct')}}" class="breadcrumb">Pedidos</a>
			<a href="#!" class="breadcrumb">Pedidos Personalizados</a>
		  </div>
		</div>
	  </nav>

    <div class="row">
        <div class="col s12">
            <ul class="tabs">
            <li class="tab col s3"><a class="active" href="#test1">Datos Generales</a></li>
            <li class="tab col s3"><a href="#test4">Confirmar</a></li>
            </ul>
        </div>
    </div>
<div class="row">
	<form action="{{route('storePersonalizados')}}" method="POST" enctype="multipart/form-data">
	@csrf
		<div id="test1" class="col s12">
		    	

		    	<div class="row">
			    	<div class="input-field col s12">
			        	 <textarea id="descripcion" name="descripcion" class="materialize-textarea"></textarea>
          				<label for="descripcion">Descripcion</label>
          				@error('descripcion')
                                    <span  role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
			        </div>
		    	</div>

                
                <div class="row">
					<div class="col s12">
						<div class="file-field input-field">
			                <div class="btn">
                                <span>Imagenes</span>
                                <input accept="image/jpeg,image/png" type="file" id="imagen" name="imagen" class="teal darken-4" multiple>
                                @error('imagen')
                                <span  role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror                  
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate"  id="imagen" name="imagen" type="text">
                            </div>
                        </div>
                    </div>
				</div>

		    	
		    </div>
        
		    <div id="test4" class="col s12">
		    	 <div  style="height: 50vh;">
		    	 	
		    	 	<div class="row" style="margin-top: 50%;">

		    	 		<div class="col s6">
		    	 			<div class="center-align">
		    	 				<a href="{{route('home')}}" class="btn waves-effect waves-light " type="submit" name="action">Cancelar
			    <i class="material-icons right">send</i>
  					</a >
		    	 			</div>
		    	 			
		    	 		
		    	 		</div>
		    	 		
		    	 		<div class="col s6">
		    	 			<div class="center-align">
		    	 				<button class="btn waves-effect waves-light " type="submit" name="action">Guardar
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
     
    

   	Android.showToast(response);

    location.reload(); 



    
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
