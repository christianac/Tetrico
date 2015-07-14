<?php

class StaffLogin extends BaseController {

	public function user()
	{
		$userdata = array(
			'id_personal' => Input::get('username'),
			'password' => Input::get('password')
		 );

		if(Auth::attempt($userdata))
		{
			return Redirect::to('/');
		}
		else
		{
			return Redirect::to('/t_admin')->with('login_errors', true);
		}
	}

	
}

?>