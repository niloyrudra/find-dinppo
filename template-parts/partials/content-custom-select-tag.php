<?php
// $plan_param = $_GET && $_GET['plan'] ? $_GET['plan'] : 'gratis';
$user = wp_get_current_user();
$user_id = $user ? $user->ID : null;
$plan_name = $user_id ? ppo_get_daycare_subscription_plan($user_id) : 'gratis';
$selected_plan = $plan_name ?? 'gratis';

$plan_data = ppo_subscription_detail($selected_plan);
$icon = trim($plan_data['icon']);
$plan_name = $plan_data['plan'];
?>

<style type="text/css">
    .select-container {
        position: relative;
        margin: 0 auto;
        width: 400px;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
    }

    .select-container .select {
        position: relative;
        background: rgb(73, 86, 73);
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
        padding: 0 15px;
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
        /*#6e6477;*/
        height: 0;
        overflow-y: scroll;
        transition: 0.4s;
    }

    .select-container.active .option-container {
        /* height: 240px; */
        height: auto;
    }

    .select-container .option-container::-webkit-scrollbar {
        /* border-left: 1px solid rgba(0, 0, 0, 0.2);
        width: 10px; */

        display: none;
    }

    /* .select-container .option-container::-webkit-scrollbar-thumb {
        background: #0f0e11;
    } */

    .select-container .option-container {
        -ms-overflow-style: none;
        /* IE and Edge */
        scrollbar-width: none;
        /* Firefox */
    }

    .select-container .option-container .option {
        position: relative;
        padding-left: 15px;
        height: 60px;
        border-top: 1px solid rgba(0, 0, 0, 0.3);
        cursor: pointer;
        display: flex;
        align-items: center;
        transition: 0.2s;
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

<!-- Custom Select Tag -->
<div class="select-container ppo-br-16 mb-4">
    <div class="d-flex align-items-center select ppo-br-16 ppo-b2-light ppo-cursor-pointer">
        <div id="ppoInput" class="text-white d-flex justify-content-start align-items-center fs-4 fw-bold px-3" onfocus="this.blur();">Du har valgt:&nbsp;<img src="<?php echo ppo_get_dir("/assets/images/member-stars/$icon.png"); ?>" style="width:35px;height:35px;margin-right:1rem;" /><?php echo $plan_name; ?></div>
    </div>

    <div class="option-container ppo-br-16">
        <?php
        $options = ppo_get_subscription_plan_list();
        foreach ($options as $key => $option) : ?>
            <div class="option<?php echo (strtolower($plan_name) == $key ? ' selected' : ''); ?>" data-selected-plan="<?php echo esc_attr($key); ?>">
                <label>Du har valgt:&nbsp;<img src="<?php echo esc_url($option['star_icon']); ?>" style="width:35px;height:35px;margin-right:1rem;" /> <?php echo esc_html($option['plan']); ?></label>
            </div>
        <?php
        endforeach;
        ?>
    </div>
</div>