<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'videoteca');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '1');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'l/&+)^|dz.I+C*+n8:P.<j#O$CWznQ}}OcH.jI$bO!uOZrJU|ieVz^;4C5nm~5Or');
define('SECURE_AUTH_KEY',  'x;+glHp9F&{@,c*R6F%r+;/|9(zleC2-f$Mn` =,<:O(//`1IZL&#peEVGjgPF.p');
define('LOGGED_IN_KEY',    '(K,,LTU-x-dtMPjHWpXC7x,}}Q@W-JTY&41bd(/CA>l79qo%[a749Y8MpsFbq`gm');
define('NONCE_KEY',        '{obCAmLza/D^ :d(s$vC(|GPuR!)3PsjEiWCwvkUEq|^R2rm)0T|?9`tpn;wT;O|');
define('AUTH_SALT',        'q@>tw8PAGc %~:i=Gfo,E1IFj}+@}5R<l*tA4pG|O<#7i`,[,z-U^K84}@f$t$<B');
define('SECURE_AUTH_SALT', 'xH_|^nA-SCeS?nv%zs^wN_>W4gW~a;b#<$,|++|&,CxQB<2Nq,GsiVU+}XwWp9RD');
define('LOGGED_IN_SALT',   'xw}A0-7M?M3/RE%:?d.wRm1/(s~IiH!6@1(mElrF7tSt!ADl@H)I,8zkf9+{~]8O');
define('NONCE_SALT',       'Ub=cK:$-+=6/=~b5=3$r#oL%LLQ{{qN+-BQ}btZXylE+P+&NQA#:WdGOC-459n5:');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
