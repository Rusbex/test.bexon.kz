<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'bexonkz_wp_ypmfh' );

/** Database username */
define( 'DB_USER', 'bexon_wp_bsl9r' );

/** Database password */
define( 'DB_PASSWORD', 'BN#8o0yOsB1@@w9e' );

/** Database hostname */
define( 'DB_HOST', 'srv-pleskdb39.ps.kz:3306' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY', 'qGh:k5j7S/;f(ujjDP/4:y2n[A:N#06&oGY[E~30N1(x9GKZOG6N33]i;5us2Z8N');
define('SECURE_AUTH_KEY', 'YB/2m6u:4VuFx&stUb!-33657lPpv8/bnfr!#@pn1b~VG!&*5O3)hjU:e+@B_O0%');
define('LOGGED_IN_KEY', '[]w+DyON@:I7|i51:t6j]2vo(Q2)r]&-tGb1(wu971m1GSqBa28Hs2B]&)n:SU1s');
define('NONCE_KEY', 'm*ZU~@ZnF])G~wT(Nb!1%Y0:7n6zrp[1UefOyt+0fw~2U2/7O#VD9&Cu&7SQw0_a');
define('AUTH_SALT', 'YMvbrj(x!+7tAGL%u%L(tn57([e+3FM@6%1;1#b&K;k2Lzv910a(Qrk;OcBdJd)|');
define('SECURE_AUTH_SALT', '(;Fp*kx9W[*sI06i9R#3i9:9snr/53%9z9QPH7nLva*j@128mpp41SyR:T@mU7bw');
define('LOGGED_IN_SALT', '+rg6+72k[)60IkONi]dH7:Q|17gm|YApx#:&Wx)ND5iA4192T;%G+;x0]V)9x:6I');
define('NONCE_SALT', 'aA&wZeZ[-f3I[Ti_k]1:5)3()78C%@(_i3-QaCM%v6m7+i;0U0~c3!~9ZB:;V02K');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'hK1NXO_';

/* Add any custom values between this line and the "stop editing" line. */

define('WP_ALLOW_MULTISITE', true);

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
    define( 'WP_DEBUG', true );
    define( 'WP_DEBUG_LOG', true );
    define( 'WP_DEBUG_DISPLAY', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
