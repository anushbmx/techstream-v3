<?php

/**
* 
*/
class Admin extends Controller
{
	public function index( $parameter = null ) {

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
				'email'		=> array(
					'name'	   => 'Email Address',
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
				$login = $user->login( Input::get('email'), Input::get('password'), $remember );

				if( ! $login ) {
					$data['error_main'] = " The Email and Password does not match.";
				} else {
					Redirect::to( PUBLICPATH );
				}
			}
		}
		$data['token'] = Token::generate();
		$data['title'] = "Login";
		$data['menu']  = "Login";
		$this->view('account/login.html',$data);
	}
}