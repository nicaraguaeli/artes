@extends('layout.layout')
@section('main')
@include('partial.header')


<div style="position: relative; top: 100px;">
  

   <div class="container">
    <div class="row"> 
      <div class="col s12">

            <h6 class="center-align"> ¡ NUEVA CATEGORIA ¡ <br>
            Selecciona una categoria o crea una nueva.. </h6>

        </div>
      
    </div>
    <div class="row">
        
        <form action="{{route('categoria.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            
              <div class="input-field col s12">
                    <select id="categoria" name="categoria" class="materialize-textarea">
                      <option >ninguna</option>
                      @foreach($cat as $c)
                      <option value="{{$c->id}}">{{$c->nombre}}</option>
                      @endforeach
                    </select>
                    <label for="categoria">Nueva Categoria</label>
                    @error('cateogoria')
                                    <span  role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                </div>    
            
            <div class="row">
                <div class="input-field col s12">
                    <input class="validate"  type="text" id="nombre" name="nombre">    
                    <label for="nombre">Nombre categoria </label>@error('nombre')
                                    <span  role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                </div>     
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea required id="descripcion" name="descripcion" class="materialize-textarea"></textarea>
                    <label for="descripcion">Descripcion</label>
                </div>    
            </div>
             <div class="row">
                <div class="input-field col s12">
                    <select required id="genero" name="genero" class="materialize-textarea">
                      <option disabled selected >Seleccione un genero</option>
                      @foreach($gender as $g)
               <option value="{{$g->id}}">{{$g->gender}}</option>
                      @endforeach
                    </select>
                    @error('genero')
                                    <span  role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                    
                </div>    
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <div class="file-field input-field">
                        <div class="btn">
                          <span>Imagen</span>
                          <input accept="image/x-png,image/gif,image/jpeg" type="file" id="image" name="imagen">
                        </div>
                        <div class="file-path-wrapper">
                          <input class="file-path validate"  id="imagen" name="imagen" type="text">
                        </div>
                      </div>
                      @error('imagen')
                                    <span  role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                </div>    
            </div>

              <div class="row">
              	<div class="col s12 center-align">
              		<button class="btn waves-effect waves-light" type="submit" name="action">Guardar
                   
                </button>
              	</div>
                
              </div>
        </form>
    </div>
   </div>
   </div>
   <script type="text/javascript">


    $(document).ready(function(){
        $('select').formSelect();
    
        
       
        $('#categoria').change(function()
        {
          
          if($(this).find('option:selected').text() != 'ninguna')
          {
            $('#nombre').val('');
            $("#nombre").prop('disabled', true);

          }
          else
          {
           $("#nombre").prop('disabled', false);
          }

        });


      });
    </script>
    



@endsection  