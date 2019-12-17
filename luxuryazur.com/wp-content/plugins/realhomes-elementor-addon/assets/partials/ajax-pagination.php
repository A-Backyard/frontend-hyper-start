<?php
global $properties_query;
	RHEA_ajax_pagination( $properties_query->max_num_pages );
?>
<script type="application/javascript">
    /*-----------------------------------------------------------------------------------*/
    /* Home page properties pagination
	 /*-----------------------------------------------------------------------------------*/

    jQuery(document).ready(function () {

        jQuery('.rhea_ele_property_ajax_target').each(function () {

            var pageNav = jQuery(this).find('.pagination a');
            var id = jQuery(this).attr('id');
            var thisLoader = jQuery(this).find('.rhea_svg_loader');
            var thisInner = jQuery(this).find('.home-properties-section-inner-target');
            var thisContent = jQuery(this).find('.rh_properties_pagination_append');
            pageNav.on('click', function(e){
                e.preventDefault();
                var thisLink = jQuery(this);
                if (! (thisLink).hasClass('current')){
                    var link = jQuery(this).attr('href');
                    thisInner.fadeTo('slow', 0.5);

                    thisLoader.slideDown('fast');
                    // thisContent.fadeOut('fast', function(){
                    thisInner.load(link + ' #' + id + ' .rh_properties_pagination_append', function(response, status, xhr) {
                        if (status == 'success') {
                            thisInner.fadeTo('fast', 1);
                            pageNav.removeClass('current');
                            thisLink.addClass('current');
                            thisLoader.slideUp('fast');
                        }else{
                            thisInner.fadeTo('fast', 1);
                            thisLoader.slideUp('fast');
                        }
                    });
                }
                // });
            });
        });
    });
</script>
