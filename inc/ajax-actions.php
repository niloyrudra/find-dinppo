<?php
// ZipCode - Daycare Filter func
// -------------------------------------------------
add_action('wp_ajax_ppo_zipcode_filter_action', 'ppo_zipcode_filter_action_callback');
add_action('wp_ajax_nopriv_ppo_zipcode_filter_action', 'ppo_zipcode_filter_action_callback');
// Callback
function ppo_zipcode_filter_action_callback() {
	
	try{	
		// prepare our arguments for the query
		$user = wp_get_current_user();
		
		$daycares = ppo_get_daycares(array(
			'number'  => 4,
			'paged'	=> $_POST['paged'] + 1,
			'meta_query' => array(
				'relation' => 'OR', // Optional, defaults to "AND"
				array(
					'key'		=> '_daycare_postcode',
					'value'		=> isset( $_POST['query'] ) ? sanitize_text_field($_POST['query']) : '',
					'compare'	=> 'LIKE',
					'type'		=> 'String'
				),
				array(
					'key'		=> '_daycare_subscription_plan',
					'value'		=> isset( $_POST['plan'] ) ? strtolower(esc_html($_POST['plan'])) : '',
					'compare'	=> '='
				),
// 				array(
// 					'key'		=> '_daycare_postcode',
// 					'value'		=> isset( $_POST['query'] ) ? sanitize_text_field($_POST['query']) : '',
// 					'compare'	=> 'LIKE'
// 				),
			)
// 			'meta_key' => '_daycare_postcode',
// 			'meta_compare'  =>  '==', // '=='/"LIKE"
// 			'meta_value' => isset( $_POST['query'] ) ? sanitize_text_field($_POST['query']) : '',
		));

		// it is always better to use WP_Query but not here
		ppo_generate_result($daycares);
		
		wp_die();

	}
	catch(Exception $e) {
		wp_send_json_error(array('message' => $e->getMessage() ), 400);
	}
}

// ZipCode - Daycare search result loading more func
// -------------------------------------------------
add_action('wp_ajax_ppo_zipcode_search_action', 'ppo_zipcode_search_action_callback');
add_action('wp_ajax_nopriv_ppo_zipcode_search_action', 'ppo_zipcode_search_action_callback');
// Callback
function ppo_zipcode_search_action_callback() {
	
	try{	
		// prepare our arguments for the query
		$user = wp_get_current_user();
		
		$daycares = ppo_get_daycares(array(
			'number'  => 4,			
			'meta_key' => '_daycare_postcode',
			'meta_compare'  =>  '==', // '=='/"LIKE"
			'meta_value' => isset( $_POST['query'] ) ? sanitize_text_field($_POST['query']) : '',
		));

		// it is always better to use WP_Query but not here
		ppo_generate_result($daycares);
		
		wp_die();

	}
	catch(Exception $e) {
		wp_send_json_error(array('message' => $e->getMessage() ), 400);
	}
}


// ZipCode - Daycare search result loading more func
// -------------------------------------------------
add_action('wp_ajax_ppo_zipcode_search_result_load_more_action', 'ppo_zipcode_search_result_load_more_action_callback');
add_action('wp_ajax_nopriv_ppo_zipcode_search_result_load_more_action_action', 'ppo_zipcode_search_result_load_more_action_callback');
// Callback
function ppo_zipcode_search_result_load_more_action_callback() {
	
	try{	
		// prepare our arguments for the query
		$user = wp_get_current_user();
		
		$daycares = ppo_get_daycares(array(
			'number'  => 4,
			'paged'	=> $_POST['paged'] + 1,
			
			'meta_key' => '_daycare_postcode',
			'meta_compare'  =>  '==', // '=='/"LIKE"
			'meta_value' => isset( $_POST['query'] ) ? sanitize_text_field($_POST['query']) : '',
		));

		// it is always better to use WP_Query but not here
		ppo_generate_result($daycares);
		
		wp_die();

	}
	catch(Exception $e) {
		wp_send_json_error(array('message' => $e->getMessage() ), 400);
	}
}

// FAQ - Meta Stats
// ----------------
add_action('wp_ajax_ppo_faq_post_load_more_action', 'ppo_faq_post_load_more_action_callback');
add_action('wp_ajax_nopriv_ppo_faq_post_load_more_action_action', 'ppo_faq_post_load_more_action_callback');
// Callback
function ppo_faq_post_load_more_action_callback() {
	
	try{	
		// prepare our arguments for the query
// 		$args = json_decode( stripslashes( $_POST['query'] ), true );
		
		$args['post_type'] = 'ppo_faq';
		$args['paged'] = $_POST['paged'] + 1; // we need next page to be loaded
		$args['post_status'] = 'publish';

		// it is always better to use WP_Query but not here
		query_posts( $args );
		
		if( have_posts() ) :

			// run the loop
			while( have_posts() ): the_post();
				get_template_part('/template-parts/partials/content', 'faq-list-item' );
			endwhile;

		endif;
		wp_die();

	}
	catch(Exception $e) {
		wp_send_json_error(array('message' => $e->getMessage() ), 400);
	}
}

// FAQ - Meta Stats
// ----------------
/* POSITIVE */
add_action('wp_ajax_ppo_faq_meta_positive_stats_update_action', 'ppo_faq_meta_positive_stats_update_action_callback');
add_action('wp_ajax_nopriv_ppo_faq_meta_positive_stats_update_action', 'ppo_faq_meta_positive_stats_update_action_callback');
// Callback
function ppo_faq_meta_positive_stats_update_action_callback() {
	try{	
		$faq_post_id = $_POST['faqId'];

		// Data retrieve
		$old_data = ppo_get_faq_positive_stats($faq_post_id);
		$updated_data = $old_data ? intval($old_data)+1 : 1;
		
		// Save the data
		update_post_meta( $faq_post_id, '_ppo_is_helpful', $updated_data );

		// Success!
		// Send the response in an Obj form
		wp_send_json_success(array('message'	=> "Positive Stats: " . $updated_data), 200);
	}
	catch(Exception $e) {
		wp_send_json_error(array('message' => $e->getMessage() ), 400);
	}
}
/* NEGATIVE */
add_action('wp_ajax_ppo_faq_meta_negative_stats_update_action', 'ppo_faq_meta_negative_stats_update_action_callback');
add_action('wp_ajax_nopriv_ppo_faq_meta_negative_stats_update_action', 'ppo_faq_meta_negative_stats_update_action_callback');
// Callback
function ppo_faq_meta_negative_stats_update_action_callback() {
	try{	
		$faq_post_id = $_POST['faqId'];

		// Data retrieve
		$old_data = ppo_get_faq_negative_stats($faq_post_id);
		$updated_data = $old_data ? intval($old_data)+1 : 1;
		
		// Save the data
		update_post_meta( $faq_post_id, '_ppo_is_not_helpful', $updated_data );

		// Success!
		// Send the response in an Obj form
		wp_send_json_success(array('message'	=> "Negative Stats: " . $updated_data), 200);
	}
	catch(Exception $e) {
		wp_send_json_error(array('message' => $e->getMessage() ), 400);
	}
}

/* ================================================================================================================================ */

// Daycare - Description
// ------------------------
add_action('wp_ajax_ppo_daycare_profile_description_action', 'ppo_daycare_profile_description_action_callback');
add_action('wp_ajax_nopriv_ppo_daycare_profile_description_action', 'ppo_daycare_profile_description_action_callback');
// Callback
function ppo_daycare_profile_description_action_callback() {	
	$daycare_user_id = esc_html(get_current_user_id());
	$profile_description = $_POST['profile_description'];

	$user_data = wp_update_user( array( 'ID' => $daycare_user_id, 'description' => $profile_description ) );
	if ( is_wp_error( $user_data ) ) {
		// There was an error; possibly this user doesn't exist.
		wp_send_json_error();
	}
	// Success!
	wp_send_json_success(array('message'	=> 'Update user\'s description: ' . $profile_description), 200);
}

// Daycare - Available Spots
// ------------------------
add_action('wp_ajax_ppo_daycare_available_spots_action', 'ppo_daycare_available_spots_action_callback');
add_action('wp_ajax_nopriv_ppo_daycare_available_spots_action', 'ppo_daycare_available_spots_action_callback');
// Callback
function ppo_daycare_available_spots_action_callback() {	
	$daycare_user_id = esc_html(get_current_user_id());
	try{
		$available_spots = $_POST['available_spots'];

		// Convert Obj into String
		$available_spots = json_encode($available_spots);

		// Save the data
		update_user_meta( $daycare_user_id, '_daycare_user_available_spots', $available_spots );

		// Success!
		// Send the response in an Obj form
		wp_send_json_success(json_decode($available_spots), 200);
	}
	catch(Exception $e) {
		wp_send_json_error(array('message' => $e->getMessage() ), 400);
	}
}

// Daycare - Keywords
// ------------------------
add_action('wp_ajax_ppo_daycare_keywords_action', 'ppo_daycare_keywords_action_callback');
add_action('wp_ajax_nopriv_ppo_daycare_keywords_action', 'ppo_daycare_keywords_action_callback');
// Callback
function ppo_daycare_keywords_action_callback() {	
	$daycare_user_id = esc_html(get_current_user_id());
	try{
		$keywords = $_POST['keywords'];

		// Save the data
		update_user_meta( $daycare_user_id, '_daycare_user_keywords', $keywords );

		// Success!
		// Send the response in an Obj form
		wp_send_json_success(array("message"	=> "Updated Keywords: " . $keywords), 200);
	}
	catch(Exception $e) {
		wp_send_json_error(array('message' => $e->getMessage() ), 400);
	}
}



	
// Daycare - Prices
// ------------------------
add_action('wp_ajax_ppo_daycare_prices_action', 'ppo_daycare_prices_action_callback');
add_action('wp_ajax_nopriv_ppo_daycare_prices_action', 'ppo_daycare_prices_action_callback');
// Callback
function ppo_daycare_prices_action_callback() {	
	$daycare_user_id = esc_html(get_current_user_id());
	$daycare_monthly_rate = $_POST['user_monthly_rate'] ?? 0;
	$daycare_municipality_subsidy_rate = $_POST['user_municipality_subsidy_rate'] ?? 0;
	$daycare_total_price = $_POST['user_total_price'] ?? 0;
	
	update_user_meta( $daycare_user_id, '_daycare_user_monthly_rate', $daycare_monthly_rate );
	update_user_meta( $daycare_user_id, '_daycare_user_municipality_subsidy_rate', $daycare_municipality_subsidy_rate );
	update_user_meta( $daycare_user_id, '_daycare_user_total_price', $daycare_total_price );
	wp_send_json_success(array('message'	=> 'Updated Prices - Monthly rate: ' . $daycare_monthly_rate . ' | Municipality Subside rate: ' . $daycare_municipality_subsidy_rate . ' | Total: ' . $daycare_total_price), 200);
}

// Daycare - Prices Included
// ------------------------
add_action('wp_ajax_ppo_daycare_price_included_list_action', 'ppo_daycare_price_included_list_action_callback');
add_action('wp_ajax_nopriv_ppo_daycare_price_included_list_action', 'ppo_daycare_price_included_list_action_callback');
// Callback
function ppo_daycare_price_included_list_action_callback() {	
	$daycare_user_id = esc_html(get_current_user_id());
	$included_list_str = $_POST['included_list_str'] ?? '';
	
	update_user_meta( $daycare_user_id, '_daycare_user_included_in_price', $included_list_str );

	wp_send_json_success(array('message'	=> 'Updated Prices Included Items: ' . $included_list_str), 200);
}

// Daycare - User's Own Items
// ------------------------
add_action('wp_ajax_ppo_daycare_bring_user_own_item_list_action', 'ppo_daycare_bring_user_own_item_list_action_callback');
add_action('wp_ajax_nopriv_ppo_daycare_bring_user_own_item_list_action', 'ppo_daycare_bring_user_own_item_list_action_callback');
// Callback
function ppo_daycare_bring_user_own_item_list_action_callback() {	
	$daycare_user_id = esc_html(get_current_user_id());
	$own_item_list_str = $_POST['own_item_list_str'] ?? '';
	
	update_user_meta( $daycare_user_id, '_daycare_user_bring_your_own', $own_item_list_str );

	wp_send_json_success(array('message'	=> 'Updated User\'s own item Items: ' . $own_item_list_str), 200);
}




// Daycare - Number of Kids
// ------------------------
add_action('wp_ajax_ppo_daycare_kids_number_action', 'ppo_daycare_kids_number_action_callback');
add_action('wp_ajax_nopriv_ppo_daycare_kids_number_action', 'ppo_daycare_kids_number_action_callback');
// Callback
function ppo_daycare_kids_number_action_callback() {	
	$daycare_user_id = esc_html(get_current_user_id());
	$selected_kids_num = $_POST['ppo_kids_num_approved'] ?? 0;
	update_user_meta( $daycare_user_id, '_daycare_kids_number', $selected_kids_num );
	wp_send_json_success(array('message'	=> 'Updated Kids number - ' . $selected_kids_num), 200);
}

// Daycare - Certificates
// ------------------------
add_action('wp_ajax_ppo_daycare_certificates_action', 'ppo_daycare_certificates_action_callback');
add_action('wp_ajax_nopriv_ppo_daycare_certificates_action', 'ppo_daycare_certificates_action_callback');
// Callback
function ppo_daycare_certificates_action_callback() {	
	$daycare_user_id = esc_html(get_current_user_id());
	$certificates = $_POST['certificates'] ?? '';
	update_user_meta( $daycare_user_id, '_daycare_user_certificates_owned', $certificates );
	wp_send_json_success(array('message'	=> 'Updated Certificates - ' . $certificates), 200);
}

// Daycare - Does Smoke
// ------------------------
add_action('wp_ajax_ppo_daycare_smoking_status_action', 'ppo_daycare_smoking_status_action_callback');
add_action('wp_ajax_nopriv_ppo_daycare_smoking_status_action', 'ppo_daycare_smoking_status_action_callback');
// Callback
function ppo_daycare_smoking_status_action_callback() {	
	$daycare_user_id = esc_html(get_current_user_id());
	$yes = $_POST['yes'] ?  $_POST['yes'] : 0;	
	update_user_meta( $daycare_user_id, '_daycare_user_does_smoke', $yes );
	wp_send_json_success(array('message'	=> 'Updated Smoking Status - ' . $yes), 200);
}

// Daycare - Social Handlers
// ------------------------
add_action('wp_ajax_ppo_daycare_social_handler_action', 'ppo_daycare_social_handler_action_callback');
add_action('wp_ajax_nopriv_ppo_daycare_social_handler_action', 'ppo_daycare_social_handler_action_callback');
// Callback
function ppo_daycare_social_handler_action_callback() {	
	$daycare_user_id = esc_html(get_current_user_id());
	
	$web = $_POST['web'];
	$fb = $_POST['fb'];
	$instagram = $_POST['instagram'];
	$tiktok = $_POST['tiktok'];
	$twitter = $_POST['twitter'];
	$yt = $_POST['yt'];
	
// 	update_user_meta( $daycare_user_id, 'user_url', $web );
	$user_data = wp_update_user( array( 'ID' => $daycare_user_id, 'user_url' => $web ) );
	if ( is_wp_error( $user_data ) ) {
		// There was an error; possibly this user doesn't exist.
		wp_send_json_error();
	}
	// Success!
	update_user_meta( $daycare_user_id, '_daycare_fb_handler', $fb );
	update_user_meta( $daycare_user_id, '_daycare_instagram_handler', $instagram );
	update_user_meta( $daycare_user_id, '_daycare_tiktok_handler', $tiktok );
	update_user_meta( $daycare_user_id, '_daycare_twitter_handler', $twitter );
	update_user_meta( $daycare_user_id, '_daycare_yt_handler', $yt );

	wp_send_json_success(array('message'	=> 'Update Social Handlers' ), 200);	
	
}

// Daycare - Update E-mail
// ------------------------
add_action('wp_ajax_ppo_daycare_update_email_action', 'ppo_daycare_update_email_action_callback');
add_action('wp_ajax_nopriv_ppo_daycare_update_email_action', 'ppo_daycare_update_email_action_callback');
// Callback
function ppo_daycare_update_email_action_callback() {	
	$daycare_user_id = esc_html(get_current_user_id());
	
	$email = $_POST['email'];
	
	$user_data = wp_update_user( array( 'ID' => $daycare_user_id, 'user_email' => $email ) );
	if ( is_wp_error( $user_data ) ) {
		// There was an error; possibly this user doesn't exist.
		wp_send_json_error();
	}
	// Success!
	wp_send_json_success(array('message'	=> 'Update user email ' . $email ), 200);	
}


// Daycare - Telephone Number
// ------------------------
add_action('wp_ajax_ppo_daycare_tele_number_action', 'ppo_daycare_tele_number_action_callback');
add_action('wp_ajax_nopriv_ppo_daycare_tele_number_action', 'ppo_daycare_tele_number_action_callback');
// Callback
function ppo_daycare_tele_number_action_callback() {	
	$daycare_user_id = esc_html(get_current_user_id());
	$tele = $_POST['tele'];
	update_user_meta( $daycare_user_id, '_daycare_telephone_number', $tele );
	wp_send_json_success(array('message'	=> 'Updated Telephone number - ' . $tele), 200);
}

// Daycare - Name
// ------------------------
add_action('wp_ajax_ppo_daycare_name_action', 'ppo_daycare_name_action_callback');
add_action('wp_ajax_nopriv_ppo_daycare_name_action', 'ppo_daycare_name_action_callback');
// Callback
function ppo_daycare_name_action_callback() {	
	$daycare_user_id = esc_html(get_current_user_id());
	$name = $_POST['name'];
	$user_data = wp_update_user( array( 'ID' => $daycare_user_id, 'display_name' => $name ) );
	if ( is_wp_error( $user_data ) ) {
		// There was an error; possibly this user doesn't exist.
		wp_send_json_error();
	}
	// Success!
	wp_send_json_success(array('message'	=> 'Update user name - ' . $name ), 200);
}

// Daycare - Address
// ------------------------
add_action('wp_ajax_ppo_daycare_address_action', 'ppo_daycare_address_action_callback');
add_action('wp_ajax_nopriv_ppo_daycare_address_action', 'ppo_daycare_address_action_callback');
// Callback
function ppo_daycare_address_action_callback() {	
	$daycare_user_id = esc_html(get_current_user_id());
	
	$post_code = $_POST['post_code'];
	$building = $_POST['building'];
	$road_num = $_POST['road_num'];
	$house_num = $_POST['house_num'];

	// Success!
	update_user_meta( $daycare_user_id, '_daycare_postcode', $post_code );
	update_user_meta( $daycare_user_id, '_daycare_building', $building );
	update_user_meta( $daycare_user_id, '_daycare_road_number', $road_num );
	update_user_meta( $daycare_user_id, '_daycare_house_number', $house_num );

	wp_send_json_success(array('message'	=> 'Update Address' ), 200);	
	
}

// Daycare - Holidays
// ------------------------
add_action('wp_ajax_ppo_daycare_update_holidays_action', 'ppo_daycare_update_holidays_action_callback');
add_action('wp_ajax_nopriv_ppo_daycare_update_holidays_action', 'ppo_daycare_update_holidays_action_callback');
// Callback
function ppo_daycare_update_holidays_action_callback() {	
	$daycare_user_id = esc_html(get_current_user_id());
	
	$jan = $_POST['jan'];
	$feb = $_POST['feb'];
	$mar = $_POST['mar'];
	$apr = $_POST['apr'];
	$may = $_POST['may'];
	$jun = $_POST['jun'];
	$jul = $_POST['jul'];
	$aug = $_POST['aug'];
	$sep = $_POST['sep'];
	$oct = $_POST['oct'];
	$nov = $_POST['nov'];
	$dec = $_POST['dec'];

	// Success!
	update_user_meta( $daycare_user_id, '_daycare_user_holliday_plan_jan_description', $jan );
	update_user_meta( $daycare_user_id, '_daycare_user_holliday_plan_feb_description', $feb );
	update_user_meta( $daycare_user_id, '_daycare_user_holliday_plan_mar_description', $may );
	update_user_meta( $daycare_user_id, '_daycare_user_holliday_plan_apr_description', $apr );
	update_user_meta( $daycare_user_id, '_daycare_user_holliday_plan_may_description', $may );
	update_user_meta( $daycare_user_id, '_daycare_user_holliday_plan_jun_description', $jun );
	update_user_meta( $daycare_user_id, '_daycare_user_holliday_plan_jul_description', $jul );
	update_user_meta( $daycare_user_id, '_daycare_user_holliday_plan_aug_description', $aug );
	update_user_meta( $daycare_user_id, '_daycare_user_holliday_plan_sep_description', $sep );
	update_user_meta( $daycare_user_id, '_daycare_user_holliday_plan_oct_description', $oct );
	update_user_meta( $daycare_user_id, '_daycare_user_holliday_plan_nov_description', $nov );
	update_user_meta( $daycare_user_id, '_daycare_user_holliday_plan_dec_description', $dec );

	wp_send_json_success(array('message'	=> 'Update Holiday Plans' ), 200);	
	
}

// Daycare - Annual Plans
// ------------------------
add_action('wp_ajax_ppo_daycare_annual_plan_action', 'ppo_daycare_annual_plan_action_callback');
add_action('wp_ajax_nopriv_ppo_daycare_annual_plan_action', 'ppo_daycare_annual_plan_action_callback');
// Callback
function ppo_daycare_annual_plan_action_callback() {	
	$daycare_user_id = esc_html(get_current_user_id());
	
	$jan_heading = $_POST['jan_heading'];
	$feb_heading = $_POST['feb_heading'];
	$mar_heading = $_POST['mar_heading'];
	$apr_heading = $_POST['apr_heading'];
	$may_heading = $_POST['may_heading'];
	$jun_heading = $_POST['jun_heading'];
	$jul_heading = $_POST['jul_heading'];
	$aug_heading = $_POST['aug_heading'];
	$sep_heading = $_POST['sep_heading'];
	$oct_heading = $_POST['oct_heading'];
	$nov_heading = $_POST['nov_heading'];
	$dec_heading = $_POST['dec_heading'];
	
	$jan_description = $_POST['jan_description'];
	$feb_description = $_POST['feb_description'];
	$mar_description = $_POST['mar_description'];
	$apr_description = $_POST['apr_description'];
	$may_description = $_POST['may_description'];
	$jun_description = $_POST['jun_description'];
	$jul_description = $_POST['jul_description'];
	$aug_description = $_POST['aug_description'];
	$sep_description = $_POST['sep_description'];
	$oct_description = $_POST['oct_description'];
	$nov_description = $_POST['nov_description'];
	$dec_description = $_POST['dec_description'];

	// Success!
	update_user_meta( $daycare_user_id, '_daycare_user_annual_plan_jan_heading', $jan_heading );
	update_user_meta( $daycare_user_id, '_daycare_user_annual_plan_feb_heading', $feb_heading );
	update_user_meta( $daycare_user_id, '_daycare_user_annual_plan_mar_heading', $may_heading );
	update_user_meta( $daycare_user_id, '_daycare_user_annual_plan_apr_heading', $apr_heading );
	update_user_meta( $daycare_user_id, '_daycare_user_annual_plan_may_heading', $may_heading );
	update_user_meta( $daycare_user_id, '_daycare_user_annual_plan_jun_heading', $jun_heading );
	update_user_meta( $daycare_user_id, '_daycare_user_annual_plan_jul_heading', $jul_heading );
	update_user_meta( $daycare_user_id, '_daycare_user_annual_plan_aug_heading', $aug_heading );
	update_user_meta( $daycare_user_id, '_daycare_user_annual_plan_sep_heading', $sep_heading );
	update_user_meta( $daycare_user_id, '_daycare_user_annual_plan_oct_heading', $oct_heading );
	update_user_meta( $daycare_user_id, '_daycare_user_annual_plan_nov_heading', $nov_heading );
	update_user_meta( $daycare_user_id, '_daycare_user_annual_plan_dec_heading', $dec_heading );
	
	update_user_meta( $daycare_user_id, '_daycare_user_annual_plan_jan_description', $jan_description );
	update_user_meta( $daycare_user_id, '_daycare_user_annual_plan_feb_description', $feb_description );
	update_user_meta( $daycare_user_id, '_daycare_user_annual_plan_mar_description', $may_description );
	update_user_meta( $daycare_user_id, '_daycare_user_annual_plan_apr_description', $apr_description );
	update_user_meta( $daycare_user_id, '_daycare_user_annual_plan_may_description', $may_description );
	update_user_meta( $daycare_user_id, '_daycare_user_annual_plan_jun_description', $jun_description );
	update_user_meta( $daycare_user_id, '_daycare_user_annual_plan_jul_description', $jul_description);
	update_user_meta( $daycare_user_id, '_daycare_user_annual_plan_aug_description', $aug_description );
	update_user_meta( $daycare_user_id, '_daycare_user_annual_plan_sep_description', $sep_description );
	update_user_meta( $daycare_user_id, '_daycare_user_annual_plan_oct_description', $oct_description );
	update_user_meta( $daycare_user_id, '_daycare_user_annual_plan_nov_description', $nov_description );
	update_user_meta( $daycare_user_id, '_daycare_user_annual_plan_dec_description', $dec_description );

	wp_send_json_success(array('message'	=> 'Update Annual Plans' ), 200);	
	
}






// add_action('wp_ajax_ppo_new_daycare_insertion', 'ppo_add_new_daycare');
// add_action('wp_ajax_nopriv_ppo_new_daycare_insertion', 'ppo_add_new_daycare');

function ppo_add_new_daycare() {
//     $first_name = $_POST[ 'ppo_firs_tname' ];
//     $last_name = $_POST[ 'ppo_last_name' ];
    $username = $_POST[ 'ppo_user_login' ];
    $password = $_POST[ 'ppo_user_password' ];
    $email = $_POST[ 'ppo_user_email' ];
    $role = 'ppo_day_care';
	
	$address = $_POST[ 'ppo_user_address' ];
	$post_code = $_POST[ 'ppo_user_post_code' ];
	$city = $_POST[ 'ppo_user_city' ];
	$telephone = $_POST[ 'ppo_user_telephone' ];
	$kids_number = $_POST[ 'ppo_user_kids_number' ];
	$info_source = $_POST[ 'ppo_user_info_source' ];
	$sworn_statement = $_POST[ 'ppo_user_sworn_statement' ];
	$terms_conditions = $_POST[ 'ppo_user_terms_conditions' ];

    if (username_exists($username) == null && email_exists($email) == false) {

        // Create the new user
        $user_id = wp_create_user($username, $password, $email);

		if( ! is_wp_error( $user_id ) ) {
			// Get current user object
			$user = get_user_by('id', $user_id);
	
			// Remove role
			$user->remove_role('subscriber');
	
			// Add role
			$user->add_role($role);
	
			// Details
// 			update_user_meta( $user_id, 'first_name', $first_name );
// 			update_user_meta( $user_id, 'last_name', $last_name );
// 			
			update_user_meta( $user_id, '_daycare_address', $address );
			update_user_meta( $user_id, '_daycare_postcode', $post_code );
			update_user_meta( $user_id, '_daycare_city', $city );
			update_user_meta( $user_id, '_daycare_telephone_number', $telephone );
			update_user_meta( $user_id, '_daycare_kids_number', $kids_number );
			update_user_meta( $user_id, '_daycare_info_source', $info_source );
			update_user_meta( $user_id, '_daycare_sworn_statement', $sworn_statement );

			wp_send_json_success($user_id, 200 );
		}
		wp_send_json_success(0, 400 );
    }
	wp_send_json_error( array( "message" => "Username/email exists!" ) );
	// wp_send_json_error(); // sends json_encoded success=false
}


/* **** */

/*
 *
 * after create new user add a custom user field which indicates that this user has to activate his account
 * send an email with activation code, provide a link in this email to a page where user will be activated
 * implement activation page
 * when user attempts to log in check if that custom user field exists or not. If it exists then do not log him in and show activation error message instead.
 * 
 */

function _new_user($data) {

    // Separate Data
    $default_newuser = array(
        'user_pass' =>  wp_hash_password( $data['user_pass']),
        'user_login' => $data['user_login'],
        'user_email' => $data['user_email'],
        'first_name' => $data['first_name'],
        'last_name' => $data['last_name'],
        'role' => 'pending'
    );

    $user_id = wp_insert_user($default_newuser);
    if ( $user_id && !is_wp_error( $user_id ) ) {
        $code = sha1( $user_id . time() );
        $activation_link = add_query_arg( array( 'key' => $code, 'user' => $user_id ), get_permalink( /* YOUR ACTIVATION PAGE ID HERE */ ));
        add_user_meta( $user_id, 'has_to_be_activated', $code, true );
        wp_mail( $data['user_email'], 'ACTIVATION SUBJECT', 'CONGRATS BLA BLA BLA. HERE IS YOUR ACTIVATION LINK: ' . $activation_link );
    }
}

// override core function
if ( !function_exists('wp_authenticate') ) :
function wp_authenticate($username, $password) {
    $username = sanitize_user($username);
    $password = trim($password);

    $user = apply_filters('authenticate', null, $username, $password);

    if ( $user == null ) {
        // TODO what should the error message be? (Or would these even happen?)
        // Only needed if all authentication handlers fail to return anything.
        $user = new WP_Error('authentication_failed', __('<strong>ERROR</strong>: Invalid username or incorrect password.'));
    } elseif ( get_user_meta( $user->ID, 'has_to_be_activated', true ) != false ) {
        $user = new WP_Error('activation_failed', __('<strong>ERROR</strong>: User is not activated.'));
    }

    $ignore_codes = array('empty_username', 'empty_password');

    if (is_wp_error($user) && !in_array($user->get_error_code(), $ignore_codes) ) {
        do_action('wp_login_failed', $username);
    }

    return $user;
}
endif;

add_action( 'template_redirect', 'wpse8170_activate_user' );
function wpse8170_activate_user() {
    if ( is_page() && get_the_ID() == "/* YOUR ACTIVATION PAGE ID HERE */" ) {
        $user_id = filter_input( INPUT_GET, 'user', FILTER_VALIDATE_INT, array( 'options' => array( 'min_range' => 1 ) ) );
        if ( $user_id ) {
            // get user meta activation hash field
            $code = get_user_meta( $user_id, 'has_to_be_activated', true );
            if ( $code == filter_input( INPUT_GET, 'key' ) ) {
                delete_user_meta( $user_id, 'has_to_be_activated' );
            }
        }
    }
}


/* Utility Funcs */
function ppo_generate_result($daycares) {
	if (is_array($daycares) && count($daycares)) :

		foreach ($daycares as $daycare) :

			$id = $daycare->ID;
			$display_name = $daycare->display_name;
			$subscription_plan = ppo_get_daycare_subscription_plan($id);
			$star_icon = ppo_get_subscription_plan_icon( $subscription_plan );
			$address = ppo_get_daycare_address($id);
			?>
			<div class="col-6 mb-3" data-daycare-id="<?php echo esc_attr($id); ?>">

				<div class="ppo-br-16 ppo-bg-card flex-column">

					<!-- Daycare Name -->
					<h3 class="w-100 text-light fs-5 fw-bold ppo-box-shadow ppo-br-16 py-2 px-3 ppo-bg-secondary text-capitalize"><?php echo esc_html($display_name); ?></h3>

					<!-- Daycare Details -->
					<div class="d-flex p-3 position-relative flex-column align-items-center">

						<!-- Floating Buttons -->
						<div class="ppo-floating-icons" style="margin-right:10px;">
							<?php ppo_heart_icon( $daycare, $user ); ?>
							<!-- Star -->
							<button class="border-0 bg-transparent p-0 w-auto" data-bs-toggle="modal" data-bs-target="#ppoModal">
								<img src="<?php echo esc_url($star_icon); ?>" style="width:32px;" />
							</button>
						</div>

						<!-- Profile Image -->
						<img src="<?php echo ppo_get_user_avatar($id); ?>" class="d-block w-75 shadow mb-4 ppo-br-8" alt="<?php echo esc_attr($display_name); ?>">

						<!-- Location -->
						<div class="d-flex py-2 w-100 ppo-br-16 align-content-center justify-content-center mb-3 ppo-bg-secondary">
							<img src="<?php echo ppo_get_dir('/assets/images/profile/location-outline.png') ?>" style="height:20px;width:auto;" class="mx-2  my-auto ppo-br-0" />
							<span class="text-white fs-5">
								<?php echo $address; ?>
							</span>
						</div>

						<!-- Date -->
						<div class="d-flex py-2 w-100 ppo-br-16 align-content-center mb-3 justify-content-center ppo-bg-secondary">
							<img src="<?php echo ppo_get_dir('/assets/images/home/timetable.png') ?>" style="height:20px;width:auto;" class="mx-2 my-auto ppo-br-0" />
							<span class="text-white fs-5">
								Ledig: Nu
							</span>
						</div>

						<form action="<?php echo esc_url( home_url('/profile-daycare/') ); ?>" method="post">
							<input type="hidden" id="ppo_daycare_user_id" value="<?php echo esc_attr( $id ); ?>" name="ppo_daycare_user_id">
							<input type="hidden" id="ppo_parent_page_link" value="<?php echo esc_url( get_the_permalink( get_the_ID() ) ); ?>" name="ppo_parent_page_link">
							<button type="submit" class="btn py-1 w-100 ppo-br-16 ppo-accent-button">
								<span class="text-light fs-5 ml-4 mb-2">
									Læs mere
								</span>
							</button>
						</form>

					</div>

				</div>

			</div>

		<?php endforeach;
	endif;

	wp_reset_postdata();
}