<?php
/** WP Memory Limit */
define( 'WP_MEMORY_LIMIT', '256M' );
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
define('DB_NAME', 'simoncau_live');
/** MySQL database username */
define('DB_USER', 'simoncau_livesit');
/** MySQL database password */
define('DB_PASSWORD', 'Vc#fNPmsp?,t');
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
define('AUTH_KEY',         'HvYROonuCVynXN.cFl?ti+$bE%zEz m6xhva^((pA!qK5~%I<#nezY#=X}%e1CuD');
define('SECURE_AUTH_KEY',  '6 ASqJes+DnLo}x2m,*{i&k5`0;t7{4~R+K+?a-a9}dHophYvOlOql1nNi80g>0W');
define('LOGGED_IN_KEY',    '(tp-ma/9=E&JNDpTm2M8eOG?!Lo()^Lsb-hEY)1;*0@MG}$WevB65Z5;,#WVgm_B');
define('NONCE_KEY',        'dDuwUlEhIOF!t.FYQ+n4`<OjWO@6oTuO8(9j52,:5}qbZw11WE=vmF)?[nF.N2Qi');
define('AUTH_SALT',        '%)fFLalUyM/|>./jJVcHD1VVWof)6d7>Z_1KLQK/s]6oZjF/awiq!ho;a6]@DA]D');
define('SECURE_AUTH_SALT', '>=4X%*Bqzcd|qE-9>U+o;icp|<,=&q^%/S{`7dCd:} ==568U9Y8bRkIl$77QtVd');
define('LOGGED_IN_SALT',   '<WxnPr|8#WB22!w2>Tz|@ZzxSJ_LubCgB{unt0T~$|pHC>:`4][#)p~hJ(AcUt$P');
define('NONCE_SALT',       '=aOu%BRs!0#ZpNlLAq1iEQ`OF Y]WU(g}4pO>v/~7e.=`|`pa9%kT ?<WH[UqQ9#');
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
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );
/* That's all, stop editing! Happy blogging. */
/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH'))
	define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');