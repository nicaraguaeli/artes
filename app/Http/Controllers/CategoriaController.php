<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Gender;
use Auth;
use Illuminate\Support\Facades\DB;
use App\crop\crop;
use App\Picture;
use App\Category_gender;
use App\pedido\storeCat;



class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categorias = DB::table('category_gender as cg')
                       ->select('cg.id','g.gender','c.nombre')
                       ->join('genders as g','cg.gender_id','=', 'g.id')
                       ->join('categories as c','cg.category_id','=', 'c.id')->where('cg.estado','1')
                       ->paginate(5);
                      




        return view('artesview.categoria.index',compact('categorias'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $gender= Gender::all();
        $cat= Category::all();
        
      return view('artesview.categoria.create')->with('gender',$gender)->with('cat',$cat);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        

        $storeCat = new storeCat;

        if(Request()->categoria == 'ninguna')
       {      
             Request()->validate([
        'nombre' => 'unique:categories|required',
        'genero' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|mimes:jpeg,png,jpg,gif',
        

    ]);

              $storeCat->almacenar(Request());
              return redirect()->route('categoria.index')->with('success','Categoria nueva creada!.');
       }else
       {
        Request()->validate([
        'categoria' => 'required',
        'genero' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        

    ]);

       }
            $val = $storeCat->almacenarDos(Request());
            if($val == '0')
            {
               return redirect()->route('categoria.index')->with('success','La categoria ya existe!.');
            }
            else
            {
              return redirect()->route('categoria.index')->with('success','Categoria nueva creada!.');
            }
            
            

       
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
         $categorias = DB::table('category_gender as cg')
                       ->select('g.gender','c.nombre','cg.descripcion','cg.imagen')
                       ->join('genders as g','cg.gender_id','=', 'g.id')
                       ->join('categories as c','cg.category_id','=', 'c.id')->where('cg.estado','1')
                       ->first();
                      




        return view('artesview.categoria.show')->with('categoria',$categorias);
        
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

        $categorias = DB::table('category_gender as cg')
                       ->where([['cg.id',$id],['cg.estado','1']])
                       ->select('cg.id','g.gender','c.nombre','imagen','cg.descripcion','c.id as idcat')
                       ->join('genders as g','cg.gender_id','=', 'g.id')
                       ->join('categories as c','cg.category_id','=', 'c.id')
                       ->first();
       
        return view('artesview.categoria.edit')->with('categorias',$categorias);
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
        'nombre' => 'required',       
        'descripcion' => 'required',
    ]);

          $cat_gen = Category_gender::find($id);
          $cat = Category::find(Request()->idcat);
        
        if (Request()->file('imagen'))
        {
           
          
          if(file_exists(public_path($cat_gen->imagen))){
                    unlink(public_path($cat_gen->imagen));
                    };
          
           
          
          
           

          $file = Request()->file('imagen');

          $tiempo = time().'.'.$file->getClientOriginalExtension();      
          $crop = new crop;
          $crop->cortador($file, public_path('img/thumbnail/'),60, 'tbl-'.$tiempo);

          $cat_gen->descripcion = Request()->descripcion;
          $cat_gen->imagen = '/img/thumbnail/tbl-'.$tiempo;
          $cat_gen->save();

          $cat->nombre = Request()->nombre;
          $cat->save();

         return redirect()->route('categoria.index')->with('success','Categoria Actualizada!.');


        }
        else
        {
          $cat_gen->descripcion = Request()->descripcion;
          $cat_gen->save();
         
          $cat->nombre = Request()->nombre;
          $cat->save();

         return redirect()->route('categoria.index')->with('success','Categoria Actualizada!.');

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
}
