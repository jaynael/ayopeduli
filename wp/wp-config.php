<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ayopeduli');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'R1HBmD{mSpUfta@Qys@;m5tiv]t5A;NRRthGtD.~f}X4:F9Zj,rhb>wzJ{WXIB[f');
define('SECURE_AUTH_KEY',  'D&S/Bu(n4x=K&9BAM@8f=[ZQA+w,5pMlPUDUs#&|Geg%ZnE7dJt/3Rc,}0Hn*O9b');
define('LOGGED_IN_KEY',    'e_<W8[2vDtAkm[$<~oFHYS+&(1OO`)%4R*/49W%g8`,y5GNyZ4sx=%+n_%&$lrx.');
define('NONCE_KEY',        '=,yG;}[}1k~y<uty}]J!htFu~Q/(8jg_ D]TT63r10_zbH+lSt3aJ^,A9]vdl;31');
define('AUTH_SALT',        'QL.mVL3rv~@*dsteC:a|-k:$5>9l8ceqej<qE`eIYk4A&Znj9zWar)w,xH8Q{;!%');
define('SECURE_AUTH_SALT', '~U[T(E5nr;YXkGOZ49Q#Z$wD7xy%`oqIZ6~M[ltgCenv,y8B=at0=z!=j`N@8_8u');
define('LOGGED_IN_SALT',   '2^:>bY]f[B.:I0WR!u32x=]<2QYmLm91(E7T>wD&$i(t`k-j@ecK;iOb2mlnSw[5');
define('NONCE_SALT',       '~46R2D{t1LtyJkH${1<j9#`isp,PtO%/c?WBl~BL8@vZ4-daX<(R`@WxU8dhrm8K');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
