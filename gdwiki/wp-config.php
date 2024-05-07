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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'gdwiki' );

/** Database username */
define( 'DB_USER', 'root' );

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
define( 'AUTH_KEY',         '><7Z`Qz/0ud0Rj]*AC;xPH]m,mO$uz[)[!b8dB7~J_-qB*LZh1DxbNA:7NupL}6=' );
define( 'SECURE_AUTH_KEY',  '/pJ]%-mgfsE}uf~X$pr8Q|]DN*?h{56aMrJLc^Ft;4>>}kA.<RGBf!uoc+3wj>JI' );
define( 'LOGGED_IN_KEY',    'obVNlRG0RTz#C=9jKj=-V$vA32DxG_3m3|36d[hAz._?A_e6-#d&T{@*9n29H9@)' );
define( 'NONCE_KEY',        'C8gw4KK2e<E7j97ri&cuwsUuGj#26T#0z*FC^R8oz*XX?Uns/ C*+)MX$,a]n9:L' );
define( 'AUTH_SALT',        'UvN18vCLD7sd+`?@Wb|wZ,g?@dQB4ivwt$S8zbQ.B6%fev|`9(<LZBnWK6enK]Me' );
define( 'SECURE_AUTH_SALT', '8-i-K(7_VTpDKjYR?VHC3QKjyRp]A#i/@Zb|FvFy0{al}#CD0.P9(?Mt;lluu#>+' );
define( 'LOGGED_IN_SALT',   'Tr(QSnVZNL3m~Ynw)Lkyrh1W98B[#-!q*=`EQQwQ{P1I|2$mj(7l;0oAmxr3Y.$K' );
define( 'NONCE_SALT',       '5*b>{w>mF5;r6*,e!_<3CBX^6Xsxv)lqrW<r1${$kCIl9aWQg._cvT#5d:wCJdAJ' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
