<header>
    <div class="header">

    	<div class="icon-menu"><i onclick="myFunction()" class="material-icons dp48" style="font-size: 2.5rem; color: white;">dehaze</i>
	</div>
    
	<div>
		@guest
       
		
		@else
         

         @if(Auth::user()->rol ==  'tienda' || Auth::user()->rol ==  'cliente')
         
        
        @php 
            $flag = -0;
        @endphp  
     
      
        @forelse ($ped as $p)

            @php 
              $flag += 1;
             @endphp  
         

                @if($p->user_id == Auth::user()->id )
         <i data-position="left" data-tooltip="Pedido en cola" style="color: chartreuse;" class="material-icons dp48 tooltipped">notifications_active</i>
                     
                     @break   
                         

                @elseif($flag == $ped->count())
          <i class="material-icons dp48">notifications
         </i>
                @endif
                       
         
          
         @empty

           <i class="material-icons dp48">notifications
         </i>

           @endforelse
         
       
          @endif            
                   
		

        <i style="padding: inherit; " onClick="window.location.reload();"  class="material-icons dp48">autorenew</i><i class="material-icons dp48">account_circle</i>
		{{ Auth::user()->name }} 

                                
                                    <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                
                            
                        @endguest

	</div>
    	
    </div>
                                  
	</header>
	 <div id="aside-menu" class="aside-menu">
	 	<ul class="collapsible">

	 		@if (Route::has('login') )

	 		
            @auth
	 		
                 @if(Auth::user()->rol == 'tienda' )
                 
                 <li><i class="material-icons dp48">archive</i> <a href="{{route('categorias')}}">Catalogo Artes</a></li> 
                    
                    @php
                    $flag = -0;
                    @endphp 

                    @forelse($ped as $p)
                    
                        @php
                        $flag += 1;
                        @endphp
                       
                                             

                        @if($p->user_id == Auth::user()->id )
                         <li class="shipping-active"><i class="material-icons dp48">local_shipping</i> <a href="{{url('list')}}">Mi Pedido </a></li>
                        @break
                        @elseif($flag == $ped->count())
                            
                            <li><i class="material-icons dp48">check</i>No tienes pedido pendiente</li>

                        @endif
                        @empty

                          <li><i class="material-icons dp48">check</i>No tienes pedido pendiente</li>

                    @endforelse

                        



                 


                    
                   
                
                 <li><i class="material-icons dp48">assignment_turned_in</i><a href="{{ route('pedidosreal') }}">Pedidos Realizados</a></li>
                 <li><i class="material-icons dp48">local_offer</i><a href="#">Pedidos a mi punto</a></li>
                  <li>
      <div style="background: transparent; padding-left: 0" class="collapsible-header"><i style="font-size: 1.7rem;" class="material-icons dp48">extension</i><a>Arte Personalizado</a></div>
      <div class="collapsible-body">
        <div class="row">
            <ul>
                <li> <i class="material-icons dp48">add_a_photo</i><a href="{{route('ArteCustom')}}">Envianos tus fotos </a></li>

                <li> <i class="material-icons dp48">search</i> <a href="{{route('viewCategory')}}">Ver mis envios</a></li>
            </ul>

           </div>

           
            

        </div>
                  </li>
                 <li></li>
                 
    <li>
      <div style="background: transparent;" class="collapsible-header"><i class="material-icons dp48">developer_mode</i>Acerca de esta app</div>
      <div class="collapsible-body"><span>Aplicacion desarrollada y diseñada por Media Design.</span></
    </li>
  
            <li><a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>

                        

                        @elseif(Auth::user()->rol == 'cliente')
                 
                         <li><i class="material-icons dp48">location_on</i><a href="{{route('home')}}">Puntos de Venta</a></li>
                          <li><i class="material-icons dp48">local_shipping</i> <a href="{{ route('pedidosreal') }}">Pedidos Realizados</a></li> 
                         

                          @php
                    $flag = -0;
                    @endphp 
                    
                    @forelse($ped as $p)
                    
                        @php
                        $flag += 1;
                        @endphp
                       
                                             

                        @if($p->user_id == Auth::user()->id )
                         <li class="shipping-active"><i class="material-icons dp48">local_shipping</i> <a href="{{url('list')}}">Mi Pedido </a></li>
                        @break
                        @elseif($flag == $ped->count())
                            
                            <li><i class="material-icons dp48">check</i>No tienes pedido pendiente</li>

                        @endif
                        @empty

                          <li><i class="material-icons dp48">check</i>No tienes pedido pendiente</li>

                    @endforelse

                          <li><div style="background: transparent; padding-left: 0" class="collapsible-header"><i style="font-size: 1.7rem;" class="material-icons dp48">extension</i><a>Arte Personalizado</a></div>
      <div class="collapsible-body">
        <div class="row">
            <ul>
                <li> <i class="material-icons dp48">add_a_photo</i><a href="{{route('ArteCustom')}}">Envianos tus fotos </a></li>

                <li> <i class="material-icons dp48">search</i> <a href="">Ver mis envios</a></li>
            </ul>

           </div>
</li>
                         <li>
      <div style="background: transparent;" class="collapsible-header"><i class="material-icons dp48">developer_mode</i>Acerca de esta app</div>
      <div class="collapsible-body"><span>Aplicacion desarrollada y diseñada por Media Design.</span></
    </li>
            <li><a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>

                        @elseif(Auth::user()->rol == 'admin')   
                        
      <li>
      <div style="background: transparent; padding-left: 0" class="collapsible-header"><i style="font-size: 1.7rem;" class="material-icons dp48">archive</i><a>Catátolo</a></div>
      <div class="collapsible-body">
        <div class="row">
            <ul>
               
                <li> <i class="material-icons dp48">add_circle</i><a href="{{route('product.index')}}"> Nuevo Articulo</a></li>

                <li> <i class="material-icons dp48">create</i> <a href="{{route('categoria.index')}}">Categorias</a></li>
                
                
            </ul>

           </div>

           
            

        </div>
          
         
          
    </li>
                        <li ><i class="material-icons dp48">local_shipping</i> <a href="{{route('pedidosreal')}}">Cola de Pedidos </a></li>
                        <li><i class="material-icons dp48">supervisor_account</i><a href="{{route('usuario.index')}}">Usuarios</a></li>
                        <li>
      <div style="background: transparent;" class="collapsible-header"><i class="material-icons dp48">developer_mode</i>Acerca de esta app</div>
      <div class="collapsible-body"><span>Aplicacion desarrollada y diseñada por Media Design. </span></
    </li>
  <li><a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>



                 @endif

            
	 		

	 		
	 		
                
                    
                       

                    @else
                    <li><i class="material-icons dp48">account_circle</i><a href="{{ route('login') }}"> Login</a></li> 
                        

                        @if (Route::has('register'))
                           
                            <li><i class="material-icons dp48">group</i><a href="{{ route('register') }}"> Registrarse</a></li> 
                        @endif
                    @endauth
                </div>
            @endif
	 	</ul>
	 </div>

     <script>
         $(document).ready(function(){
    $('.collapsible').collapsible();
     $('.tooltipped').tooltip();
  });
     </script>