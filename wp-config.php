<?php
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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'freshfa1_shamba' );

/** MySQL database username */
define( 'DB_USER', 'freshfa1_shamba' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Kitalale@2010' );

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
define( 'AUTH_KEY',         'WigLm*9)88rnnKE5Xxe2HvBPP=(V}d41r?Okp; dn@#!6P@0Kzv:$Zw$@r9fU+([' );
define( 'SECURE_AUTH_KEY',  'h2|Q?GXA>f>/(%_.R6o}x&Hg}fN0x 9e-Q,zJ!Kvi$Dpy?g6www2Q*FpKfg5j^LI' );
define( 'LOGGED_IN_KEY',    'v*j,bBO]0G[&4!~J)S3S@tt&}{AlI~dd|TI.%f|sZp#oU^06=P6<FN:n{0W!+3.D' );
define( 'NONCE_KEY',        'u`ot<X}|V<vb$kY?iC*yJKW;U][L=JdL_7<b=i,LlA).zC$%5Ah6pHbed-vzyAe%' );
define( 'AUTH_SALT',        'SdkVJ7>LDHF~x `&0T*s3D2uD,(Cp-Y`qtoAB(Ri+#U/rS*k+ZcO7B?+(VUa}f{U' );
define( 'SECURE_AUTH_SALT', '37=rdR9F^O$C+K`8VQ-Da:D$Gj7=tZG;c 1FpiOos0k)bzp!<c?05md)O*HJP$%5' );
define( 'LOGGED_IN_SALT',   'iL0UY#KNn[xOr;#[GiUd,1H%/H]u*(QME=2QctCAVLJUy@:(L6B*cgD#625AuS|O' );
define( 'NONCE_SALT',       '*?7-,Idi9e=DY_b!26T3Oi.tW-h^j.fR$^_ 4&]%|A~00-=0blm;@BWA/`aP3b1O' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'freshfa1_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
