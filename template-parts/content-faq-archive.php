<?php
// The Loop.
if (have_posts()) { ?>
    <div class="row mb-4 justify-content-center">
        <!-- FAQ Area-->
        <div class="accordion" id="accordionExample">

            <?php
            while (have_posts()) :
                the_post();
            ?>
                <div class="accordion-item mb-3 ppo-br-16 ppo-b2-light">
                    <h2 class="accordion-header ppo-br-16 ppo-box-shadow" id="heading<?php the_ID(); ?>">
                        <button class="accordion-button py-2 px-3 collapsed text-light ppo-br-16 ppo-bg-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php the_ID(); ?>" aria-expanded="true" aria-controls="collapse<?php the_ID(); ?>">
                            <?php the_title(); ?>
                        </button>
                    </h2>
                    <div id="collapse<?php the_ID(); ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php the_ID(); ?>" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <?php the_content(); ?>
                        </div>

                        <div class="d-flex justify-content-between align-content-center py-1 px-3 ppo-br-16 ppo-bg-secondary">

                            <span class="align-middle text-light" style="line-height: 38px;">Hjalp dette?</span>
							
							 <div class="d-flex" style="gap:1rem;">
									<button data-ppo-faq-positive-response="<?php echo esc_attr(get_the_ID()); ?>" class="btn ppo-br-24 mr-2 text-white ppo-b2-light ppo-bg-primary" style="min-width: 60px;" data-bs-toggle="collapse" data-bs-target="#collapse<?php the_ID(); ?>" aria-expanded="true" aria-controls="collapse<?php the_ID(); ?>">Ja</button>
                                	<button data-ppo-faq-negative-response="<?php echo esc_attr(get_the_ID()); ?>" class="btn ppo-br-24 text-white ppo-b2-light ppo-bg-primary" style="min-width: 60px;" data-bs-toggle="collapse" data-bs-target="#collapse<?php the_ID(); ?>" aria-expanded="true" aria-controls="collapse<?php the_ID(); ?>">Nej</button>
                            </div>

                        </div>

                    </div>
                </div>
            <?php
            endwhile;
            ?>
        </div>

    </div>
<script defer>
	"user strict";
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
			console.log(ppo_data.current_page)
			jQuery.ajax({
				url: ppo_data.ajax_url,
				type: "post",
				data: {
					faqId: faqId,
// 					paged: ppo_data.current_page,
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
} else {
	?>
    <p class="text-white fs-5">Beklager, der er endnu ikke udgivet noget spørgsmål-og-svar til din forespørgsel.</p>
<?php
}
// Restore original Post Data.
wp_reset_postdata();