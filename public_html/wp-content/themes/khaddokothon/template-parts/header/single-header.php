<?php
$_post = get_queried_object();
$post_author_id = get_post_field( 'post_author', $_post );
$author_url = get_author_posts_url($post_author_id);
$author_name = get_the_author_meta('nickname',$post_author_id);
$post_date = get_the_date('', $_post);
?>


<!-- ========== Start Page Header ========== -->
<section class="khaddokothon-page-header khaddokothon-bg-overlay" style="background-image: url('<?php header_image(); ?>')">
	<div class="container">
		<div class="row">
			<div class="col-md-12 khaddokothon-page-header-content d-flex align-items-center justify-content-center">

				<div class="text-center">
					<h1 class="h2">
                        <?php echo get_the_title($_post->ID);?>
                    </h1>
                    <h2 class="h4 mb-3"><?php echo esc_html($post_date); ?></h2>
					<ul class="list-inline khaddokothon-post-meta">
						<li class="list-inline-item"><i class="fas fa-user"></i>
                            <a href="<?php echo esc_url($author_url); ?>">
	                            <?php echo esc_html($author_name); ?>
                            </a>
                        </li>
						<li class="list-inline-item"><i class="fas fa-comments"></i>
							<?php if (! post_password_required() && ( comments_open() || get_comments_number() )): ?>
                            <a href="<?php comments_link();?>">
	                            <?php comments_number( '0', '1', '%' ); ?>
                            </a>
                            <?php endif; ?>
                        </li>
					</ul>
				</div>

			</div> <!-- End col -->
		</div> <!-- End row -->
	</div> <!-- End container -->
</section>

<!-- ========== End Page Header ========== -->