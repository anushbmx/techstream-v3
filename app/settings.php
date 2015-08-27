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
		'cookie_name'		=> COOKIE_NAME,
		'cookie_expiry'	    => COOKIE_EXPIRY
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


/** Table Name Definitions */
define('USERS_TABLE', 'users');
define('ARTICLE_TABLE', 'data');