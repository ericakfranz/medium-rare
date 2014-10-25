<?php /*

Medium Rare Theme
-------------

header.php

Header template file	

*/

?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />

		<title><?php (wp_title('', false) != '') ? wp_title('&#8226;', true, 'right') : ''; ?><?php bloginfo('name'); ?></title>

		<!-- Meta -->
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<!-- Links -->
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

		<!-- Stylesheets -->
		<!--[if lt IE 9]>
		<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<?php /* <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600,700" type="text/css" /> */ ?>

		<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />

		<?php mediumrare_header_style(); ?>

		<?php
		// Javascript

		// pull in the jQuery
		wp_enqueue_script('jquery');
		if (is_singular()) {
			// pull in Nivo-gallery
			wp_enqueue_script('nivo-lightbox', get_template_directory_uri() . '/lib/Nivo-Lightbox-1.1/nivo-lightbox.min.js', 'jquery', 1.0);
		}
		if (is_post_type_archive('mediumrare_resource')) {
			wp_enqueue_script('masonry', get_template_directory_uri() . '/js/masonry.min.js', 'jquery', '3.1.3');
		}
		// pull in the site js
		wp_enqueue_script('mediumrare_js', get_template_directory_uri() . '/js/mediumrare-script.js', 'jquery');

		// comment script
		if (is_singular() && get_option('thread_comments')) :
			wp_enqueue_script('comment-reply');
		endif;
		?>

		<?php 
		// Wordpress header content

		wp_head(); ?>

	</head>
	<body<?php echo (is_admin_bar_showing()) ? ' class="admin-bar"' : ''; ?>>

		<div id="control">
			
			<?php get_template_part('drawer'); ?>

			<div id="page">
				<div id="wrapper">
					<?php
						$header_image = mediumrare_custom_header_image();
					?>
					<header id="site-header"<?php echo (!$header_image) ? ' class="no-image"' : ' style="background-image:url(' . $header_image['url'] . ')"'; ?>>
						<?php if (mediumrare_get_header_style() == 'bar') : ?>
						<div id="site-id">
							<div class="grid">
								<div class="g12 text-center">
									<?php $title_tag = (!is_single()) ? 'h1' : 'div'; ?>
									<<?php echo $title_tag; ?> id="site-title"><a href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a></<?php echo $title_tag; ?>>
								</div>
							</div>
						</div>
						<?php endif; ?>
						<?php if (is_singular() || is_post_type_archive('mediumrare_resource')) : ?>
						<div id="page-header-overlay">
							<div class="grid">
								<div id="page-header-text" class="g12 text-center">
									<h1 id="page-title"><?php if (!is_post_type_archive('mediumrare_resource')) { the_title(); } else { ?>Resources<?php } ?></h1>
								</div>
							</div>
						</div>
						<?php elseif (mediumrare_get_header_style() == 'over_image') : ?>
						<div id="page-header-overlay">
							<div class="grid">
								<div id="page-header-text" class="g12 text-center">
									<h1 id="site-title"><?php bloginfo('name'); ?></h1>
									<?php if (mediumrare_show_tagline()) : ?>
									<p><?php bloginfo('description'); ?></p>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<?php endif; ?>
						<?php if ($header_image) : ?>
						<div id="spacer">
							<!-- Image not visible but used for sizing -->
							<img src="<?php echo $header_image['url']; ?>" width="<?php echo $header_image['width']; ?>" height="<?php echo $header_image['height']; ?>" alt="" />
							<a href="#content-body" id="content-link" title="Scroll to the content"><i class="fa fa-angle-down"></i> <span class="text">Go to content</span></a>
						</div>
						<?php endif; ?>
					</header>
					