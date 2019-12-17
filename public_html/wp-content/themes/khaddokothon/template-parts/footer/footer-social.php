<?php
//facebook
$footer_facebook = get_theme_mod('khaddokothon_footer_facebook',true);
$footer_facebook_link = get_theme_mod('khaddokothon_footer_facebook_link','https://www.facebook.com/tabthemesofficial/');
//twitter
$footer_twitter = get_theme_mod('khaddokothon_footer_twitter',true);
$footer_twitter_link = get_theme_mod('khaddokothon_footer_twitter_link','https://twitter.com/tabthemes');
//pinterest
$footer_pinterest = get_theme_mod('khaddokothon_footer_pinterest');
$footer_pinterest_link = get_theme_mod('khaddokothon_footer_pinterest_link','https://www.pinterest.com/');
//instagram
$footer_instagram = get_theme_mod('khaddokothon_footer_instagram');
$footer_instagram_link = get_theme_mod('khaddokothon_footer_instagram_link','https://www.instagram.com/');
//linkedin
$footer_linkedin = get_theme_mod('khaddokothon_footer_linkedin');
$footer_linkedin_link = get_theme_mod('khaddokothon_footer_linkedin_link','https://www.linkedin.com/');
//youtube
$footer_youtube = get_theme_mod('khaddokothon_footer_youtube');
$footer_youtube_link = get_theme_mod('khaddokothon_footer_youtube_link','https://www.youtube.com/');
//tumblr
$footer_tumblr = get_theme_mod('khaddokothon_footer_tumblr');
$footer_tumblr_link = get_theme_mod('khaddokothon_footer_tumblr_link','https://www.tumblr.com/');
//vk
$footer_vk = get_theme_mod('khaddokothon_footer_vk');
$footer_vk_link = get_theme_mod('khaddokothon_footer_vk_link','https://vk.com/');
//reddit
$footer_reddit = get_theme_mod('khaddokothon_footer_reddit');
$footer_reddit_link = get_theme_mod('khaddokothon_footer_reddit_link','https://reddit.com/');
//flickr
$footer_flickr = get_theme_mod('khaddokothon_footer_flickr');
$footer_flickr_link = get_theme_mod('khaddokothon_footer_flickr_link','https://flickr.com/');
?>

<div class="khaddokothon-footer-social pt-4 pt-lg-0">
	<ul class="list-inline m-0">
		<!--Facebook-->
		<?php if ($footer_facebook): ?>
			<li class="list-inline-item">
				<a href="<?php echo esc_url($footer_facebook_link); ?>">
					<i class="fab fa-facebook-f"></i>
				</a>
			</li>
		<?php endif; ?>
		<!--Twitter-->
		<?php if ($footer_twitter): ?>
			<li class="list-inline-item">
				<a href="<?php echo esc_url($footer_twitter_link); ?>">
					<i class="fab fa-twitter"></i>
				</a>
			</li>
		<?php endif; ?>
		<!--Pinterest-->
		<?php if ($footer_pinterest): ?>
			<li class="list-inline-item">
				<a href="<?php echo esc_url($footer_pinterest_link); ?>">
					<i class="fab fa-pinterest-p"></i>
				</a>
			</li>
		<?php endif; ?>
		<!--Instagram-->
		<?php if ($footer_instagram): ?>
			<li class="list-inline-item">
				<a href="<?php echo esc_url($footer_instagram_link); ?>">
					<i class="fab fa-instagram"></i>
				</a>
			</li>
		<?php endif; ?>
		<!--Linkedin-->
		<?php if ($footer_linkedin): ?>
			<li class="list-inline-item">
				<a href="<?php echo esc_url($footer_linkedin_link); ?>">
					<i class="fab fa-linkedin-in"></i>
				</a>
			</li>
		<?php endif; ?>
		<!--Youtube-->
		<?php if ($footer_youtube): ?>
			<li class="list-inline-item">
				<a href="<?php echo esc_url($footer_youtube_link); ?>">
					<i class="fab fa-youtube"></i>
				</a>
			</li>
		<?php endif; ?>
		<!--Tumblr-->
		<?php if ($footer_tumblr): ?>
			<li class="list-inline-item">
				<a href="<?php echo esc_url($footer_tumblr_link); ?>">
					<i class="fab fa-tumblr"></i>
				</a>
			</li>
		<?php endif; ?>
		<!--VK-->
		<?php if ($footer_vk): ?>
			<li class="list-inline-item">
				<a href="<?php echo esc_url($footer_vk_link); ?>">
					<i class="fab fa-vk"></i>
				</a>
			</li>
		<?php endif; ?>
		<!--Reddit-->
		<?php if ($footer_reddit): ?>
			<li class="list-inline-item">
				<a href="<?php echo esc_url($footer_reddit_link); ?>">
					<i class="fab fa-reddit-alien"></i>
				</a>
			</li>
		<?php endif; ?>
		<!--Flickr-->
		<?php if ($footer_flickr): ?>
			<li class="list-inline-item">
				<a href="<?php echo esc_url($footer_flickr_link); ?>">
					<i class="fab fa-flickr"></i>
				</a>
			</li>
		<?php endif; ?>
	</ul>
</div>