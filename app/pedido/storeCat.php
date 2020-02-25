<?php

namespace App\Pedido;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Gender;
use App\Category;
use App\crop\crop;
use App\Category_gender;
class storeCat

{
  

  function almacenar(Request $request)
  {
     
    
      
       
      DB::transaction(function()
      {
         
        
         $file = Request()->file('imagen');

         if (Request()->file('imagen')) {          
        
          $tiempo = time().'.'.$file->getClientOriginalExtension();      
          $crop = new crop;
          $crop->cortador($file, public_path('img/thumbnail/'),60, 'tbl-'.$tiempo); 

          

      $categoria= new Category();

      

      $categoria->nombre=Request()->nombre;
      $categoria->save();

      $category_gender= new Category_gender();
      $category_gender->imagen='/img/thumbnail/tbl-'.$tiempo;
      $category_gender->descripcion=Request()->descripcion;
      $category_gender->category_id=$categoria->id;
      $category_gender->gender_id= Request()->genero;
      $category_gender->save();

          
       

      return redirect()->route('categoria.index')->with('success','Categoria nueva creada!.');


      }

       });
  
        


  			
  }
  function almacenarDos(Request $request)
  {


    $categorias = DB::table('category_gender as cg')
                       ->select('cg.id','g.gender','c.nombre')
                       ->join('genders as g','cg.gender_id','=', 'g.id')
                       ->join('categories as c','cg.category_id','=', 'c.id')->where('cg.estado','1')
                       ->get();

         
         $genero =  Gender::find(Request()->genero);
         $cate =    Category::find(Request()->categoria);                
         $bool = false;
          
         foreach ($categorias as $key) {
            # code...
            if($cate->nombre == $key->nombre && $genero->gender == $key->gender )
              {
              
              $bool= true;
               
             }
            

        }
   
        if($bool == false)
        {
          $file=$request->file('imagen');

      if (Request()->file('imagen')) {          
        
          $tiempo = time().'.'.$file->getClientOriginalExtension();      
          $crop = new crop;
          $crop->cortador($file, public_path('img/thumbnail/'),60, 'tbl-'.$tiempo);

        $category_gender= new Category_gender();
        $category_gender->imagen='/img/thumbnail/tbl-'.$tiempo;
        $category_gender->descripcion=Request()->descripcion;
        $category_gender->category_id=Request()->categoria;
        $category_gender->gender_id=Request()->genero;
        $category_gender->save();

         
      }
     
      
      


        }else
        {
          return '0';
        }

      
     
  }
}