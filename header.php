<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Find_Dinppo
 */

$is_logged_in = is_user_logged_in();

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
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'find-dinppo'); ?></a>

		<header id="masthead" class="position-relative site-header ppo-box-shadow ppo-bg-secondary" style="z-index:3">

			<div class="container py-2">

				<div class="row justify-content-between">

					<div class="col-4">

						<div class="site-branding">
							<?php
							the_custom_logo();
							if (is_front_page() && is_home()) :
							?>
								<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
							<?php
							else :
							?>
								<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
							<?php
							endif;
							$find_dinppo_description = get_bloginfo('description', 'display');
							if ($find_dinppo_description || is_customize_preview()) :
							?>
								<p class="site-description"><?php echo $find_dinppo_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
															?></p>
							<?php endif; ?>
						</div><!-- .site-branding -->

					</div>

					<div class="col-7">
						<nav id="site-navigation" class="main-navigation">

							<div class="nav-buttons">
								<div class="">
									<a id="nav-user-profile" href="<?php echo ($is_logged_in ? esc_url(home_url("/profile/")) : esc_url(home_url("/log-ind/"))); ?>">
										<img src="<?php echo get_template_directory_uri() . '/assets/images/user/man-user.png'; ?>" class="nav-user" />
									</a>
								</div>
								<!-- <div class="nav-mobile menu-toggle"> -->
								<div class="menu-toggle">
									<a id="nav-toggle" href="#!" data-bs-toggle="modal" data-bs-target="#ppoMenu">
										<!-- <span></span> -->
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16" class="text-white" style="width:45px;height:45px;">
											<path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
										</svg>
									</a>
								</div>
							</div>

							<?php
							// wp_nav_menu(
							// 	array(
							// 		'theme_location' => 'menu-1',
							// 		'menu_id'        => 'primary-menu',
							// 	)
							// );
							?>
						</nav><!-- #site-navigation -->
					</div>

				</div>

			</div> <!-- .container -->

		</header><!-- #masthead -->


		<?php get_template_part('/template-parts/partials/popups/content', 'menu-popup'); ?>