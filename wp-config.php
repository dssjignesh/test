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
define('DB_NAME', 'digitmwf_digitnew');

/** MySQL database username */
define('DB_USER', 'digitmwf_digitmw');

/** MySQL database password */
define('DB_PASSWORD', 'digit@123!@#');

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
define('AUTH_KEY',         't?muUi9Jy_q w|hXP{5_-*H=B_#rIej3ESKeVb2Nfmj$Tp.<Wi.s]n;nV=~k#q?R');
define('SECURE_AUTH_KEY',  'TBfRb}:<J,f.y85KSb`9-@]JY|:?+_toV6%#H.{cLmM!nZ3r N >}dq)ZI;5zH;}');
define('LOGGED_IN_KEY',    '-PMxU>lY:ttZv;s#ER;f2a]7N0+TiB]L+-5{2e&@^t59j-VBa=-W0~$6|06?E]]$');
define('NONCE_KEY',        'yD1y3qz~/dS4DmGWoNk<`a|:pHxR$D<n_P0z^R>!&0~oyNA#]Pm%k%3H)*Ui;mM:');
define('AUTH_SALT',        'k^_t[^RY)6>zn9Hvdv^cpzk)Erl!2YE4[jx6HNiE=PR8LP!ASXx(AXabt7?0XS*J');
define('SECURE_AUTH_SALT', ',M,lx-xio{RReM.KrOa>Shw!`M}?tVmoP;U(!=_QAA:v!2[XYKp4(Igo|N-GjnX>');
define('LOGGED_IN_SALT',   'H jK,JQTx9OZiTVae1&7|qSaR-qWv?r;3{O(JZ3]vVmFyC4~wO~ER:g@~5NV=~@r');
define('NONCE_SALT',       '~hJL_Lj)H/;;.FDI/v }{7x_8^%WYJ#3[ ;6#NB3xgYM%Jcjp?1ilG8R2Dd]V.KM');

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
