<?php
/**
 * String functions
 *
 *
 * Provides the String retrival duties
 *
 * @since 1.0.0
 * @package OOP's Login
 *
*/
class Strings {
	/**
	 * Get Strings function
	 *
	 * Returns the configuretion details for the current system.
	 *
	*/
	static function get($path = null) {
		if ( $path ) {
			$config = $GLOBALS['strings'];
			$path = explode('/', $path);

			foreach ($path as $bit) {
				if ( isset($config[ $bit ]) ) {
					$config = $config[ $bit ];
				}
			}

			return $config;
		}

		return false;
	}
}