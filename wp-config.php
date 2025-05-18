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
define( 'DB_NAME', '33w-voyage' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'admin' );

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
define( 'AUTH_KEY',         ';*3A{!| [0cc]-IUELh$8Lgw_iDTPJ;hdX-DO^guTV?*O!S7rnqXl?A><`iDp_y4' );
define( 'SECURE_AUTH_KEY',  'K*})oh]=GT[Ir=h*0cz^~|HKxklXYyuSmynx5V,,u+csX(C ;WHU;]Fx l90B%g ' );
define( 'LOGGED_IN_KEY',    'a5>QO7Z=q $wcXf:diS}Un|:p2/5T2JrOe!=Lb=9,EN6GqQ#-q4dfmj}K%Mpp.S0' );
define( 'NONCE_KEY',        '@28HrRI1nnkG)$h>BIpfAAjyCi_o7Z}_SS(@6hUe|:i4aiM$){{$Ih1-XWP>MOWK' );
define( 'AUTH_SALT',        's@Bu.fXS<;F/5_w,_.%UIdRe.F*z`_?qO<WXs}0Um;ziz!,WCB++5.{GQYYI[tDP' );
define( 'SECURE_AUTH_SALT', '+7(p-PpaoAeL7~6oU@OS-E^?9HUCkFnntA rApEaJFLT{uaI1kRJh8c:GF}Gu!A&' );
define( 'LOGGED_IN_SALT',   '@|QQ(TyUC&EE2@Yzk*>Ehs0[5xy==]k*I{<%]L=(&I=O#[N=eYQd/O_JU-Ae]&ao' );
define( 'NONCE_SALT',       '{j|SlM0&>Du_5B!P2QlqHA rfB.AnQ25-I%g6}?Az7lwL8|HNjb(7(.,%/BiVrzq' );

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
