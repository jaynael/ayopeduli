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
define('AUTH_KEY',         'R.V@%{Rc{S$Jj)V-vSU;BJ}oRQ~]+|c-^kjk8B{Yx]Fw(4s5_vf.8Y4*P$)p!_,]');
define('SECURE_AUTH_KEY',  '7^S(J3m&{|SOA+wJjV$R}O_eA7|OB-|L:LZ44j/6$k-5<& K%9=7,O1E}?x.kSnV');
define('LOGGED_IN_KEY',    '%a(<e6y5)>C+YJ1|q1)6qSZ/r4&,t~)6H#PzJ)RquiX:DZdSv?(Oa: AP<|1hi*#');
define('NONCE_KEY',        '5lw+dcOszpP2(n&BD2dgCuQr4pPhb/Ju+*I/eA:( `JhMhA!Z0.SMKgB%e9n*lv:');
define('AUTH_SALT',        'NdaTO/@*Vw@C-Hud,4ZJyP?U05Gwb*Xw-R}|96XiV>i@MaSB{A0m}fv}$X)3w]rd');
define('SECURE_AUTH_SALT', '*l?0,-`Hv]BlT*lvR4;$UYi4Ba?d7)N!qP:].0>--{3[K;i#jn0LX@*FYsO,T{+`');
define('LOGGED_IN_SALT',   'Hf00 f6w:Ukq89&eSe!p}_Hy0SVjx.RO#IH^5|&+<Zq0[;AxUqcvghFN=*CJ?%n?');
define('NONCE_SALT',       '?9c3O)7*!,V?<TF|z.wSPP6W#er<oy|0p@-@dq.-nDUO%[Z#[<aK[c!4I4~|{}m9');

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
