<?php
$user = wp_get_current_user();
?>
<!-- Image Preview -->
<form method="post" id="image-form" enctype="multipart/form-data" onSubmit="return false;">
    <div class="position-relative mb-4 m-auto d-flex justify-content-center w-auto">

        <label for="ppoRegularUserProfilePicInput" class="position-relative p-0 ppo-b2-light ppo-br-20 ppo-bg-primary">

            <img src="<?php echo ppo_get_dir("/assets/images/subscription-plans/camera.png"); ?>" class="position-absolute d-block ppo-cursor-pointer ppo-b1-light ppo-br-8 p-2 ppo-bg-primary75" style="top:6px;left:6px;z-index:9;width:33%;" />

            <img id="ppoRegularUserProfilePic" src="<?php echo ppo_get_user_avatar($user->ID); ?>" class="d-block ppo-br-20" style="width:220px;height:220px;" />

        </label>
        <input type="file" class="position-absolute opacity-0 invisible" style="z-index:-999;scale:0;" name="ppo_regular_user_profile_pic_input" id="ppoRegularUserProfilePicInput" placeholder="" aria-describedby="" value="<?php echo ppo_get_user_avatar($user->ID); ?>">

        <button id="ppoRegularUserProfilePicSaveBtn" type="submit" class="btn position-absolute w-auto ppo-bg-primary text-white fw-bold ppo-box-shadow ppo-br-12 ppo-b1-light" style="top:50%;left:50%;transform:translate(-50%,-50%);display:none;">GEM</button>
    </div>
</form>
<script defer>
    "use strict";
    $(document).ready(() => {
        $("#ppoRegularUserProfilePicInput").change(function() {
            const file = this.files[0];
            console.log(file)
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $("#ppoRegularUserProfilePic")
                        .attr("src", event.target.result);
                };
                reader.readAsDataURL(file);

                jQuery("#ppoRegularUserProfilePicSaveBtn").fadeIn("slow")
            }
        });
        jQuery("#ppoRegularUserProfilePicSaveBtn").on("click", function(e) {
            e.preventDefault();
            jQuery("#ppoRegularUserProfilePicSaveBtn").addClass("ppo-submission-processing")
            jQuery("#ppoRegularUserProfilePicSaveBtn").text("GEM...")
            setTimeout(function() {
                jQuery("#ppoRegularUserProfilePicSaveBtn").text("GEM")
                jQuery("#ppoRegularUserProfilePicSaveBtn").removeClass("ppo-submission-processing")
                jQuery("#ppoRegularUserProfilePicSaveBtn").fadeOut("slow")
            }, 3000)
        });
    });
</script>