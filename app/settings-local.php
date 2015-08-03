<?php
/**
 * The base configurations for system.
 *
 * This file has the following configurations: MySQL settings
 * and other settings local to the system.
 *
 * This file is used by the init.php during the initiation
 *
 * @version 1.0.0
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', '');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'lolly1234');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'UTF-8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');



// ** Path Settings ** //
/** Public Location of Application */
define( 'PUBLICPATH', 'http://localhost/x/public/' );

/** Location of Application Resources */
define( 'RESOURCEPATH', 'http://localhost/x/public/' );

/** Absolute Path of Application Resources */
define( 'RESOURCEABSEPATH', ABSPATH . 'public/' );


// ** Error Reporting Settings ** //
// Disable Error Reporting
error_reporting(-1);


// ** Email Functions ** //
// Disable or Enable Email
define('EMAIL', true);

/** Tracker's */
define('GOOGLE_ANALYTICS', 'as');
