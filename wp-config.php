<?php
define( 'WP_CACHE', true );

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

 * @link https://wordpress.org/support/article/editing-wp-config-php/

 *

 * @package WordPress

 */


// ** MySQL settings - You can get this info from your web host ** //

/** The name of the database for WordPress */

define( 'DB_NAME', '####' );


/** MySQL database username */

define( 'DB_USER', '#####' );


/** MySQL database password */

define( 'DB_PASSWORD', '#####' );


/** MySQL hostname */

define( 'DB_HOST', 'localhost' );


/** Database Charset to use in creating database tables. */

define( 'DB_CHARSET', 'utf8mb4' );


/** The Database Collate type. Don't change this if in doubt. */

define( 'DB_COLLATE', '' );


/**#@+

 * Authentication Unique Keys and Salts.

 *

 * Change these to different unique phrases!

 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}

 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.

 *

 * @since 2.6.0

 */

define( 'AUTH_KEY',         '1wn5xAUEKU$(2n8vMr4tN@NWq`aoYvUwqOdDq&Y7L]8NYb/5cI76FfU5ifI_B[J)' );

define( 'SECURE_AUTH_KEY',  'fNThq%R|5#UqR /$)Xq-Ky0,!V1!x[GgmXP%-zEx)u+-Kjja^K0{~St<Fh/vQA_;' );

define( 'LOGGED_IN_KEY',    'o5Hw()-curHHK.UjV<}!s-ceEi:Rz@T8(<+&9~a3,N$;oFQSFM|v++_XS$VG{DRM' );

define( 'NONCE_KEY',        '[`j9noPPm6M)_8?i?<iB:nr%/I,0Mg([@=QJf4n}aw2:2_G=yM=_=,BM*kSiFA~x' );

define( 'AUTH_SALT',        '{q};KYt,(,bt1fd-6S~<obviF I?_1V:9khk3c(yPNMjy`Kthl_J.gwH)DMV4mma' );

define( 'SECURE_AUTH_SALT', 'wm6 rvBVApYPE/LY@8~LMUD#- B`:( :nlY?nN/w|%cS<Rfn.!j#&Kh*hs8oQgNi' );

define( 'LOGGED_IN_SALT',   'tzjsuc$kTB7xv`Ybl!JU~^7U<thws>1G24z/^F$=_K~5b.Gzz/X)x~t~j+^dAEdb' );

define( 'NONCE_SALT',       '5Q-lIf.&YPA!Me*EOugC/XmyTsu]MM571u16>[)*RO<5rw>k0fjppO*|M@WqcdnU' );


/**#@-*/


/**

 * WordPress Database Table prefix.

 *

 * You can have multiple installations in one database if you give each

 * a unique prefix. Only numbers, letters, and underscores please!

 */

$table_prefix = 'wntp_';


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
 define( 'DISALLOW_FILE_MODS', true );
define( 'WP_DEBUG', false );
define( 'WP_AUTO_UPDATE_CORE', false );
define( 'FS_METHOD', 'direct' );
/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', __DIR__ . '/' );

}


/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

