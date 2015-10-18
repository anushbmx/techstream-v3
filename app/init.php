<?php

/**
 * Initilization file
 *
 * The linker to all the functions and classes files.
 * This file must be included in all the public files used in the system
 *
 * @since 1.0.0 (if available)
 *
 */

session_start();
date_default_timezone_set('GMT');


/** Absolute Path of Application */
define( 'ABSPATH', dirname( dirname(__FILE__) ) . '/' );

/** App Path of Application */
define( 'APPPATH', dirname( dirname(__FILE__) ) . '/app/' );


/* Loading Configuration file */
require_once APPPATH . 'settings-local.php';

/* Loading Extra Configuration file */
if ( file_exists( APPPATH . 'settings-extra.php' )  ) {
	require_once APPPATH . 'settings-extra.php';
}

/* Applcation configurations */
require_once APPPATH . 'settings.php';

require_once APPPATH . 'core/App.php';
require_once APPPATH . 'core/Controller.php';


/* Adding functions */
require_once APPPATH . 'functions/utlities.php';


/* Adding Composer Installs */
// require_once ABSPATH . 'vendor/autoload.php';

spl_autoload_register(function($class) {
/**
 * Auto-load Classes
 *
 * An anonymous functions that auto-loades the Files containing Model
 *
 * @since 1.0.0
 *
 */
	require_once APPPATH . "helper/$class.php";
});
