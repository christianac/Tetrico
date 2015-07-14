<?php

class EnviarController extends BaseController {

	public function getIndex(){
	
				return View::make('enviar');
	}

	public function postCreate()
	{
		$rules = array(
			'user' => 'required|max:100',
			'ubi' => 'required',
			'gen' => 'required',
			'nom_rel' => 'required',
			);
		if(Input::get('acc') == '1'){
			$file = Input::file('ubi');
			$enviado = new Enviado;
			$enviado->user = Input::get('user');
			$enviado->ubicacion = "archivos/".$file->getClientOriginalName();
			$enviado->genero = Input::get('gen');
			$enviado->nom_rel = Input::get('nom_rel');
			$enviado->save();
			$file->move("archivos",$file->getClientOriginalName());
			return Redirect::to('/')->with('error_envio', false);
		}
		else
			return Redirect::to('enviar')->with('error_envio', true);
	}

}

?>