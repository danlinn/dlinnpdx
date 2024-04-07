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
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wordpress' );

/** Database password */
define( 'DB_PASSWORD', 'wordpress' );

/** Database hostname */
define( 'DB_HOST', 'database' );

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
define( 'AUTH_KEY',          'z`%kg,QwPx>3m1>d{h/v_(I^a*ug5h]*zQN>aW.J1W%LoG<=1b^C*F.v4XT*-}WJ' );
define( 'SECURE_AUTH_KEY',   ']h<`8N(I-R~mPu<d#HuDW5wRiv^@=`AOX8szvsSW8kRUDiy!)i^%wSl^rx`)-%a8' );
define( 'LOGGED_IN_KEY',     ',P%o=u+ES8KH0y&VK w,OCQHh%NYVs3{cu*]*$=G@uTCp/-Uu?2vPL{]s*n1~]= ' );
define( 'NONCE_KEY',         ':bSP<ffYk7G[3{0lBD*NbRHAej^JN|Y<th>l3`^.=d#lC #C?q+m*Gt,>1A1{[L?' );
define( 'AUTH_SALT',         '/Az48z5Y%oS}E&^;jxjRMia4ug5&OW!CO!v-gS)u+tDw_vDP,T&R-MPaxx +i`U2' );
define( 'SECURE_AUTH_SALT',  'AIT8OiW{}WuUvir@/5I!~h6czZ9P--fhj.]vTpvx*7kiUSFMqCVvu+c/^<KN1Ds:' );
define( 'LOGGED_IN_SALT',    'c6`5gZu;QI/4g.{JDM=Czsj0t&>8/+9g48h7K%gqA6&3];2FG/+<[TDJU>m(x^xa' );
define( 'NONCE_SALT',        ';n<UkP52OAVZ445KH@7GG:H?Y 7tf;YZXDy!y0DuZ$ I;9%dSQ{mAiKLf%vWFJ$e' );
define( 'WP_CACHE_KEY_SALT', 'gVqA]&y26#iV#N%M0rNu1mI3*G&tk}?j!HvO:c{wdZoS:1::}Fr}Uz_4{s}Y2sNg' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */

// Enable WP_DEBUG mode
define('WP_DEBUG', true);

// The following line ensures that errors will be displayed on-screen
define('WP_DEBUG_DISPLAY', true);

// Optionally, you can also log errors to a file for review
define('WP_DEBUG_LOG', true);

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
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
