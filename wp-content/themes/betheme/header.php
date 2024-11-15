<?php
/**
 * The Header for our theme.
 *
 * @package Betheme
 * @author Muffin group
 * @link https://muffingroup.com
 */
?><!DOCTYPE html>
<?php
	if ($_GET && key_exists('mfn-rtl', $_GET)):
		echo '<html class="no-js" lang="ar" dir="rtl">';
	else:
?>
<html <?php language_attributes(); ?> class="no-js<?php echo esc_attr(mfn_user_os()); ?>"<?php mfn_tag_schema(); ?>>
<?php endif; ?>

<head>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4165792205453286"
     crossorigin="anonymous"></script>
<!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v16.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
<meta property="fb:app_id" content="1358499454916904" />
<meta property="fb:admins" content="1683066335363482"/>
<meta charset="<?php bloginfo('charset'); ?>" />
<?php wp_head(); ?>
</head>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v17.0&appId=1358499454916904&autoLogAppEvents=1" nonce="Qet3ZL4F"></script>
<body <?php body_class(); ?>>

	<?php do_action('mfn_hook_top'); ?>

	<?php get_template_part('includes/header', 'sliding-area'); ?>

	<?php
		if (mfn_header_style(true) == 'header-creative') {
			get_template_part('includes/header', 'creative');
		}
	?>

	<div id="Wrapper">

		<?php

			// featured image: parallax

			$class = '';
			$data_parallax = array();

			if (mfn_opts_get('img-subheader-attachment') == 'parallax') {
				$class = 'bg-parallax';

				if (mfn_opts_get('parallax') == 'stellar') {
					$data_parallax['key'] = 'data-stellar-background-ratio';
					$data_parallax['value'] = '0.5';
				} else {
					$data_parallax['key'] = 'data-enllax-ratio';
					$data_parallax['value'] = '0.3';
				}
			}
		?>

		<?php
			if (mfn_header_style(true) == 'header-below') {
				echo mfn_slider();
			}
		?>

		<div id="Header_wrapper" class="<?php echo esc_attr($class); ?>" <?php if ($data_parallax) {
			printf('%s="%.1f"', $data_parallax['key'], $data_parallax['value']);
		} ?>>

			<?php
				if ('mhb' == mfn_header_style()) {

					// mfn_header action for header builder plugin

					do_action('mfn_header');
					echo mfn_slider();

				} else {

					echo '<header id="Header">';
						if (mfn_header_style(true) != 'header-creative') {
							get_template_part('includes/header', 'top-area');
						}
						if (mfn_header_style(true) != 'header-below') {
							echo mfn_slider();
						}
					echo '</header>';

				}
			?>

			<?php
				if ( 'intro' != get_post_meta( mfn_ID(), 'mfn-post-template', true ) ){
					if( 'all' != mfn_opts_get('subheader') ){
						if( ! get_post_meta( mfn_ID(), 'mfn-post-hide-title', true ) ){

							$subheader_advanced = mfn_opts_get('subheader-advanced');

							if (is_search()) {

								echo '<div id="Subheader">';
									echo '<div class="container">';
										echo '<div class="column one">';

											if (trim($_GET['s'])) {
												global $wp_query;
												$total_results = $wp_query->found_posts;
											} else {
												$total_results = 0;
											}

											$translate['search-results'] = mfn_opts_get('translate') ? mfn_opts_get('translate-search-results', 'results found for:') : __('results found for:', 'betheme');
											echo '<h1 class="title">'. esc_html($total_results) .' '. esc_html($translate['search-results']) .' '. esc_html($_GET['s']) .'</h1>';

										echo '</div>';
									echo '</div>';
								echo '</div>';

							} elseif ( ! mfn_slider_isset() || isset( $subheader_advanced['slider-show'] ) ) {

								// subheader

								$subheader_options = mfn_opts_get('subheader');

								if (is_home() && ! get_option('page_for_posts') && ! mfn_opts_get('blog-page')) {
									$subheader_show = false;
								} elseif (is_array($subheader_options) && isset($subheader_options[ 'hide-subheader' ])) {
									$subheader_show = false;
								} elseif (get_post_meta(mfn_ID(), 'mfn-post-hide-title', true)) {
									$subheader_show = false;
								} else {
									$subheader_show = true;
								}

								// title

								if (is_array($subheader_options) && isset($subheader_options[ 'hide-title' ])) {
									$title_show = false;
								} else {
									$title_show = true;
								}

								// breadcrumbs

								if (is_array($subheader_options) && isset($subheader_options[ 'hide-breadcrumbs' ])) {
									$breadcrumbs_show = false;
								} else {
									$breadcrumbs_show = true;
								}

								if (is_array($subheader_advanced) && isset($subheader_advanced[ 'breadcrumbs-link' ])) {
									$breadcrumbs_link = 'has-link';
								} else {
									$breadcrumbs_link = 'no-link';
								}

								// output

								if ($subheader_show) {

									echo '<div id="Subheader">';
										echo '<div class="container">';
											echo '<div class="column one">';

												if ($title_show) {
													$title_tag = mfn_opts_get('subheader-title-tag', 'h1');
													echo '<'. esc_attr($title_tag) .' class="title">'. wp_kses(mfn_page_title(), mfn_allowed_html()) .'</'. esc_attr($title_tag) .'>';
												}

												if ($breadcrumbs_show) {
													mfn_breadcrumbs($breadcrumbs_link);
												}

											echo '</div>';
										echo '</div>';
									echo '</div>';

								}
							}

						}
					}
				}
			?>

		</div>

		<?php
			if ( 'intro' == get_post_meta( mfn_ID(), 'mfn-post-template', true ) ) {
				get_template_part( 'includes/header', 'single-intro' );
			}
		?>

		<?php do_action( 'mfn_hook_content_before' );
