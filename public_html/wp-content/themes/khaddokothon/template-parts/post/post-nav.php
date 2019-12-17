<?php
/**
 * Single Post Navigation
 *
 * @package KhaddoKothon
 */
?>


<div class="khaddokothon-post-nav clearfix">

    <?php
    $prev_post = get_previous_post();
    $next_post = get_next_post();
    ?>

    <?php if (!empty( $prev_post )) : ?>
        <div class="post-prev d-inline-block">
            <a href="<?php echo esc_url(get_permalink( $prev_post->ID )); ?>">
                <i class="fas fa-long-arrow-alt-left btn khaddokothon-btn-transparent khaddokothon-btn-small mb-2"></i>
                <span class="d-block d-md-none"><?php echo esc_html__('Previous Post','khaddokothon')?></span>
                <h4 class="d-none d-md-block"><?php echo esc_html($prev_post->post_title); ?></h4>
            </a>
        </div>
    <?php endif; ?>

    <?php if (!empty( $next_post )) : ?>
        <div class="post-next d-inline-block float-right text-right">
            <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">
                <i class="fas fa-long-arrow-alt-right btn khaddokothon-btn-transparent khaddokothon-btn-small mb-2"></i>
                <span class="d-block d-md-none"><?php echo esc_html__('Next Post','khaddokothon')?></span>
                <h4 class="d-none d-md-block"><?php echo esc_html($next_post->post_title); ?></h4>
            </a>
        </div>
    <?php endif; ?>

</div>