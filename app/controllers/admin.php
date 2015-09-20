<?php

/**
* 
*/
class Admin extends Controller
{
	public function index( $parameter = null ) {

		$this->model('User');
		$user = new User();

		$this->loginRequired($user);

		$data['TITLE'] = "Dashboard";
		$this->view('admin/dashboard.html',$data);

	}

	public function login()
	{

		$this->model('User');

		$user = new User();

		$this->logoutRequired($user);

		if( Input::exists() /*&& Token::check( Input::get( 'token' ) )*/ ) {
			$validate = new Validate();

			// Validation for Inputs
			$validation = $validate->check($_POST, array(
				'username'		=> array(
					'name'	   => 'User Name',
					'required' => true
				),
				'password'		=> array(
					'name'		=> 'Password',
					'required'	=> true,
					'min'		=> 4
				)
			));

			if( $validate->passed() ) {
				$remember = ( Input::get('remember') ) ? true : false;
				$login = $user->login( Input::get('username'), Input::get('password'), $remember );

				if( ! $login ) {
					$data['error_main'] = " The Email and Password does not match.";
				} else {
					Redirect::to( PUBLICPATH . 'admin' );
				}
			} else {
				$data = $validate->errors();
			}

		} 
		$data['token'] = Token::generate();
		$data['TITLE'] = "Login";
		$this->view('admin/login.html',$data);
	}


	public function logout()
	{
		$this->model('User');

		$user = new User();

		$user->logout($user);

		Redirect::to( PUBLICPATH .  'admin');
	}
}