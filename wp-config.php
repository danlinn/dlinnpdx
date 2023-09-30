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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wordpress' );

/** Database password */
define( 'DB_PASSWORD', '8a9eeb6d97b53ed242f8d0f39471dfa98a6e7c37e46822ce' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'r1}M)j::%S*]Zs GAIJ$QnEvbb N!87tEFB!;,@9-y^=WfA.o{iw`qdb=VuYV(}N' );
define( 'SECURE_AUTH_KEY',  '@5q/08k[87p,xLdYN2FkrbGV?ZNDHQw6?@W`9UF=s~T&?@WFh]J[M=R)g0f}Jb.#' );
define( 'LOGGED_IN_KEY',    '+- jv>$4O/E#6E_1O~{9rbY2V?:r**|*bI,g7)44T2}I@u$cvMZnV`iH60O.%7xM' );
define( 'NONCE_KEY',        'I]xx;/S1T#P/bI*(k74^Ach;mQM)N5>[O@i$mmvm@y7Krd@X?*i*8*};~-gq?tuS' );
define( 'AUTH_SALT',        'jTU/@BUv.v+t2t_7Q!X0w}+H${H=$fyHU6u~<A>m5RxOVpkL6oAhhN-/AY]F+Qcy' );
define( 'SECURE_AUTH_SALT', 'jKgp }Rbnr^Bdn`^K$|,>=Rq~n*`0e,},aNx$as]asknDG>2xRBw.}${)yQUap^>' );
define( 'LOGGED_IN_SALT',   'Tip(_@d0YxkD@I7X~vqM7(]V,HEAHh:V`M{@vKgLIG8Zbj!KeS5wqj`h3(IZ2g2n' );
define( 'NONCE_SALT',       '2,_8?OO!:Kt)|,&M@JPQ:V9vQLnPq+E()#N1#&FXM5EnuN4AA@txGgI|wi[ZA{.L' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
