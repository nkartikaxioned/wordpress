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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'phpmyadmin' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'g<T9rV_j4Yd=c[BF@4z|L^Nw/$+7 s&;5;fcNRRWmZLxu~Q2Zr~p26X$_L~(uXaS' );
define( 'SECURE_AUTH_KEY',  'Za9YxajLGjhi-fKaOXE?RWB#z@e!jHZqG_8&J80*bNo+`Z T=M@W5Ko mAY[6FRd' );
define( 'LOGGED_IN_KEY',    '0Zy^U5O_`iB*VA4B}We`{<Y6*S[pO-EvOQa@epzJQho(l]QDl+ul@d^C/!5>6sD~' );
define( 'NONCE_KEY',        'S1e]cCo?e5F4dSAxDOaioi@1cww&(V^G3DcvT+^3EixH21$3?4;R`?K#P,8uDgWT' );
define( 'AUTH_SALT',        'g(s|IKrGl5PYI6g/t?#fZvYODIB*D$?isTyx=T0S|WO{G`X>,l.})>#!DLuv?y@D' );
define( 'SECURE_AUTH_SALT', ';Y]`,t`c;zUX-#*zNT%s)!t?m0v,6}5a>X!M(?pG37@6{~;;uy=skXU|txvC;D02' );
define( 'LOGGED_IN_SALT',   'fG7&hxhxI{SK_D*9zs^1VR-ga)<!a58p~PJ|=,=l4!J;-jk}:mA~]-T9mK1|;wA[' );
define( 'NONCE_SALT',       'R4Wzq/{hhwG;WhMd@j>vFuYrWO_Q.^||:Fb,}x37/Lq^Ck(,T8L(:+a&}HKYpb2v' );
define('JWT_AUTH_SECRET_KEY', '-fed.T{tWBWHU9D^nWT]X)ikDC/Knj1-%vgYdnN>ip.g--H(I#32=I1]L)b_vfg`');
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
define('FS_METHOD', 'direct');

define('JWT_AUTH_CORS_ENABLE', true);

