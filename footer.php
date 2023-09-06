<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Find_Dinppo
 */

?>

<footer id="colophon" class="site-footer ppo-bg-secondary">

	<div class="container py-2">

		<div class="row align-items-start mb-4">

			<div class="col-md-1"></div>

			<div class="col-md-5 col-sm-12 mt-2">

				<div class="row py-3">
					<div class="col-2"></div>
					<div class="col-2">
						<div class="ppo-footer-help-icons">
							<a href="<?php echo ( is_user_logged_in() ? esc_url(home_url("profile")) : esc_url(home_url("log-ind")) ); ?>" rel="link" title="Profile" alt="Profile">
								<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/user/man-user.png'); ?>" style="display: block;" />
							</a>
						</div>
					</div>
					<div class="col-2">
						<div class="ppo-footer-help-icons">
							<a href="<?php echo ( is_user_logged_in() ? esc_url(home_url("profile")) : esc_url(home_url("sign-up")) ); ?>" rel="link" title="Register" alt="Register">
								<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/singup/registration.png'); ?>" style="display: block;" />
							</a>
						</div>
					</div>
					<div class="col-2">
						<div class="ppo-footer-help-icons">
							<a href="<?php echo esc_url(home_url("faq")); ?>" rel="link" title="Query" alt="Query">
								<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/footer-help/question.png'); ?>" style="display: block;" />
							</a>
						</div>
					</div>
					<div class="col-2">
						<div class="ppo-footer-help-icons">
							<a href="<?php echo esc_url(home_url("contact-us")); ?>" rel="link" title="Support" alt="Support">
								<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/footer-help/support.png'); ?>" style="display: block;" />
							</a>
						</div>
					</div>
					<div class="col-2"></div>

				</div> <!-- ./row -->

				<h4 class="fw-bold fs-4 text-center" style="text-shadow: 0 0 2px rgba(0,0,0,0.35);color:rgb(207,64,66);">
					Abonner på vores nyhedsbrev
				</h4>

				<p class="text-light pb-1">
					Bliv opdateret, og udnyt at være den første til at kende de nye ændringer eller tilbud!
				</p>

				<form class="mb-3">
					<div class="mb-3">
						<input type="email" class="form-control ppo-sub-input" id="floatingInput" placeholder="Din e-mail">
					</div>

					<button type="submit" class="btn fw-bold text-light ppo-sub-button">Tilmeld mig</button>
				</form>

				<p class="text-light">
					Ja tak, jeg vil gerne modtage nyheder og blive opdateret og deltage i konkurrencer og tips via e-mail. Du kan til enhver tid trække dit samtykke tilbage. Læs mere i vores <a href="<?php echo esc_url(home_url('/privatlivspolitik/')); ?>" rel="link" title="" alt="" class="text-white">Privatlspolitik</a>.
				</p>

			</div> <!-- ./col Widget-1 -->

			<!-- <div class="col-1"></div> -->

			<div class="col-md-5 col-sm-12 mt-2">

				<div class="row py-3">
					<div class="col-2"></div>
					<div class="col-2">
						<div class="ppo-footer-social-icon">
							<a href="<?php ppo_text_content_generator_from_customizer('social_handler_fb'); ?>" rel="link" title="Profile" alt="Profile">
								<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/social-icons/facebook.png'); ?>" style="display: block;" />
							</a>
						</div>
					</div>
					<div class="col-2">
						<div class="ppo-footer-social-icon">
							<a href="<?php ppo_text_content_generator_from_customizer('social_handler_instagram'); ?>" rel="link" title="Register" alt="Register">
								<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/social-icons/instagram.png'); ?>" style="display: block;" />
							</a>
						</div>
					</div>
					<div class="col-2">
						<div class="ppo-footer-social-icon">
							<a href="<?php ppo_text_content_generator_from_customizer('social_handler_yt'); ?>" rel="link" title="Query" alt="Query">
								<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/social-icons/youtube.png'); ?>" style="display: block;" />
							</a>
						</div>
					</div>
					<div class="col-2">
						<div class="ppo-footer-social-icon">
							<a href="<?php ppo_text_content_generator_from_customizer('social_handler_star'); ?>" rel="link" title="Support" alt="Support">
								<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/social-icons/star.jpg'); ?>" style="display: block;" />
							</a>
						</div>
					</div>
					<div class="col-2"></div>

				</div> <!-- ./row -->

				<h4 class="fw-bold fs-4 text-center text-light pt-3">
					Sikkier betaling:
				</h4>

				<div class="row py-3">

					<div class="col-2">
						<div class="ppo-footer-card-icon">
							<a href="#!" rel="link" title="Profile" alt="Profile">
								<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/cards/DK_Logo_CMYK_Konturstreg.webp'); ?>" style="display: block;" />
							</a>
						</div>
					</div>
					<div class="col-2">
						<div class="ppo-footer-card-icon">
							<a href="#!" rel="link" title="Register" alt="Register">
								<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/cards/Visa_Electron.png'); ?>" style="display: block;" />
							</a>
						</div>
					</div>
					<!-- <div class="col-2">
						<div class="ppo-footer-card-icon">
							<a href="#!" rel="link" title="Query" alt="Query">
								<img src="<?php // echo esc_url(get_template_directory_uri() . '/assets/images/cards/Visa_Electron.png'); 
											?>" style="display: block;" />
							</a>
						</div>
					</div> -->
					<div class="col-2">
						<div class="ppo-footer-card-icon">
							<a href="#!" rel="link" title="Support" alt="Support">
								<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/cards/MasterCard.webp'); ?>" style="display: block;" />
							</a>
						</div>
					</div>
					<div class="col-2">
						<div class="ppo-footer-card-icon">
							<a href="#!" rel="link" title="Support" alt="Support">
								<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/cards/Maestro_logo.png'); ?>" style="display: block;" />
							</a>
						</div>
					</div>
					<div class="col-4">
						<div class="ppo-footer-card-icon">
							<a href="#!" rel="link" title="Support" alt="Support">
								<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/cards/Mobilepay.webp'); ?>" style="display: block;" />
							</a>
						</div>
					</div>

				</div> <!-- ./row -->

			</div> <!-- ./col Widget-2 -->

			<div class="col-md-1"></div>

		</div> <!-- ./row - Footer Widgets Section -->

		<div class="row align-items-center">
			<p class="fw-bold fs-5 text-center text-light"><?php ppo_text_content_generator_from_customizer('ppo_copyright_text'); ?></p>
		</div> <!-- ./row - Site Info -->

		<div class="row align-items-center pt-2 pb-4">
			<div class="text-center">
				<?php
				the_custom_logo();
				?>
			</div>
		</div>

	</div>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>