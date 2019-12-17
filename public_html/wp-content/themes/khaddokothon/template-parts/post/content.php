<?php
/**
 * Standard Post Format
 *
 * @package KhaddoKothon
 */
?>


<?php if ( has_post_thumbnail() ) : ?>
<div class="khaddokothon-blog-thumb">
    <div class="khaddokothon-img-hover">
        <a href="<?php the_permalink(); ?>">
	        <?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid' ) ); ?>
        </a>
    </div>
</div>
<?php endif; ?>


