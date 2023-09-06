<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Find_Dinppo
 */

get_header();

$is_admin = ppo_is_admin();
$is_daycare = ppo_is_daycare();
$is_family_member = ppo_is_family_member();
?>

<main id="primary" class="site-main">

	<?php
	while (have_posts()) :
		the_post();

		if (is_home() || is_front_page()) :
			get_template_part('template-parts/content', 'home');

		// elseif (is_page('login')) :
		// 	get_template_part('template-parts/content', 'login');

		elseif (is_page('log-ind')) :
			get_template_part('template-parts/content', 'login-form');

		elseif (is_page('glemt-kodeord')) :
			get_template_part('template-parts/content', 'forgot-password-form');

		elseif (is_page('opret-ny-adgangskode')) :
			get_template_part('template-parts/content', 'new-password-form');


		elseif (is_page('opret-konto-som-burger')) :
			get_template_part('template-parts/content', 'signup-form-regular');
		elseif (is_page('opret-konto-som-ppo')) :
			get_template_part('template-parts/content', 'signup-form');
		elseif (is_page('sign-up')) :
			get_template_part('template-parts/content', 'sign-up');

		elseif (is_page('velkommen-til-find-din-ppo')) :
			get_template_part('template-parts/content', 'sign-up-welcome');

		elseif (is_page('velkommen-til-find-din-ppo-familien')) :
			get_template_part('template-parts/content', 'sign-up-verified-welcome');

		elseif ( is_page('profile') && $is_daycare ) :
			get_template_part('template-parts/content', 'abonnement-plan');

		elseif ( is_page('profile') && !$is_family_member ) :
			get_template_part('template-parts/content', 'page-profile');
	
// 		elseif ( is_page('profile-daycare') && ($is_family_member || $is_admin)) :
// 		elseif ( is_page('profile-daycare') && !$is_daycare) :
		elseif ( is_page('profile-daycare') ) :
			get_template_part('template-parts/content', 'page-profile');
	
		elseif (is_page('profile') && $is_family_member) :
			get_template_part('template-parts/content', 'abonnement-plan-regular');

		elseif (is_page('invoice')) :
			get_template_part('template-parts/content', 'invoice-page');

		elseif (is_page('hjælpecenter') || is_page('hjaelpecenter')) :
			get_template_part('template-parts/content', 'help-questions-page');

		elseif (is_page('contact-us')) :
			get_template_part('template-parts/content', 'contact-page');

		elseif (is_page('checkout')) :
			get_template_part('template-parts/content', 'checkout-page');

		elseif (is_page('cancel-subscription')) :
			get_template_part('template-parts/content', 'cancel-subscription');

		elseif (is_page('sletning-af-konto')) :
			get_template_part('template-parts/content', 'delete-profile-page');

		elseif (is_page('tak')) :
			get_template_part('template-parts/content', 'thank-for-staying-page');

		elseif (is_page('privatlivspolitik') || is_page('about-us') || is_page('om-os')) :
			get_template_part('template-parts/content', 'common-page');


		elseif (is_page('successful-purchase')) :
			get_template_part('template-parts/content', 'successful-purchase');

		elseif (is_page('tro-og-love-erklaering')) :
			get_template_part('template-parts/content', 'sworn-statement');

		elseif (is_page('feedback')) :
			get_template_part('template-parts/content', 'feedback-page');
		elseif (is_page('faq-1')) :
			get_template_part('template-parts/content', 'faq-page');


		elseif (is_page('be-a-member')) :
			get_template_part('template-parts/content', 'be-a-member');

		elseif (is_page('subscription')) :
			get_template_part('template-parts/content', 'subscription-page');

		elseif (is_page('zipcode')) :
			get_template_part('template-parts/content', 'zipcode-page');

		elseif (is_page('abonnement-plan') && ( $is_admin || $is_daycare )) :
			get_template_part('template-parts/content', 'abonnement-plan');
	
		elseif (is_page('abonnement-plan') && $is_family_member) :
			get_template_part('template-parts/content', 'abonnement-plan-regular');
			
		elseif (is_page('gratis-plan') || is_page('basic-plan') || is_page('starter-plan') || is_page('pro-plan') || is_page('premium-plan')) :
			get_template_part('template-parts/content', 'single-plan-page');

		else :
			get_template_part('template-parts/content', 'page');

			// If comments are open or we have at least one comment, load up the comment template.
			if (comments_open() || get_comments_number()) :
				comments_template();
			endif;
		endif;

	endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
