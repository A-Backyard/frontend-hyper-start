<?php
/**
 * Property Features Checkboxes
 */

/* all property features terms */
$all_features = get_terms(array( 'taxonomy' => 'property-feature' ));

/* features in search query */
$required_features_slugs = array();
if (isset($_GET['features'])) {
    $required_features_slugs = $_GET['features'];
}

$features_count = count($all_features);
if ($features_count > 0) {
    ?>
<div class="more-options-mode-container">
	<div class="more-options-wrapper more-options-wrapper-mode clearfix <?php echo (count($required_features_slugs) > 0)? '': 'collapsed'; ?>">
		<?php
        foreach ($all_features as $feature) {
            ?>
			<div class="option-bar">
				<input type="checkbox"
				       id="feature-<?php echo esc_attr($feature->slug); ?>"
				       name="features[]"
				       value="<?php echo esc_attr($feature->slug); ?>"
					<?php if (in_array($feature->slug, $required_features_slugs)) {
                echo 'checked';
            } ?> />
				<label for="feature-<?php echo esc_attr($feature->slug); ?>"><?php echo ucwords($feature->name); ?> <small>(<?php echo esc_html($feature->count); ?>)</small></label>
			</div>
			<?php

        } ?>
	</div>
    <span class="open_more_features">
        	<?php
	        $inspiry_search_features_title = get_option('inspiry_search_features_title');
	        if ($inspiry_search_features_title) {
		        echo $inspiry_search_features_title;
	        } else {
		        _e('Looking for certain features', 'framework');
	        } ?>
    </span>

</div>
	<?php

}
