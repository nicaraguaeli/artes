@extends('layout.layout')

@section('main')

               <div class="container">

                <div class="select-pdv">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                              <div class="row">
        
        
      </div>
                          <div class="row">
                          <div class="input-field col s12">
                                <label for="name" >{{ __('Name') }}</label>
                          
                          

                            
                                <input id="name" type="text"  name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                               </div> 
                            </div>
                        

                          <div class="input-field col s12">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                         
                          

                           
                                <input id="email" type="email"  name="email" value="{{ old('email') }}" required autocomplete="email">
<div class="select-label">
  @error('email')
                                    <span  role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
</div>
                                 </div>
                          
                          <div class=" input-field col s12">
                                <label for="telefono">{{ __('telefono') }}</label>
                          
                          

                           
                                <input id="telefono" type="number" maxlength="8" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono">
<div class="select-label">
  @error('telefono')  
                                    <span  role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
</div>  
</div>
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
        <div class="select-btn">
             <button type="submit" >
                                    {{ __('Registrar') }}
                                </button>
        </div>
                       
                               

                            </form>

                        </div>
                         
       </div>
@endsection
