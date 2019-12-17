<?php
define('WP_CACHE', false);
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
define( 'DB_NAME', 'europass_wp949' );

/** MySQL database username */
define( 'DB_USER', 'europass_wp949' );

/** MySQL database password */
define( 'DB_PASSWORD', 'p57S@1Ea4]' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         'oi02b7qt9aj7c6luseqmnrhb61xl2wmpixe539lm5finuroj0htev5j6o6ixwzyz' );
define( 'SECURE_AUTH_KEY',  'sffo7wl06qogm3e7nondi9ntxalf6ryziqngwvr5fk5bjvwozpiixadgrpi1imbs' );
define( 'LOGGED_IN_KEY',    'drmskbkwvy44gf5gjts1ngylglbdye7oaagg4llrjicfvivwskw2lakkgcaapetr' );
define( 'NONCE_KEY',        'w9qntijvshkvespmdxjzejezcrj2a3fgc81r2of3voyw4cwexthrzcn0i5gasa9d' );
define( 'AUTH_SALT',        'fiauejzlpklieeyrp7snnqiv64o2vjitximfx7bbkqmeucpc4gd6hm5uciyzwstt' );
define( 'SECURE_AUTH_SALT', '33duxpzdcq7av6cn265wqawmsls8qfrdtxdvbcf7qlwj7kobouojc05j9fpp4mvq' );
define( 'LOGGED_IN_SALT',   '8hwbyapsfmjyejjhyzyzd8nsed8jtxpohwe50k1nsubvz3unyecblyhe2jnexeic' );
define( 'NONCE_SALT',       'bnhpkjcncqyckmo5aj99eyjfznwohsdbivpsesuzsplvao7meeec26a6zsgtvxd0' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
