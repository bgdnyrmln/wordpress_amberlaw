<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_database' );

/** Database username */
define( 'DB_USER', 'user' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'j3t3tQ,JO.!ahn5&#/z>}yqrLxx~JDP4:thAw6L-dUJ(7tCx|N*wW2gxy@cSFXNY' );
define( 'SECURE_AUTH_KEY',  'nlagL8K!8)v3@{]D4e3u_]_@o@1=4~SWXsy:f>a`eYP+kVmgLIi3Oxozy|xir,`]' );
define( 'LOGGED_IN_KEY',    '0.d@M82BSxQ!2X/Y~q9TK[qMj<mDZf#`k>dp!#VJ7)F .#GYjRp(h=xO9Q~q7|gU' );
define( 'NONCE_KEY',        '>c&K~UcS.E=P09F:#_oQZ~B]v s6;~muE!Ae]}{^>jD0{SCWU!hp{UgI%)^i3j0.' );
define( 'AUTH_SALT',        '=w*tYp-Q15&wM+a5N]u_m8]7,m-VDJ>YMT[! rg5^X>XDZ UGI`:+(Y4jcKfL|D3' );
define( 'SECURE_AUTH_SALT', ';]3]YO}KfAwF+ 7BJfom v$)t7Ylf|z9`/&=mY!h45+,nB ch|YNQ%OaU>ILzi*/' );
define( 'LOGGED_IN_SALT',   'R$*@GK]Bh,S?tzi!(>#oqJ]6xF%f`1u_w{>FC^Hf_wTNaT0LlFn2?WGRL%L7]O].' );
define( 'NONCE_SALT',       'i_C!Ng)W<v7z-(:EiYWiWI!mga?Yp>rZ`%:/ka|;[:HjB|.3ZwJ^ }8hP]OOz}*w' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
