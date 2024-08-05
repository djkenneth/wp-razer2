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
define( 'DB_NAME', 'wordpress_test' );

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
define( 'AUTH_KEY',         'Tj@w6)htr$`H{$h7|_FF^!c 6pDc)11=NW$t/N_>:CX5U n>Rli@ wv/.Za:j%iM' );
define( 'SECURE_AUTH_KEY',  '=[.BS*b]e??sf(D$i-RC /dHx}ij-$L~F}V0-CU7Ow:&BjCq1D>TnOx1?$tp~aNn' );
define( 'LOGGED_IN_KEY',    'Y28O+S84F*Tz=?*>_}po(jql(k(L!ucs_c &r)ku45*ERo{uDjeA5D{o6!_8J[t[' );
define( 'NONCE_KEY',        '1$ZqRZUTSb6=>?6kK~rJFH7)H4@iJ)fNv<kYZSN~nmtsFK1l5fl]]/<IuZXFMHq*' );
define( 'AUTH_SALT',        '!ohbG?j/,($SgU*~9@>U0Ak?j*O{7aGC;oX5l0kt`KI:Z7w0z,dq:F f3VJzb,:V' );
define( 'SECURE_AUTH_SALT', '}$VG)$-T%pyF!(xCt]GGVb:<+3A0YXY)$s9jt>?_^m]G:q=tT:J`J-V/{;}f;Rs[' );
define( 'LOGGED_IN_SALT',   '!a)Q9%aOjQA<e-b%3uu],wtc_XNkG^jPB:qb0o~FWg86_>2BzEd7&.rIba^JX3>(' );
define( 'NONCE_SALT',       'Zk1~4S:Vj>y05[fc!>Xt7k>O;zt>%(Sbm-y``jiS$,uRuL@HR{WWtYC,UpH%I4FG' );

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
