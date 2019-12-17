<?php
define('WP_CACHE', true);
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
define( 'DB_NAME', 'europass_wp692' );

/** MySQL database username */
define( 'DB_USER', 'europass_wp692' );

/** MySQL database password */
define( 'DB_PASSWORD', ')zSG9.1pt8' );

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
define( 'AUTH_KEY',         'g7xt6il413cmsahdcmyi6x3no3wszn1abxxq7x5yvo18yh1lacb60nq8drtx1fwv' );
define( 'SECURE_AUTH_KEY',  'b5y4zfeakp7qcu4e9motq0bz03oedmiu9bzylu65qujlsa2lfyr1yfgewdmsneoy' );
define( 'LOGGED_IN_KEY',    'g4isul8facgfvfm920tkkl08ag90kkhekmby3bsmhgyibqg2cp7vezv76zcp5s5x' );
define( 'NONCE_KEY',        'tkcn01yfoolhakczigaxwapxa4s9kzzpnlh0lwc2jna8uujoui1yuz2efsl4skp4' );
define( 'AUTH_SALT',        'vywjwke5fwkmxzc0wu2aaghjj7jp49x5llrz6g0pu8shnvrs4lydppwuzaeirnty' );
define( 'SECURE_AUTH_SALT', 'bmlbrrc0xawqqkzb5coctqdkhmzmqt6qahkzfruez5v6wzroypsnpnhktvmmgfnf' );
define( 'LOGGED_IN_SALT',   'jd4qyew2jhach2yotuch96bnru0gw7baxpqpiwftcu8ormcliozsndhwsrriak4g' );
define( 'NONCE_SALT',       'fa08orktfx3edwrt2czqkqqtgfah6ewv8sycm94idgoot5sp4wvxck4hhqppvg8k' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp9p_';

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
