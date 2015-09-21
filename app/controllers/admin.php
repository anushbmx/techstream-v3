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

	public function post( $post_id = 'new' ) {

		$this->model('User');
		$this->model('Article');

		$user = new User();
		$article = new Article();

		$this->loginRequired($user);

		if( Input::exists() /*&& Token::check( Input::get( 'token' ) )*/ ) {
			$validate = new Validate();

			// Validation for Inputs
			$validation = $validate->check($_POST, array(
				'title'		=> array(
					'name'	   => 'Post title',
					'required' => true,
					'min' 	   => 10
				),
				'description'   => array(
					'name'		=> 'description',
					'required'	=> true,
					'min'		=> 50
				),
				'featuredimage' => array(
					'name'		=> 'Featured Image',
					'required'	=> true
				),
				'link'			=> array(
					'name'		=> 'Article Link',
					'required'	=> true
				)
			));

			if( $validate->passed() ) {
				$template = Strings::get('catagory');
				

				try {
					$article->create(array(
						'TITLE'     	=> Input::get('title'),
						'SECURL'       	=> Input::get('catagory'),
						'CREATED_DATE'  => date("Y-m-d  H:i:s",time()),
						'IMG'			=> Input::get('featuredimage'),
						'DES'			=> Input::get('description'),
						'LINK'			=> Input::get('link'),
						'TEMPLATE'		=> $template[Input::get('catagory')]
					));

					// Get the created article details from LINK to redirect the user to edit it.
					$newarticle = new Article(Input::get('link'));
					Redirect::to( ADMINPATH . 'post/' . $newarticle->data()->SL_NO );


				} catch  (Exception $e) {
					die( $e->getMessage() );
				}

			} else {
				$data = $validate->errors();
			}
		} 


		$data['CATAGORY']	= Strings::get('catagory');
		$data['SUBCATAGORY']	= Strings::get('subcatagory');
		$data['token'] = Token::generate();
		$data['TITLE'] = "Create New Post";
		$this->view('admin/post.html',$data);

	}
}