<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Find_Dinppo
 */
// $is_logged_in = is_user_logged_in();
// if ($is_logged_in) wp_safe_redirect(home_url("/profile/"));
// exit();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="width:100%; max-width: 600px; margin: 0 auto; padding: 1rem;">

    <!-- Top Title Section -->
    <div class="row mb-4">
        <div class="ppo-box-shadow ppo-br-16 py-1 px-5 ppo-bg-secondary">
            <h3 class="text-light fs-5 fw-bold text-center">Log ind som PPO</h3>
        </div>
    </div>

    <!-- Contact Form Section -->
    <div class="row mb-4 py-3 ppo-login-form-container ppo-bg-card">

        <div class="content">
            <p class="text-light">Endnu ikke medlem som Privat pasningsordining?
                <a href="<?php echo esc_url(home_url("/sign-up/")); ?>" class="fw-bold text-light">Bliv medlem her</a>
            </p>

            <form action="" method="post" class="row g-3 needs-validation mb-3" novalidate>
                <!-- Username Input -->
                <div class="col-12 d-flex">
                    <div class="input-group has-validation">
                        <span class="position-absolute input-group-text border-0 bg-transparent" id="inputGroupPrepend" style="top:0;">
                            <img src="<?php echo ppo_get_dir("/assets/images/singup/mail.png"); ?>" style="width:24px;" />
                        </span>
                        <input type="text" class="form-control bg-transparent ps-5 text-light ppo-b2-light ppo-br-16 mb-2 py-1" name="ppo_username" id="username" placeholder="Indtast email/mobilnummer" aria-describedby="inputGroupPrepend" required>

                        <?php ppo_form_field_warning_msg("Indtast en gyldig e-mailadresse!"); ?>

                    </div>
                    <?php ppo_field_required_indicator(); ?>
                </div>

                <!-- Password Input -->
                <div class="col-12 d-flex">
                    <div class="input-group has-validation position-relative">
                        <span class="position-absolute input-group-text border-0 bg-transparent" id="inputGroupPrepend" style="top:0;">
                            <img src="<?php echo ppo_get_dir("/assets/images/singup/padlock.png") ?>" style="width: 24px;" />
                        </span>
                        <input type="password" class="form-control bg-transparent ps-5 text-light ppo-b2-light ppo-br-16 mb-2 py-1" name="ppo_password" id="password" placeholder="Indtast kodeord" required>

                        <?php ppo_password_toggle_text("#password"); ?>

                        <?php ppo_form_field_warning_msg("Adgangskoden skal bestå af mindst 8 tegn!"); ?>

                    </div>
                    <?php ppo_field_required_indicator(); ?>
                </div>

                <!-- Remember Me Checkbox -->
                <div class="col-12">
                    <div class="d-flex form-check align-items-center">
                        <input class="form-check-input ppo-b2-light ppo-br-8 ppo-cursor-pointer bg-transparent" type="checkbox" value="1" id="rememberMe" name="ppo_remember" style="width:30px;height:30px;margin-right:1rem;">
                        <label class="form-check-label text-light fw-bold ppo-cursor-pointer" for="rememberMe">
                            Forbliv Logget ind
                        </label>
                    </div>
                </div>

                <div class="col-12 text-center">
                    <button class="btn w-100 fw-bold fs-5 text-light ppo-br-16 ppo-box-shadow ppo-b2-light ppo-bg-primary" type="submit" name="ppo_submit_login" id="ppo_submit_login">Log in</button>
                </div>
            </form>

            <p class="text-light">Har du
                <a href="<?php echo esc_url(home_url("/glemt-kodeord/")); ?>" class="fw-bold text-light">glemt din adgangskode?</a>
            </p>

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
        jQuery("#password").on('keyup', function() {
            var password = jQuery("#password").val();
            console.log(password)
            if (password == "")
                jQuery("#password").removeClass("is-invalid")
            else if (password && password.length < 8)
                jQuery("#password").removeClass("is-valid").addClass("is-invalid");
            else
                jQuery("#password").removeClass("is-invalid").addClass("is-valid");
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