<!-- Desktop Menu -->
<div class="main-header d-none d-lg-block">
	<div class="menu-container">
		<div class="row">
			<div class="col-md-12">
				<div class="d-table w-100">
					<div id="site-logo" class="site-logo align-middle d-table-cell">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <?php 
							$khaddokothon_logo_id = get_theme_mod( 'custom_logo' );
							$khaddokothon_logo = wp_get_attachment_image_src( $khaddokothon_logo_id , 'full' );
                            if($khaddokothon_logo_id != ''){ ?>
                                <img src="<?php echo esc_url($khaddokothon_logo[0]); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                            <?php }  ?>
                        	<?php if(display_header_text()==true) { ?>
	                            <h5 class="site-title"><?php echo get_bloginfo( 'name' ); ?></h5>
	                            <p class="site-description"><?php echo get_bloginfo( 'description' ); ?></p>
                            <?php } ?>
						</a>
					</div>
					<div class="header-mainnav align-middle d-table-cell">
                        <?php if ( get_theme_mod('search_in_header', true)): ?>
						<div class="search-box float-right">
                            <div class="toggle_search float-right"><i class="fa fa-search" aria-hidden="true"></i></div>
                            <div class="h-search-form-field">
                                <?php get_search_form(); ?>
                            </div>
						</div>
                        <?php endif; ?>
						<div id="site-navigation" class="main-navigation float-right">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'primary',
									'menu_id'        => 'primary-menu',
									'container'      => '',
								) );
							?>
						</div>
					</div>
				</div>
			</div>					
		</div>				
	</div>
</div>		

<!-- Mobile  Menu -->
<div class="header_mobile">
    <div class="mlogo_wrapper clearfix">
        <div class="mobile_logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
	            <?php if(get_theme_mod('custom_logo') == true){ ?>
                    <img class="logo-static" src="<?php echo esc_url($khaddokothon_logo[0]); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                <?php } else { ?>
	                <h5 class="site-title"><?php echo esc_html(get_bloginfo( 'name' )); ?></h5>
	                <p class="site-description"><?php echo esc_html(get_bloginfo( 'description' )); ?></p>
                <?php }; ?>
            </a>
        </div>
        <div id="mmenu_toggle">
            <button></button>
        </div>
    </div>
    <div class="mmenu_wrapper">
        <div class="mobile_nav collapse">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'menu_class'        => 'mobile_mainmenu',
				'container'      => '',
			) );
			?>
        </div>
    </div>
</div>