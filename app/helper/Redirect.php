<?php
/**
 * Redirect Functions 
 *
 * Wraps functions to throw errors for Notfound. Redirects.
 *
 * @since 1.0.0
 * @package OOP's Login
 */
class Redirect
{
	/**
	 *
	 * Redirect function, if passed a location will redirect to the location.
	 * External URL's must be supplied with http(s):// .
	 *
	 * @param string/Integer $location Location to redirect or Integer in case of error.
	 */
	public static function to ( $location = null ) {
		if ( $location ) {
			if ( is_numeric( $location ) ) {
				switch ( $location ) {
					case 404:
						header('HTTP/1.0 404 Not Found');
						// 404 location
						exit();
					break;
				}
			}

			header( 'Location:' . $location ) ;
			exit();
		}
	}
}