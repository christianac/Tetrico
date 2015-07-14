<?php

class CrearPaginaController extends BaseController {

	public function getIndex(){
	
				return View::make('crearPagina');
	}

	public function postCreate()
	{
		$rules = array(
			'user' => 'required|max:100',
			'ubi' => 'required',
			'gen' => 'required',
			'nom_rel' => 'required',
			);
		$file = Input::file('ubi');
		$enviado = new Enviado;
		$enviado->user = Input::get('user');
		$enviado->ubicacion = "archivos/".$file->getClientOriginalName();
		$enviado->genero = Input::get('gen');
		$enviado->nom_rel = Input::get('nom_rel');
		$enviado->save();
		$file->move("archivos",$file->getClientOriginalName());
		return Redirect::to('/')->with('status','ok_create');
	}

}

?>