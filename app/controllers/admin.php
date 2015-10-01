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

	public function viewpost ($parameter) {
		$parameter = explode('/', $parameter);

		if ( isset($parameter[0]) && is_numeric($parameter[0]) ) {
			$page = $parameter[0];
		} elseif ( isset($parameter[1]) && is_numeric($parameter[1]) ) {
			$page = $parameter[1];
		} 
		
		$this->model('User');
		$this->model('Article');

		$user = new User();
		$article = new Article();

		$this->loginRequired($user);

		$data['start'] = 0;
		$data['page']  = 1;
		$data['limit'] = 10;			// Number of articles on a page
		$data['sectionUrl'] = ADMINPATH . 'viewpost';


		if( isset($parameter[0]) && $parameter[0] == 'draft' ) {
			$article->articleList(0,'STATUS',null,null,0);
		} else {
			$article->articleList(0,'TYPE');
		}


		$total = $article->count();
		$data['totalArticle'] 	= $total;
		if ( ! isset($page) || $page < 1 ) {
			$page = 1;
		}

		if( is_numeric($page) ) {
			$data['page']  = $page;
			$data['start'] = $data['limit']  * ($page-1) ;
			if( $data['start'] >= $total ) {
				// Redirect to 404
				echo "no found";
				die();
			}
		}
		if( isset($parameter[0]) && $parameter[0] == 'draft' ) {
			$data['items'] = objectToArray($article->articleList(0,'TYPE', $data['start'],$data['limit'] , 0) );
			$data['TITLE'] = 'Draft';
		} else {
			$data['items'] = objectToArray($article->articleList(0,'TYPE', $data['start'],$data['limit'] ) );
			$data['TITLE'] = 'All Articles';
		}
		
		$data['TOTAL'] = $total;
		$this->view('admin/list.html',$data);
	}


	public function post( $post_id ) {

		$this->model('User');
		$this->model('Article');

		$user = new User();
		$article = new Article();

		$this->loginRequired($user);

		// If new post is to be created
		if ( empty($post_id) ||  $post_id == 'new' ) {
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
							'SUBSEC'		=> Input::get('subsec'),
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

					if ( isset( $data ) )  {
						$submissionData = Input::values($_POST);
						$data  = array_merge ( $data, $submissionData );
					} else {
						$data = Input::values($_POST);
					}

				} else {
					$data = $validate->errors();
				}
			} 

			if ( isset( $data ) )  {
				$submissionData = Input::values($_POST);
				$data  = array_merge ( $data, $submissionData );
			} else {
				$data = Input::values($_POST);
			}

			$data['CATAGORY']	= Strings::get('catagory');
			$data['SUBCATAGORY']	= Strings::get('subcatagory');
			$data['token'] = Token::generate();
			$data['TITLE'] = "Create New Post";
			$this->view('admin/post.new.html',$data);

		} else {
			$article = new Article( $post_id );

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
					),
					'fulltext'		=> array(
						'name'		=> 'Article Content',
						'required'	=> true
					)
				));

				if( $validate->passed() ) {
					
					$template = Strings::get('catagory');

					try {
						$article->update(array(
							'TITLE'     	=> Input::get('title'),
							'SECURL'       	=> Input::get('catagory'),
							'SUBSEC'		=> Input::get('subsec'),
							
							'CREATED_DATE'  => date("Y-m-d  H:i:s",time()),
							'IMG'			=> Input::get('featuredimage'),
							'DES'			=> Input::get('description'),
							'LINK'			=> Input::get('link'),
							'TEMPLATE'		=> $template[Input::get('catagory')]
						), $post_id);

						Redirect::to( ADMINPATH . 'post/' . $post_id);

					} catch (Exception $e) {
						die( $e->getMessage() );
					}

					if ( isset( $data ) )  {
						$submissionData = Input::values($_POST);
						$data  = array_merge ( $data, $submissionData );
					} else {
						$data = Input::values($_POST);
					}

				} else {
					$data = $validate->errors();
				}
			}

			if( $article->count() ) {
				$data = objectToArray( $article->data() );
				$data['CATAGORY']	= Strings::get('catagory');
				$data['SUBCATAGORY']	= Strings::get('subcatagory');
				$data['token'] = Token::generate();
				$this->view('admin/post.html',$data);
			}
		}
	}
}