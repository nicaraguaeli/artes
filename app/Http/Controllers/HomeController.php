<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\Order;
use App\Image;
use App\Product;
use App\Category;
use App\Crop\Crop;
use App\Customizes;
use App\Gender;
use App\picture;
use App\pedido\pedido;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

     
      
      
        
        
        return view('artesview.home');
    }
        

        
    
    public function categorias()
    {
       
       $gender = Gender::all();
       
         
       
       return view('artesview.categorias')->with('gen',$gender);
    }


     public function preview($idc)
    {
      
        $articulos = Product::where([['category_gender_id',$idc],['estado','1']])
        ->paginate(6);
         
         
         $cat = DB::table('category_gender as cg')
        ->select('cg.id as cgid','g.gender','cat.nombre')
        ->where([['cg.id',$idc],['cg.estado','1']])
        ->join('genders as g','cg.gender_id','=','g.id')
        ->join('categories as cat', 'cg.category_id','=','cat.id')->get();
       
          
       
        
        return view('artesview.preview')->with('articulos',$articulos)->with('cat',$cat);


        
      
    }

    public function catal($id)
    {
       
      $articulos = Product::find($id);

      $size = DB::table('sizes')->find($articulos->size_id);
      
      $tallas = explode('-', $size->sizes);
          
      return view('artesview.catal')->with('ar',$articulos)->with('size',$tallas);

    }

    public function pedido(Request $request)
    {
          
            Request()->validate([
            'cantidad' => 'required',
            'talla' => 'required',
            'color' => 'required',
            'idsucursal' => 'nullable',
]);


           
       $order = new pedido;
       
       if(Auth::user()->rol == 'cliente')
       {
           
          dd(Request());
          $order->pedido($request);

           return Redirect::back()->withErrors(['Agregado Correctamente','a mis pedidos']);     

       }else
       {
        
           $order->pedidotienda($request);


             return Redirect::back()->withErrors(['Agregado Correctamente','a mis pedidos']);

       }
      
 
     // return view('artesview.catal')->with('ar',$articulos);
    }

    public function list()
    {
      
    if(Request()->id)
      {
         
         
      $de_pe = Order::find(Request()->id);         
      

     
      $imagenes = DB::table('picture_product')->join('pictures','picture_product.picture_id','=','pictures.id')->get();

      return view('artesview.pedidos.list')->with('pedidos',$de_pe)->with('bool',true)->with('img',$imagenes);

      }else


      {

        $pedidos = DB::table('orders')->where([
    ['user_id', '=', Auth::user()->id],
    ['pendiente', '=', '1'],
      ])->first();
      
      $de_pe = Order::find($pedidos->id); 

    

      $imagenes = DB::table('picture_product')->join('pictures','picture_product.picture_id','=','pictures.id')->get();
     
     

      return view('artesview.pedidos.list')->with('pedidos',$de_pe)->with('bool',false)->with('img',$imagenes);

      };

    
    }

    public function retirar($id)
    {
         
    
    DB::table('order_product')->where('id', '=',$id )->delete();

    $pedido = DB::table('orders')->where([
    ['user_id', '=', Auth::user()->id],
    ['pendiente', '=', '1'],
      ])->first();

    if (DB::table('order_product')->where('order_id', '=',$pedido->id )->count() == 0) {
      # code...
      DB::table('orders')->where('id', '=',$pedido->id )->delete();
      $temp = DB::table('temp')->where('usuario',Auth::user()->id)->delete();
      
      return redirect()->route('home');

    }else
    {
      return Redirect::back()->withErrors(['Articulo Retirado']);
    }

      
       
   
    }
         

    public function enviar()
    {
          


                         
    $orden = Order::where('user_id',Auth::user()->id)->where('pendiente','1')->first();
          


          if(Auth::user()->rol == 'tienda')
          {
             Order::find($orden->id)->update(['pendiente'=>'0','enviado'=>'1']);
          }
          else
          {
            Order::find($orden->id)->update(['pendiente'=>'0','enviado'=>'1','tipo'=>'1']);
            $temp = DB::table('temp')->where('usuario',Auth::user()->id)->delete();
          }
               
          

      
          


    return redirect('pedidosreal')->withErrors(['Tú pedido a sido enviado, pronto nos contararemos contigo !']);

    }
    public function pedidosreal()
    {

        
        if(Auth::user()->rol == 'admin')
         {


          $pedido = DB::table('orders as o')->select('o.user_id','o.id as idped', 'o.created_at','us.name','us.telefono','o.confirmado', 's.ubicacion')->join('stores as s','o.store_id','=','s.id')->join('users as us','o.user_id','=','us.id')->where([['enviado','1'],['tipo','0']])->paginate(10);
          
          
         
          
         $s = DB::table('users')->get();
            
          
      
       return view('artesview.pedidos.pedidosreal')
       ->with('pr',$pedido)->with('usuarios',$s);
         }
         else
         {
          
          
          $pedido = DB::table('orders')
       
       ->where([
    ['user_id', '=', Auth::user()->id],
    ['pendiente', '=', '0'],
      ])->orderBy('id','desc')->paginate(10);
            
      
       return view('artesview.pedidos.pedidosreal')
       ->with('pr',$pedido);
         }

       
    }

    public function orderCustomView(){
      return view('artesview.pedidos.custom');
    }
    
    public function storePersonalizados(Request $request){
      
      $file=$request->file('imagen');
      if ($request->file('imagen')) {          
        //$name= time().'.'.$key->getClientOriginalExtension();
      // $path=public_path(('/img/article/'),$name);
          $tiempo = time().'.'.$file->getClientOriginalExtension();      
          $crop = new crop;
          $crop->cortador($file, public_path('img/article/'),1280, 'ped_Custom-'.$tiempo);
         
          $crop->cortador($file, public_path('img/thumbnail/'),500, 'tbl-'.$tiempo); 
      }
      $pedido=new Customizes();
      $pedido->pendiente='0';
      $pedido->enviado='1';
      $pedido->confirmado='0';
      $pedido->tipo='0';
      $pedido->user_id=Auth::user()->id;
      $pedido->save();
      $pictures=new Picture();
      $pictures->imagen= '/img/article/ped_Custom-'.$tiempo;
      $pictures->thumbnail= '/img/thumbnail/tbl-'.$tiempo;   
      $pictures->save();
      DB::table('customize_picture')->insert(['created_at'=>now(),'customize_id'=>$pedido->id,'picture_id'=>$pictures->id,'descripcion'=>$request->descripcion]);
      return back()->with('Exito','Pedido procesado correctamente');
    }

}
