<?php

namespace App\Pedido;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Store;

use App\User;

class Pedido

{
  function pedido(Request $request)
  {
     
    
     
    $pedido = DB::table('orders')
      ->where([ ['pendiente','1' ], ['user_id', Auth::user()->id] ])->doesntExist();
        

        if ($pedido) {
            # code...
    DB::transaction(function () {
    
   $temp = DB::table('temp')->where('usuario',Auth::user()->id)->first();
     
    
    $idstore = DB::table('stores')->find($temp->store);
    
    

    $id = DB::table('orders')
    ->insertGetId(
array('created_at' => now(), 'user_id' => Auth::user()->id,  'enviado' => '0', 'confirmado' 
    => '0','tipo' 
    => '1','store_id'=> $idstore->id
)
  );

   DB::table('order_product')
   ->insert(
    ['order_id'=>$id,'product_id' => Request()->ar_id, 'cantidad' => Request()->cantidad, 'talla' => Request()->talla, 'color' => Request()->color,'precio' => Request()->precio,]);

   
          


});
             

      



            
            
        
        }else
        {
          
         

          
          $id = DB::table('orders')                    
          ->where([ ['pendiente','1' ], ['user_id', Auth::user()->id] ])
          ->first();

          

          DB::table('order_product')
   ->insert(
    ['order_id'=>$id->id,'product_id' => Request()->ar_id, 'cantidad' => Request()->cantidad, 'talla' => Request()->talla, 'color' => Request()->color,'precio' => Request()->precio,]);




   //event(new NewOrder(Request()->texto));
          
              
        }


  			
  }
  function pedidotienda(Request $request)
  {
     

    $user = User::find(Auth::user()->id);
    
  
  	$pedido = DB::table('orders')
      ->where([ ['pendiente','1' ], ['user_id', Auth::user()->id] ])->doesntExist();
        

        if ($pedido) {
            # code...
    DB::transaction(function () {
    
    $user = User::find(Auth::user()->id);
    $store = Store::where('user_id',Auth::user()->id)->first();

    
   
    
     

    $id = DB::table('orders')
    ->insertGetId(
array('created_at' => now(), 'user_id' => Auth::user()->id,  'enviado' => '0', 'confirmado' 
    => '0','tipo' 
    => '0','store_id'=> $store->id
)
  );

   DB::table('order_product')
   ->insert(
    ['order_id'=>$id,'product_id' => Request()->ar_id, 'cantidad' => Request()->cantidad, 'talla' => Request()->talla, 'color' => Request()->color,'precio' => Request()->precio]);

   
            


});
                         
        
        }else
        {
          
          $id = DB::table('orders')          
          
          ->where([ ['pendiente','1' ], ['user_id', Auth::user()->id] ])
          ->first();

          

          DB::table('order_product')
   ->insert(
    ['order_id'=>$id->id,'product_id' => Request()->ar_id, 'cantidad' => Request()->cantidad, 'talla' => Request()->talla, 'color' => Request()->color,'precio' => Request()->precio,]);

   //event(new NewOrder(Request()->texto));
            
              
        }

  }


     
}