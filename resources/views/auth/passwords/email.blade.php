@extends('layout.layout')

@section('main')

                <div class="card-header">{{ __('Reset Password') }}</div>

               
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="select-label">
                            <label for="email" >{{ __('E-Mail Address') }}</label>
                        </div>
                           
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                
                                <div class="select-label">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                
                            
                       

                       
                            <div class="select-btn">
                                <button type="submit" >
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                      
                    </form>
                

@endsection
