<?php
/**
 * Token Generator
 *
 * Generates token for form validation.
 * @since 1.0.0
 * @package OOP's Login
 */
class Token
{
	
	/**
 	 * Tocken Validation Checks
 	 *
 	 * Checks if the token is valid
 	 *
 	 * @param string $token Token string.
 	 */
	public static function check( $token ) {
		$tokenName = Config::get( 'session/token_name' );

		if ( Session::exists($tokenName) && $token === Session::get($tokenName) ) {
			Session::delete($tokenName);
			return true;
		}

		return false;
	}

	/**
 	 * Tocken Generator
 	 *
 	 * Generates a unique tocken.
 	 */
	public static function generate() {
		return Session::put( Config::get( 'session/token_name' ), md5( uniqid() ) );
	}
}