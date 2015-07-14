<?php

class GuardarController extends BaseController {

	public function getIndex(){
	
				//return View::make('enviar');
	}

	public function postCreate()
	{
		$rules = array(
			'user' => 'required|max:100',
			'nom_rel' => 'required',
			'des' => 'required',
			'gen' => 'required',
			);
		$relato = new Relato;
		$relato->autor = Input::get('user');
		$relato->nombre = Input::get('nom_rel');
		$relato->descripcion = Input::get('des');
		$relato->genero = Input::get('gen');
		$relato->save();

		return Redirect::to('rev_enviados')->with('id',Input::get('id'));
	}

}

?>