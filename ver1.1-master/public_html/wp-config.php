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
define('DB_NAME', 'scootmy1_scootdb');

/** MySQL database username */
define('DB_USER', 'scootmy1_scoot');

/** MySQL database password */
define('DB_PASSWORD', 'DRemacH88$uf');

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
define('AUTH_KEY',         ';-+Wr/]ttg+n3I0Mpkuh/}Hp=l_FT%Qs9|SG(fe@sE%E+v@f)XZ?$%Z-+t>S=2~|');
define('SECURE_AUTH_KEY',  '@P>uw1/UNH.|~KBA#U)%^C{-z?cl9h_*8=qPpvJSuk<hZ&-!Yd|_`P+cmGL9sgaq');
define('LOGGED_IN_KEY',    'zx,LJ5GA)t= 9g<+DMLl+)&BSA+N?AhR|Y/t`A=M=!Au}gf8|7Jo}Z,%<SuQ}KLC');
define('NONCE_KEY',        ']=SMtc*ic=_={FIYw9s(9u|:1zj1Ai9=0vV?f-`5K?6ABi#82}M2A*@gaKr0(ro+');
define('AUTH_SALT',        '+VU?d6]Ol8VTNZ-;!k*VI|ZQR+L5mzT?SzM7p*MI,s!6JHG6;5s[+R#hF/9B!]*m');
define('SECURE_AUTH_SALT', 'w/FHSw--)+a>2!-i&9x^-;ISTK,]grJ#86^=AG,E9f;hny6u)9m/),2%`M?2<3C{');
define('LOGGED_IN_SALT',   'vy`DFkP5+w SXNLI;~ZS<e9>[0syK!tT_+fa<7xEkV<qEWZy[#G&$H{#~Y_#6M!4');
define('NONCE_SALT',       'O2Iba>gz4}A9o<VqD0,}-J/+Oun|ZO{_UuZ2A#xiDXq!PoTky:/!Czq2puM|%V[X');

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
define( 'WP_MEMORY_LIMIT', '1024M' );
set_time_limit(10000);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
