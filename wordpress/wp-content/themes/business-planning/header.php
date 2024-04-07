<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Business Planning
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'business-planning'); ?></a>
		<header id="masthead" class="site-header px-hstyle1">
			<?php
			$business_planning_intro_show = get_theme_mod('business_planning_intro_show', 1);
			if (!$business_planning_intro_show && has_header_image()) : ?>
				<div class="header-img">
					<?php the_header_image_tag(); ?>
				</div>
			<?php endif; ?>
			<?php do_action('business_planning_mobile_menu'); ?>
			<?php
			$business_planning_main_menu_style = get_theme_mod('business_planning_main_menu_style', 'style1');

			if ($business_planning_main_menu_style == 'style1') {
				do_action('business_planning_header_style_one');
			} else {
				do_action('business_planning_header_style_two');
			}
			?>
		</header><!-- #masthead -->

		<?php
		if (is_home() || is_front_page()) {
			do_action('business_planning_profile_intro');
		}

		?>