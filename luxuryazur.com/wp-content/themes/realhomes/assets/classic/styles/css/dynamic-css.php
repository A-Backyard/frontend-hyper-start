<?php
if ( ! function_exists( 'generate_dynamic_css' ) ) {
	function generate_dynamic_css() {

		$get_styles_options = get_theme_mod( 'inspiry_default_styles', 'custom' );

		$properties = get_posts( array(
			'post_type'      => 'property',
			'posts_per_page' => 100,
			'meta_query'     => array(
				array(
					'key'     => 'inspiry_property_label',
					'compare' => 'EXITS',
				),
				array(
					'key'     => 'inspiry_property_label_color',
					'compare' => 'EXITS',
				),
			),
		) );

		$dynamic_css_label = array();
		if ( ! empty( $properties ) && is_array( $properties ) ) {
			foreach ( $properties as $property ) {
				$post_id       = $property->ID;
				$color         = get_post_meta( $post_id, 'inspiry_property_label_color', true );
				$dynamic_css_label[] = array(
					'elements' => ".post-{$post_id} .property-label",
					'property' => 'background-color',
					'value'    => $color.' !important',
				);
			}
		}
		$prop_count_label = count( $dynamic_css_label );
		if ( $prop_count_label > 0 ) {
			echo "<style type='text/css' id='dynamic-css-prop-label'>\n\n";
			foreach ( $dynamic_css_label as $label_unit ) {
				if ( ! empty( $label_unit['value'] ) ) {
					echo $label_unit['elements'] . "{\n";
					echo $label_unit['property'] . ":" . $label_unit['value'] . ";\n";
					echo "}\n\n";
				}
			}
			echo '</style>';
		}

		// Only if background image is provided.
		$inspiry_features_background_image = get_option( 'inspiry_features_background_image' );

		if ( ! empty( $inspiry_features_background_image ) ) {
			?>
			<style type='text/css' id="dynamic-css-bg">
				.home-features-section .home-features-bg {
					background-image: url(<?php echo $inspiry_features_background_image?>);
				}
			</style>

			<?php
		}

		if ( ( $get_styles_options ) && ( $get_styles_options == 'default' ) ) {
			return;
		}

		//Core Colors

		$core_color_orange_light = get_theme_mod( 'theme_core_color_orange_light' );
		$core_color_orange_dark  = get_theme_mod( 'theme_core_color_orange_dark' );
		$core_color_orange_glow  = get_theme_mod( 'theme_core_color_orange_glow' );
		$core_color_orange_burnt  = get_theme_mod( 'theme_core_color_orange_burnt' );
		$core_color_blue_light   = get_theme_mod( 'theme_core_color_blue_light' );
		$core_color_blue_med     = get_theme_mod( 'theme_core_color_blue_med' );
		$core_color_blue_dark    = get_theme_mod( 'theme_core_color_blue_dark' );

		// Header
		$theme_header_bg_color         = get_option( 'theme_header_bg_color' );
		$theme_header_text_color       = get_option( 'theme_header_text_color' );
		$theme_header_link_hover_color = get_option( 'theme_header_link_hover_color' );
		$theme_header_border_color     = get_option( 'theme_header_border_color' );

		// Drop Down Menu
		$theme_main_menu_text_color       = get_option( 'theme_main_menu_text_color' );
		$theme_main_menu_text_hover_color = get_option( 'theme_main_menu_text_hover_color' );
		$theme_menu_bg_color              = get_option( 'theme_menu_bg_color' );
		$theme_menu_text_color            = get_option( 'theme_menu_text_color' );
		$theme_menu_hover_bg_color        = get_option( 'theme_menu_hover_bg_color' );
		$theme_menu_hover_text_color      = get_option( 'theme_menu_hover_text_color' );

		// Phone Icon and Number
		$theme_phone_bg_color      = get_option( 'theme_phone_bg_color' );
		$theme_phone_text_color    = get_option( 'theme_phone_text_color' );
		$theme_phone_icon_bg_color = get_option( 'theme_phone_icon_bg_color' );

		// Logo
		$theme_logo_text_color       = get_option( 'theme_logo_text_color' );
		$theme_logo_text_hover_color = get_option( 'theme_logo_text_hover_color' );

		// Tagline
		$theme_tagline_text_color = get_option( 'theme_tagline_text_color' );
		$theme_tagline_bg_color   = get_option( 'theme_tagline_bg_color' );


		// Language Switcher
		$theme_language_switcher_bg_color         = get_option( 'theme_language_switcher_bg_color' );
		$theme_language_switcher_link_color       = get_option( 'theme_language_switcher_link_color' );
		$theme_language_switcher_link_hover_color = get_option( 'theme_language_switcher_link_hover_color' );

		// Banner title
		$theme_banner_text_color         = get_option( 'theme_banner_text_color' );
		$theme_banner_sub_text_color     = get_option( 'theme_banner_sub_text_color' );
		$theme_banner_title_bg_color     = get_option( 'theme_banner_title_bg_color' );
		$theme_banner_sub_title_bg_color = get_option( 'theme_banner_sub_title_bg_color' );

		// Slide
		$theme_slide_title_color              = get_option( 'theme_slide_title_color' );
		$theme_slide_title_hover_color        = get_option( 'theme_slide_title_hover_color' );
		$theme_slide_desc_text_color          = get_option( 'theme_slide_desc_text_color' );
		$theme_slide_price_color              = get_option( 'theme_slide_price_color' );
		$theme_slide_know_more_text_color     = get_option( 'theme_slide_know_more_text_color' );
		$theme_slide_know_more_bg_color       = get_option( 'theme_slide_know_more_bg_color' );
		$theme_slide_know_more_hover_bg_color = get_option( 'theme_slide_know_more_hover_bg_color' );

		// Search Form Over Image
		$inspiry_SFOI_top_margin        = get_option( 'inspiry_SFOI_top_margin' );
		$inspiry_SFOI_title_color       = get_option( 'inspiry_SFOI_title_color' );
		$inspiry_SFOI_description_color = get_option( 'inspiry_SFOI_description_color' );
		$inspiry_SFOI_overlay_opacity   = get_option( 'inspiry_SFOI_overlay_opacity', 0.3 );
		$inspiry_SFOI_overlay_color     = inspiry_hex2rgb( get_option( 'inspiry_SFOI_overlay_color', '#000' ), $inspiry_SFOI_overlay_opacity );

		// property item
		$theme_property_item_bg_color        = get_option( 'theme_property_item_bg_color' );
		$theme_property_item_border_color    = get_option( 'theme_property_item_border_color' );
		$theme_property_title_color          = get_option( 'theme_property_title_color' );
		$theme_property_title_hover_color    = get_option( 'theme_property_title_hover_color' );
		$theme_property_price_text_color     = get_option( 'theme_property_price_text_color' );
		$theme_property_price_bg_color       = get_option( 'theme_property_price_bg_color' );
		$theme_property_status_text_color    = get_option( 'theme_property_status_text_color' );
		$theme_property_status_bg_color      = get_option( 'theme_property_status_bg_color' );
		$theme_property_desc_text_color      = get_option( 'theme_property_desc_text_color' );
		$theme_more_details_text_color       = get_option( 'theme_more_details_text_color' );
		$theme_more_details_text_hover_color = get_option( 'theme_more_details_text_hover_color' );
		$theme_property_meta_text_color      = get_option( 'theme_property_meta_text_color' );
		$theme_property_meta_bg_color        = get_option( 'theme_property_meta_bg_color' );

		// Footer
		$theme_disable_footer_bg              = get_option( 'theme_disable_footer_bg' );
		$theme_footer_bg_img                  = get_option( 'theme_footer_bg_img' );
		$theme_footer_widget_title_color      = get_option( 'theme_footer_widget_title_color' );
		$theme_footer_widget_text_color       = get_option( 'theme_footer_widget_text_color' );
		$theme_footer_widget_link_color       = get_option( 'theme_footer_widget_link_color' );
		$theme_footer_widget_link_hover_color = get_option( 'theme_footer_widget_link_hover_color' );
		$theme_footer_border_color            = get_option( 'theme_footer_border_color' );

		// Button
		$theme_button_text_color            = get_option( 'theme_button_text_color' );
		$theme_button_bg_color              = get_option( 'theme_button_bg_color' );
		$theme_button_hover_text_color      = get_option( 'theme_button_hover_text_color' );
		$theme_button_hover_bg_color        = get_option( 'theme_button_hover_bg_color' );
		$inspiry_back_to_top_bg_color       = get_option( 'inspiry_back_to_top_bg_color' );
		$inspiry_back_to_top_bg_hover_color = get_option( 'inspiry_back_to_top_bg_hover_color' );
		$inspiry_back_to_top_color          = get_option( 'inspiry_back_to_top_color' );

		// Homepage Features Section
		$inspiry_features_text_color       = get_option( 'inspiry_features_text_color' );
		$inspiry_features_background_color = get_option( 'inspiry_features_background_color' );

		// Gallery Images Hover Color
		$inspiry_gallery_hover_color = get_option( 'inspiry_gallery_hover_color' );
//		$inspiry_gallery_hover_color = inspiry_hex_to_rgba( $inspiry_gallery_hover_color, 0.9 );

		// News Page Colors
		$inspiry_post_text_color   = get_option( 'inspiry_post_text_color' );
		$inspiry_post_border_color = get_option( 'inspiry_post_border_color' );

		$dynamic_css = array(

			// Core Colors
			// #ec894d
			array(
				'elements' => '.main-menu ul li.current-menu-ancestor > a,
								.main-menu ul li.current-menu-parent > a,
								.main-menu ul li.current-menu-item > a,
							    .main-menu ul li.current_page_item > a,
								.main-menu ul li:hover > a,
				                .main-menu ul li ul,
				                .main-menu ul li ul li ul,
				                .property-item figure figcaption,
				                .inner-wrapper .hentry .post-tags a,
				                .real-btn,
				                #filter-by a:focus,
				                #filter-by a.active,
				                #filter-by a:hover,
				                #dsidx-listings li.dsidx-listing-container:hover .dsidx-primary-data,
				                #dsidx-listings .dsidx-listing-container .dsidx-listing .dsidx-media .dsidx-photo .dsidx-photo-count,
				                #dsidx .dsidx-small-button, body.dsidx .dsidx-small-button, #dsidx .dsidx-large-button, body.dsidx .dsidx-large-button,
				                .ihf-map-icon,
				                #ihf-main-container ul.pagination li:first-child a,
				                #ihf-main-container ul.pagination li:first-child span,
				                #ihf-main-container ul.pagination li:last-child a,
				                #ihf-main-container ul.pagination li:last-child span,
				                #ihf-main-container .ihf-widget .row button,
				                #ihf-main-container .ihf-listing-search-results .btn-group .btn:not(.dropdown-toggle),
				                #ihf-main-container .ihf-listing-search-results #saveSearchButton,
				                .real-btn, .btn-blue, .btn-grey, input[type="submit"], 
				                .sidebar .widget .dsidx-widget .submit,
				                .rh_slide__container .rh_slide__details .rh_prop_details .rh_prop_details__buttons a',
				'property' => 'background-color',
				'value'    => $core_color_orange_light,
			),
			array(
				'elements' => '.ihf-map-icon',
				'property' => 'background-color',
				'value'    => $core_color_orange_light . '!important',
			),
			array(
				'elements' => '#ihf-main-container .ihf-widget .row button,
				                .rh_slide__container .rh_slide__details .rh_prop_details .rh_prop_details__buttons a,
				                .rh_slide__container .rh_slide__details .rh_prop_details .rh_prop_details__buttons a:hover,
						    	#ihf-main-container .ihf-listing-search-results .btn-group .btn:not(.dropdown-toggle)',
				'property' => 'border-color',
				'value'    => $core_color_orange_light ,
			),
			array(
				'elements' => '.ihf-map-icon',
				'property' => 'border-color',
				'value'    => $core_color_orange_light . '!important',
			),
			array(
				'elements' => '.ihf-map-icon:after',
				'property' => 'border-top-color',
				'value'    => $core_color_orange_light . '!important',
			),
			array(
				'elements' => '::selection',
				'property' => 'background-color',
				'value'    => $core_color_orange_light,
			),
			array(
				'elements' => '::-moz-selection',
				'property' => 'background-color',
				'value'    => $core_color_orange_light,
			),
			array(
				'elements' => '#filter-by a:focus,
				               #filter-by a.active,
				               #filter-by a:hover,
				               #ihf-main-container ul.pagination li:first-child a,
				               #ihf-main-container ul.pagination li:first-child span,
				               #ihf-main-container ul.pagination li:last-child a,
				               #ihf-main-container ul.pagination li:last-child span',
				'property' => 'border-color',
				'value'    => $core_color_orange_light,
			),
			array(
				'elements' => '.post-meta a,
								#comments a:hover,
								.gallery-item .item-title a:hover,
								.rh_slide__container .rh_slide__details .rh_prop_details .rh_prop_details__price .price',

				'property' => 'color',
				'value'    => $core_color_orange_light,
			),

			//#dc7d44
			array(
				'elements' => '.main-menu ul li ul li:hover > a,
				                .main-menu ul li ul li ul li:hover > a,
				                #dsidx-top-search #dsidx-search-bar .dsidx-search-controls button,
				                #ihf-main-container ul.pagination li:first-child a:hover,
				                #ihf-main-container ul.pagination li:first-child span:hover,
				                #ihf-main-container ul.pagination li:last-child a:hover,
				                #ihf-main-container ul.pagination li:last-child span:hover,
				                #ihf-main-container .ihf-listing-search-results .btn-group .btn:not(.dropdown-toggle):hover,
				                #ihf-main-container .ihf-listing-search-results .btn-group .btn.active:not(.dropdown-toggle),
				                #ihf-main-container .ihf-listing-search-results #saveSearchButton:hover,
				                #ihf-main-container .ihf-widget .row button:hover',
				'property' => 'background-color',
				'value'    => $core_color_orange_dark,
			),
			array(
				'elements' => '#ihf-main-container ul.pagination li:first-child a:hover,
							   #ihf-main-container ul.pagination li:first-child span:hover,
							   #ihf-main-container ul.pagination li:last-child a:hover,
							   #ihf-main-container ul.pagination li:last-child span:hover,
							   #ihf-main-container .ihf-listing-search-results .btn-group .btn:not(.dropdown-toggle):hover,
							   #ihf-main-container .ihf-listing-search-results .btn-group .btn.active:not(.dropdown-toggle)',
				'property' => 'border-color',
				'value'    => $core_color_orange_dark,
			),
			array(
				'elements' => '.widget ul li a:hover,
							    #footer .widget ul li a:hover,
				                #footer .widget ul li a:focus,
				                #footer.widget ul li a:active,
				                #footer .widget a:hover,
				                #footer .widget a:focus,
				                #footer .widget a:active,
				                #footer-bottom a:hover,
				                #footer-bottom a:focus,
				                #footer-bottom a:active,
				                #overview .share-networks a:hover',
				'property' => 'color',
				'value'    => $core_color_orange_dark,
			),

			//#e3712c
			array(
				'elements' => '.real-btn:hover,
								.inner-wrapper .hentry .post-tags a:hover,
								input:hover[type="submit"],
								.tagcloud a:hover,
								.real-btn.current,
								#dsidx-top-search #dsidx-search-bar .dsidx-search-controls button:hover',
				'property' => 'background-color',
				'value'    => $core_color_orange_glow,
			),

			//#df5400
			array(
				'elements' => '#dsidx .dsidx-small-button:hover,
							   body.dsidx .dsidx-small-button:hover,
							   #dsidx .dsidx-large-button:hover,
							   body.dsidx .dsidx-large-button:hover',
				'property' => 'background-color',
				'value'    => $core_color_orange_burnt,
			),
			array(
				'elements' => '.view-type a.grid.active .boxes,
							   .view-type a.grid:hover .boxes,
							   .view-type a.list.active .boxes,
							   .view-type a.list:hover .boxes',
				'property' => 'fill',
				'value'    => $core_color_orange_burnt,
			),
			array(
				'elements' => 'a:hover,
							   .more-details:hover,
						       .more-details:focus,
							   .more-details:active,
							   .es-carousel-wrapper ul li p a:hover,
							   .es-carousel-wrapper ul li p a:focus,
							   .es-carousel-wrapper ul li p a:active,
							   .property-item h4 a:hover,
							   .property-item h4 a:focus,
							   .property-item h4 a:active,
							   .es-carousel-wrapper ul li h4 a:hover,
							   .es-carousel-wrapper ul li h4 a:focus,
							   .es-carousel-wrapper ul li h4 a:active,
							   .post-title a:hover,
							   .slide-description h3 a:hover,
							   #dsidx-disclaimer a:hover,
							   .slide-description span,
							   #dsidx.dsidx-results .dsidx-paging-control a:hover,
							   #ihf-main-container a:hover,
							   #ihf-main-container .ihf-slider-col .ihf-grid-result-container .ihf-grid-result-photocount a:hover,
							   #ihf-main-container .ihf-grid-result .ihf-grid-result-container .ihf-grid-result-photocount a:hover,
							   #ihf-main-container .ihf-slider-col .ihf-grid-result-container .ihf-grid-result-address:hover,
							   #ihf-main-container .ihf-grid-result .ihf-grid-result-container .ihf-grid-result-address:hover,
							   ul.featured-properties li h4 a:hover,
							   .about-agent h4 a:hover,
							   .property-item h4 .about-agent a a:hover,
							   .contact-details .contacts-list li a:hover',
				'property' => 'color',
				'value'    => $core_color_orange_burnt,
			),

			//#4dc7ec
			array(
				'elements' => '.property-item .price,
							   .es-carousel-wrapper ul li .price,
							   .slide-description .know-more,
							   #scroll-top,
							   #overview .property-item .price span,
							   .tagcloud a,
							   .format-image .format-icon.image,
							   .format-video .format-icon.video,
							   .format-gallery .format-icon.gallery,
							   .listing-slider .flex-direction-nav a.flex-next,
							   .listing-slider .flex-direction-nav a.flex-prev,
							   .listing-slider .flex-control-paging li a,
							   #dsidx-listings .dsidx-primary-data,
							   #dsidx-top-search #dsidx-search-bar,
							   #dsidx-top-search #dsidx-search-form-wrap,
							   .dsidx-results-grid #dsidx-listings .dsidx-listing .dsidx-data .dsidx-primary-data .dsidx-price,
							   #dsidx-top-search #dsidx-search-form-main #dsidx-search-filters .dsidx-search-openclose,
							   #dsidx-zestimate #dsidx-zestimate-notice,
							   #dsidx-zestimate #dsidx-rentzestimate-notice,
							   #dsidx-rentzestimate #dsidx-zestimate-notice,
							   #dsidx-rentzestimate #dsidx-rentzestimate-notice,
							   .dsidx-details .dsidx-headerbar-green,
							   .rh_slide__container figure .statuses a,
							   .posts-main .post-footer .real-btn,
							   #ihf-main-container .ihf-slider-col .ihf-grid-result-container .ihf-grid-result-price,
							   #ihf-main-container .ihf-grid-result .ihf-grid-result-container .ihf-grid-result-price,
							   .select2-container--default .select2-results__option--highlighted[aria-selected]',
				'property' => 'background-color',
				'value'    => $core_color_blue_light,
			),
			array(
				'elements' => '#dsidx-zestimate #dsidx-zestimate-triangle,
							   #dsidx-zestimate #dsidx-rentzestimate-triangle,
							   #dsidx-rentzestimate #dsidx-zestimate-triangle,
							   #dsidx-rentzestimate #dsidx-rentzestimate-triangle',
				'property' => 'border-left-color',
				'value'    => $core_color_blue_light,
			),
			array(
				'elements' => '#dsidx-zestimate,
							   #dsidx-rentzestimate,
							   .dsidx-details .dsidx-headerbar-green',
				'property' => 'border-color',
				'value'    => $core_color_blue_light,
			),
			array(
				'elements' => '.dsidx-details .dsidx-contact-form',
				'property' => 'border-color',
				'value'    => $core_color_blue_light . '!important',
			),
			array(
				'elements' => '.gallery-item .media_container',
				'property' => 'background-color',
//				'value'    => $core_color_blue_light,
				'value'    => inspiry_hex_to_rgba($core_color_blue_light,.9),
			),
			array(
				'elements' => '#dsidx-zestimate,
							   #dsidx-rentzestimate',
				'property' => 'background-color',
				'value'    => inspiry_hex_to_rgba($core_color_blue_light,.1),
			),

			array(
				'elements' => '#overview .property-item .price .price-and-type .tag-arrow svg',
				'property' => 'fill',
				'value'    => $core_color_blue_light,
			),

			array(
				'elements' => '#footer .widget ul.featured-properties li .price,
							   ul.featured-properties li .price,
							   .property-grid .property-item span',
				'property' => 'color',
				'value'    => $core_color_blue_light,
			),

			array(
				'elements' => '.form-heading',
				'property' => 'border-top-color',
				'value'    => $core_color_blue_light,
			),

			array(
				'elements' => '.post-meta',
				'property' => 'border-bottom-color',
				'value'    => $core_color_blue_light,
			),

			//#2aa6cc
//			array(
//				'elements' => '.slide-description .know-more:hover',
//				'property' => 'background-color',
//				'value'    => $core_color_blue_med,
//			),

			//#37b3d9
			array(
				'elements' => '#scroll-top:hover,
							   .page-head p,
							   .page-head div.page-breadcrumbs,
							   .slide-description .know-more:hover,
							   .home-features-section .home-features-bg,
							   .rh_slide__container figure .statuses a:hover,
							   .posts-main .post-footer .real-btn:hover',
				'property' => 'background-color',
				'value'    => $core_color_blue_dark,
			),

			array(
				'elements' => '.dsidx-widget li:before,
							   #dsidx-listings .dsidx-secondary-data div:before,
							   div.dsidx-results-widget ul.dsidx-list li:before,
							   #dsidx-disclaimer a,
							   #dsidx.dsidx-results .dsidx-paging-control a',
				'property' => 'color',
				'value'    => $core_color_blue_dark,
			),


			// Header background color.
			array(
				'elements' => '.header-wrapper, #currency-switcher #selected-currency, #currency-switcher-list li',
				'property' => 'background-color',
				'value'    => $theme_header_bg_color,
			),
			//Logo
			array(
				'elements' => '#logo h2 a',
				'property' => 'color',
				'value'    => $theme_logo_text_color
			),
			array(
				'elements' => '#logo h2 a:hover, #logo h2 a:focus, #logo h2 a:active',
				'property' => 'color',
				'value'    => $theme_logo_text_hover_color
			),
			//Tagline
			array(
				'elements' => '.tag-line span',
				'property' => 'color',
				'value'    => $theme_tagline_text_color
			),
			array(
				'elements' => '.tag-line span',
				'property' => 'background-color',
				'value'    => $theme_tagline_bg_color
			),
			// Language Switcher
			array(
				'elements' => '.inspiry-language-switcher > ul > li > ul',
				'property' => 'background-color',
				'value'    => $theme_language_switcher_bg_color
			),
			array(
				'elements' => '.inspiry-language-switcher a',
				'property' => 'color',
				'value'    => $theme_language_switcher_link_color
			),
			array(
				'elements' => '.inspiry-language-switcher a:hover',
				'property' => 'color',
				'value'    => $theme_language_switcher_link_hover_color
			),
			//Banner title
			array(
				'elements' => '.page-head .page-title span',
				'property' => 'color',
				'value'    => $theme_banner_text_color
			),
			array(
				'elements' => '.page-head .page-title span',
				'property' => 'background-color',
				'value'    => $theme_banner_title_bg_color
			),
			array(
				'elements' => '.page-head p',
				'property' => 'color',
				'value'    => $theme_banner_sub_text_color
			),
			array(
				'elements' => '.page-head p',
				'property' => 'background-color',
				'value'    => $theme_banner_sub_title_bg_color
			),
			//Header Text color
			array(
				'elements' => '.header-wrapper, #contact-email, #contact-email a, .user-nav a, .social_networks li a, #currency-switcher #selected-currency, #currency-switcher-list li,.user-nav a:after',
				'property' => 'color',
				'value'    => $theme_header_text_color
			),
            array(
				'elements' => '#contact-email svg .path',
				'property' => 'fill',
				'value'    => $theme_header_text_color
			),
			//Header Link Hover color
			array(
				'elements' => '#contact-email a:hover, .user-nav a:hover',
				'property' => 'color',
				'value'    => $theme_header_link_hover_color
			),
			//Header Border color
			array(
				'elements' => '#header-top, .social_networks li a, .user-nav a, .header-wrapper .social_networks, #currency-switcher #selected-currency, #currency-switcher-list li',
				'property' => 'border-color',
				'value'    => $theme_header_border_color
			),
			//Drop Down Menu Text color
			array(
				'elements' => '.main-menu ul li a',
				'property' => 'color',
				'value'    => $theme_main_menu_text_color
			),

            array(
				'elements' => '.main-menu ul li:hover > a,
				                .main-menu ul li.current-menu-item > a',
				'property' => 'color',
				'value'    => $theme_main_menu_text_hover_color
			),
			//Drop Down Menu background color
			array(
				'elements' => '.main-menu ul li.current-menu-ancestor > a, .main-menu ul li.current-menu-parent > a, .main-menu ul li.current-menu-item > a, .main-menu ul li.current_page_item > a, .main-menu ul li:hover > a, .main-menu ul li ul, .main-menu ul li ul li ul',
				'property' => 'background-color',
				'value'    => $theme_menu_bg_color
			),
			//Drop Down Menu Text color
			array(
				'elements' => '.main-menu ul li ul li.current-menu-ancestor > a, 
				                .main-menu ul li ul li.current-menu-parent > a, 
				                .main-menu ul li ul li.current-menu-item > a, 
				                .main-menu ul li ul li.current_page_item > a, 
				                .main-menu ul li ul li:hover > a, 
				                .main-menu ul li ul, 
				                .main-menu ul li ul li a, 
				                .main-menu ul li ul li ul, 
				                .main-menu ul li ul li ul li a',
				'property' => 'color',
				'value'    => $theme_menu_text_color
			),
			//Drop Down Menu hover background color
			array(
				'elements' => '.main-menu ul li ul li:hover > a, .main-menu ul li ul li ul li:hover > a',
				'property' => 'background-color',
				'value'    => $theme_menu_hover_bg_color
			),
            array(
				'elements' => '.main-menu ul li ul li:hover > a, .main-menu ul li ul li ul li:hover > a',
				'property' => 'color',
				'value'    => $theme_menu_hover_text_color
			),
			// Menu item description color and background colors
			array(
				'elements' => '.main-menu ul li .menu-item-desc',
				'property' => 'color',
				'value'    => $theme_menu_bg_color
			),
			array(
				'elements' => '.main-menu ul li .menu-item-desc',
				'property' => 'background-color',
				'value'    => $theme_menu_text_color
			),
			// Slide
			array(
				'elements' => '.slide-description h3, .slide-description h3 a',
				'property' => 'color',
				'value'    => $theme_slide_title_color
			),
			array(
				'elements' => '.slide-description h3 a:hover, .slide-description h3 a:focus, .slide-description h3 a:active',
				'property' => 'color',
				'value'    => $theme_slide_title_hover_color
			),
			array(
				'elements' => '.slide-description p',
				'property' => 'color',
				'value'    => $theme_slide_desc_text_color
			),
			array(
				'elements' => '.slide-description span',
				'property' => 'color',
				'value'    => $theme_slide_price_color
			),
			array(
				'elements' => '.slide-description .know-more',
				'property' => 'color',
				'value'    => $theme_slide_know_more_text_color
			),
			array(
				'elements' => '.slide-description .know-more',
				'property' => 'background-color',
				'value'    => $theme_slide_know_more_bg_color
			),
			array(
				'elements' => '.slide-description .know-more:hover',
				'property' => 'background-color',
				'value'    => $theme_slide_know_more_hover_bg_color
			),
			// Search Form Over Image
			array(
				'elements' => '.SFOI__overlay',
				'property' => 'background-color',
				'value'    => $inspiry_SFOI_overlay_color,
			),
			array(
				'elements' => '.SFOI__title',
				'property' => 'color',
				'value'    => $inspiry_SFOI_title_color,
			),
			array(
				'elements' => '.SFOI__description',
				'property' => 'color',
				'value'    => $inspiry_SFOI_description_color,
			),
			//property item
			array(
				'elements' => '.property-item',
				'property' => 'background-color',
				'value'    => $theme_property_item_bg_color
			),
			array(
				'elements' => '.property-item, .property-item .property-meta, .property-item .property-meta span',
				'property' => 'border-color',
				'value'    => $theme_property_item_border_color
			),
			array(
				'elements' => '.property-item h4, .property-item h4 a, .es-carousel-wrapper ul li h4 a',
				'property' => 'color',
				'value'    => $theme_property_title_color
			),
			array(
				'elements' => '.property-item h4 a:hover, .property-item h4 a:focus, .property-item h4 a:active, .es-carousel-wrapper ul li h4 a:hover, .es-carousel-wrapper ul li h4 a:focus, .es-carousel-wrapper ul li h4 a:active',
				'property' => 'color',
				'value'    => $theme_property_title_hover_color
			),
			array(
				'elements' => '.property-item .price, .es-carousel-wrapper ul li .price, .property-item .price small',
				'property' => 'color',
				'value'    => $theme_property_price_text_color
			),
			array(
				'elements' => '.property-item .price, .es-carousel-wrapper ul li .price',
				'property' => 'background-color',
				'value'    => $theme_property_price_bg_color
			),
			array(
				'elements' => '.property-item figure figcaption',
				'property' => 'color',
				'value'    => $theme_property_status_text_color
			),
			array(
				'elements' => '.property-item figure figcaption',
				'property' => 'background-color',
				'value'    => $theme_property_status_bg_color
			),
			array(
				'elements' => '.property-item p, .es-carousel-wrapper ul li p',
				'property' => 'color',
				'value'    => $theme_property_desc_text_color
			),
			array(
				'elements' => '.more-details, .es-carousel-wrapper ul li p a',
				'property' => 'color',
				'value'    => $theme_more_details_text_color
			),
			array(
				'elements' => '.more-details:hover, .more-details:focus, .more-details:active, .es-carousel-wrapper ul li p a:hover, .es-carousel-wrapper ul li p a:focus, .es-carousel-wrapper ul li p a:active',
				'property' => 'color',
				'value'    => $theme_more_details_text_hover_color
			),
			array(
				'elements' => '.property-item .property-meta span',
				'property' => 'color',
				'value'    => $theme_property_meta_text_color
			),
			array(
				'elements' => '.property-item .property-meta',
				'property' => 'background-color',
				'value'    => $theme_property_meta_bg_color
			),
			array(
				'elements' => '#footer .widget .title',
				'property' => 'color',
				'value'    => $theme_footer_widget_title_color
			),
			array(
				'elements' => '#footer .widget .textwidget, #footer .widget, #footer-bottom p',
				'property' => 'color',
				'value'    => $theme_footer_widget_text_color
			),
			array(
				'elements' => '#footer .widget ul li a, #footer .widget a, #footer-bottom a',
				'property' => 'color',
				'value'    => $theme_footer_widget_link_color
			),
			array(
				'elements' => '#footer .widget ul li a:hover, #footer .widget ul li a:focus, #footer.widget ul li a:active, #footer .widget a:hover, #footer .widget a:focus, #footer .widget a:active, #footer-bottom a:hover, #footer-bottom a:focus, #footer-bottom a:active',
				'property' => 'color',
				'value'    => $theme_footer_widget_link_hover_color
			),
			array(
				'elements' => '#footer-bottom',
				'property' => 'border-color',
				'value'    => $theme_footer_border_color
			),
			//button
			array(
				'elements' => '.page-main .post-content .real-btn,
				               .single-post-main .post-content .real-btn,
				               .posts-main .post-footer .real-btn,
				               .real-btn',
				'property' => 'color',
				'value'    => $theme_button_text_color
			),
			array(
				'elements' => '.posts-main .post-footer .real-btn, .real-btn',
				'property' => 'background-color',
				'value'    => $theme_button_bg_color
			),
			array(
				'elements' => '.page-main .post-content .real-btn:hover,
				               .posts-main .post-footer .real-btn:hover,
				               .single-post-main .post-content .real-btn:hover, .real-btn:hover, .real-btn.current',
				'property' => 'color',
				'value'    => $theme_button_hover_text_color
			),
			array(
				'elements' => '.posts-main .post-footer .real-btn:hover, .real-btn:hover, .real-btn.current',
				'property' => 'background-color',
				'value'    => $theme_button_hover_bg_color
			),
			array(
				'elements' => '#scroll-top',
				'property' => 'background-color',
				'value'    => $inspiry_back_to_top_bg_color
			),
			array(
				'elements' => '#scroll-top:hover',
				'property' => 'background-color',
				'value'    => $inspiry_back_to_top_bg_hover_color
			),
			array(
				'elements' => '#scroll-top',
				'property' => 'color',
				'value'    => $inspiry_back_to_top_color
			),
			// Homepage Features Section Styles
			array(
				'elements' => '.home-features-section .home-features-bg',
				'property' => 'background-color',
				'value'    => $inspiry_features_background_color
			),
			array(
				'elements' => '
									.home-features-section .headings h2,
									.home-features-section .headings p,
									.home-features-section .features-wrapper .features-single .feature-content h4,
									.home-features-section .features-wrapper .features-single .feature-content p
								',
				'property' => 'color',
				'value'    => $inspiry_features_text_color
			),
			// Gallery Style Colors
			array(
				'elements' => '.gallery-item .media_container',
				'property' => 'background-color',
				'value'    => inspiry_hex_to_rgba( $inspiry_gallery_hover_color, 0.9 ),
			),
			// News Posts Styles
			array(
				'elements' => '
				.posts-main .post-content, 
				.posts-main .post-summary,
				.single-post-main .post-content,
				.single-post-main .post-summary,
				.search-post-main .post-content,
				.search-post-main .post-summary, 
				.archives-main .post-content,
				.archives-main .post-summary,
				.single article p,
				.single article ul,
				.single article ol,
				#overview .property-item .content,
				.inner-wrapper .hentry',
				'property' => 'color',
				'value'    => $inspiry_post_text_color
			),
			array(
				'elements' => '.format-image .format-icon.image,
							   .format-video .format-icon.video,
							   .format-gallery .format-icon.gallery,
							   .listing-slider .flex-direction-nav a.flex-next,
							   .listing-slider .flex-direction-nav a.flex-prev,
							   .listing-slider .flex-control-paging li a',
				'property' => 'background-color',
				'value'    => $inspiry_post_border_color,
			),

			array(
				'elements' => '.post-meta',
				'property' => 'border-bottom-color',
				'value'    => $inspiry_post_border_color,
			),
			array(
				'elements' => '
									.format-image .format-icon.image,
									.format-video .format-icon.video,
									.format-gallery .format-icon.gallery
								',
				'property' => 'background-color',
				'value'    => $inspiry_post_border_color,
			),
			array(
				'elements' => '
									.rh_comments__header,
									#respond #reply-title
								',
				'property' => 'border-top',
				'value'    => '2px solid ' . $inspiry_post_border_color,
			),

		);


		/*
		 * Primary Heading Font
		 */
		$inspiry_heading_font = get_option( 'inspiry_heading_font', 'Default' );
		if ( 'Default' != $inspiry_heading_font ) {
			$dynamic_css[] = array(
				'elements' => '
								h1, h2, h3, h4, h5, h6,
								.inner-wrapper .hentry p.info,
								.inner-wrapper .hentry p.tip,
								.inner-wrapper .hentry p.success,
								.inner-wrapper .hentry p.error,
								.main-menu ul li a,
								#overview .share-label,
								#overview .common-label,
								#overview .video-label,
								#overview .attachments-label,
								#overview .map-label,
								#overview .floor-plans .floor-plans-label,
								#dsidx-listings .dsidx-address a,
								#dsidx-listings .dsidx-price,
								#dsidx-listings .dsidx-listing-container .dsidx-listing .dsidx-primary-data .dsidx-address a,
								.inspiry-social-login .wp-social-login-connect-with ',
				'property' => 'font-family',
				'value'    => $inspiry_heading_font,
			);
		}

		/*
		 * Secondary Heading Font
		 */
		$inspiry_secondary_font = get_option( 'inspiry_secondary_font', 'Default' );
		if ( 'Default' != $inspiry_secondary_font ) {
			$dynamic_css[] = array(
				'elements' => '
								.real-btn, .btn-blue, .btn-grey, input[type="submit"], .sidebar .widget .dsidx-widget .submit,
								input[type="number"], input[type="date"], input[type="tel"], input[type="url"], input[type="email"], input[type="text"], input[type="password"], textarea,
								.selectwrap,
								.more-details,
								.slide-description span, .slide-description .know-more,
								.advance-search,
								.select2-container .select2-selection,
								.property-item h4, .property-item h4 a,
								.property-item .property-meta,
								.es-carousel-wrapper ul li h4, .es-carousel-wrapper ul li .property-item h4 a, .property-item h4 .es-carousel-wrapper ul li a, .es-carousel-wrapper ul li h4 a, .property-item h4 .es-carousel-wrapper ul li a a,
								.es-carousel-wrapper ul li .price,
								#footer .widget, #footer .widget .title,
								#footer-bottom,
								.widget, .widget .title, .widget ul li, .widget .enquiry-form .agent-form-title,
								#footer .widget ul.featured-properties li h4,
								#footer .widget ul.featured-properties li .property-item h4 a,
								.property-item h4 #footer .widget ul.featured-properties li a,
								#footer .widget ul.featured-properties li h4 a,
								.property-item h4 #footer .widget ul.featured-properties li a a,
								ul.featured-properties li h4,
								ul.featured-properties li .property-item h4 a,
								.property-item h4 ul.featured-properties li a,
								ul.featured-properties li h4 a,
								ul.featured-properties li .property-item h4 a a,
								.property-item h4 ul.featured-properties li a a,
								.page-head .page-title, .post-title, .post-title a,
								.post-meta, #comments-title, #contact-form #reply-title, #respond #reply-title, .form-heading, #contact-form, #respond,
								.contact-page, #overview, #overview .property-item .price,
								#overview .child-properties h3,
								#overview .agent-detail h3,
								.infoBox .prop-title a,
								.infoBox span.price,
								.detail .list-container h3,
								.about-agent .contact-types,
								.listing-layout h4, .listing-layout .property-item h4 a, .property-item h4 .listing-layout a,
								#filter-by,
								.gallery-item .item-title,
								.dsidx-results li.dsidx-prop-summary .dsidx-prop-title,
								#dsidx.dsidx-details #dsidx-actions,
								#dsidx.dsidx-details .dsidx-contact-form table label, #dsidx.dsidx-details .dsidx-contact-form table input[type=button],
								#dsidx-header table#dsidx-primary-data th, #dsidx-header table#dsidx-primary-data td
								.sidebar .widget .dsidx-slideshow .featured-listing h4, .sidebar .widget .dsidx-slideshow .featured-listing .property-item h4 a, .property-item h4 .sidebar .widget .dsidx-slideshow .featured-listing a,
								.sidebar .widget .dsidx-expanded .featured-listing h4, .sidebar .widget .dsidx-expanded .featured-listing .property-item h4 a, .property-item h4 .sidebar .widget .dsidx-expanded .featured-listing a,
								.sidebar .widget .dsidx-search-widget span.select-wrapper,
								.sidebar .widget .dsidx-search-widget .dsidx-search-button .submit,
								.sidebar .widget .dsidx-widget-single-listing h3.widget-title,
								.login-register .main-wrap h3,
								.login-register .info-text, .login-register input[type="text"], .login-register input[type="password"], .login-register label,
								.inspiry-social-login .wp-social-login-provider,
								.my-properties .main-wrap h3,
								.my-properties .alert-wrapper h5,
								.my-property .cell h5 ',
				'property' => 'font-family',
				'value'    => $inspiry_secondary_font,
			);
		}

		/*
		 * Body Font
		 */
		$inspiry_body_font = get_option( 'inspiry_body_font', 'Default' );
		if ( 'Default' != $inspiry_body_font ) {
			$dynamic_css[] = array(
				'elements' => 'body',
				'property' => 'font-family',
				'value'    => $inspiry_body_font,
			);
		}

		if ( is_singular( 'property' ) ) {
			global $post;
			/* Property Features */
			$features_terms = get_the_terms( get_the_ID(), 'property-feature' );

			if ( ! empty( $features_terms ) ) {
				foreach ( $features_terms as $feature_term ) {
					$feature_icon_id = get_term_meta( $feature_term->term_id, 'inspiry_property_feature_icon', true );
					$feature_icon    = ! empty( $feature_icon_id ) ? wp_get_attachment_url( $feature_icon_id ) : false;
					if ( ! empty( $feature_icon ) ) {
						$dynamic_css[] = array(
							'elements' => "#overview .property-item .features .arrow-bullet-list #rh_property__feature_$feature_term->term_id:before",
							'property' => 'background',
							'value'    => 'url("' . $feature_icon . '") no-repeat 0% 50%',
						);
						$dynamic_css[] = array(
							'elements' => "#overview .property-item .features .arrow-bullet-list #rh_property__feature_$feature_term->term_id:before",
							'property' => 'background-size',
							'value'    => 'contain',
						);
					}
				}
			}
		}

		if ( 'true' == $theme_disable_footer_bg ) {
			// Disable Footer Background Image.
			$dynamic_css[] = array(
				'elements' => '#footer-wrapper',
				'property' => 'background-image',
				'value'    => 'none',
			);
			$dynamic_css[] = array(
				'elements' => '#footer-wrapper',
				'property' => 'padding-bottom',
				'value'    => '0px',
			);
		} else {
			if ( ! empty( $theme_footer_bg_img ) ) {
				// Footer Background Image.
				$dynamic_css[] = array(
					'elements' => '#footer-wrapper',
					'property' => 'background-image',
					'value'    => "url( $theme_footer_bg_img )",
				);
			}
		}

		$dynamic_core_css_above_980px = array(
			array(
				'elements' => '.contact-number,
						   .contact-number .outer-strip',
				'property' => 'background-color',
				'value'    => $core_color_blue_light,
			),
			array(
				'elements' => '.contact-number .fa-phone',
				'property' => 'background-color',
				'value'    => $core_color_blue_dark,
			),
		);

		$dynamic_core_css_above_767px = array(
			array(
				'elements' => '#overview .property-item .price',
				'property' => 'background-color',
				'value'    => $core_color_blue_light,
			),
			array(
				'elements' => '#overview .property-item .price',
				'property' => 'background-color',
				'value'    => $core_color_blue_light,
			),
		);


		$dynamic_css_above_980px = array(
			// Phone Number background color.
			array(
				'elements' => '.contact-number, .contact-number .outer-strip',
				'property' => 'background-color',
				'value'    => $theme_phone_bg_color,
			),
			// Phone Number background color.
			array(
				'elements' => '.contact-number',
				'property' => 'color',
				'value'    => $theme_phone_text_color,
			),
			// Phone Icon background color.
			array(
				'elements' => '.contact-number .fa-phone',
				'property' => 'background-color',
				'value'    => $theme_phone_icon_bg_color,
			),
		);

		$prop_count = count( $dynamic_css );

		if ( $prop_count > 0 ) {
			echo "<style type='text/css' id='dynamic-css'>\n\n";

			foreach ( $dynamic_css as $css_unit ) {
				if ( ! empty( $css_unit['value'] ) ) {
					echo $css_unit['elements'] . "{\n";
					echo $css_unit['property'] . ":" . $css_unit['value'] . ";\n";
					echo "}\n\n";
				}
			}

			/* CSS For min width 980px */
			echo "@media (min-width: 980px) {\n";

			foreach ( $dynamic_core_css_above_980px as $css_unit ) {
				if ( ! empty( $css_unit['value'] ) ) {
					echo $css_unit['elements'] . "{\n";
					echo $css_unit['property'] . ":" . $css_unit['value'] . ";\n";
					echo "}\n\n";
				}
			}

			foreach ( $dynamic_css_above_980px as $css_unit ) {
				if ( ! empty( $css_unit['value'] ) ) {
					echo $css_unit['elements'] . "{\n";
					echo $css_unit['property'] . ":" . $css_unit['value'] . ";\n";
					echo "}\n\n";
				}
			}
			echo "}\n";


			/* CSS For min width 767 */
			echo "@media (max-width: 767px) {\n";

			foreach ( $dynamic_core_css_above_767px as $css_unit ) {
				if ( ! empty( $css_unit['value'] ) ) {
					echo $css_unit['elements'] . "{\n";
					echo $css_unit['property'] . ":" . $css_unit['value'] . ";\n";
					echo "}\n\n";
				}
			}
			echo "}\n";

			echo '</style>';
		}
	}
}

add_action( 'wp_head', 'generate_dynamic_css' );
