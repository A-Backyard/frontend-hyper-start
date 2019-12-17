<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$inspiry_google_maps_api_key = $this->get_option( 'inspiry_google_maps_api_key' );
$theme_map_localization      = $this->get_option( 'theme_map_localization', 'true' );
$inspiry_google_maps_styles  = $this->get_option( 'inspiry_google_maps_styles' );

if ( isset( $_POST['_wpnonce'] ) && wp_verify_nonce( $_POST['_wpnonce'], 'inspiry_ere_settings' ) ) {
	update_option( 'inspiry_google_maps_api_key', $inspiry_google_maps_api_key );
	update_option( 'theme_map_localization', $theme_map_localization );
	update_option( 'inspiry_google_maps_styles', $inspiry_google_maps_styles );
	$this->notice();
}
?>
<div class="inspiry-ere-page-content">
    <h2 class="title"><?php esc_html_e( 'Open Street Map', 'easy-real-estate' ); ?></h2>
    <div class="description">
        <p><?php esc_html_e( 'By default, Open Street Map will be displayed if Google Maps API key is empty.', 'easy-real-estate' ); ?></p>
    </div>
    <form method="post" action="" novalidate="novalidate">
        <table class="form-table">
            <tbody>
            <tr>
                <th scope="row"><label for="inspiry_google_maps_api_key"><?php esc_html_e( 'Google Maps API Key', 'easy-real-estate' ); ?></label></th>
                <td><input name="inspiry_google_maps_api_key" type="text" id="inspiry_google_maps_api_key" value="<?php echo esc_attr( $inspiry_google_maps_api_key ); ?>" class="regular-text code"></td>
            </tr>
            <tr>
                <th scope="row"><?php esc_html_e( 'Localize Google Maps', 'easy-real-estate' ); ?></th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span><?php esc_html_e( 'Localize Google Maps', 'easy-real-estate' ); ?></span></legend>
                        <label>
                            <input type="radio" name="theme_map_localization" value="true" <?php checked( $theme_map_localization, 'true' ) ?>>
                            <span><?php esc_html_e( 'Yes', 'easy-real-estate' ); ?></span>
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="theme_map_localization" value="false" <?php checked( $theme_map_localization, 'false' ) ?>>
                            <span><?php esc_html_e( 'No', 'easy-real-estate' ); ?></span>
                        </label>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="inspiry_google_maps_styles"><?php esc_html_e( 'Google Maps Styles JSON (optional)', 'easy-real-estate' ); ?></label></th>
                <td>
                    <textarea name="inspiry_google_maps_styles" id="inspiry_google_maps_styles" rows="6" cols="40" class="code"><?php echo stripslashes( $inspiry_google_maps_styles ); ?></textarea>
                    <p class="description"><?php printf( esc_html__( 'You can create Google Maps styles JSON using %s Google Styling Wizard %s or %s Snazzy Maps %s.', 'easy-real-estate' ), '<a href="https://mapstyle.withgoogle.com/" target="_blank">', '</a>', '<a href="https://snazzymaps.com/" target="_blank">', '</a>' ); ?></p>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="submit">
            <?php wp_nonce_field('inspiry_ere_settings'); ?>
            <input type="submit" name="submit" id="submit" class="button button-primary" value="<?php esc_attr_e( 'Save Changes', 'easy-real-estate' ); ?>">
        </div>
    </form>
</div>