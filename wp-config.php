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
define('DB_NAME', 'bitcrunched');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'r8yyuF40U|+j-+9O{tXFODnHRMk`$%E{>QIrC{Fs&W}r*Y2<Mb`P|+o%01WAKVBM');
define('SECURE_AUTH_KEY',  'b:gnD#k.<S(>GqNPtzdi3Q&+I(Z%qLW/%ji3*q}IU^6a:?5!9/Y|?<^-ruZXwB&C');
define('LOGGED_IN_KEY',    '(-xP{PpR]`zot(r4le<xE}kB%=*R5l29]an3WmUWr=.i(-{{VA@5~Fx5:/%;%vja');
define('NONCE_KEY',        'iK@]]Gt2 i8:5MD@Ms!4/iDE,|iR6CTIM;+U<zx>}vG+pMg.-NvW.B5k;mPL{Jlu');
define('AUTH_SALT',        'mYqA#u[I!_%e@pMLF(SF}]cyTh6-N-u?a.:d. >FEVPUlEjd?`rJ*{AhS%tFL:o-');
define('SECURE_AUTH_SALT', ',Pgz$kGwO- xEb}o:7t(9UALKJBh_6L>^-X**]ARYVb> (fpxAbjRHo4=.LQC-*T');
define('LOGGED_IN_SALT',   '.BhVScnzZQH|{^k8Eo_H2/|zp]iA v*E`0sLUd+DszW|Vh9,YLkXJ`x$JZy3vOl:');
define('NONCE_SALT',       '4._8mR03m:>y||h|YP-s>c_bW+?mVP)juQ0OVwd{$Wu~M*?C@Z9+kNtkyT*Uzw&o');

/**#@-*/

/**
* WordPress Database Table prefix.
*
* You can have multiple installations in one database if you give each a unique
* prefix. Only numbers, letters, and underscores please!
*/
$table_prefix  = 's8g8u7t_';

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

