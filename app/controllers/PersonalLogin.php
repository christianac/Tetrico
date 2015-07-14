<?php

class PersonalLogin extends BaseController {

	public function user()
	{
		$userdata = array(
			'id_personal' => Input::get('username'),
			'password' => Input::get('password')
		 );

		if(Auth::attempt($userdata))
		{
			return Redirect::to('admin');
		}
		else
		{
			return Redirect::to('/')->with('login_errors', true);
		}
	}

	
}

?>