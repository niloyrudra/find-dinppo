<?php
// Register admin scripts for custom fields
add_action('user_register', 'ppo_user_register');
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
	if( !ppo_user_has_role($user_id, 'day_care') ) return false;
	
	$subscription_plan = get_user_meta( $user_id, '_daycare_subscription_plan', true);
	$address = get_user_meta( $user_id, '_daycare_address', true );
	
	$postcode = get_user_meta( $user_id, '_daycare_postcode', true );
	$building = get_user_meta( $user_id, '_daycare_building', true );
	$road_number = get_user_meta( $user_id, '_daycare_road_number', true );
	$house_number = get_user_meta( $user_id, '_daycare_house_number', true );
	$gallery = get_user_meta( $user_id, '_daycare_gallery', true );
	
	$city = get_user_meta( $user_id, '_daycare_city', true );
	$telephone_number = get_user_meta( $user_id, '_daycare_telephone_number', true );
	$kids_number = get_user_meta( $user_id, '_daycare_kids_number', true );
	$info_source = get_user_meta( $user_id, '_daycare_info_source', true );
	$user_who_like = get_user_meta( $user_id, '_daycare_user_who_like', true );
	
	$does_smoke = @get_user_meta( $user_id, '_daycare_user_does_smoke', true ) ? 1 : 0;
	
	$available_spots = get_user_meta( $user_id, '_daycare_user_available_spots', true );
	$keywords = get_user_meta( $user_id, '_daycare_user_keywords', true );
	
	// 	Price
	$monthly_rate = get_user_meta( $user_id, '_daycare_user_monthly_rate', true );
	$municipality_subsidy_rate = get_user_meta( $user_id, '_daycare_user_municipality_subsidy_rate', true );
	$total_price = get_user_meta( $user_id, '_daycare_user_total_price', true );
	
	// Social Handlers
// 	$website_handler = get_user_meta( $user_id, '_daycare_website_handler', true );
	$fb_handler = get_user_meta( $user_id, '_daycare_fb_handler', true );
	$instagram_handler = get_user_meta( $user_id, '_daycare_instagram_handler', true );
	$tiktok_handler = get_user_meta( $user_id, '_daycare_tiktok_handler', true );
	$twitter_handler = get_user_meta( $user_id, '_daycare_twitter_handler', true );
	$yt_handler = get_user_meta( $user_id, '_daycare_yt_handler', true );
	
	$included_in_price = get_user_meta( $user_id, '_daycare_user_included_in_price', true );
	$bring_your_own = get_user_meta( $user_id, '_daycare_user_bring_your_own', true );
	
	$certificates_owned = get_user_meta( $user_id, '_daycare_user_certificates_owned', true );
	
	// 	Annual Plans
	$annual_plan_jan_heading = get_user_meta( $user_id, '_daycare_user_annual_plan_jan_heading', true );
	$annual_plan_jan_description = get_user_meta( $user_id, '_daycare_user_annual_plan_jan_description', true );
	
	$annual_plan_feb_heading = get_user_meta( $user_id, '_daycare_user_annual_plan_feb_heading', true );
	$annual_plan_feb_description = get_user_meta( $user_id, '_daycare_user_annual_plan_feb_description', true );
	
	$annual_plan_mar_heading = get_user_meta( $user_id, '_daycare_user_annual_plan_mar_heading', true );
	$annual_plan_mar_description = get_user_meta( $user_id, '_daycare_user_annual_plan_mar_description', true );
	
	$annual_plan_apr_heading = get_user_meta( $user_id, '_daycare_user_annual_plan_apr_heading', true );
	$annual_plan_apr_description = get_user_meta( $user_id, '_daycare_user_annual_plan_apr_description', true );
	
	$annual_plan_may_heading = get_user_meta( $user_id, '_daycare_user_annual_plan_may_heading', true );
	$annual_plan_may_description = get_user_meta( $user_id, '_daycare_user_annual_plan_may_description', true );
	
	$annual_plan_jun_heading = get_user_meta( $user_id, '_daycare_user_annual_plan_jun_heading', true );
	$annual_plan_jun_description = get_user_meta( $user_id, '_daycare_user_annual_plan_jun_description', true );
	
	$annual_plan_jul_heading = get_user_meta( $user_id, '_daycare_user_annual_plan_jul_heading', true );
	$annual_plan_jul_description = get_user_meta( $user_id, '_daycare_user_annual_plan_jul_description', true );
	
	$annual_plan_aug_heading = get_user_meta( $user_id, '_daycare_user_annual_plan_aug_heading', true );
	$annual_plan_aug_description = get_user_meta( $user_id, '_daycare_user_annual_plan_aug_description', true );
	
	$annual_plan_sep_heading = get_user_meta( $user_id, '_daycare_user_annual_plan_sep_heading', true );
	$annual_plan_sep_description = get_user_meta( $user_id, '_daycare_user_annual_plan_sep_description', true );
	
	$annual_plan_oct_heading = get_user_meta( $user_id, '_daycare_user_annual_plan_oct_heading', true );
	$annual_plan_oct_description = get_user_meta( $user_id, '_daycare_user_annual_plan_oct_description', true );
	
	$annual_plan_nov_heading = get_user_meta( $user_id, '_daycare_user_annual_plan_nov_heading', true );
	$annual_plan_nov_description = get_user_meta( $user_id, '_daycare_user_annual_plan_nov_description', true );
	
	$annual_plan_dec_heading = get_user_meta( $user_id, '_daycare_user_annual_plan_dec_heading', true );
	$annual_plan_dec_description = get_user_meta( $user_id, '_daycare_user_annual_plan_dec_description', true );
	
	// 	Holliday Plans
	$holliday_plan_jan_description = get_user_meta( $user_id, '_daycare_user_holliday_plan_jan_description', true );
	
	$holliday_plan_feb_description = get_user_meta( $user_id, '_daycare_user_holliday_plan_feb_description', true );
	
	$holliday_plan_mar_description = get_user_meta( $user_id, '_daycare_user_holliday_plan_mar_description', true );
	
	$holliday_plan_apr_description = get_user_meta( $user_id, '_daycare_user_holliday_plan_apr_description', true );
	
	$holliday_plan_may_description = get_user_meta( $user_id, '_daycare_user_holliday_plan_may_description', true );
	
	$holliday_plan_jun_description = get_user_meta( $user_id, '_daycare_user_holliday_plan_jun_description', true );
	
	$holliday_plan_jul_description = get_user_meta( $user_id, '_daycare_user_holliday_plan_jul_description', true );
	
	$holliday_plan_aug_description = get_user_meta( $user_id, '_daycare_user_holliday_plan_aug_description', true );
	
	$holliday_plan_sep_description = get_user_meta( $user_id, '_daycare_user_holliday_plan_sep_description', true );
	
	$holliday_plan_oct_description = get_user_meta( $user_id, '_daycare_user_holliday_plan_oct_description', true );
	
	$holliday_plan_nov_description = get_user_meta( $user_id, '_daycare_user_holliday_plan_nov_description', true );
	
	$holliday_plan_dec_description = get_user_meta( $user_id, '_daycare_user_holliday_plan_dec_description', true );
	
?>
	<h3><?php esc_html_e('Personal Information', 'ept'); ?></h3>

	<table class="form-table">
		<tr>
			<th><label for="subscription_plan"><?php esc_html_e('Subscription Plan', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="subscription_plan" id="subscription_plan" value="<?php echo $subscription_plan; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="subscription_plan"><?php esc_html_e('Users who like me', 'find-dinppo'); ?>, [ids]</label></th>
			<td>
				<div>
					<input type="text" name="user_who_like" id="user_who_like" value="<?php echo $user_who_like; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
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
			<th><label for="building"><?php esc_html_e('Building', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="building" id="building" value="<?php echo $building; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="road_number"><?php esc_html_e('Road Number', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="road_number" id="road_number" value="<?php echo $road_number; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="house_number"><?php esc_html_e('House Number', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="house_number" id="house_number" value="<?php echo $house_number; ?>" class="regular-text" size="25" />
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
		<tr>
			<th><label for="telephone_number"><?php esc_html_e('Telephone number', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="telephone_number" id="telephone_number" value="<?php echo $telephone_number; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="subscription_plan"><?php esc_html_e('Number of Kids', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="kids_number" id="kids_number" value="<?php echo $kids_number; ?>" class="regular-text" size="25" />
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
		
		<!-- 	Additional	 -->
		<tr>
			<th><label for="does_smoke"><?php esc_html_e('Do you smoke?', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="checkbox" name="does_smoke" id="does_smoke" value="<?php echo $does_smoke; ?>"<?php checked($does_smoke, '1', true); ?> />
				</div>
			</td>
		</tr>
		
		<tr>
			<th><label for="gallery"><?php esc_html_e('Gallery Image Ids', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="gallery" id="gallery" value="<?php echo $gallery; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		
		<tr>
			<th><label for="available_spots"><?php esc_html_e('Available Seats/Spots', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<textarea name="available_spots" id="available_spots" rows="5" cols="30"><?php echo $available_spots; ?></textarea>
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="keywords"><?php esc_html_e('Keywords', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<textarea name="keywords" id="keywords" rows="5" cols="30"><?php echo $keywords; ?></textarea>
				</div>
			</td>
		</tr>
		
		
		<tr>
			<th><label for="monthly_rate"><?php esc_html_e('Monthly Rate (Price)', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="monthly_rate" id="monthly_rate" value="<?php echo $monthly_rate; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		
		
		<tr>
			<th><label for="municipality_subsidy_rate"><?php esc_html_e('Municipality\'s subsidy rate', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="municipality_subsidy_rate" id="municipality_subsidy_rate" value="<?php echo $municipality_subsidy_rate; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		
		
		<tr>
			<th><label for="total_price"><?php esc_html_e('Total Price', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="total_price" id="total_price" value="<?php echo $total_price; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		
		
		<tr>
			<th><label for="included_in_price"><?php esc_html_e('Included items in Price', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<textarea name="included_in_price" id="included_in_price" rows="5" cols="30"><?php echo $included_in_price; ?></textarea>
				</div>
			</td>
		</tr>
		
		
		<tr>
			<th><label for="bring_your_own"><?php esc_html_e('Bring your own', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<textarea name="bring_your_own" id="bring_your_own" rows="5" cols="30"><?php echo $bring_your_own; ?></textarea>
				</div>
			</td>
		</tr>
		
		<!-- 	Social Handlers	 -->
		<tr>
			<th><label for="fb_handler"><?php esc_html_e('Facebook handler', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="fb_handler" id="fb_handler" value="<?php echo $fb_handler; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
<!-- 		<tr>
			<th><label for="website_handler"><?php esc_html_e('Website handler', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="website_handler" id="website_handler" value="<?php echo $website_handler; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr> -->
		<tr>
			<th><label for="tiktok_handler"><?php esc_html_e('Tiktok handler', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="tiktok_handler" id="tiktok_handler" value="<?php echo $tiktok_handler; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="twitter_handler"><?php esc_html_e('Twitter handler', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="twitter_handler" id="twitter_handler"  value="<?php echo $twitter_handler; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="yt_handler"><?php esc_html_e('Youtube handler', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="yt_handler" id="yt_handler" value="<?php echo $yt_handler; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		
		<!-- 	Certificate	 -->
		<tr>
			<th><label for="certificates_owned"><?php esc_html_e('Certificates owned', 'find-dinppo'); ?></label></th>
			<td>
				<div>
<!-- 					<input type="text" name="certificates_owned" id="certificates_owned" value="<?php echo $certificates_owned; ?>" class="regular-text" size="25" /> -->
					<textarea name="certificates_owned" id="certificates_owned" rows="5" cols="30"><?php echo $certificates_owned; ?></textarea>
				</div>
			</td>
		</tr>
		
		
		
		<tr>
			<th><label for="annual_plan_jan_heading"><?php esc_html_e('Annual Plan Heading - January', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="annual_plan_jan_heading" id="annual_plan_jan_heading" value="<?php echo $annual_plan_jan_heading; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="annual_plan_jan_description"><?php esc_html_e('Annual Plan Description - January', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<textarea name="annual_plan_jan_description" id="annual_plan_jan_description" rows="5" cols="30"><?php echo $annual_plan_jan_description; ?></textarea>
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="annual_plan_feb_heading"><?php esc_html_e('Annual Plan Heading - February', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="annual_plan_feb_heading" id="annual_plan_feb_heading" value="<?php echo $annual_plan_feb_heading; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="annual_plan_feb_description"><?php esc_html_e('Annual Plan Description - February', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<textarea name="annual_plan_feb_description" id="annual_plan_feb_description" rows="5" cols="30"><?php echo $annual_plan_feb_description; ?></textarea>
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="annual_plan_mar_heading"><?php esc_html_e('Annual Plan Heading - March', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="annual_plan_mar_heading" id="annual_plan_mar_heading" value="<?php echo $annual_plan_mar_heading; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="annual_plan_mar_description"><?php esc_html_e('Annual Plan Description - March', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<textarea name="annual_plan_mar_description" id="annual_plan_mar_description" rows="5" cols="30"><?php echo $annual_plan_mar_description; ?></textarea>
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="annual_plan_apr_heading"><?php esc_html_e('Annual Plan Heading - April', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="annual_plan_apr_heading" id="annual_plan_apr_heading" value="<?php echo $annual_plan_apr_heading; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="annual_plan_apr_description"><?php esc_html_e('Annual Plan Description - April', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<textarea name="annual_plan_apr_description" id="annual_plan_apr_description" rows="5" cols="30"><?php echo $annual_plan_apr_description; ?></textarea>
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="annual_plan_may_heading"><?php esc_html_e('Annual Plan Heading - May', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="annual_plan_may_heading" id="annual_plan_may_heading" value="<?php echo $annual_plan_may_heading; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="annual_plan_may_description"><?php esc_html_e('Annual Plan Description - May', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<textarea name="annual_plan_may_description" id="annual_plan_may_description" rows="5" cols="30"><?php echo $annual_plan_may_description; ?></textarea>
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="annual_plan_jun_heading"><?php esc_html_e('Annual Plan Heading - June', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="annual_plan_jun_heading" id="annual_plan_jun_heading" value="<?php echo $annual_plan_jun_heading; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="annual_plan_jun_description"><?php esc_html_e('Annual Plan Description - June', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<textarea name="annual_plan_jun_description" id="annual_plan_jun_description" rows="5" cols="30"><?php echo $annual_plan_jun_description; ?></textarea>
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="annual_plan_jul_heading"><?php esc_html_e('Annual Plan Heading - July', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="annual_plan_jul_heading" id="annual_plan_jul_heading" value="<?php echo $annual_plan_jul_heading; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="annual_plan_jul_description"><?php esc_html_e('Annual Plan Description - July', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<textarea name="annual_plan_jul_description" id="annual_plan_jul_description" rows="5" cols="30"><?php echo $annual_plan_jul_description; ?></textarea>
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="annual_plan_aug_heading"><?php esc_html_e('Annual Plan Heading - August', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="annual_plan_aug_heading" id="annual_plan_aug_heading" value="<?php echo $annual_plan_aug_heading; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="annual_plan_aug_description"><?php esc_html_e('Annual Plan Description - August', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<textarea name="annual_plan_aug_description" id="annual_plan_aug_description" rows="5" cols="30"><?php echo $annual_plan_aug_description; ?></textarea>
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="annual_plan_sep_heading"><?php esc_html_e('Annual Plan Heading - September', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="annual_plan_sep_heading" id="annual_plan_sep_heading" value="<?php echo $annual_plan_sep_heading; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="annual_plan_sep_description"><?php esc_html_e('Annual Plan Description - September', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<textarea name="annual_plan_sep_description" id="annual_plan_sep_description" rows="5" cols="30"><?php echo $annual_plan_sep_description; ?></textarea>
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="annual_plan_oct_heading"><?php esc_html_e('Annual Plan Heading - October', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="annual_plan_oct_heading" id="annual_plan_oct_heading" value="<?php echo $annual_plan_oct_heading; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="annual_plan_oct_description"><?php esc_html_e('Annual Plan Description - October', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<textarea name="annual_plan_oct_description" id="annual_plan_oct_description" rows="5" cols="30"><?php echo $annual_plan_oct_description; ?></textarea>
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="annual_plan_nov_heading"><?php esc_html_e('Annual Plan Heading - November', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="annual_plan_nov_heading" id="annual_plan_nov_heading" value="<?php echo $annual_plan_nov_heading; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="annual_plan_nov_description"><?php esc_html_e('Annual Plan Description - November', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<textarea name="annual_plan_nov_description" id="annual_plan_nov_description" rows="5" cols="30"><?php echo $annual_plan_nov_description; ?></textarea>
				</div>
			</td>
		</tr>
		
		<tr>
			<th><label for="annual_plan_dec_heading"><?php esc_html_e('Annual Plan Heading - December', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="annual_plan_dec_heading" id="annual_plan_dec_heading" value="<?php echo $annual_plan_dec_heading; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="annual_plan_dec_description"><?php esc_html_e('Annual Plan Description - December', 'find-dinppo'); ?></label></th>
			<td>
				<div><textarea name="annual_plan_dec_description" id="annual_plan_dec_description" rows="5" cols="30"><?php echo $annual_plan_dec_description; ?></textarea>
				</div>
			</td>
		</tr>
		
		
		
		<tr>
			<th><label for="holliday_plan_jan_description"><?php esc_html_e('Holliday Plans - January', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="holliday_plan_jan_description" id="holliday_plan_jan_description" value="<?php echo $holliday_plan_jan_description; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="holliday_plan_feb_description"><?php esc_html_e('Holliday Plans - February', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="holliday_plan_feb_description" id="holliday_plan_feb_description" value="<?php echo $holliday_plan_feb_description; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="holliday_plan_mar_description"><?php esc_html_e('Holliday Plans - March', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="holliday_plan_mar_description" id="holliday_plan_mar_description" value="<?php echo $holliday_plan_mar_description; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="holliday_plan_apr_description"><?php esc_html_e('Holliday Plans - April', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="holliday_plan_apr_description" id="holliday_plan_apr_description" value="<?php echo $holliday_plan_apr_description; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="holliday_plan_may_description"><?php esc_html_e('Holliday Plans - May', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="holliday_plan_may_description" id="holliday_plan_may_description" value="<?php echo $holliday_plan_may_description; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="holliday_plan_jun_description"><?php esc_html_e('Holliday Plans - June', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="holliday_plan_jun_description" id="holliday_plan_jun_description" value="<?php echo $holliday_plan_jun_description; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="holliday_plan_jul_description"><?php esc_html_e('Holliday Plans - July', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="holliday_plan_jul_description" id="holliday_plan_jul_description" value="<?php echo $holliday_plan_jul_description; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="holliday_plan_aug_description"><?php esc_html_e('Holliday Plans - August', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="holliday_plan_aug_description" id="holliday_plan_aug_description" value="<?php echo $holliday_plan_aug_description; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="holliday_plan_sep_description"><?php esc_html_e('Holliday Plans - September', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="holliday_plan_sep_description" id="holliday_plan_sep_description" value="<?php echo $holliday_plan_sep_description; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="holliday_plan_oct_description"><?php esc_html_e('Holliday Plans - October', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="holliday_plan_oct_description" id="holliday_plan_oct_description" value="<?php echo $holliday_plan_oct_description; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="holliday_plan_nov_description"><?php esc_html_e('Holliday Plans - November', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="holliday_plan_nov_description" id="holliday_plan_nov_description" value="<?php echo $holliday_plan_nov_description; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<th><label for="holliday_plan_dec_description"><?php esc_html_e('Holliday Plans - December', 'find-dinppo'); ?></label></th>
			<td>
				<div>
					<input type="text" name="holliday_plan_dec_description" id="holliday_plan_dec_description" value="<?php echo $holliday_plan_dec_description; ?>" class="regular-text" size="25" />
				</div>
			</td>
		</tr>
		
	</table>
<?php
}

add_action('personal_options_update', 'ppo_update_profile_fields');
add_action('edit_user_profile_update', 'ppo_update_profile_fields');

function ppo_update_profile_fields($user_id)
{
	if (!current_user_can('edit_user', $user_id)) {
		return false;
	}
	if( !ppo_user_has_role($user_id, 'day_care') ) return false;

	if (!empty($_POST['subscription_plan']) && isset($_POST['subscription_plan'])) {
		update_user_meta($user_id, '_daycare_subscription_plan', $_POST['subscription_plan']);
	}
	if(!empty($_POST['user_who_like']) && isset($_POST['user_who_like'])) {
		update_user_meta($user_id, '_daycare_user_who_like', $_POST['user_who_like']);
	}
	if (!empty($_POST['address']) && isset($_POST['address'])) {
		update_user_meta($user_id, '_daycare_address', $_POST['address']);
	}
	if (!empty($_POST['postcode']) && isset($_POST['postcode'])) {
		update_user_meta($user_id, '_daycare_postcode', $_POST['postcode']);
	}
	if (!empty($_POST['city']) && isset($_POST['city'])) {
		update_user_meta($user_id, '_daycare_city', $_POST['city']);
	}
	if (!empty($_POST['telephone_number']) && isset($_POST['telephone_number'])) {
		update_user_meta($user_id, '_daycare_telephone_number', $_POST['telephone_number']);
	}
	if (!empty($_POST['kids_number']) && isset($_POST['kids_number'])) {
		update_user_meta($user_id, '_daycare_kids_number', $_POST['kids_number']);
	}
	if (!empty($_POST['info_source']) && isset($_POST['info_source'])) {
		update_user_meta($user_id, '_daycare_info_source', $_POST['info_source']);
	}
// 	///////////////////////////////////////////////////////////////////////////////////////////
	if (!empty($_POST['building']) && isset($_POST['building'])) {
		update_user_meta($user_id, '_daycare_building', $_POST['building']);
	}
	if (!empty($_POST['road_number']) && isset($_POST['road_number'])) {
		update_user_meta($user_id, '_daycare_road_number', $_POST['road_number']);
	}
	if (!empty($_POST['house_number']) && isset($_POST['house_number'])) {
		update_user_meta($user_id, '_daycare_house_number', $_POST['house_number']);
	}
	if (!empty($_POST['gallery']) && isset($_POST['gallery'])) {
		update_user_meta($user_id, '_daycare_gallery', $_POST['gallery']);
	}
	if (!empty($_POST['does_smoke']) && isset($_POST['does_smoke'])) {
		update_user_meta($user_id, '_daycare_user_does_smoke', $_POST['does_smoke']);
	}
	if (!empty($_POST['available_spots']) && isset($_POST['available_spots'])) {
		update_user_meta($user_id, '_daycare_user_available_spots', $_POST['available_spots']);
	}
	if (!empty($_POST['keywords']) && isset($_POST['keywords'])) {
		update_user_meta($user_id, '_daycare_user_keywords', $_POST['keywords']);
	}
	if (!empty($_POST['monthly_rate']) && isset($_POST['monthly_rate'])) {
		update_user_meta($user_id, '_daycare_user_monthly_rate', $_POST['monthly_rate']);
	}
	if (!empty($_POST['municipality_subsidy_rate']) && isset($_POST['municipality_subsidy_rate'])) {
		update_user_meta($user_id, '_daycare_user_municipality_subsidy_rate', $_POST['municipality_subsidy_rate']);
	}
	if (!empty($_POST['total_price']) && isset($_POST['total_price'])) {
		update_user_meta($user_id, '_daycare_user_total_price', $_POST['total_price']);
	}
// 	if (!empty($_POST['website_handler']) && isset($_POST['website_handler'])) {
// 		update_user_meta($user_id, '_daycare_user_website_handler', $_POST['website_handler']);
// 	}
	if (!empty($_POST['fb_handler']) && isset($_POST['fb_handler'])) {
		update_user_meta($user_id, '_daycare_fb_handler', $_POST['fb_handler']);
	}
	if (!empty($_POST['instagram_handler']) && isset($_POST['instagram_handler'])) {
		update_user_meta($user_id, '_daycare_instagram_handler', $_POST['instagram_handler']);
	}
	if (!empty($_POST['tiktok_handler']) && isset($_POST['tiktok_handler'])) {
		update_user_meta($user_id, '_daycare_tiktok_handler', $_POST['tiktok_handler']);
	}
	if (!empty($_POST['twitter_handler']) && isset($_POST['twitter_handler'])) {
		update_user_meta($user_id, '_daycare_twitter_handler', $_POST['twitter_handler']);
	}
	if (!empty($_POST['yt_handler']) && isset($_POST['yt_handler'])) {
		update_user_meta($user_id, '_daycare_yt_handler', $_POST['yt_handler']);
	}
	if (!empty($_POST['included_in_price']) && isset($_POST['included_in_price'])) {
		update_user_meta($user_id, '_daycare_user_included_in_price', $_POST['included_in_price']);
	}
	if (!empty($_POST['bring_your_own']) && isset($_POST['bring_your_own'])) {
		update_user_meta($user_id, '_daycare_user_bring_your_own', $_POST['bring_your_own']);
	}
	if (!empty($_POST['certificates_owned']) && isset($_POST['certificates_owned'])) {
		update_user_meta($user_id, '_daycare_user_certificates_owned', $_POST['certificates_owned']);
	}
	
	// 	Annual Plans
	if (!empty($_POST['annual_plan_jan_heading']) && isset($_POST['annual_plan_jan_heading'])) {
		update_user_meta($user_id, '_daycare_user_annual_plan_jan_heading', $_POST['annual_plan_jan_heading']);
	}
	if (!empty($_POST['annual_plan_jan_description']) && isset($_POST['annual_plan_jan_description'])) {
		update_user_meta($user_id, '_daycare_user_annual_plan_jan_description', $_POST['annual_plan_jan_description']);
	}
	
	if (!empty($_POST['annual_plan_feb_heading']) && isset($_POST['annual_plan_feb_heading'])) {
		update_user_meta($user_id, '_daycare_user_annual_plan_feb_heading', $_POST['annual_plan_feb_heading']);
	}
	if (!empty($_POST['annual_plan_feb_description']) && isset($_POST['annual_plan_feb_description'])) {
		update_user_meta($user_id, '_daycare_user_annual_plan_feb_description', $_POST['annual_plan_feb_description']);
	}
	
	if (!empty($_POST['annual_plan_mar_heading']) && isset($_POST['annual_plan_mar_heading'])) {
		update_user_meta($user_id, '_daycare_user_annual_plan_mar_heading', $_POST['annual_plan_mar_heading']);
	}
	if (!empty($_POST['annual_plan_mar_description']) && isset($_POST['annual_plan_mar_description'])) {
		update_user_meta($user_id, '_daycare_user_annual_plan_mar_description', $_POST['annual_plan_mar_description']);
	}
	
	if (!empty($_POST['annual_plan_apr_heading']) && isset($_POST['annual_plan_apr_heading'])) {
		update_user_meta($user_id, '_daycare_user_annual_plan_apr_heading', $_POST['annual_plan_apr_heading']);
	}
	if (!empty($_POST['annual_plan_apr_description']) && isset($_POST['annual_plan_apr_description'])) {
		update_user_meta($user_id, '_daycare_user_annual_plan_apr_description', $_POST['annual_plan_apr_description']);
	}
	
	if (!empty($_POST['annual_plan_may_heading']) && isset($_POST['annual_plan_may_heading'])) {
		update_user_meta($user_id, '_daycare_user_annual_plan_may_heading', $_POST['annual_plan_may_heading']);
	}
	if (!empty($_POST['annual_plan_may_description']) && isset($_POST['annual_plan_may_description'])) {
		update_user_meta($user_id, '_daycare_user_annual_plan_may_description', $_POST['annual_plan_may_description']);
	}
	
	if (!empty($_POST['annual_plan_jun_heading']) && isset($_POST['annual_plan_jun_heading'])) {
		update_user_meta($user_id, '_daycare_user_annual_plan_jun_heading', $_POST['annual_plan_jun_heading']);
	}
	if (!empty($_POST['annual_plan_jun_description']) && isset($_POST['annual_plan_jun_description'])) {
		update_user_meta($user_id, '_daycare_user_annual_plan_jun_description', $_POST['annual_plan_jun_description']);
	}
	
	if (!empty($_POST['annual_plan_jul_heading']) && isset($_POST['annual_plan_jul_heading'])) {
		update_user_meta($user_id, '_daycare_user_annual_plan_jul_heading', $_POST['annual_plan_jul_heading']);
	}
	if (!empty($_POST['annual_plan_jul_description']) && isset($_POST['annual_plan_jul_description'])) {
		update_user_meta($user_id, '_daycare_user_annual_plan_jul_description', $_POST['annual_plan_jul_description']);
	}
	
	if (!empty($_POST['annual_plan_aug_heading']) && isset($_POST['annual_plan_aug_heading'])) {
		update_user_meta($user_id, '_daycare_user_annual_plan_aug_heading', $_POST['annual_plan_aug_heading']);
	}
	if (!empty($_POST['annual_plan_aug_description']) && isset($_POST['annual_plan_aug_description'])) {
		update_user_meta($user_id, '_daycare_user_annual_plan_aug_description', $_POST['annual_plan_aug_description']);
	}
	
	if (!empty($_POST['annual_plan_sep_heading']) && isset($_POST['annual_plan_sep_heading'])) {
		update_user_meta($user_id, '_daycare_user_annual_plan_sep_heading', $_POST['annual_plan_sep_heading']);
	}
	if (!empty($_POST['annual_plan_sep_description']) && isset($_POST['annual_plan_sep_description'])) {
		update_user_meta($user_id, '_daycare_user_annual_plan_sep_description', $_POST['annual_plan_sep_description']);
	}
	
	if (!empty($_POST['annual_plan_oct_heading']) && isset($_POST['annual_plan_oct_heading'])) {
		update_user_meta($user_id, '_daycare_user_annual_plan_oct_heading', $_POST['annual_plan_oct_heading']);
	}
	if (!empty($_POST['annual_plan_oct_description']) && isset($_POST['annual_plan_oct_description'])) {
		update_user_meta($user_id, '_daycare_user_annual_plan_oct_description', $_POST['annual_plan_oct_description']);
	}
	
	if (!empty($_POST['annual_plan_nov_heading']) && isset($_POST['annual_plan_nov_heading'])) {
		update_user_meta($user_id, '_daycare_user_annual_plan_nov_heading', $_POST['annual_plan_nov_heading']);
	}
	if (!empty($_POST['annual_plan_nov_description']) && isset($_POST['annual_plan_nov_description'])) {
		update_user_meta($user_id, '_daycare_user_annual_plan_nov_description', $_POST['annual_plan_nov_description']);
	}
	
	if (!empty($_POST['annual_plan_dec_heading']) && isset($_POST['annual_plan_dec_heading'])) {
		update_user_meta($user_id, '_daycare_user_annual_plan_dec_heading', $_POST['annual_plan_dec_heading']);
	}
	if (!empty($_POST['annual_plan_dec_description']) && isset($_POST['annual_plan_dec_description'])) {
		update_user_meta($user_id, '_daycare_user_annual_plan_dec_description', $_POST['annual_plan_dec_description']);
	}

	// 	Holliday Plans
	if (!empty($_POST['holliday_plan_jan_description']) && isset($_POST['holliday_plan_jan_description'])) {
		update_user_meta($user_id, '_daycare_user_holliday_plan_jan_description', $_POST['holliday_plan_jan_description']);
	}
	if (!empty($_POST['holliday_plan_feb_description']) && isset($_POST['holliday_plan_feb_description'])) {
		update_user_meta($user_id, '_daycare_user_holliday_plan_feb_description', $_POST['holliday_plan_feb_description']);
	}
	if (!empty($_POST['holliday_plan_mar_description']) && isset($_POST['holliday_plan_mar_description'])) {
		update_user_meta($user_id, '_daycare_user_holliday_plan_mar_description', $_POST['holliday_plan_mar_description']);
	}
	if (!empty($_POST['holliday_plan_apr_description']) && isset($_POST['holliday_plan_apr_description'])) {
		update_user_meta($user_id, '_daycare_user_holliday_plan_apr_description', $_POST['holliday_plan_apr_description']);
	}
	if (!empty($_POST['holliday_plan_may_description']) && isset($_POST['holliday_plan_may_description'])) {
		update_user_meta($user_id, '_daycare_user_holliday_plan_may_description', $_POST['holliday_plan_may_description']);
	}
	if (!empty($_POST['holliday_plan_jun_description']) && isset($_POST['holliday_plan_jun_description'])) {
		update_user_meta($user_id, '_daycare_user_holliday_plan_jun_description', $_POST['holliday_plan_jun_description']);
	}
	if (!empty($_POST['holliday_plan_jul_description']) && isset($_POST['holliday_plan_jul_description'])) {
		update_user_meta($user_id, '_daycare_user_holliday_plan_jul_description', $_POST['holliday_plan_jul_description']);
	}
	if (!empty($_POST['holliday_plan_aug_description']) && isset($_POST['holliday_plan_aug_description'])) {
		update_user_meta($user_id, '_daycare_user_holliday_plan_aug_description', $_POST['holliday_plan_aug_description']);
	}
	if (!empty($_POST['holliday_plan_sep_description']) && isset($_POST['holliday_plan_sep_description'])) {
		update_user_meta($user_id, '_daycare_user_holliday_plan_sep_description', $_POST['holliday_plan_sep_description']);
	}
	if (!empty($_POST['holliday_plan_oct_description']) && isset($_POST['holliday_plan_oct_description'])) {
		update_user_meta($user_id, '_daycare_user_holliday_plan_oct_description', $_POST['holliday_plan_oct_description']);
	}
	if (!empty($_POST['holliday_plan_nov_description']) && isset($_POST['holliday_plan_nov_description'])) {
		update_user_meta($user_id, '_daycare_user_holliday_plan_nov_description', $_POST['holliday_plan_nov_description']);
	}
	if (!empty($_POST['holliday_plan_dec_description']) && isset($_POST['holliday_plan_dec_description'])) {
		update_user_meta($user_id, '_daycare_user_holliday_plan_dec_description', $_POST['holliday_plan_dec_description']);
	}
	
}