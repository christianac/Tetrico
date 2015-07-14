<?php

class RutinasController extends BaseController {

	public function getIndex()
	{
		$my_id = Auth::id();
		$user = DB::table('sujeto')->where('id', $my_id)->first();
		$cargo = Auth::user()->id_rol;

			if($cargo==5)
			{
				$users = DB::table('sujeto')->where('tipo','=','0')->get();
				$matriculas =  DB::table('matricula')
					->join('sujeto', 'matricula.id_usuario', '=', 'sujeto.id')
					->join('clases', 'matricula.id_clase', '=', 'clases.id')
					->select(
					'matricula.id',
					'clases.nombre_clase',
					'matricula.id_estado',
					'matricula.id_clase',
					'matricula.id_usuario',
					'sujeto.id as id_sujeto',
					'sujeto.name',
					'sujeto.apellido_pat',
					'sujeto.apellido_mat',
					'sujeto.dni')->get();
				return View::make('rutinas')->with('users', $users)->with('matriculas', $matriculas);
			}
			else
			{
				return View::make('error.access_denied');
			}
	}

}

?>