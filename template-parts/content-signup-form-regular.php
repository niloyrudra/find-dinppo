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
            <h3 class="text-light fs-5 fw-bold text-center">Registrere dig som bruger</h3>
        </div>
    </div>

    <!-- Contact Form Section -->
    <div class="row mb-4 py-3 ppo-sign-up-form-container ppo-bg-card">

        <div class="content">

            <form action="" method="post" class="row g-3 needs-validation mb-3 p-3" novalidate>

                <!-- First Name Input -->
                <div class="col-6 d-flex">
                    <div class="input-group has-validation">
                        <span class="position-absolute input-group-text border-0 bg-transparent" id="inputGroupPrepend" style="top:0;">
                            <img src="<?php echo ppo_get_dir("/assets/images/singup/name.png"); ?>" style="width:24px;" />
                        </span>
                        <input type="text" class="form-control bg-transparent ps-5 text-light ppo-b2-light ppo-br-16 mb-2 py-1" name="ppo_user_first_name" id="firstName" placeholder="Dit fornavn" aria-describedby="inputGroupPrepend" required>

                        <?php ppo_form_field_warning_msg("Indtast venligst dit fornavn!"); ?>

                    </div>
                    <?php ppo_field_required_indicator(); ?>
                </div>

                <!-- Last Name Input -->
                <div class="col-6 d-flex">
                    <div class="input-group has-validation">
                        <span class="position-absolute input-group-text border-0 bg-transparent" id="inputGroupPrepend" style="top:0;">
                            <img src="<?php echo ppo_get_dir("/assets/images/singup/name.png"); ?>" style="width:24px;" />
                        </span>
                        <input type="text" class="form-control bg-transparent ps-5 text-light ppo-b2-light ppo-br-16 mb-2 py-1" name="ppo_user_last_name" id="lastName" placeholder="Dit efternavn" aria-describedby="inputGroupPrepend" required>

                        <?php ppo_form_field_warning_msg("Indtast venligst dit efternavn!"); ?>

                    </div>
                    <?php ppo_field_required_indicator(); ?>
                </div>

				<!-- Username Input -->
                <div class="col-12 d-flex">
                    <div class="input-group has-validation">
                        <span class="position-absolute input-group-text border-0 bg-transparent" id="inputGroupPrepend" style="top:0;">
                            <img src="<?php echo ppo_get_dir("/assets/images/user/man-user.png"); ?>" style="width:24px;" />
                        </span>
                        <input type="text" class="form-control bg-transparent ps-5 text-light ppo-b2-light ppo-br-16 mb-2 py-1" name="ppo_user_login" id="username" placeholder="Indtast brugernavn her" aria-describedby="inputGroupPrepend" required>
                        <?php ppo_form_field_warning_msg("Indtast en gyldig brugernavn!"); ?>
                    </div>
                    <?php ppo_field_required_indicator(); ?>
                </div>
				
                <!-- Email Input -->
                <div class="col-12 d-flex">
                    <div class="input-group has-validation">
                        <span class="position-absolute input-group-text border-0 bg-transparent" id="inputGroupPrepend" style="top:0;">
                            <img src="<?php echo ppo_get_dir("/assets/images/singup/mail.png"); ?>" style="width:24px;" />
                        </span>
                        <input type="email" class="form-control bg-transparent ps-5 text-light ppo-b2-light ppo-br-16 mb-2 py-1" name="ppo_user_email" id="email" placeholder="Indtast email/mobilnummer" aria-describedby="inputGroupPrepend" required>
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
                        <input type="password" class="form-control bg-transparent ps-5 text-light ppo-b2-light ppo-br-16 mb-2 py-1" name="ppo_user_password" id="password" placeholder="Indtast kodeord (Mindst 8 tegn)" required>

                        <?php ppo_password_toggle_text("#password"); ?>

                        <?php ppo_form_field_warning_msg("Adgangskoden skal bestå af mindst 8 tegn!"); ?>

                    </div>
                    <?php ppo_field_required_indicator(); ?>
                </div>

                <!-- Confirm New Password Input -->
                <div class="col-12 d-flex">
                    <div class="input-group has-validation mb-3">
                        <span class="position-absolute input-group-text border-0 bg-transparent" id="inputGroupPrepend2" style="top:0;">
                            <img src="<?php echo ppo_get_dir("/assets/images/singup/padlock.png"); ?>" style="width:24px;" />
                        </span>
                        <input type="password" class="form-control bg-transparent ps-5 text-light ppo-b2-light ppo-br-16 mb-2 py-1"  name="ppo_user_confirm_password" id="confirm_new_password" name="confirm_new_password" placeholder="Gentag ny adgangskode" aria-describedby="inputGroupPrepend2" required>

                        <?php ppo_password_toggle_text("#confirm_new_password"); ?>

                        <?php ppo_form_field_warning_msg("Adgangskoden stemmer ikke overens!"); ?>

                    </div>
                    <?php ppo_field_required_indicator(); ?>
                </div>

                <!-- Where to get known about -->
                <div class="col-12">
                    <div class="w-100 input-group my-5">

                        <style type="text/css">
                            .select-container {
                                position: relative;
                                margin: 0 auto;
                            }

                            .select-container .select {
                                position: relative;
                                background: #495649;
                                height: 60px;
                            }

                            .select-container .select::after {
                                position: absolute;
                                content: "";
                                width: 15px;
                                height: 15px;
                                top: 50%;
                                right: 15px;
                                transform: translateY(-50%) rotate(45deg);
                                border-bottom: 2px solid white;
                                border-right: 2px solid white;
                                cursor: pointer;
                                transition: border-color 0.4s;
                            }

                            .select-container.active .select::after {
                                border: none;
                                border-left: 2px solid white;
                                border-top: 2px solid white;
                            }

                            .select-container .select input {
                                position: relative;
                                width: 100%;
                                height: 100%;
                                padding: 0 1rem;
                                background: none;
                                outline: none;
                                border: none;
                                font-size: 1.4rem;
                                color: white;
                                cursor: pointer;
                            }

                            .select-container .option-container {
                                position: relative;
                                background: transparent;
                                height: 0;
                                overflow-y: scroll;
                                transition: 0.4s;
                            }

                            .select-container.active .option-container {
                                height: auto;
                            }
							
                            .select-container .option-container::-webkit-scrollbar {
                                display: none;
                            }

                            /* Hide scrollbar for IE, Edge and Firefox */
                            .select-container .option-container {
                                -ms-overflow-style: none;
                                /* IE and Edge */
                                scrollbar-width: none;
                                /* Firefox */

                                padding-left: 4px;
                                padding-right: 4px;
                            }


                            .select-container .option-container .option {
                                position: relative;
                                padding-left: 15px;
                                height: 50px;
                                border: 2px solid #fff;
                                border-radius: 20px;
                                cursor: pointer;
                                display: flex;
                                align-items: center;
                                transition: 0.2s;

                                box-shadow: 0 10px 12px -4px rgba(0, 0, 0, 0.14);
                            }

                            .select-container .option-container .option.selected {
                                background: rgba(0, 0, 0, 0.5);
                                pointer-events: none;
                            }

                            .select-container .option-container .option:hover {
                                background: rgba(0, 0, 0, 0.2);
                                padding-left: 20px;
                            }

                            .select-container .option-container .option label {
                                font-size: 1.1rem;
                                color: white;
                                cursor: pointer;
                            }
                        </style>

                        <div class="select-container ppo-br-16 mb-3 w-100">
                            <div class="d-flex w-100">
                                <div class="select ppo-br-16 ppo-b2-light w-100">
                                    <input type="text" name="ppo_user_info_source" id="input" class="text-white" placeholder="Hvor har du hort om os?" value="Hvor har du hort om os?" onfocus="this.blur();">
                                </div>
                                <?php ppo_field_required_indicator(); ?>
                            </div>
                            <div class="option-container ppo-br-16">
                                <div class="option" data-selected-value="from_colleague">
                                    <label>Fra en Kollega</label>
                                </div>
                                <div class="option" data-selected-value="social_media">
                                    <label>Fra sociale medier</label>
                                </div>
                                <div class="option" data-selected-value="self_discovered">
                                    <label>Jeg fandt selv ud af det</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Checkboxes -->
                <div class="col-12">
                    <div class="d-flex form-check align-items-center">
                        <input class="form-check-input ppo-b2-light ppo-br-8 ppo-cursor-pointer bg-transparent" type="checkbox" value="1" name="ppo_user_cookies_policy" id="cookiesPolicy" style="width:32px;height:32px;margin-right:1rem;" required>
                        <label class="form-check-label text-light fw-bold ppo-cursor-pointer" for="cookiesPolicy">
                            Jeg accepterer Find-Din-PPO's vilkar og betingelser og Cookie politik.<?php ppo_field_required_indicator(); ?>
                        </label>
                    </div>
                    <p class="text-light"><?php ppo_field_required_indicator(); ?>Skal udfyldes</p>
                </div>

                <!-- Submit Button -->
                <div class="col-12 text-center">
                    <button class="btn w-100 fw-bold fs-5 text-light ppo-br-16 ppo-box-shadow ppo-b2-light ppo-bg-primary" type="submit" name="ppo_user_signup_submit">Registrer</button>
                </div>
            </form>

        </div>

    </div>

    <!-- /SEO Content -->
    <?php ppo_seo_content_embeded(); ?>

</article><!-- #post-<?php the_ID(); ?> -->

<script>
    "use strict";
    let selectContainer = document.querySelector(".select-container");
    let select = document.querySelector(".select");
    let input = document.getElementById("input");
    let options = document.querySelectorAll(".select-container .option");

    select.onclick = () => {
        selectContainer.classList.toggle("active");
    };

    options.forEach((e) => {
        e.addEventListener("click", () => {
            input.value = e.innerText;
            selectContainer.classList.remove("active");
            options.forEach((e) => {
                e.classList.remove("selected");
            });
            e.classList.add("selected");
        });
    });
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