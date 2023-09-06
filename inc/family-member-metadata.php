<?php
// Register admin scripts for custom fields
// add_action('user_register', 'ppo_user_register');
function ppo_user_register($user_id)
{

	// Get current user object
	$user = get_user_by('id', $user_id);

	if ($user) :

	endif;
}

/**
 * Back-end display
 */
add_action('show_user_profile', 'ppo_show_extra_profile_fields');
add_action('edit_user_profile', 'ppo_show_extra_profile_fields');

function ppo_show_extra_profile_fields($user)
{
	$user_id = $user->id;
	// $subscription_plan = get_user_meta( $user_id, '_fm_subscription_plan', true);
	// $address = get_user_meta( $user_id, '_daycare_address', true );
	// $postcode = get_user_meta( $user_id, '_daycare_postcode', true );
	// $city = get_user_meta( $user_id, '_daycare_city', true );
	$telephone_number = get_user_meta( $user_id, '_fm_telephone_number', true );
	//  $kids_number = get_user_meta( $user_id, '_daycare_kids_number', true );
	$info_source = get_user_meta( $user_id, '_fm_info_source', true );
// 			get_user_meta( $user_id, '_daycare_sworn_statement', true );

?>
	<h3><?php esc_html_e('Personal Information', 'ept'); ?></h3>

	<table class="form-table">
    	<?php /* ?>
		<tr>
			<th><label for="subscription_plan"><?php esc_html_e('Address', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="address" id="address" value="<?php echo $address; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="subscription_plan"><?php esc_html_e('Postal Code', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="postcode" id="postcode" value="<?php echo $postcode; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="subscription_plan"><?php esc_html_e('City', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="city" id="city" value="<?php echo $city; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
        <?php */ ?>
		<tr>
			<th><label for="subscription_plan"><?php esc_html_e('Telephone number', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="telephone_number" id="telephone_number" value="<?php echo $telephone_number; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="subscription_plan"><?php esc_html_e('Source of information', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="info_source" id="info_source" value="<?php echo $info_source; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
	</table>
<?php
}

/*
add_action('personal_options_update', 'ppo_update_profile_fields');
add_action('edit_user_profile_update', 'ppo_update_profile_fields');

function ppo_update_profile_fields($user_id)
{
	if (!current_user_can('edit_user', $user_id)) {
		return false;
	}

	if (!empty($_POST['subscription_plan']) && isset($_POST['subscription_plan'])) {
		update_user_meta($user_id, '_daycare_subscription_plan', $_POST['subscription_plan']);
	}
}
*/