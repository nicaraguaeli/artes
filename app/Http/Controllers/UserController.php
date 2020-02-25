<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Redirect;
use App\Store;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $usuarios = User::where('id','!=',Auth::user()->id)->paginate(10);  



        return view('artesview.user.index',compact('usuarios'))->with('i');;


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        Request()->validate([
         
          'password' => ['required', 'string', 'min:8', 'confirmed'],
       
          ]);

       User::find(Request()->id)->update(['password'=> Hash::make($request->password)]);

       return Redirect::back()->withErrors(['Se cambio la contraseña.']);


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
        dd('aqui');
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
       
        if($id == 'telefono')
        {
            
       

        $usuario = User::where([['telefono','=',Request()->telefono],['id','!=',Auth::user()->id]])->first();

        if($usuario =='')
        {


        return Redirect::back()->withErrors(['El teléfono no se encuentra !.']);
        }
        else
        {

        return view('artesview.user.edit')->with('usuario',$usuario);
        }
        

        }
        else
        {
            $usuario = User::find($id);  
       
            return view('artesview.user.edit')->with('usuario',$usuario);
        
        }
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
        try {
             if(is_null(Request()->ubicacion) )
            {
             
          Request()->validate([
         'nombre' => 'required',
         'email' => ['required', 'string', 'email', 'max:255'],
         'telefono' => ['required','max:8'],
          
       
          ]);
             
             $usuario = User::find($id);
             $usuario->name = Request()->nombre;
             $usuario->email = Request()->email;
             $usuario->telefono = Request()->telefono;
             $usuario->save();
            

            return redirect()->route('usuario.index')->with('success','Usuario Actualizado!.');
            }
            else
            {
             
             if(Store::where('ubicacion',Request()->ubicacion)->first())
             {
                
            return redirect()->route('usuario.index')->with('success','El PDV ya existe!.');
             }
             else
             {

             DB::transaction(function () {
             
             Request()->validate([
          'nombre' => 'required',
          'email' => ['required', 'string', 'email', 'max:255'],
          'telefono' => ['required','max:8'],
           
          'rol' => 'required',
          ]);

             $usuario = User::find(Request()->id);
             
             $usuario->name = Request()->nombre;
             $usuario->email = Request()->email;
             $usuario->telefono = Request()->telefono;
             $usuario->rol = Request()->rol;
             $usuario->save();

             $store = new Store;
             $store->ubicacion = Request()->ubicacion;
             $store->user_id = Request()->id;
             $store->save();  

             });

            return redirect()->route('usuario.index')->with('success','Tienes un nuevo punto de venta!.');
             }

             
            }
            
        } catch (\Illuminate\Database\QueryException $e) {
            

            return Redirect::back()->withErrors(['El telefono o correo ya existe !.']);
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

        $user = User::find($id);

        if($user->rol == 'cliente')
        {
            $user->delete();

            return redirect()->route('usuario.index')->with('success','El usuario a sido eliminado!.');


        }else
        {

            return redirect()->route('usuario.index')->with('success','No puede eliminar el PDV!.');

            
        }
    }


}
