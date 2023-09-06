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
            <h3 class="text-light fs-5 fw-bold text-center">Opret ny adgangskode</h3>
        </div>
    </div>

    <!-- Contact Form Section -->
    <div class="row mb-4 py-3 px-3 ppo-login-form-container ppo-bg-card">

        <div class="content">
            <p class="text-light fs-5 fw-bold">Vaelg ny adgangskode her under.</p>

            <form action="" method="post" class="row needs-validation mb-3" novalidate>
                <!-- New Password Input -->
                <div class="col-12">
                    <div class="input-group has-validation mb-3">
                        <span class="position-absolute input-group-text border-0 bg-transparent" id="inputGroupPrepend" style="top:0;">
                            <img src="<?php echo ppo_get_dir("/assets/images/singup/padlock.png"); ?>" style="width:24px;" />
                        </span>
                        <input type="password" class="form-control bg-transparent ps-5 text-light ppo-b2-light ppo-br-16 mb-2 py-1" id="new_password" name="new_password" placeholder="Indtast ny adgangskode" aria-describedby="inputGroupPrepend" required>

                        <?php ppo_password_toggle_text("#new_password"); ?>

                        <?php ppo_form_field_warning_msg("Adgangskoden skal bestå af mindst 8 tegn!"); ?>

                    </div>
                </div>

                <!-- Confirm New Password Input -->
                <div class="col-12">
                    <div class="input-group has-validation mb-3">
                        <span class="position-absolute input-group-text border-0 bg-transparent" id="inputGroupPrepend2" style="top:0;">
                            <img src="<?php echo ppo_get_dir("/assets/images/singup/padlock.png"); ?>" style="width:24px;" />
                        </span>
                        <input type="password" class="form-control bg-transparent ps-5 text-light ppo-b2-light ppo-br-16 mb-2 py-1" id="confirm_new_password" name="confirm_new_password" placeholder="Gentag ny adgangskode" aria-describedby="inputGroupPrepend2" required>

                        <?php ppo_password_toggle_text("#confirm_new_password"); ?>

                        <?php ppo_form_field_warning_msg("Adgangskoden stemmer ikke overens!"); ?>

                    </div>
                </div>

                <div class="col-12 text-center">
                    <button class="btn w-100 fw-bold fs-5 text-light ppo-br-16 ppo-box-shadow ppo-b2-light ppo-bg-primary" type="submit">Gem ny adgangskode</button>
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
                    if (document.querySelector("input.is-invalid")) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })();

    jQuery(document).ready(function() {
        jQuery("#new_password").on('keyup', function() {
            var password = jQuery("#new_password").val();
            console.log(password)
            if (password == "")
                jQuery("#new_password").removeClass("is-invalid")
            else if (password && password.length < 8)
                jQuery("#new_password").removeClass("is-valid").addClass("is-invalid");
            else
                jQuery("#new_password").removeClass("is-invalid").addClass("is-valid");
        });

        jQuery("#confirm_new_password").on('keyup', function() {
            var password = jQuery("#new_password").val();
            var confirmPassword = jQuery("#confirm_new_password").val();
            if (confirmPassword == "")
                jQuery("#confirm_new_password").removeClass("is-invalid")
            else if (password != confirmPassword)
                jQuery("#confirm_new_password").removeClass("is-valid").addClass("is-invalid");
            else
                jQuery("#confirm_new_password").removeClass("is-invalid").addClass("is-valid");
        });
    });

    function toggleInputType(ele, inputId) {
        const input = document.querySelector(inputId)
        if (input && input.type == 'password') {
            input.type = 'text';
            ele.innerText = 'Skjul';
            return
        }
        if (input && input.type == 'text') {
            input.type = 'password';
            ele.innerText = 'Vis';
            return
        }
    }
</script>