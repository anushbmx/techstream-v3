<?php
/**
 * 
 * Session Manager
 *
 * Manages the Session variables
 * @since 1.0.0
 * @package OOP's Login
 */
class Session
{

	/**
	 * Returns true if session exists with the provided session ID.
	 *
	 * @param string $name session token name
	 */
	public static function exists ( $name ) {
		if ( isset( $_SESSION[ $name ] ) ) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Deletes the session with provided tocken.
	 *
	 * @param string $name session token name
	 */
	public static function delete ( $name ) {
		if ( self::exists( $name ) ) {
			unset( $_SESSION[ $name ] );
		}
	}

	/**
	 * Returns the session variable for requested tocken.
	 *
	 * @param string $name session token name
	 */
	public static function get ( $name ) {
		return $_SESSION[ $name ];
	}

	/**
	 * Sets a new tocken with given session id and value.
	 * 
	 * @param string $name session token name
	 * @param string $value value for the tocken
	 */
	public static function put( $name, $value ) {
		return $_SESSION[ $name ] = $value;
	}

	/**
	 * Flash Function
	 *
	 * Set flash message and read it. On read the message & tocken is distroyed.
	 * 
	 * @param string $name flash session name
	 * @param string $value value for flash message
	 */
	public static function flash( $name, $string = '' ) {

		if ( self::exists( $name ) ) {
			$sessin = self::get( $name );
			self::delete( $name );
			return $sessin;
		} else {
			self::put( $name, $string );
		}

	}
}