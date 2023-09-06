<div class="accordion-item mb-3 ppo-br-16 ppo-b2-light">
    <h2 class="accordion-header ppo-br-16 ppo-box-shadow" id="heading<?php the_ID(); ?>">
        <button class="accordion-button py-2 px-3 collapsed text-light ppo-br-16 ppo-bg-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php the_ID(); ?>" aria-expanded="true" aria-controls="collapse128"><?php the_title(); ?></button>
    </h2>
    <div id="collapse<?php the_ID(); ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php the_ID(); ?>" data-bs-parent="#accordionExample">
        <div class="accordion-body"><?php the_content(); ?></div>

        <div class="d-flex justify-content-between align-content-center py-1 px-3 ppo-br-16 ppo-bg-secondary">

            <span class="align-middle text-light" style="line-height: 38px;">Hjalp dette?</span>

             <div class="d-flex" style="gap:1rem;">
                    <button data-ppo-faq-positive-response="<?php the_ID(); ?>" class="btn ppo-br-24 mr-2 text-white ppo-b2-light ppo-bg-primary" style="min-width: 60px;" data-bs-toggle="collapse" data-bs-target="#collapse<?php the_ID(); ?>" aria-expanded="true" aria-controls="collapse<?php the_ID(); ?>">Ja</button>
                    <button data-ppo-faq-negative-response="<?php the_ID(); ?>" class="btn ppo-br-24 text-white ppo-b2-light ppo-bg-primary" style="min-width: 60px;" data-bs-toggle="collapse" data-bs-target="#collapse<?php the_ID(); ?>" aria-expanded="true" aria-controls="collapse<?php the_ID(); ?>">Nej</button>
            </div>

        </div>

    </div>
</div>