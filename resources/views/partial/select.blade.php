<script>
            $(document).ready(function() {
    $('select').formSelect();
});
        </script>
   
	   <div class="container">
	      
	      <div class="select-pdv">
	      	
	      	<form action="{{route('temp')}}" method="get" >



	      		
    <select name="sucursal" required="required">
      <option value="" disabled selected>Seleccione punto de venta</option>
      @foreach($sto as $s)
	      		<option value="{{$s->id}}">{{$s->ubicacion}}</option>
	      		@endforeach
    </select>
    
	      		
	      		
	      	
	      	
	      	
	     
	      	<div class="select-btn">
	      		
              <button type="submit"><i class="material-icons dp48">arrow_forward</i></button>
	      	</div>
	      	</form>
	      </div>


	  	

	  	</div>


	
