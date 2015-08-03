<?php
/**
 * Configurational functions
 *
 *
 * Provides the configuration details
 *
 * @since 1.0.0
 * @package OOP's Login
 *
*/
class Config {
	/**
	 * Get Config function
	 *
	 * Returns the configuretion details for the current system.
	 *
	*/
	static function get($path = null) {
		if ( $path ) {
			$config = $GLOBALS['config'];
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
