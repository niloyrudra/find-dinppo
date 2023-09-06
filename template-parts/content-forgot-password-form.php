<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Find_Dinppo
 */
$user = wp_get_current_user();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="width:100%; max-width: 600px; margin: 0 auto; padding: 1rem;">

    <!-- Top Title Section -->
    <div class="row mb-4">
        <div class="ppo-box-shadow ppo-br-16 py-1 px-5 ppo-bg-secondary">
            <h3 class="text-light fs-5 fw-bold text-center">Glemt adgangskode</h3>
        </div>
    </div>

    <!-- Contact Form Section -->
    <div class="row mb-4 py-3 px-3 ppo-login-form-container ppo-bg-card">

        <div class="content">
            <p class="text-light fs-5 fw-bold">Intet problem. Vi sender en mail til dig med et link, sa du kan nulstille din adgangskode.</p>

            <form action="" method="post" class="row needs-validation mb-3" novalidate>
                <!-- E-mail Input -->
                <div class="col-12 d-flex">

                    <div class="input-group has-validation mb-3">

                        <span class="position-absolute input-group-text border-0 bg-transparent" id="inputGroupPrepend" style="top:0;">
                            <img src="<?php echo ppo_get_dir("/assets/images/singup/mail.png"); ?>" style="width:24px;" />
                        </span>
                        <input type="email" class="form-control bg-transparent ps-5 text-light ppo-b2-light ppo-br-16 mb-2" id="user_email" name="user_email" placeholder="Indtast e-mail" aria-describedby="inputGroupPrepend" required>

                        <?php ppo_form_field_warning_msg("Denne mail existere ikke i vores system!"); ?>

                    </div>
                    <?php ppo_field_required_indicator(); ?>

                </div>

                <div class="col-12 text-center">
                    <button class="btn w-100 fw-bold fs-5 text-light ppo-br-16 ppo-box-shadow ppo-b2-light ppo-bg-primary" type="submit">Send</button>
                </div>

            </form>

        </div>

    </div>

    <!-- /SEO Content -->
    <?php ppo_seo_content_embeded(); ?>

</article><!-- #post-<?php the_ID(); ?> -->

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })();
</script>