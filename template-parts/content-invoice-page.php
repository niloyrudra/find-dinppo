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

    <!-- Subscription Detail Section -->
    <div class="row mb-4 ppo-br-16 ppo-bg-card">
        <div class="ppo-br-16 ppo-box-shadow ppo-bg-secondary">
            <h3 class="text-light fs-4 fw-bold text-center py-1">Faktureringsoversigt</h3>
        </div>

        <div class="px-3 py-3">
            <h3 class="text-white hw-bold fs-5">
                Gennemse din faktureringshistorik og administrer dine fakturaer herunder.
            </h3>
            <p class="text-white">
                Sog efter ordrenummer, plannavn med mere
            </p>

            <div class="form-group position-relative">
                <input type="text" name="" id="" class="form-control ppo-br-16 bg-white ppo-b1-dark fs-5 ps-5" placeholder="" aria-describedby="helpId">
                <div class="position-absolute" style="left:10px;top:5px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16" style="width:24px;height:24px;">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </div>
            </div>
        </div>

    </div>

    <!-- Invoices Below -->
    <div class="row mb-4 ppo-br-16 ppo-bg-card">
        <div class="ppo-br-16 ppo-box-shadow ppo-bg-secondary">
            <h3 class="text-light fs-3 fw-bold text-center py-1 mb-0">Faktura 30. SEP. 2023</h3>
        </div>

        <div class="d-flex flex-column justify-content-start align-items-start p-4">

            <p class="text-light fw-bold fs-3 mb-2">Faktura</p>
            <p class="text-light fw-bold fs-3 mb-2">Ordrenummer: AE574884</p>
            <p class="text-light fw-bold fs-3 mb-2">Plan: Starter</p>
            <p class="text-light fw-bold fs-3 mb-5">Betaling: 240 kr. årligt</p>

            <div class="d-flex justify-content-start align-items-center">

                <button class="btn text-light fw-bold fs-4 w-50 ppo-b2-light ppo-br-12 align-middle me-3 ppo-bg-primary" style="width:72px !important;height:64px;">
                    <img src="<?php echo ppo_get_dir("/assets/images/invoice/eye.png"); ?>" class="d-block w-100" />
                </button>

                <button class="btn text-light fw-bold fs-4 w-50 ppo-b2-light ppo-br-12 align-middle me-3 ppo-bg-primary" style=" width:72px !important;height:64px;">
                    <img src="<?php echo ppo_get_dir("/assets/images/invoice/download.png"); ?>" class="d-block w-100" />
                </button>

                <button class="btn text-light fw-bold fs-4 w-50 ppo-b2-light ppo-br-12 align-middle ppo-bg-primary" style="width:72px !important;height:64px;" data-bs-toggle="modal" data-bs-target="#emailPDFPopup">
                    <img src="<?php echo ppo_get_dir("/assets/images/singup/mail.png"); ?>" class="d-block w-100" />
                </button>

            </div>

        </div>


    </div>

    <div class="row mb-4 ppo-br-16 ppo-bg-card">
        <div class="ppo-br-16 ppo-box-shadow ppo-bg-secondary">
            <h3 class="text-light fs-3 fw-bold text-center py-1 mb-0">Faktura 31. SEP. 2023</h3>
        </div>

        <div class="d-flex flex-column justify-content-start align-items-start p-4">

            <p class="text-light fw-bold fs-3 mb-2">Faktura</p>
            <p class="text-light fw-bold fs-3 mb-2">Ordrenummer: AE574886</p>
            <p class="text-light fw-bold fs-3 mb-2">Plan: Starter</p>
            <p class="text-light fw-bold fs-3 mb-5">Betaling: 240 kr. årligt</p>

            <div class="d-flex justify-content-start align-items-center">

                <button class="btn text-light fw-bold fs-4 w-50 ppo-b2-light ppo-br-12 align-middle me-3 ppo-bg-primary" style="width:72px !important;height:64px;">
                    <img src="<?php echo ppo_get_dir("/assets/images/invoice/eye.png"); ?>" class="d-block w-100" />
                </button>

                <button class="btn text-light fw-bold fs-4 w-50 ppo-b2-light ppo-br-12 align-middle me-3 ppo-bg-primary" style=" width:72px !important;height:64px;">
                    <img src="<?php echo ppo_get_dir("/assets/images/invoice/download.png"); ?>" class="d-block w-100" />
                </button>

                <button class="btn text-light fw-bold fs-4 w-50 ppo-b2-light ppo-br-12 align-middle ppo-bg-primary" style="width:72px !important;height:64px;" data-bs-toggle="modal" data-bs-target="#emailPDFPopup">
                    <img src="<?php echo ppo_get_dir("/assets/images/singup/mail.png"); ?>" class="d-block w-100" />
                </button>

            </div>

        </div>


    </div>

</article><!-- #post-<?php the_ID(); ?> -->



<!-- Modal -->
<?php ppo_invoice_modal(); ?>


<script type="text/javascript" defer>
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
</script>