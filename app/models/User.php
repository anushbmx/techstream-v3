<?php
/**
 * Users base Class
 *
 * Base class wrapping the user functions.
 * 1. Create USer
 * 2. Delete User
 * 3. Update User
 * 4. Login User
 *
 * @since 1.0.0
 * @package OOP's Login
 */
class User
{
	/** Private variables used in the class */
	private $_db,
			$_data, 		// Will be User Object to store user data.
			$_sessionName,  // Session name from the config file.
			$_cookieName,   // Cookie name for storing session hash
			$_cookieExpiry, // Cookie expire time
			$_isLoggedIn = false;   // User Logged in Status.

	public function __construct( $user = null, $field = 'email' ) {
		$this->_db = DB::getInstance();
		$this->_sessionName = Config::get( 'session/session_name' );
		$this->_cookieName = Config::get( 'remember/cookie_name' );
		$this->_cookieExpiry = Config::get('remember/cookie_expiry');

		/**
		 * Grabs the user data when an object of User is created.
		 *
		 * If User ID is not passed : Will grab the data of loggedin user if session exists. And sets Logged In Status to true
		 * If user ID is specified during object creation, will grab the data of givien ID.
		 */
		if ( ! $user ) {
			if ( Session::exists($this->_sessionName ) ) {
				$user = Session::get( $this->_sessionName );
				if ( $this->find($user, 'user_id') ) {
					$this->_isLoggedIn = true;
				}
			} else if ( Cookie::exists( Config::get('remember/cookie_name') ) ) {
				/*
				 * If the cookie has a hash value, process if user with a similar has exist or not.
				 * If there exist a user for the has log the userin.
				 **/
				$hash = Cookie::get( Config::get('remember/cookie_name') );
				$hashCheck = DB::getInstance()->get('users_sessions', array ('hash', '=', $hash) );
				if($hashCheck->count()) {
					$user = new User( $hashCheck->first()->user_id, 'user_id');
					$user->login();
					/*
					 * Redirect to sama page once the session is expired.
					 * If not user user will be logged in but the login redirect will force them to login page.
					 * Only if the user refresh his existing session will be used else new login will over ride.
					 * which makes this a usless process.
					 */
					header('Location: '.Input::get('url'));
				}
			}
		} else {
			$this->find($user, $field);
		}
	}

	/**
	 * Crates New user
	 *
	 * @param array $fields array with information for new user. Array Keys must match the database column name.,
	 */
	public function create( $fields = array() ) {
		if ( ! $this->_db->insert( USERS_TABLE, $fields ) ) {
			throw new Exception("There was a problem creating an account.");

		}
	}

	/**
	 * Once user Objected, profile data of logged in user/ the created object will be stored in $_data. Data() is retrival function.
	 */
	public function data () {
		return $this->_data;
	}

	/**
	 * Returns True if Data of user is extracted from DB and is stored in the object.
	 */
	public function exists () {
		return ( !empty( $this->_data ) ) ? true : false;
	}

	/**
	 * Find User from User ID or username
	 *
	 * @param string/integer $user username or the User ID
	 * @param string $field the Identifyer to be looked. eg username ( Default ) or user_id
	 */
	public function find ( $user = null, $field = 'username' ) {

		if ( $user  && $field ) {
			$data = $this->_db->get( USERS_TABLE, array( $field, '=', $user ) );

			if ( $this->_db->count() ) {
				$this->_data = $data->first();
				return true;
			}
		}

		return false;
	}

	/**
	 * User Group Permission Check
	 *
	 * Returns true if the user group has permission for section passed in argument.
	 *
	 * @param string $key Section name
	 */
	public function hasPermission( $key ) {
		$group = $this->_db->get( 'groups', array( 'id', '=', $this->data()->group ) );

		if( $group->count() ) {
			$userPermission = json_decode( $group->first()->permissions, true);

			if ($userPermission[ $key ] == true ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Informs the status in $_isLoggedIn.
	 */
	public function isLoggedIn (){
		return $this->_isLoggedIn;
	}

	/**
	 * Log in
	 *
	 * Used to log user in, creates a Session.
	 * If called without argument login() function check if user data is already pulled in the object that
	 * initiated the function. If user data exists in the object logs the user.
	 * Used by cookie login functions to log the user in case user has checked remember me and the session is expired.
	 *
	 * @param String $username user's username.
	 * @param string $password user's password.
	 * @param boolen $remember true to set user remember cookie.
	 */
	public function login ( $username = null, $password = null, $remember = false) {

		/*
		 * If Login is called without any parameters, check if user data is pulled in. If user data exist log user in
		 */
		if ( ! $username && ! $password && $this->exists() ) {
			Session::put( $this->_sessionName, $this->data()->user_id);
		} else {

			$user = $this->find( $username );

			if ( $user ) {
				if( $this->data()->password == md5($password) ) {
					Session::put( $this->_sessionName, $this->data()->user_id );
					return true;
				}
			}
		}
		return false;
	}

	/**
	 * Destroys user's session.
	 */
	public function logout () {

		$this->_db->delete(SESSIONS_TABLE, array( 'user_id', '=', $this->data()->user_id ) );

		Session::delete($this->_sessionName);
		Cookie::delete($this->_cookieName);
	}

	/**
	 * Update user information.
	 *
	 * @param array $field Information to be updated. Array Keys must match the database column name.
	 * @param integer $use_id Uniue ID of the user.
	 **/
	public function update ( $field = array(), $use_id = null ) {

		if ( ! $use_id && $this->isLoggedIn() ) {
			$use_id = $this->data()->user_id;
		}
 		if( $field ) {
 			if ( ! $this->_db->update( USERS_TABLE, $field, array( 'user_id', '=', $use_id ) ) ) {
 				throw new Exception("Error Updating Account");
 			}
 		}
	}
}
