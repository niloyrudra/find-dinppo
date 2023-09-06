<div class="modal fade" id="emailPDFPopup" tabindex="-1" aria-labelledby="emailPDFPopupLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content ppo-br-16 p-0 ppo-bg-card">
            <div class="modal-header border-0 p-0">
                <div class="ppo-br-16 ppo-box-shadow w-100 ppo-bg-secondary">
                    <h3 class="modal-title text-light fs-3 fw-bold text-center py-1 mb-0" id="emailPDFPopupLabel">E-mail PDF (Faktura)</h3>
                </div>

            </div>
            <div class="modal-body">
                <p class="text-white mb-0 fw-bold fs-5">
                    Vil du sende en kopi af dette dukoment til din e-mailadresse, <b><?php echo $user->user_email;/*get_bloginfo("admin_email");*/ ?></b>
                </p>
            </div>
            <div class="modal-footer border-0 justify-content-start">
                <button type="button" class="btn bg-transparent ppo-b2-light ppo-br-12 text-white fw-bold fs-5" data-bs-dismiss="modal">Annuller</button>
                <button type="button" class="btn ppo-b2-light ppo-br-12 text-white fw-bold fs-5 ppo-bg-primary">E-mail PDF</button>
            </div>
        </div>
    </div>
</div>