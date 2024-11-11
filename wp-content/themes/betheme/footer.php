<?php
/**
 * The template for displaying the footer.
 *
 * @package Betheme
 * @author Muffin group
 * @link https://muffingroup.com
 */

// footer classes

$footer_options = mfn_opts_get('footer-options');
$footer_classes = [];

if( ! empty( $footer_options['full-width'] ) ){
	$footer_classes[] = 'full-width';
}

$footer_classes = implode( ' ', $footer_classes );

// back_to_top classes

$back_to_top_class = mfn_opts_get('back-top-top');

if ($back_to_top_class == 'hide') {
	$back_to_top_position = false;
} elseif (strpos($back_to_top_class, 'sticky') !== false) {
	$back_to_top_position = 'body';
} elseif (mfn_opts_get('footer-hide') == 1) {
	$back_to_top_position = 'footer';
} else {
	$back_to_top_position = 'copyright';
}
?>

<?php do_action('mfn_hook_content_after'); ?>

<?php if ('hide' != mfn_opts_get('footer-style')): ?>

	<footer id="Footer" class="clearfix <?php echo $footer_classes; ?>">

		<?php if ($footer_call_to_action = mfn_opts_get('footer-call-to-action')): ?>
		<div class="footer_action">
			<div class="container">
				<div class="column one column_column">
					<?php echo do_shortcode($footer_call_to_action); ?>
				</div>
			</div>
		</div>
		<?php endif; ?>

		<?php
			$sidebars_count = 0;
			for ($i = 1; $i <= 5; $i++) {
				if (is_active_sidebar('footer-area-'. $i)) {
					$sidebars_count++;
				}
			}

			if ($sidebars_count > 0) {

				$align = mfn_opts_get('footer-align');

				echo '<div class="widgets_wrapper '. $align .'">';
					echo '<div class="container">';

						if ($footer_layout = mfn_opts_get('footer-layout')) {

							// Theme Options

							$footer_layout 	= explode(';', $footer_layout);
							$footer_cols = $footer_layout[0];

							for ($i = 1; $i <= $footer_cols; $i++) {
								if (is_active_sidebar('footer-area-'. $i)) {
									echo '<div class="column '. esc_attr($footer_layout[$i]) .'">';
										dynamic_sidebar('footer-area-'. $i);
									echo '</div>';
								}
							}

						} else {

							// default with equal width

							$sidebar_class = '';
							switch ($sidebars_count) {
								case 2: $sidebar_class = 'one-second'; break;
								case 3: $sidebar_class = 'one-third'; break;
								case 4: $sidebar_class = 'one-fourth'; break;
								case 5: $sidebar_class = 'one-fifth'; break;
								default: $sidebar_class = 'one';
							}

							for ($i = 1; $i <= 5; $i++) {
								if (is_active_sidebar('footer-area-'. $i)) {
									echo '<div class="column '. esc_attr($sidebar_class) .'">';
										dynamic_sidebar('footer-area-'. $i);
									echo '</div>';
								}
							}

						}

					echo '</div>';
				echo '</div>';
			}
		?>

		<?php if (mfn_opts_get('footer-hide') != 1): ?>

			<div class="footer_copy">
				<div class="container">
					<div class="column one">

						<?php
							if ($back_to_top_position == 'copyright') {
								echo '<a id="back_to_top" class="footer_button" href=""><i class="icon-up-open-big"></i></a>';
							}
						?>

						<div class="copyright">
							<?php
								if (mfn_opts_get('footer-copy')) {
									echo do_shortcode(mfn_opts_get('footer-copy'));
								} else {
									echo '&copy; '. esc_html(date('Y')) .' '. esc_html(get_bloginfo('name')) .'. All Rights Reserved. <a target="_blank" rel="nofollow" href="https://muffingroup.com">Muffin group</a>';
								}
							?>
						</div>

						<?php
							if (has_nav_menu('social-menu-bottom')) {
								mfn_wp_social_menu_bottom();
							} else {
								get_template_part('includes/include', 'social');
							}
						?>

					</div>
				</div>
			</div>

		<?php endif; ?>

		<?php
			if ($back_to_top_position == 'footer') {
				echo '<a id="back_to_top" class="footer_button in_footer" href=""><i class="icon-up-open-big"></i></a>';
			}
		?>

	</footer>
<?php endif; ?>

</div>

<?php
	// side slide menu
	if (mfn_opts_get('responsive-mobile-menu')) {
		get_template_part('includes/header', 'side-slide');
	}
?>

<?php
	if ($back_to_top_position == 'body') {
		echo '<a id="back_to_top" class="footer_button '. esc_attr($back_to_top_class) .'" href=""><i class="icon-up-open-big"></i></a>';
	}
?>

<?php if (mfn_opts_get('popup-contact-form')): ?>
	<div id="popup_contact">
		<a class="footer_button" href="#"><i class="<?php echo esc_attr(mfn_opts_get('popup-contact-form-icon', 'icon-mail-line')); ?>"></i></a>
		<div class="popup_contact_wrapper">
			<?php echo do_shortcode(mfn_opts_get('popup-contact-form')); ?>
			<span class="arrow"></span>
		</div>
	</div>
<?php endif; ?>

<?php do_action('mfn_hook_bottom'); ?>

<?php wp_footer(); ?>
	<div class="fix_tel">
<div class="ring-alo-phone ring-alo-green ring-alo-show" id="ring-alo-phoneIcon" style="right: 150px; bottom: -12px;">
<div class="ring-alo-ph-circle"></div>
<div class="ring-alo-ph-circle-fill"></div>
<div class="ring-alo-ph-img-circle">

<a href="tel:0889400556"><img class="lazy" src="https://webthietke.net/wp-content/uploads/goi.png" alt="thiết kế website"></a>

</div>
</div>
<div class="tel">
<a href="tel:0889400556"><p class="fone">Giá website: 19 triệu</p></a>
</div>
</div>
		<div class="bottom-contact">
<ul>
<li>
<a id="goidien" href="tel:0889400556">
<img src="https://webthietke.net/wp-content/uploads/icon-phone2.png"/>
<br>
<span>Giá web</span>
</a>
</li>
<li>
<a id="nhantin" href="tel:0889400556">
<img src="https://webthietke.net/wp-content/uploads/icon-sms2.png"/>
<br>
<span>chỉ</span>
</a>
</li>
<li>
<a id="chatzalo" href="https://zalo.me/0889400556">
<img src="https://webthietke.net/wp-content/uploads/icon-zalo2.png"/>
<br>
<span>19</span>
</a>
</li>
<li>
<a id="chatfb" href="https://zalo.me/0889400556">
<img src="https://webthietke.net/wp-content/uploads/icon-zalo2.png"/>
<br>
<span>triệu</span>
</a>
</li>
</ul>
</div>
	
<a href="https://zalo.me/0889400556" id="linkzalo" target="_blank" rel="noopener noreferrer">
	<div class="fcta-zalo-vi-tri-nut">
		<div class="fcta-zalo-nen-nut">
			<p class="muaweb">
				Chat zalo </p>
			<div class="fcta-zalo-ben-trong-nut"> 
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 460.1 436.6">
					<path fill="currentColor" class="st0" d="M82.6 380.9c-1.8-.8-3.1-1.7-1-3.5 1.3-1 2.7-1.9 4.1-2.8 13.1-8.5 25.4-17.8 33.5-31.5 6.8-11.4 5.7-18.1-2.8-26.5C69 269.2 48.2 212.5 58.6 145.5 64.5 107.7 81.8 75 107 46.6c15.2-17.2 33.3-31.1 53.1-42.7 1.2-.7 2.9-.9 3.1-2.7-.4-1-1.1-.7-1.7-.7-33.7 0-67.4-.7-101 .2C28.3 1.7.5 26.6.6 62.3c.2 104.3 0 208.6 0 313 0 32.4 24.7 59.5 57 60.7 27.3 1.1 54.6.2 82 .1 2 .1 4 .2 6 .2H290c36 0 72 .2 108 0 33.4 0 60.5-27 60.5-60.3v-.6-58.5c0-1.4.5-2.9-.4-4.4-1.8.1-2.5 1.6-3.5 2.6-19.4 19.5-42.3 35.2-67.4 46.3-61.5 27.1-124.1 29-187.6 7.2-5.5-2-11.5-2.2-17.2-.8-8.4 2.1-16.7 4.6-25 7.1-24.4 7.6-49.3 11-74.8 6zm72.5-168.5c1.7-2.2 2.6-3.5 3.6-4.8 13.1-16.6 26.2-33.2 39.3-49.9 3.8-4.8 7.6-9.7 10-15.5 2.8-6.6-.2-12.8-7-15.2-3-.9-6.2-1.3-9.4-1.1-17.8-.1-35.7-.1-53.5 0-2.5 0-5 .3-7.4.9-5.6 1.4-9 7.1-7.6 12.8 1 3.8 4 6.8 7.8 7.7 2.4.6 4.9.9 7.4.8 10.8.1 21.7 0 32.5.1 1.2 0 2.7-.8 3.6 1-.9 1.2-1.8 2.4-2.7 3.5-15.5 19.6-30.9 39.3-46.4 58.9-3.8 4.9-5.8 10.3-3 16.3s8.5 7.1 14.3 7.5c4.6.3 9.3.1 14 .1 16.2 0 32.3.1 48.5-.1 8.6-.1 13.2-5.3 12.3-13.3-.7-6.3-5-9.6-13-9.7-14.1-.1-28.2 0-43.3 0zm116-52.6c-12.5-10.9-26.3-11.6-39.8-3.6-16.4 9.6-22.4 25.3-20.4 43.5 1.9 17 9.3 30.9 27.1 36.6 11.1 3.6 21.4 2.3 30.5-5.1 2.4-1.9 3.1-1.5 4.8.6 3.3 4.2 9 5.8 14 3.9 5-1.5 8.3-6.1 8.3-11.3.1-20 .2-40 0-60-.1-8-7.6-13.1-15.4-11.5-4.3.9-6.7 3.8-9.1 6.9zm69.3 37.1c-.4 25 20.3 43.9 46.3 41.3 23.9-2.4 39.4-20.3 38.6-45.6-.8-25-19.4-42.1-44.9-41.3-23.9.7-40.8 19.9-40 45.6zm-8.8-19.9c0-15.7.1-31.3 0-47 0-8-5.1-13-12.7-12.9-7.4.1-12.3 5.1-12.4 12.8-.1 4.7 0 9.3 0 14v79.5c0 6.2 3.8 11.6 8.8 12.9 6.9 1.9 14-2.2 15.8-9.1.3-1.2.5-2.4.4-3.7.2-15.5.1-31 .1-46.5z"></path>
				</svg>
			</div>
		</div>
	</div>
	</a>

<style>
@keyframes zoom{0%{transform:scale(.5);opacity:0}50%{opacity:1}to{opacity:0;transform:scale(1)}}
	@keyframes lucidgenzalo{0% to{transform:rotate(-25deg)}50%{transform:rotate(25deg)}}
	.jscroll-to-top{bottom:100px}
	.fcta-zalo-ben-trong-nut svg path{fill:#fff}
	.fcta-zalo-vi-tri-nut{position:fixed;bottom:24px;right:20px;z-index:999}
	.fcta-zalo-nen-nut,.fcta-zalo-nen-nut{width:50px;height:50px;text-align:center;color:#fff;background:#0068ff;border-radius:50%;position:relative}
	.fcta-zalo-nen-nut::after,.fcta-zalo-nen-nut::before{content:"";position:absolute;border:1px solid #0068ff;background:#0068ff80;z-index:-1;left:-20px;right:-20px;top:-20px;bottom:-20px;border-radius:50%;animation:zoom 1.9s linear infinite}
	.fcta-zalo-nen-nut::after{animation-delay:.4s}
	.fcta-zalo-ben-trong-nut,.fcta-zalo-ben-trong-nut i{transition:all 1s}
	.fcta-zalo-ben-trong-nut{position:absolute;text-align:center;width:60%;height:60%;left:10px;bottom:25px;line-height:70px;font-size:25px;opacity:1}
	.fcta-zalo-ben-trong-nut i{animation:lucidgenzalo 1s linear infinite}
	.fcta-zalo-nen-nut:hover .fcta-zalo-ben-trong-nut,.fcta-zalo-text{opacity:0}
	.fcta-zalo-nen-nut:hover i{transform:scale(.5);transition:all .5s ease-in}
	
</style>
</body>
</html>
