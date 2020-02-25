 @extends('layout.layout')
 @section('main')                     
 
 @include('partial.header')    
 
 <div style="position: relative; top: 100px;">
 	<div class="container">
    <div class="row"> 
      <div class="col s12">

            <h6 class="center-align"> ¡ ACTUALIZAR USUARIO ¡ <br>
            Actualizar la informacion de usuario </h6>
            @if($errors->any())

               <script>
              Android.showToast("{{$errors->first()}}");
              </script>
    @endif
        </div>
      
    </div>
    
        
        <form method="post" action="{{route('usuario.update',$usuario->id)}}" >
        
        @csrf

        @method('PUT')
            
           
            
            <div class="row">
                <div class="input-field col s12">
                   <input type="hidden" name="id" value="{{$usuario->id}}">
                    <input value="{{$usuario->name}}" class="validate"  type="text" id="nombre" name="nombre">    
                    <label for="nombre">Nombre usuario </label>@error('nombre')
                                    <span  role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                </div>     
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input maxlength="8" value="{{$usuario->telefono}}" class="validate"  type="number" id="telefono" name="telefono">    
                    <label for="telefono">Telefono </label>@error('telefono')
                                    <span  role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                </div>     
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input value="{{$usuario->email}}" class="validate"  type="email" id="email" name="email">    
                    <label for="email">Correo</label>@error('email')
                                    <span  role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                </div>     
            </div>

            <div class="row">
            
              <div class="input-field col s12">
              <select id="rol" name="rol">
                
                <option >cliente</option>
                <option >tienda</option>
            
              </select>
                <label for="rol">Roles</label>
              
            </div>

            
          </div>
           
           <div class="row" id="addinput">
                  
            </div>
            
            <div class="row">
              <div class="col s12 center-align">
                 <!-- Modal Trigger -->
  <a class=" modal-trigger" href="#modal1">Cambiar contraseña?</a>
              </div>
            

               
            </div>
             
            
              
                
           
            
            
            

              <div class="row">
                <div class="col s6 center-align">
                  <a class="btn waves-effect waves-light" href="{{route('usuario.index')}}">Cancelar
                   
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



  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Cambio de Contraseña</h4>
      <p>Escriba la nueva contraseña</p>
      
      <form action="{{route('usuario.store')}}" method="post">
        @csrf

         <input type="hidden" name="id" value="{{$usuario->id}}">
         <div class="input-field col s12">
                                <label for="password" >{{ __('Password') }}</label>
                           
                            

                            
                                <input id="password" type="password"  name="password" required autocomplete="new-password">
<div class="select-label">
    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
</div>
                                
                           </div>  
                       <div class="input-field col s12">
                            <label for="password-confirm" >{{ __('Confirm Password') }}</label>
                       
                           

                            
                                <input id="password-confirm" type="password"  name="password_confirmation" required autocomplete="new-password">
                         </div>
     
    </div>
    <div class="modal-footer">
      <button type="submit" class=" waves-effect waves-green btn-flat">Proceder</button> 
      </form>
    </div>
  </div>
         
<script type="text/javascript">
 

$(document).ready(function(){
    
    
  $('select').formSelect(); 
   $('.modal').modal();

  });
  
  $('#rol').change(function()
        {
          
          if($(this).find('option:selected').text() == 'cliente')
          {
            $("#addinputinner").remove();
          }
          else
          {
              $( "#addinput" ).append("<div id='addinputinner' class='input-field col s12'><input class='validate' type='text'id='ubicacion 'name='ubicacion' ><label for='ubicacion'>add PDV ejemplo(camoapa,chontales,chinandega etc.) </label>@error('ubicacion')<span  role='alert'<strong>{{ $message }}</strong></span>@enderror</div>");
          }

        });
  

</script>      

              
                       
                        
@endsection 

                 