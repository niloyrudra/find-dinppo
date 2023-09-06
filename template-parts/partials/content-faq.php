<?php
// $args
$args = array(
    'post_type'         => 'ppo_faq',
    'status'            => 'publish',
    'posts_per_page'    => 3
);
// The Query.
$faq_query = new WP_Query($args);

// The Loop.
if ($faq_query->have_posts()) { ?>

    <div class="row mb-4 justify-content-center">
        <!-- FAQ Area-->
        <div class="accordion" id="accordionExample">

            <?php
            while ($faq_query->have_posts()) :
                $faq_query->the_post();
				get_template_part( "/template-parts/partials/content", "faq-list-item" );
            endwhile;
            ?>
        </div>

    </div>
	
	<script defer>
		"use strict";
		jQuery(document).ready(function () {
			jQuery('#accordionExample').on('click', '[data-ppo-faq-positive-response]', e => {
				const faqId = e.target.dataset.ppoFaqPositiveResponse
				if(faqId) ppoUpdateFaqMetaStats(faqId, 'ppo_faq_meta_positive_stats_update_action');
			});
			jQuery('#accordionExample').on('click', '[data-ppo-faq-negative-response]', e => {
				const faqId = e.target.dataset.ppoFaqNegativeResponse
				if(faqId) ppoUpdateFaqMetaStats(faqId, 'ppo_faq_meta_negative_stats_update_action');
			})
			// Ajax Handler
			function ppoUpdateFaqMetaStats(faqId, action) {
				jQuery.ajax({
					url: ppo_data.ajax_url,
					type: "post",
					data: {
						faqId: faqId,
						action: action
					},
					beforeSend: function() {
						console.log("Sending Request...")
					},
					success: function(res) {
						console.log("SUCCESS")
						console.log(res)
					},
					error: function(err) {
						console.log("ERROR")
						console.log(err)
					},
					complete: function() {
						console.log("COMPLETED")
					}
				});
			}

		});
	</script>

<?php
}
// Restore original Post Data.
wp_reset_postdata();
