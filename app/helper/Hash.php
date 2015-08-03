<?php
/**
 * Hash Generators 
 * 
 * Generates the hases used in various places.
 *
 * @since 1.0.0
 * @package OOP's Login
 */
class Hash
{
	/**
	 * Hash generators
	 *
	 * @param string $string string to be hashed.
	 * @param string $salt salt to be attached to the string before hashing
	 */
	public static function make ( $string, $salt = '' ) {
		return hash( 'sha256', $string . $salt );
	}

	/**
	 * Salt generator
	 *
	 * @param integer $length of the salt string to be generted.
	 */
	public static function salt ( $length ) {
		return mcrypt_create_iv( $length );
	}

	/*
	 * Unique ID generator
	 *
	 */
	public static function unique () {
		return self::make( uniqid() );
	}
}