<?php

class PublicarController extends BaseController {

	public function postPublicar(){

		$rel_id = Input::get('id');
		$relato = Relato::find($user_id);
		$relato->publico = '1';
		$relato->save();
		return Redirect::to('users');
	}

}

?>