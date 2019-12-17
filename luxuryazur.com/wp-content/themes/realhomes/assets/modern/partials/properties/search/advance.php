<?php
/**
 * Properties advance search.
 *
 * @package    realhomes
 * @subpackage modern
 */

$show_search            = is_page_template( 'templates/home.php' ) ? get_option( 'theme_show_home_search' ) : inspiry_show_header_search_form();
$get_search_form_layout = get_option( 'inspiry_search_form_mod_layout_options', 'default' );
$get_header_variations  = get_option( 'inspiry_header_mod_variation_option', 'one' );
if ( ere_is_search_page_configured() && $show_search ) :

//    if ( $get_header_variations == 'three' ) {
//        $hide_form = 'inspiry_hide_search_form';
//    }else{
//	    $hide_form = 'inspiry_show_search_form';
//    }

    ?>
    <!--    <div class="rh_prop_search rh_wrap--padding">-->



    <div class="rh_prop_search rh_prop_search_init">
		<?php
		if ( inspiry_is_rvr_enabled() ) {
			get_template_part( 'assets/modern/partials/properties/search/rvr-form' );
		} else {
				switch ( $get_search_form_layout ) {
					case 'default';
						get_template_part( 'assets/modern/partials/properties/search/form' );
						break;
					case 'smart';
						get_template_part( 'assets/modern/partials/properties/search/form-smart' );
						break;
				}
		}

		?>
    </div>
    <!-- /.rh_prop_search -->
<?php endif; ?>
