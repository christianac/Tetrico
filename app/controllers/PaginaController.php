<?php

class PaginaController extends BaseController {

	public function getIndex(){
	
				//return View::make('crearPagina');
	}

	public function postCreate()
	{
		$rules = array(
			'contenido' => 'required',
			'id' => 'required',
		);
		$validation = Validator::make(Input::all(), $rules);
		if($validation->fails())
		{
			return Redirect::to(URL::to('crearPaginas/'.Input::get('id')));
		}
		$pagina = new Pagina;
		$pagina->pk_relato = Input::get('id');
		$pagina->texto = Input::get('contenido');
		$pagina->save();
		return Redirect::to(URL::to('crearPaginas/'.Input::get('id')));
	}

	public function postPublicar()
	{
		$rules = array(
			'pas' => 'required',
			'id' => 'required',
		);
		$validation = Validator::make(Input::all(), $rules);
		if($validation->fails())
		{
			//return Redirect::to(URL::to('crearPaginas/'.Input::get('id')));
		}
		if(Input::get('pas') == 'paramore761'){
				$relato_id = Input::get('id');
				DB::table('relato')->where('pk_relato', $relato_id)->update(array('publico'=>1));
				// asi se vuelve publico :v
				return Redirect::to(URL::to('/'));
		}
		else{
			echo ' lol';
		}
	}

	public function postEditar()
	{
		$rules = array(
			'texto' => 'required',
			'id' => 'required',
			'id_pagina' => 'required',
		);
		$validation = Validator::make(Input::all(), $rules);
		if($validation->fails())
		{
			//return Redirect::to(URL::to('crearPaginas/'.Input::get('id')));
		}
			$relato_id = Input::get('id');
			DB::table('pagina_relato')->where('pk_relato', $relato_id)->where('pk', '=', Input::get('id_pagina'))->update(array('texto'=>Input::get('texto')));
			// asi se vuelve publico :v
			return Redirect::to(URL::to('leer_pag/'.$relato_id.'/'.Input::get('id_pagina')));
	}

}

?>