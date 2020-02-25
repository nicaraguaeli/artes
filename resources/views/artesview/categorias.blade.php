@extends('layout.layout')

@section('main')
@include('partial.header')


	  

	  <div style="position: relative; top: 100px;  ">
	 
   <div class="container " >  

   <div class="seccion center-align " >  CATEGORIAS</div> 	
   
  <ul class="collapsible " style="box-shadow: none; border-left: none; border-right: none;">
    @foreach($gen as $g)
    <li>
      
      <div class="collapsible-header ">
         
         @if($g->gender == 'Hombre')
        <div style="box-shadow: none;" class="btn-floating btn-large waves-effect waves-light red"><i style="margin-left: 12px;" class="material-icons dp48">touch_app</i></div> 
        <h6 style="padding-left: 10%"> {{$g->gender}} </h6>
         @endif

         @if($g->gender == 'Mujer')
        <div style="box-shadow: none;" class="btn-floating btn-large waves-effect waves-light purple accent-1"><i style="margin-left: 12px;" class="material-icons dp48">touch_app</i></div> 
        <h6 style="padding-left: 10%"> {{$g->gender}} </h6>
         @endif

         @if($g->gender == 'Niño/a')
        <div style="box-shadow: none;" class="btn-floating btn-large waves-effect waves-light yellow"><i style="margin-left: 12px;" class="material-icons dp48">touch_app</i></div> 
        <h6 style="padding-left: 10%"> {{$g->gender}} </h6>
         @endif
          
          
        </div>


      @foreach($g->categories as $c)
      <div class="collapsible-body">

        

        <div class="row"> 
          <div style="background-image: url('{{asset(''.$c->pivot->imagen)}}'); background-size: cover; border-radius: 50%; height: 80px; width: 80px; background-position: center; " class="col s6 left-align"><
          </div>
          <div class="col s6 center-align "><a href="{{url('preview/'.$c->pivot->id)}}" style="text-align: center; font-size: 1.5rem; text-transform: uppercase; ">
            {{$c->nombre}}</a>
          </div> 

        </div>
           

      </div>
        
      @endforeach
    </li>
    @endforeach
  </ul>
        

      </ul>
    </li>

            



           

  
 

 
         

       

</div>
</div>
	  </div>


@endsection