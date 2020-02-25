<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\crop\crop;
use App\Product;
use App\Picture;
use App\Category;
use App\Category_gender;
use App\Gender;
use App\store;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProductRequest;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    

   

    public function viewProduct(){
      
      
      if(Request()->id)
        {
          
          
       

      $productos = DB::table('products')->find(Request()->id);

         

      $categoria=DB::table('category_gender as cg')->join('categories as cat','cg.category_id','=','cat.id')->join('genders as g','cg.gender_id','=','g.id')->select('cg.id','cat.nombre','g.gender')->where('cg.estado','1')->get();
      
      $talla=DB::table('sizes')->select('id','nombre_s','sizes')->get();
      
       $colores = DB::table('colors')->get();
       $pictures = DB::table('picture_product')->join('pictures','picture_product.picture_id','=','pictures.id')->where('product_id',Request()->id)->get();

       

  return view('artesview.admin.product')->with('categoria',$categoria)->with('talla',$talla)->with('colores',$colores)->with('productos',$productos)->with('pictures',$pictures)->with('edit',true); 



        }
        else
        {
            
      $categoria=DB::table('category_gender as cg')->join('categories as cat','cg.category_id','=','cat.id')->join('genders as g','cg.gender_id','=','g.id')->select('cg.id','cat.nombre','g.gender')->where('cg.estado','1')->get();
      
      $talla=DB::table('sizes')->select('id','nombre_s','sizes')->get();
      
      $colores = DB::table('colors')->get();

      return view('artesview.admin.product')->with('categoria',$categoria)->with('talla',$talla)->with('colores',$colores)->with('edit',false);          
        }
     

    }

    
    
    
      
    	

    
    

    

}
