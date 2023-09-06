<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Find_Dinppo
 */

global $wp_query;
get_header();
?>
	<main id="primary" class="site-main">
		
		<?php if ( have_posts() ) : ?>

			<?php if( get_post_type() == "ppo_faq" ) : ?>
		
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="width:100%; max-width: 600px; margin: 0 auto; padding: 0 1rem 1rem;">
					<div class="row mb-3">
						<div style="padding-top: 2.5rem; margin-top:-1.5rem;" style="ppo-bg-card">
							<img src="<?php echo ppo_get_dir('/assets/images/faq/banner.png') ?>" class="d-block w-100" />
						</div>
					</div>

					<!-- FAQ Section -->
					<div class="row mb-4 ppo-br-16 ppo-bg-secondary">
						<div class="text-center ppo-box-shadow py-1 ppo-profile-section-header">
							<h3 class="text-light fs-5 fw-bold">Ofte stillede spørgsmål</h3>
						</div>

						<div class="ppo-profile-section-content pt-3">

							<!-- Home FAQ section -->
							<?php //get_template_part('template-parts/partials/content', 'faq-all'); ?>
							<?php get_template_part('template-parts/content', 'faq-archive'); ?>

							<!-- Button -->
							<div class="row mb-4 justify-content-center">
								<button class="btn ppo-box-shadow ppo-br-16 py-1 px-5 ppo-bg-primary w-auto text-light fs-5 fw-bold ppo-load-more">
									Flere spørgsmål
								</button>
							</div>
							
						</div>
					</div>
					
<!-- 					<button class="ppo-load-more">Load More</button> -->

					<script defer>
						"use strict";
						jQuery(function($){ // use jQuery code inside this to avoid "$ is not defined" error
							let currentPage = 1;
							const maxPages = <?php echo $wp_query->max_num_pages; ?>;
							$('.ppo-load-more').click(function(){
								const button = $(this),
									data = {
										'action': 'ppo_faq_post_load_more_action',
// 										'query': ppo_data.posts, // that's how we get params from wp_localize_script() function
										'paged' : ppo_data.current_page ?? currentPage
									};
								console.log("Before Ajax Call ", ppo_data.current_page)
								$.ajax({ // you can also use $.post here
									url : ppo_data.ajax_url, // AJAX handler
									data : data,
									type : 'POST',
									dataType: 'html',
									beforeSend : function ( xhr ) {
										button.text('Indlæser...'); // change the button text, you can also add a preloader image
										button.prop("disabled", true)
									},
									success : function( data, status, xhr ){
										console.log(status)
										if( data ) {

											$("#accordionExample").append(data)
											
											if( ppo_data.current_page ) ppo_data.current_page = parseInt(ppo_data.current_page) + 1;
											else currentPage++;
											
											console.log("Success >> ", ppo_data.current_page, ppo_data.max_page, maxPages)
											
// 											if ( ppo_data.current_page == ppo_data.max_page )
											if ( currentPage == maxPages )
												button.remove(); // if last page, remove the button

											// you can also fire the "post-load" event here if you use a plugin that requires it
											// $( document.body ).trigger( 'post-load' );

										} else {
											button.remove(); // if no data, remove the button as well
										}
									},
									error: function(error) {
										console.log("ERROR")
										console.log(error)
									},
									complete: function(xhr) {
										console.log("COMPLETED")
										button.text('Flere spørgsmål');
										button.prop("disabled", false)
									}
								});
							});
						});
						
					</script>

					<!-- /SEO Content -->
					<?php ppo_seo_content_embeded(); ?>
				</article><!-- #post-<?php the_ID(); ?> -->
		
			<?php else: ?>
		
				<header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_type() );
					
				endwhile;

				the_posts_navigation();

// 			else :

// 				get_template_part( 'template-parts/content', 'none' );

			endif;
		endif;
		?>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
