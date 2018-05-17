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
define('DB_NAME', 'ethiopian_box_sport');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'tAXmLiL98bCbUXCDy9u=@9:KQWNbSzqL<(pGlpsF`/l6l41N8]1)t{K5>70): X>');
define('SECURE_AUTH_KEY',  'dA;g7^5uY*%Q]*.C&c_t|Lq*$s}Yp6&8as^RxvFG^}Y<5(|$=Q4v8k]kqE5Mp`Ih');
define('LOGGED_IN_KEY',    '2xbt_Nv*gP9<hUv+c}N%92s}>$/qX>+o3_ORqX*9Ssj@|YH,/r5{U(uqNp3xV+X0');
define('NONCE_KEY',        'dGlf)v0T;vLZjDA#Lr*&Ik|qBsf&NV?(u]_X4/&&eViG&A/D8x:KH#3P<UM<r}sJ');
define('AUTH_SALT',        '<@|yaql4j/wnuy2x#[?3pS?-lCP/Ew@<MZbwsytL=#n[m@JY4`ioHarVuFOe=6ZE');
define('SECURE_AUTH_SALT', 'W l3)f-sxSOu[/lpwoz2BblT$yNz#w8A(gL;<sSPgfF@OhZS%%>;u.94dpgFq2M(');
define('LOGGED_IN_SALT',   'l@Xqpy>{|mGQ TR!mM7oD$0t=kn6lf8e{WxIi*ixT@%c;`xl_@3)ma9bFcW{aMMJ');
define('NONCE_SALT',       '.l3<td+N*JU*>v@it&63#lj>l`Xbr+3jJl@];K|EF+TK %dF#J&8x?3R2{AQe&o@');

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
