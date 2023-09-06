<?php
$user = wp_get_current_user();
?>

<div class="row mb-4 ppo-br-16 ppo-bg-card" id="ppoChatRoom">
    <div class="ppo-br-16 ppo-box-shadow ppo-bg-secondary">
        <h3 class="text-light fs-4 fw-bold text-center py-2 mb-0">Besksdindbakke</h3>
    </div>

    <div class="mt-4 mb-3 px-4 flex-column justify-content-start">

        <?php
        $participants = array(
            '1' => array(
                'name'  => "John Doe"
            ),
            '2' => array(
                'name'  => "Jane Doe"
            ),
            '3' => array(
                'name'  => "Helles Hjerterum"
            ),
            '4' => array(
                'name'  => "JSR"
            ),
            '5' => array(
                'name'  => "Jane Austin"
            )
        );
        foreach ($participants as $participant_id => $participant) :
        ?>
            <div class="d-flex justify-content-between align-items-center mb-3 ppo-b2-light ppo-br-12 mb-3">
                <div class="d-flex justify-content-start align-items-center">
                    <img class="me-4 ppo-br-12 ppo-b2-light" src="<?php echo ppo_get_dir("/assets/images/icone-d-image-noir.png") ?>" style="width:40px;" />

                    <p class="mb-0 ms-1 text-white fw-bold"><?php echo esc_html($participant['name']); ?></p>
                </div>

                <button data-participant-id="<?php echo esc_attr($participant_id); ?>" data-tab-content="#ppoChatForm" class="btn ppo-b2-light ppo-br-12 text-white ppo-bg-primary">Se chat</button>

            </div>
        <?php
        endforeach;
        ?>

    </div>

</div>

<div class="row mb-4 ppo-br-16 ppo-bg-card" id="ppoChatForm" style="display:none;">
    <div class="ppo-br-16 ppo-box-shadow ppo-bg-secondary">
        <h3 class="text-white fs-4 fw-bold py-2 align-items-center d-flex mb-0">
            <button class="d-inline-block me-2 border-0 bg-transparent p-0" data-tab-content="#ppoChatRoom">
                <img src="<?php echo ppo_get_dir("/assets/images/arrows/arrow-down-sign-to-navigate-black.png") ?>" style="width:24px;rotate:90deg;pointer-events:none;" />
            </button>
            <span id="ppoParticipantName">Helle Jensen</span>
        </h3>
    </div>

    <div class="d-flex p-4 flex-column justify-content-end align-items-end h-50" style="min-height:400px;">

        <div id="ppoChatContent" class="py-4 w-100">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, necessitatibus.</p>
        </div>

        <div class="d-flex w-100 form-group bg-transparent ppo-b2-light ppo-br-16">
            <input type="text" class="form-control bg-transparent ppo-br-16 text-white fs-4 border-0 px-3" name="" id="" aria-describedby="" placeholder="Skriv din besked her...">
            <button type="submit" class="btn w-auto fs-5 ppo-bg-primary ppo-br-16 text-white px-3">Send</button>
        </div>


    </div>

</div>

<script defer>
    "use strict";

    jQuery(document).ready(function() {
        if (jQuery("#ppoChatRoom")) jQuery("#ppoChatRoom button").on('click', function(e) {
            const targetedTabContentId = e.target.dataset.tabContent

            if (targetedTabContentId) {
                jQuery("#ppoChatRoom").fadeOut("fast")
                jQuery(targetedTabContentId).fadeIn("slow")
            }
        });
        if (jQuery("#ppoChatForm")) jQuery("#ppoChatForm button").on('click', function(e) {
            const targetedTabContentId = e.target.dataset.tabContent

            if (targetedTabContentId) {
                jQuery("#ppoChatForm").fadeOut("slow")
                jQuery(targetedTabContentId).fadeIn("slow")
            }
        });

    });
</script>