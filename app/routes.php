<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	$relatos = DB::table('relato')->where('publico','=','1')->orderBy('pk_relato', 'desc')->get();
	return View::make('inicio')->with('relatos', $relatos);
});

Route::get('/t_admin', function()
{
	return View::make('login');
});

Route::get('logout', function() {
	Auth::logout();
	return Redirect::to('/');
});
Route::post('login', 'StaffLogin@user');

Route::get('/rev_enviados', function()
{
	$enviados = DB::table('enviados')->where('leido','==','0')->get();
	$relatos_editados = DB::table('relato')->where('publico','=','0')->get();
	return View::make('rev_e')->with('enviados', $enviados)->with('rEditados', $relatos_editados);
});

Route::get('publicar/{enviado_id}', function($enviado_id) {
	$datos = DB::table('enviados')->where('pk','=',$enviado_id)->get();
	return View::make('publicar')->with('datos', $datos);
});

Route::controller('publicar', 'PublicarController');
Route::controller('enviar', 'EnviarController');
Route::controller('pagina', 'PaginaController');

Route::get('crearPaginas/{relato_id}', function($relato_id) {
	$paginas = DB::table('pagina_relato')->where('pk_relato', '=',$relato_id)->get();
	return View::make('crearPagina')->with('paginas', $paginas)->with('relId', $relato_id);
});

Route::controller('guardar_paso', 'GuardarController');

Route::get('leer_pag/{lectura_id}/{pagina_id}', function($lectura_id, $pagina_id) {
	$pagina = DB::table('pagina_relato')->where('pk_relato', '=',$lectura_id)->where('pk', '=', $pagina_id)->first();
	return View::make('leer_pag')->with('pagina', $pagina)->with('lectura_id', $lectura_id)->with('pagina_id', $pagina_id);
});

Route::get('editarPaginas/{relato_id}/{pagina_id}', function($relato_id, $pagina_id) {
	$pagina = DB::table('pagina_relato')->where('pk_relato', '=',$relato_id)->where('pk', '=', $pagina_id)->first();
	return View::make('editarPagina')->with('pagina', $pagina)->with('relId', $relato_id)->with('pagId', $pagina_id);
});

Route::get('deletePagina/{relato_id}/{pagina_id}', function($relato_id, $pagina_id) {
	$pagina = DB::table('pagina_relato')->where('pk_relato', '=',$relato_id)->where('pk', '=', $pagina_id)->delete();
	return Redirect::to('crearPaginas/'.$relato_id);
});

Route::get('leer/{lectura_id}', function($lectura_id) {
	$paginas = DB::table('relato')->join('pagina_relato', 'relato.pk_relato', '=', 'pagina_relato.pk_relato')
	->select('relato.nombre',
				'relato.autor',
				'pagina_relato.texto')
	->where('relato.pk_relato','=',$lectura_id)->get();
	$relato = DB::table('relato')->where('pk_relato','=',$lectura_id)->select('nombre','autor')->get();
	if(count($paginas)==0)
		return Redirect::to('/');
	else
		return View::make('book')->with('paginas', $paginas)->with('relato',$relato);
});
