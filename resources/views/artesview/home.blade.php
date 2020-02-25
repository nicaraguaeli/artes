@extends('layout.layout')
@section('main')
@include('partial.header')
 

 

 @if(Auth::user()->rol == 'cliente') 
		 @php
 $flag = -0;
 @endphp          
      
 @forelse ($ped as $p)
    
        @php
 $flag += 1;
 @endphp 


         @if($p->user_id == Auth::user()->id )
         <div style="position: relative; top: 50vh; text-align: center;">Ve a la seccion de mi pedido, Envia o Retira el pedido   pendiente!!</div>
         @break
         
         @elseif($flag == $ped->count())
            
         
            @include('partial.select')
            <h1>{{$flag}}</h1>

         @endif

          

 @empty

    @include('partial.select')

 @endforelse


  

  @else

   
  <script>window.location = "{{url('/')}}";</script>

  @endif
  	
  	


@endsection


