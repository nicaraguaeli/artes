@extends('layout.layout')

@section('main')


                <div class="select-pdv "> 

                <div class="container">
                    
                      <div class="row">
    <form class="col s12" method="post" action="{{ route('login') }}">
        @csrf
      <div class="row">
        
        <div class="input-field col s12">
          <i class="material-icons prefix">phone</i>
          <input maxlength="8" id="telefono" type="tel" class="validate" name="telefono">
          <label for="telefono">Teléfono</label>
          <div class="select-label">
      @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
</div>
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s12">
        <i class="material-icons prefix">https</i>
          <input id="password" type="password" class="validate @error('password') is-invalid @enderror" name="password">
          @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
          <label for="password">Contraseña</label>
        </div>
      </div>
      
      <div class="row">
          
  <button class="btn waves-effect waves-light" type="submit" name="action">Acceder
    <i class="material-icons right">send</i>
  </button>
        
      </div>

       <div class="select-label">
                                   
     
    </form>
  </div>

                              </div>
                </div>

                </div>
                   
                
@endsection
