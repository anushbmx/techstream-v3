<?php
/**
 * Cookie's
 *
 * Manages Cookies. 
 *
 * @since 1.0.0
 * @package OOP's Login
 */
class Cookie
{

	/**
	 * Clear Cookie
	 * 
	 * @param string $name Cookie name to check
	 */
	public static function delete ( $name ) {
		self::put( $name, '', time()-1 );
	}

	/**
	 * Cookie Exists. Returns True if cookie of name exist.
	 * 
	 * @param string $name Cookie name.
	 */
	public static function exists ( $name ) {
		return ( isset( $_COOKIE[ $name ] ) ) ? true : false;
	}

	/**
	 * Cookie Value. Returns the value
	 * 
	 * @param string $name Cookie name.
	 */
	public static function get ( $name ) {
		return $_COOKIE[ $name ];
	}

	/**
	 * Set Cookie
	 * 
	 * @param string $name Cookie name.
	 * @param string $value Cookie Value.
	 * @param integer $expiry Expiry value.
	 */
	public static function put ( $name, $value, $expiry ) {
		if ( setcookie( $name, $value, time() + $expiry ) ) {
			return true;
		}
		return false;
	}
	
}