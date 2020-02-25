    @extends('layout.layout')
@section('main')
@include('partial.header')


<div style="position: relative; top: 100px;">
  

   <div class="container">
    <div class="row"> 
      <div class="col s12">

            <h6 class="center-align"> ¡ ACTUALIZAR CATEGORIA ¡ <br>
            Actualizacion de categoria </h6>

        </div>
      
    </div>
    <div class="row">
        
        <form method="post" action="{{route('categoria.update',$categorias->id)}}"  enctype="multipart/form-data">
        
        @csrf

        @method('PUT')
            
           
            
            <div class="row">
                <div class="input-field col s12">
                    <input value="{{$categorias->nombre}}" class="validate"  type="text" id="nombre" name="nombre">    
                    <label for="nombre">Nombre categoria </label>@error('nombre')
                                    <span  role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                </div>     
            </div>
            <div class="row">
                <div class="col s12">
                         <textarea id="descripcion" name="descripcion" class="materialize-textarea">{{$categorias->descripcion}}</textarea>
                    <label for="descripcion">Descripcion</label>
                </div>    
                </div>    
                 @error('descripcion')
                                    <span  role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
            </div>
             <div class="row">
             	<div class="file-field input-field col s12">
                        <div class="btn">
                          <span>Cambiar Imagen</span>
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
            
                <div class="input-field col s12">
                    <img src="{{asset(''.$categorias->imagen)}}" alt="">
                 
                </div>
                
           
            
            
            
<input type="hidden" value="{{$categorias->idcat}} " name="idcat">
              <div class="row">
              	<div class="col s6 center-align">
              		<a class="btn waves-effect waves-light" href="{{route('categoria.index')}}">Cancelar
                   
                </a>
              	</div>
                 <div class="col s6 center-align">
              		<button class="btn waves-effect waves-light" type="submit" name="action">Proceder
                   
                </button>
              	</div>
                
              </div>
             
              </div>
        </form>
    </div>
   </div>
   </div>
   
    


@endsection  