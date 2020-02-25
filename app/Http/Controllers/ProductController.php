<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\ProductRequest;
use App\crop\crop;
use App\Product;
use App\Picture;
use App\Category;
use App\Category_gender;
use App\Gender;
use App\store;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos=DB::table('products as p')
      ->join('category_gender as cat','cat.category_id','=','p.category_gender_id')
      ->join('sizes as s','s.id','=','p.size_id')->select('p.id','p.codigo','p.nombre','p.precio','p.descripcion','p.materiales')->paginate(10);
          
     
    
      return view('artesview.product.index',compact('productos'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $categoria=DB::table('category_gender as cg')->join('categories as cat','cg.category_id','=','cat.id')->join('genders as g','cg.gender_id','=','g.id')->select('cg.id','cat.nombre','g.gender')->where('cg.estado','1')->get();
      
      $talla=DB::table('sizes')->select('id','nombre_s','sizes')->get();
      
      $colores = DB::table('colors')->get();

      return view('artesview.product.create')->with('categoria',$categoria)->with('talla',$talla)->with('colores',$colores);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //

         DB::transaction(function () {
         
           
           $request = new ProductRequest();
           $request = Request();


            
        
         try {
               
            
            $productos = new Product();
            $productos->codigo=$request->codigo;
            $productos->nombre=$request->nombre;
            $productos->descripcion=$request->descripcion;
            $productos->precio=$request->precio;
            $productos->materiales=$request->materiales;
            $productos->descripcion=$request->descripcion;
            $productos->category_gender_id=$request->category_gender_id;
            $productos->size_id=$request->size_id;
            $productos->expiracion= now()->addDay(15);
            $productos->save();
        
           
           

        
        foreach ($request->file('imagen') as $key) {
        
          if ($request->file('imagen')) {          
            //$name= time().'.'.$key->getClientOriginalExtension();
          // $path=public_path(('/img/article/'),$name);
              $tiempo = time().'.'.$key->getClientOriginalExtension();      
              $crop = new crop;
              $crop->cortador($key, public_path('img/article/'),1280, 'img-'.$tiempo);
             
              $crop->cortador($key, public_path('img/thumbnail/'),500, 'tbl-'.$tiempo); 
          }

          
          $pictures=new Picture();
          $pictures->imagen= '/img/article/img-'.$tiempo;
          $pictures->thumbnail= '/img/thumbnail/tbl-'.$tiempo;   
          $pictures->save();

          DB::table('picture_product')->insert(['product_id'=>$productos->id,'picture_id' => $pictures->id]);
          
        }
        foreach ($request->colores as $key) {
          # code...
             
             DB::table('color_product')->insert(['color_id'=> $key,'product_id'=> $productos->id]);

        }

          } catch (\Illuminate\Database\QueryException $e) {
              
              dd($e->errorInfo);
             
         } 
      });

         return redirect()->route('product.index')->with('success','Producto Creado!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
      $productos = Product::find($id);

         

      $categoria=DB::table('category_gender as cg')->join('categories as cat','cg.category_id','=','cat.id')->join('genders as g','cg.gender_id','=','g.id')->select('cg.id','cat.nombre','g.gender')->where('cg.estado','1')->get();
      
       $talla=DB::table('sizes')->select('id','nombre_s','sizes')->get();
      
       $colores = DB::table('colors')->get();
       $pictures = DB::table('picture_product')->join('pictures','picture_product.picture_id','=','pictures.id')->where('product_id',$id)->get();

     

  return view('artesview.product.edit')->with('categoria',$categoria)->with('talla',$talla)->with('colores',$colores)->with('productos',$productos)->with('pictures',$pictures); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

      
         Request()->validate([
        'codigo' => 'required',
        'nombre' => 'required',       
        'descripcion' => 'required',
        'precio' => 'required',
        'materiales' => 'required',
        'category_gender_id' => 'required',
        'size_id' => 'required',

    ]);

         try {

             //Inicio Transaccion
    DB::transaction(function () {
         
           
          
        $request = Request();
           

       
            
        
  
         if (Request()->file('imagen')) 
         {

                    $productos = new Product();
                    $productos = Product::find(Request()->id);
                    
                    $productos->codigo=$request->codigo;
                    $productos->nombre=$request->nombre;
                    $productos->precio=$request->precio;
                    $productos->materiales=$request->materiales;
                    $productos->descripcion=$request->descripcion;
                    $productos->category_gender_id=$request->category_gender_id;
                    $productos->size_id=$request->size_id;
                    $productos->save();

                    foreach ($request->file('imagen') as $key) 
                    {
                
          
                      //$name= time().'.'.$key->getClientOriginalExtension();
                       // $path=public_path(('/img/article/'),$name);
                      $tiempo = time().'.'.$key->getClientOriginalExtension();      
                      $crop = new crop;
                      $crop->cortador($key, public_path('img/article/'),1280, 'img-'.$tiempo);
                     
                      $crop->cortador($key, public_path('img/thumbnail/'),500, 'tbl-'.$tiempo); 
                  
                      $pictures=new Picture();
                      $pictures->imagen= '/img/article/img-'.$tiempo;
                      $pictures->thumbnail= '/img/thumbnail/tbl-'.$tiempo;   
                      $pictures->save();

                      DB::table('picture_product')->insert(['product_id'=>$productos->id,'picture_id' => $pictures->id]);

                     }

                   foreach ($request->colores as $key)
                    {
                     # code...
                     
                     DB::table('color_product')->updateOrinsert(['color_id'=> $key,'product_id'=> $productos->id]);
          
                    }

                       


        }else
        {
            $productos = new Product();
            $productos = Product::find(Request()->id);
            
            $productos->codigo=$request->codigo;
            $productos->nombre=$request->nombre;
            $productos->precio=$request->precio;
            $productos->materiales=$request->materiales;
            $productos->descripcion=$request->descripcion;
            $productos->category_gender_id=$request->category_gender_id;
            $productos->size_id=$request->size_id;
            $productos->save();

            foreach ($request->colores as $key)
             {
             # code...
             
         DB::table('color_product')->updateOrinsert(['color_id'=> $key,'product_id'=> $productos->id]);
             }
               
  
        
        
    
        
           
            
        }
        //Fin if
         
      });
     //fin trasaccion
     
       return redirect()->route('product.index')->with('success','El producto a sido actualizado!.');
             
         } catch (\Illuminate\Database\QueryException $e) {
             
             return redirect()->route('product.index')->with('success','El codigo del producto ya existe!.');
         }
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function retirarImagen()
    {

         $count = DB::table('picture_product')->where('product_id', '=',Request()->idpr )->Count();

         if($count > '1' )
         {
                    $url = Picture::find(Request()->idim);


                    if(file_exists(public_path($url->imagen))){
                    unlink(public_path($url->imagen));
                    };

                    if(file_exists(public_path($url->thumbnail))){
                    unlink(public_path($url->thumbnail));
                    };


                    $url->delete();

                    return "La imagen a sido retirada";

         }
         else
         {
              return "El minimo de imagen es 1";
         }
    }

}
