<?php
/**
 * Applcation configurations.
 *
 * This file has the following configurations: Table Prefix, Database Names
 * Secret Keys, and ABSPATH.
 *
 * This file is used by the init.php during the initiation
 *
 * @version 1.0.0
 */


/** Session Cookie name */
define('COOKIE_NAME', 'hash');

/** Session Cookie name */
define('COOKIE_EXPIRY', 604800);

/** SiteName **/
define('SITENAME', 'Upload x');


/** Goball variables */
$GLOBALS['config'] = array(
	'mysql' 		=> array(
		'host'				=> DB_HOST,
		'username'			=> DB_USER,
		'password'			=> DB_PASSWORD,
		'db'				=> DB_NAME
	),
	'remember'  => array(
		'cookie_name'		=> 'techstream_cookie',
		'cookie_expiry'	    => 36000
	),
	'session'	=> array(
		'session_name'		=> 'user',
		'token_name'		=> 'token'
	),
	'domain'	=> array(
		'session_name'		=> 'domain',
		'token_name'		=> 'domain_token'
	)
);

/** Goball variables Other than configuration */
$GLOBALS['strings'] = array(
	'catagory'	=> array(
		''				  => 0,
		'Web-Design' 	  => 0,
		'Web-Development' => 0,
		'Bits'  		  => 1	
	),
	'subcatagory'	=> array(
		'' 		=> 'Nill',
		'HTML'	=> 'HTML',
		'PHP'	=> 'PHP',	
		'CSS'	=> 'CSS'
	)
);

//** Social Links *//
/* Facebook */
define('FACEBOOKURL', 'https://facebook.com/' . FACEBOOKUSERNAME);

/* Twitter */
define('TWITTER', 'https://twitter.com/' . TWITTERUSERNAME);

/* Google Plus */
define('GOOGLEPLUS', 'http://plus.google.com/' . GOOGLEPLUSUSERNAME);


/** Table Name Definitions */
define('USERS_TABLE', 'users');
define('ARTICLE_TABLE', 'data');