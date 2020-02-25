<?php
use App\Events\NewOrder;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => ['admin']], function () {
    //
Route::resource('categoria','CategoriaController');
Route::resource('usuario','UserController');
Route::resource('product','ProductController');
Route::get('/retirarImagen','ProductController@retirarImagen')->name('retirarImagen');

});








Route::get('/', function () {
    return view('/home');
});
Route::get('/test', function () {
    return view('test');
});

Route::get('/sender', function () {
   


  event(new NewOrder(Request()->texto));

});
 


Auth::routes();

Route::get('/temp', function () {
    

    
    $temp = DB::table('temp')->where([['usuario',Auth::user()->id],['store',Request()->sucursal]])->get();
   
    


   if($temp->isEmpty())
   {
	   	DB::table('temp')
	   ->insert(
	    ['usuario'=> Auth::user()->id,'store' => Request()->sucursal, ]);

	   return redirect()->route('categorias');
   }
   else
   {
   	  DB::table('temp')->where([['usuario',Auth::user()->id],['store',Request()->sucursal]])->delete();

   	  DB::table('temp')
	   ->insert(
	    ['usuario'=> Auth::user()->id,'store' => Request()->sucursal, ]);

	   return redirect()->route('categorias');
   }

    

})->name('temp');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/preview/{idc}','HomeController@preview')->name('preview');
Route::get('/catal/{id}','HomeController@catal');
Route::post('/pedido','HomeController@pedido')->name('pedido');

Route::get('/list','HomeController@list');
Route::get('/retirar/{id}','HomeController@retirar');

Route::get('/enviar','HomeController@enviar');
Route::get('/pedidosreal','HomeController@pedidosreal')->name('pedidosreal');

Route::get('/categorias','HomeController@categorias')->name('categorias');
Route::get('/switchUpdate',function()
{
	
	DB::table('orders')
            ->where('id', Request()->id)
            ->update(['confirmado' => '1']);

   


});

Route::get('/switchDelete',function()
{
	
	DB::table('order_product')->where('order_id', '=',Request()->id )->delete();
	DB::table('orders')->where('id', '=',Request()->id )->delete();

   return "El pedido a sido retirado!.";

});

Route::get('/colores',function()
{

  DB::table('colors')->updateOrinsert(['nombre_c'=> Request()->id]);

  //DB::table('colors')->insert(['nombre_c'=> Request()->id]);
  
  return "Color agregado a la biblioteca";
   


});

Route::resource('/admin', 'AdminController');
Route::get('admincategorias','AdminController@viewCategory')->name('viewCategory');
Route::get('/addstoreuser', 'HomeController@addstoreuser')->name('addstoreuser');

//Route::get('product','AdminController@viewProduct')->name('viewProducts');
//Route::post('/products','AdminController@storeProductos')->name('storeProductos');
//Route::get('/lisProduct','AdminController@listarProduct')->name('listarProduct');


//Route::post('/updateProducts','AdminController@updateProducts')->name('updateProducts');


Route::get('listCustom','HomeController@listCusto')->name('listCustom');
Route::get('ArtePersonalizados','HomeController@orderCustomView')->name('ArteCustom');
Route::post('storePersonalizados','HomeController@storePersonalizados')->name('storePersonalizados');