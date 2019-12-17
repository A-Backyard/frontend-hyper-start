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
define( 'DB_NAME', 'europass_wp814' );

/** MySQL database username */
define( 'DB_USER', 'europass_wp814' );

/** MySQL database password */
define( 'DB_PASSWORD', '-p@W3wS371' );

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
define( 'AUTH_KEY',         'of6pwsyvrxydrkcp76ujctiz7b9rrlet3tilvyunytn8tglbwrt6l4sqcswbqayk' );
define( 'SECURE_AUTH_KEY',  'x3won8sjs5cmrrdcuhvrjr4bkspnqft9aqiz9iu8j5iufs9bs611rt59snuhs9m2' );
define( 'LOGGED_IN_KEY',    'jmbhdqn0eworma4trqjnioecd8eycyiuu8ds8mae7zcknqaj3tgfziqno3c8l3xo' );
define( 'NONCE_KEY',        'gvwthzqecvag2bqz8iiy7wm7fzimdoydyxr1fwiiw4ndtwptf9nuuuggcryr2nna' );
define( 'AUTH_SALT',        'r9ojmix3grp7enwbzkyr9smta8yuss34ashh9kchjamaisavddci6jnivnrssmsd' );
define( 'SECURE_AUTH_SALT', 'vwnq6rycsds1j4pfmxzgvl6badmujbxrhlttk1aygx66bwefof0tu4i2embbwr4z' );
define( 'LOGGED_IN_SALT',   'bi5rycjojpvneqjniq6i3hjmfkihxmgpemmokbhhge3wsck5pdfzwl3rzfpc81dt' );
define( 'NONCE_SALT',       'v0jopn7gd1ee9yswxroe5tcavllzbwwcdnq37xepuy9kbikax6ngnz8xbpdwhv2d' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpng_';

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
