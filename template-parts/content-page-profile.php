<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Find_Dinppo
 */
$is_visitor = !is_user_logged_in() ? true : false;

$has_ppo_daycare_user_id = $_POST && $_POST['ppo_daycare_user_id'] ? $_POST['ppo_daycare_user_id'] : null;
$ppo_parent_page_link = $_POST && $_POST['ppo_parent_page_link'] ? $_POST['ppo_parent_page_link'] : null;


$is_family_member = ppo_is_family_member();
// $is_daycare = ppo_is_daycare();

$user = ($has_ppo_daycare_user_id) ? get_user_by( 'ID', $has_ppo_daycare_user_id ) : wp_get_current_user();
$user_id = $user ? $user->ID : null;
$user_email = $user ? $user->user_email : '';

$plan_name = $user_id ? ppo_get_daycare_subscription_plan($user_id) : 'gratis';

$plan_data = ppo_subscription_detail($plan_name);

$icon = trim($plan_data['icon']);
$plan_name = $plan_data['plan'];
$annual_rate = $plan_data['annual_rate'];
$month_rate = $plan_data['month_rate'];

$certificates = ppo_get_daycare_user_certificates_owned($user_id) ? explode(",", ppo_get_daycare_user_certificates_owned($user_id)) : [];

// Personal Info
$road_number = ppo_get_daycare_road_number($user_id);
$address = ppo_get_daycare_address($user_id);
$building = ppo_get_daycare_building($user_id);
$house_number = ppo_get_daycare_house_number($user_id);
$post_code = ppo_get_daycare_postcode($user_id);
$does_smoke = ppo_get_daycare_user_does_smoke($user_id);
$kids_number = ppo_get_daycare_kids_number($user_id);
$mail_address = $user_email;
$tele_number = ppo_get_daycare_telephone_number($user_id);

$description = ppo_get_daycare_description($user_id);

// Store the year to
// the variable
$current_year = date("Y");
$next_year = intval($current_year) + 1;
$next_of_next_year = intval($next_year) + 1;

$price_included_items = ppo_get_daycare_user_included_in_price($user_id);
$bring_users_own_items = ppo_get_daycare_user_bring_your_own($user_id);
$keyword_items = ppo_get_daycare_user_keywords($user_id);

$price_included_item_arr = $price_included_items ? explode(',', $price_included_items) : [];
$bring_users_own_item_arr = $bring_users_own_items ? explode(',', $bring_users_own_items) : [];
$keyword_arr = $keyword_items ? explode(',', $keyword_items) : [];

$first_half_month_list = ['jan','feb','mar','apr','maj','jun'];
$last_half_month_list = ['jul','aug','sep','okt','nov','dec'];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="width:100%; max-width: 500px; margin: 0 auto; padding: 1rem;">

	<header class="entry-header mb-3">
		<div class="row p-2 ppo-box-shadow ppo-br-16 ppo-bg-secondary">

			<div class="col-1 px-0 align-self-center">
				<a href="<?php echo ( $ppo_parent_page_link ? esc_url($ppo_parent_page_link) : '#!' ); ?>" style="height:30px;">
					<img src="<?php echo ppo_get_dir('/assets/images/profile/undo-arrow.png'); ?>" style="height:30px;">
				</a>
			</div>

			<div class="col-8 px-1">
				<h2 class="fs-3 fw-bold text-light"><?php echo esc_html($user->display_name); ?></h2>
			</div>

			<div class="col-3 px-0 align-self-center justify-content-end">
				<button class="bg-transparent py-0 ps-0  m-0 border-0" style="text-decoration:none;padding: 0 4px 0 0;" data-bs-toggle="modal" data-bs-target="#ppoModal">
					<img src="<?php echo ppo_get_dir('/assets/images/profile/premium.png'); ?>" style="width:30px;height:30px;" />
				</button>
<!-- 				<button class="bg-transparent py-0 pe-0  m-0 border-0" style="padding: 0 0 0 4px;" data-bs-toggle="modal" data-bs-target="#ppoNonLoggedInUserInfoModal">
					<img src="<?php echo ppo_get_dir('/assets/images/profile/heart-outline.png'); ?>" style="width:30px;height:30px;" />
				</button> -->
				<?php ppo_heart_icon( $user ); ?>
			</div>

		</div>
	</header><!-- .entry-header -->

	<div class="profile-content mb-3">
		<div class="row px-1 py-3 ppo-box-shadow ppo-br-16" style="background-color:rgb(156,170,155);">

			<div class="col-4">
				<div class="mb-3">
					<img src="<?php echo esc_url(get_avatar_url($user->ID)); ?>" style="display:block; width:100%;border-radius:16px;" />
				</div>
				<h2 class="fs-5 text-light text-capitalize"><?php echo esc_html($user->display_name); ?></h2>
			</div>

			<div class="col-8">

				<div class="px-2 py-1 mb-2 m-1" style="display:inline-flex;justify-content:center;align-items:center;background-color:rgb(108,128,110);border-radius:16px;gap:6px;">
					<img src="<?php echo ppo_get_dir('/assets/images/profile/mailbox-outline.png'); ?>" style="width:20px;" />
					<span class="fs-4 fw-bold text-light"><?php echo ( $post_code ? $post_code : 'ingen data' ); ?></span>
				</div>

				<div class="px-2 py-1 mb-2 m-1" style="display:inline-flex;justify-content:center;align-items:center;background-color:rgb(108,128,110);border-radius:16px;gap:6px;">
					<img src="<?php echo ppo_get_dir('/assets/images/profile/condo.png'); ?>" style="width:20px;" />
					<span class="fs-4 fw-bold text-light"><?php echo ( $building ? $building : 'ingen data' ); ?></span>
				</div>

				<div class="px-2 py-1 mb-2 m-1" style="display:inline-flex;justify-content:center;align-items:center;background-color:rgb(108,128,110);border-radius:16px;gap:6px;"<?php echo ( $is_visitor ? ' data-bs-toggle="modal" data-bs-target="#ppoNonLoggedInUserInfoModal"' : '' ); ?>>
					<img src="<?php echo ppo_get_dir('/assets/images/profile/location-outline.png'); ?>" style="width:20px;" />
					<span class="fs-4 fw-bold text-light"><?php echo ( $address ? $address : 'ingen data' ); ?></span>
				</div>

				<div class="px-2 py-1 mb-2 m-1" style="display:inline-flex;justify-content:center;align-items:center;background-color:rgb(108,128,110);border-radius:16px;gap:6px;">
					<img src="<?php echo ppo_get_dir('/assets/images/profile/smoking.png'); ?>" style="width:20px;" />
					<span class="fs-6 fw-bold text-light"><?php echo ( $does_smoke ? $does_smoke : 'ingen data' ); ?></span>
				</div>

				<div class="px-2 py-1 mb-2 m-1" style="display:inline-flex;justify-content:center;align-items:center;background-color:rgb(108,128,110);border-radius:16px;gap:6px;">
					<img src="<?php echo ppo_get_dir('/assets/images/profile/baby-boy.png'); ?>" style="width:20px;" />
					<span class="fs-6 fw-bold text-light">Max antal born: <?php echo ( $kids_number ? $kids_number : '0' ); ?></span>
				</div>

				<div class=" mb-2 mt-2" style="display:flex;gap:0.5rem;">
					<a  href="mailto:<?php echo esc_html($main_address); ?>" class="btn px-3 py-2 fw-bold text-light ppo-profile-primary-button"<?php echo ( $is_visitor ? ' data-bs-toggle="modal" data-bs-target="#ppoNonLoggedInUserInfoModal"' : '' ); ?>>
						<img src="<?php echo ppo_get_dir('/assets/images/profile/mail-outline.png') ?>" style="margin-top: -10px;width:20px;margin-right:4px;" />
						<span class="fs-5">Skriv besked</span>
					</a>
					<a href="tel:<?php echo esc_html($tele_number); ?>" class="px-3 py-1 fw-bold text-light ppo-profile-accent-button d-flex justify-content-center align-items-center"<?php echo ( $is_visitor ? ' data-bs-toggle="modal" data-bs-target="#ppoNonLoggedInUserInfoModal"' : '' ); ?>>
						<img src="<?php echo ppo_get_dir('/assets/images/profile/phone-call-outline.png') ?>" style="width:20px;margin-right:6px;" />
						<span class="fs-5">Ring</span>
					</a>
				</div>

			</div>

		</div>
	</div><!-- .profile-content -->

	<div class="action-button mb-3">
		<div class="row p-3 ppo-box-shadow" style="background-color:rgb(156,170,155);border-radius:16px;justify-content:center;align-items:center;display:flex;">
			<button class="btn p-2 fw-bold text-light ppo-profile-primary-button" style="width:30%;"<?php echo ( $is_visitor ? ' data-bs-toggle="modal" data-bs-target="#ppoNonLoggedInUserInfoModal"' : '' ); ?>>Billeder</button>
		</div>
	</div><!-- .action-button -->

	<!-- Carousel Section -->
	<div class="row mb-3 py-2">

		<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
			<div class="carousel-indicators">
				<button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				<button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
				<button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
			</div>
			<div class="carousel-inner">

				<div class="carousel-item active" data-bs-interval="10000">
					<div>
						<img src="<?php echo ppo_get_dir('/assets/images/icone-d-image-noir.png'); ?>" class="d-block w-100" alt="...">
					</div>
				</div>

				<div class="carousel-item" data-bs-interval="2000">
					<div>
						<img src="<?php echo ppo_get_dir('/assets/images/icone-d-image-noir.png'); ?>" class="d-block w-100" alt="...">
					</div>
				</div>
				<div class="carousel-item">
					<div>
						<img src="<?php echo ppo_get_dir('/assets/images/icone-d-image-noir.png'); ?>" class="d-block w-100" alt="...">
					</div>
				</div>
			</div>

			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>

			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>

		</div>

	</div>

	<!-- Profile Info Buttons -->
	<div id="profileInfoTab" class="row mb-3 p-2 d-flex flex-row justify-content-between ppo-br-16 ppo-bg-card">
		<button class="btn text-light fw-bold w-25 me-1 ppo-br-16 selected ppo-b2-light" style="background-color:#495649;" data-tab-content-id="generalInfo">Generelt info</button>

		<button class="btn text-light fw-bold w-25 me-1 ppo-br-16" style="background-color:#495649;" data-tab-content-id="priceDetail">Pris & udstyr</button>

		<button class="btn text-light fw-bold w-25 me-1 ppo-br-16" style="background-color:#495649;" data-tab-content-id="annualPlannerAndCertificate">Årsplan & Certifikater</button>

		<button class="btn text-light fw-bold w-auto ppo-br-16" style="flex-grow:1;background-color:#495649;" data-tab-content-id="holidays">Ferier</button>
	</div>

	<!-- Tab Contents -->
	<!-- General Info -->
	<div id="generalInfo" class="ppo-tab-content">
		<!-- Profile Description -->
		<div class="row mb-3 ppo-br-16 ppo-bg-card">
			<div class="text-center ppo-box-shadow py-1 ppo-profile-section-header">
				<h3 class="text-light fs-5 fw-bold">Beskrivelse</h3>
			</div>

			<div class="ppo-profile-section-content pt-3">
				<p class="text-white fs-6 mb-2" id="ppoDescriptionPreview"><?php echo $description ? $description : 'Ingen data'; ?></p>
			</div>
		</div>

		<!-- Calendar Available Spots -->
		<div class="row mb-3 ppo-br-16 ppo-bg-card" id="ppoAvailableSpots">
			<div class="text-center ppo-box-shadow py-1 ppo-profile-section-header">
				<h3 class="text-light fs-5 fw-bold">Ledige pladser</h3>
			</div>

			<!-- Years -->
			<div class="row py-2 mb-3">

				<div class="col-2"></div>

				<div class="col-3">
					<button class="btn text-light fw-bold fs-5  ppo-profile-cal-button active" data-ppo-spot-year="<?php echo trim($current_year); ?>"><?php echo trim($current_year); ?></button>
				</div>
				<div class="col-3">
					<button class="btn text-light fw-bold fs-5  ppo-profile-cal-button" data-ppo-spot-year="<?php echo trim($next_year); ?>"><?php echo $next_year; ?></button>
				</div>
				<div class="col-3">
					<button class="btn text-light fw-bold fs-5  ppo-profile-cal-button" data-ppo-spot-year="<?php echo trim($next_of_next_year); ?>"><?php echo $next_of_next_year; ?></button>
				</div>
				<div class="col-1"></div>
			</div>

			<!-- Months  - First 1/2 -->
			<div class="d-flex justify-content-between flex-wrap mb-3 px-4" style="gap:0.5rem;">
				<?php

				foreach($first_half_month_list as $month ) :
				?>
					<button class="btn text-light fw-bold fs-6 ppo-bg-primary ppo-br-16 text-capitalize disabled" data-ppo-spot-month="<?php echo $month; ?>" style="flex-grow:1;"><?php echo $month; ?></button>
				<?php
				endforeach;
				?>
			</div>
			<!-- Months  - Last 1/2 -->
			<div class="d-flex justify-content-between flex-wrap mb-3 px-4" style="gap:0.5rem;">
				<?php
				foreach($last_half_month_list as $month ) :
				?>
					<button class="btn text-light fw-bold fs-6 ppo-bg-primary ppo-br-16 text-capitalize disabled" data-ppo-spot-month="<?php echo $month; ?>" style="flex-grow:1;"><?php echo $month; ?></button>
				<?php
				endforeach;
				?>

			</div>

		</div>
			


		<!-- Keywords -->
		<div class="row mb-3 ppo-br-16 ppo-bg-card">
			<div class="text-center ppo-box-shadow py-1 ppo-profile-section-header">
				<h3 class="text-light fs-5 fw-bold">Nøgleord</h3>
			</div>

			<!-- Keywords -->
			<?php
					if( count($keyword_arr) ) : ?>
						<div class="ppo-prof-keyword-content py-3" id="ppoKeywordsPreview">
				<?php
						foreach($keyword_arr as $keyword ) :
				?>
							<div class="d-flex text-dark bg-light fw-bold fs-5 justify-content-center align-items-center p-2 ppo-br-16"><?php echo esc_html($keyword); ?></div>
				<?php
						endforeach;
				?>
						</div>
				<?php
					else :
					?>
						<div class="py-3" id="ppoKeywordsPreview">
							<p class="text-white fs-5 text-center fw-bold mb-0">
								Ingen information
							</p>
					
						</div>
			<?php
					endif;
				?>
		</div>
		
	</div>

	<!-- Price Detail -->
	<div id="priceDetail" class="ppo-tab-content" style="display:none;">
		<!-- Price Description -->
		<div class="row mb-3 ppo-br-16 ppo-bg-card">
			<div class="text-center ppo-box-shadow py-1 ppo-profile-section-header">
				<h3 class="text-light fs-5 fw-bold">Pris</h3>
			</div>
			<?php
				$daycare_monthly_rate = ppo_get_daycare_user_monthly_rate($user_id);
				$daycare_municipality_subsidy_rate = ppo_get_daycare_user_municipality_subsidy_rate($user_id);
				$daycare_total = ppo_get_daycare_user_total_price($user_id);
			?>
			<div class="row p-0 pt-3 mb-3 ms-1">
				<div class="col d-flex flex-column justify-content-between align-items-center">
					<p class="text-white mb-1 text-center">Egen betaling pr. maned</p>
					<button class="btn fw-bold bg-white w-75 ppo-br-16"><?php echo esc_html($daycare_monthly_rate); ?> ,-</button>
				</div>
				<div class="col d-flex flex-column justify-content-between align-items-center">
					<p class="text-white mb-1 text-center">Kommunens tilskud</p>
					<button class="btn fw-bold bg-white w-75 ppo-br-16"><?php echo esc_html($daycare_municipality_subsidy_rate); ?> ,-</button>
				</div>
				<div class="col d-flex flex-column justify-content-between align-items-center">
					<p class="text-white mb-1 text-center">Samlet pris</p>
					<button class="btn fw-bold bg-white w-75 ppo-br-16"><?php echo esc_html($daycare_total); ?> ,-</button>
				</div>
			</div>
		</div>

		<!-- Included in the price -->
		<div class="row mb-3 ppo-br-16 ppo-bg-card">
			<div class="text-center ppo-box-shadow py-1 ppo-profile-section-header">
				<h3 class="text-light fs-5 fw-bold">Inkluderet i prisen</h3>
			</div>

			<!-- Included Items -->
			<div class="ppo-prof-keyword-content py-3" id="ppoPricesIncludedItemsPreview">
				<?php
					if( count($price_included_item_arr) ) :
						foreach($price_included_item_arr as $included_item ) :
				?>
							<div class="d-flex text-dark bg-light fw-bold fs-5 ppo-br-16 justify-content-center align-items-center p-2"><?php echo esc_html($included_item); ?></div>
				<?php
						endforeach;
					else :
					?>
						<p class="text-white fs-5 text-center fw-bold">
							Ingen information
						</p>
					<?php
					endif;
				?>

			</div>

		</div>

		<!-- Bring User's own -->
		<div class="row mb-3 ppo-br-16 ppo-bg-card">
			<div class="text-center ppo-box-shadow py-1 ppo-profile-section-header">
				<h3 class="text-light fs-5 fw-bold">Medbring selv</h3>
			</div>

			<!-- Items -->
			<div class="ppo-prof-keyword-content py-3" id="ppoUserOwnItemsPreview">
				<?php
					if( count($bring_users_own_item_arr) ) :
						foreach($bring_users_own_item_arr as $own_item ) :
				?>
							<div class="d-flex text-dark bg-light fw-bold fs-5 ppo-br-16 justify-content-center align-items-center p-2"><?php echo esc_html($own_item); ?></div>
				<?php
						endforeach;
					else :
					?>
						<p class="text-white fs-5 text-center fw-bold">
							Ingen information
						</p>
					<?php
					endif;
				?>

			</div>
		</div>
		
	</div>

	<!-- Annual Planner and Certificate Detail -->
	<div id="annualPlannerAndCertificate" class="ppo-tab-content" style="display:none;">

		<!-- Certificates -->
		<div class="row mb-3 ppo-br-16 ppo-bg-card">
			<div class="text-center ppo-box-shadow py-1 ppo-profile-section-header">
				<h3 class="text-light fs-5 fw-bold">Certificater</h3>
			</div>

			<div class="d-flex justify-content-start pt-3 mb-3" id="ppoCertificatesPreview">
				<?php if(is_array($certificates) && count($certificates)) : ?>
					<?php foreach( $certificates as $certificate ) : ?>
						<div class="mx-1">
							<div class="px-3 py-1 fw-bold bg-white w-auto ppo-br-16"><?php echo esc_html(trim($certificate)); ?></div>
						</div>
					<?php endforeach; ?>
				<?php else : ?>
					<p class="text-white fs-5">Ingen tilgængelige certifikater!</p>
				<?php endif; ?>
			</div>
			
		</div>

		<!-- Annual Planner Section -->
		<div class="row mb-3 ppo-br-16 ppo-bg-card">
			<div class="text-center ppo-box-shadow py-1 ppo-profile-section-header">
				<h3 class="text-light fs-5 fw-bold">Årsplaner</h3>
			</div>

			<!-- Months Data -->
			<div class="py-3">

				<div class="row mb-2">					
					<div class="position-relative">
						<h4 class="d-inline-block text-white px-2 py-1 ppo-br-12 ppo-bg-secondary">Januar</h4>
						<h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);" id="ppoAnnualPLanJanHeadingPreview">
							<?php
								echo (ppo_get_daycare_user_annual_plan_jan_heading($user->ID) ? ppo_get_daycare_user_annual_plan_jan_heading($user->ID) : 'Ingen overskrift');
							?>
						</h4>
					</div>
					<div class="my-1">
						<p class="text-white mb-1" id="ppoAnnualPLanJanDescriptionPreview">
							<?php
								echo (ppo_get_daycare_user_annual_plan_jan_description($user->ID) ? ppo_get_daycare_user_annual_plan_jan_description($user->ID) : 'Ingen beskrivelse');
							?>
						</p>
					</div>
				</div>

				<div class="row mb-2">
					<div class="position-relative">
						<h4 class="d-inline-block text-white px-2 py-1 ppo-br-12 ppo-bg-secondary">Februar</h4>
						<h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);" id="ppoAnnualPLanFebHeadingPreview">
							<?php
								echo (ppo_get_daycare_user_annual_plan_feb_heading($user->ID) ? ppo_get_daycare_user_annual_plan_feb_heading($user->ID) : 'Ingen overskrift');
							?>
						</h4>
					</div>
					<div class="my-1">
						<p class="text-white mb-1" id="ppoAnnualPLanFebDescriptionPreview">
							<?php
								echo (ppo_get_daycare_user_annual_plan_feb_description($user->ID) ? ppo_get_daycare_user_annual_plan_feb_description($user->ID) : 'Ingen beskrivelse');
							?>
						</p>
					</div>
				</div>

				<div class="row mb-2">
					<div class="position-relative">
						<h4 class="d-inline-block text-white px-2 py-1 ppo-br-12 ppo-bg-secondary">Marts</h4>
						<h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);" id="ppoAnnualPLanMarHeadingPreview">
							<?php
								echo (ppo_get_daycare_user_annual_plan_mar_heading($user->ID) ? ppo_get_daycare_user_annual_plan_mar_heading($user->ID) : 'Ingen overskrift');
							?>
						</h4>
					</div>
					<div class="my-1">
						<p class="text-white mb-1" id="ppoAnnualPLanMarDescriptionPreview">
							<?php
								echo (ppo_get_daycare_user_annual_plan_mar_description($user->ID) ? ppo_get_daycare_user_annual_plan_mar_description($user->ID) : 'Ingen beskrivelse');
							?>
						</p>
					</div>
				</div>

				<div class="row mb-2">
					<div class="position-relative">
						<h4 class="d-inline-block text-white px-2 py-1 ppo-br-12 ppo-bg-secondary">April</h4>
						<h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);" id="ppoAnnualPLanAprHeadingPreview">
							<?php
								echo (ppo_get_daycare_user_annual_plan_apr_heading($user->ID) ? ppo_get_daycare_user_annual_plan_apr_heading($user->ID) : 'Ingen overskrift');
							?>
						</h4>
					</div>
					<div class="my-1">
						<p class="text-white mb-1" id="ppoAnnualPLanAprDescriptionPreview">
							<?php
								echo (ppo_get_daycare_user_annual_plan_apr_description($user->ID) ? ppo_get_daycare_user_annual_plan_apr_description($user->ID) : 'Ingen beskrivelse');
							?>
						</p>
					</div>
				</div>

				<div class="row mb-2">
					<div class="position-relative">
						<h4 class="d-inline-block text-white px-2 py-1 ppo-br-12 ppo-bg-secondary">Maj</h4>
						<h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);" id="ppoAnnualPLanMayHeadingPreview">
							<?php
								echo (ppo_get_daycare_user_annual_plan_may_heading($user->ID) ? ppo_get_daycare_user_annual_plan_may_heading($user->ID) : 'Ingen overskrift');
							?>
						</h4>
					</div>
					<div class="my-1">
						<p class="text-white mb-1" id="ppoAnnualPLanMayDescriptionPreview">
							<?php
								echo (ppo_get_daycare_user_annual_plan_may_description($user->ID) ? ppo_get_daycare_user_annual_plan_may_description($user->ID) : 'Ingen beskrivelse');
							?>
						</p>
					</div>
				</div>

				<div class="row mb-2">
					<div class="position-relative">
						<h4 class="d-inline-block text-white px-2 py-1 ppo-br-12 ppo-bg-secondary">Juni</h4>
						<h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);" id="ppoAnnualPLanJunHeadingPreview">
							<?php
								echo (ppo_get_daycare_user_annual_plan_jun_heading($user->ID) ? ppo_get_daycare_user_annual_plan_jun_heading($user->ID) : 'Ingen overskrift');
							?>
						</h4>
					</div>
					<div class="my-1">
						<p class="text-white mb-1" id="ppoAnnualPLanJunDescriptionPreview">
							<?php
								echo (ppo_get_daycare_user_annual_plan_jun_description($user->ID) ? ppo_get_daycare_user_annual_plan_jun_description($user->ID) : 'Ingen beskrivelse');
							?>
						</p>
					</div>
				</div>

				<div class="row mb-2">
					<div class="position-relative">
						<h4 class="d-inline-block text-white px-2 py-1 ppo-br-12 ppo-bg-secondary">Juli</h4>
						<h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);" id="ppoAnnualPLanJulHeadingPreview">
							<?php
								echo (ppo_get_daycare_user_annual_plan_jul_heading($user->ID) ? ppo_get_daycare_user_annual_plan_jul_heading($user->ID) : 'Ingen overskrift');
							?>
						</h4>
					</div>
					<div class="my-1">
						<p class="text-white mb-1" id="ppoAnnualPLanJulDescriptionPreview">
							<?php
								echo (ppo_get_daycare_user_annual_plan_jul_description($user->ID) ? ppo_get_daycare_user_annual_plan_jul_description($user->ID) : 'Ingen beskrivelse');
							?>
						</p>
					</div>
				</div>

				<div class="row mb-2">
					<div class="position-relative">
						<h4 class="d-inline-block text-white px-2 py-1 ppo-br-12 ppo-bg-secondary">August</h4>
						<h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);" id="ppoAnnualPLanAugHeadingPreview">
							<?php
								echo (ppo_get_daycare_user_annual_plan_aug_heading($user->ID) ? ppo_get_daycare_user_annual_plan_aug_heading($user->ID) : 'Ingen overskrift');
							?>
						</h4>
					</div>
					<div class="my-1">
						<p class="text-white mb-1" id="ppoAnnualPLanAugDescriptionPreview">
							<?php
								echo (ppo_get_daycare_user_annual_plan_aug_description($user->ID) ? ppo_get_daycare_user_annual_plan_aug_description($user->ID) : 'Ingen beskrivelse');
							?>
						</p>
					</div>
				</div>

				<div class="row mb-2">
					<div class="position-relative">
						<h4 class="d-inline-block text-white px-2 py-1 ppo-br-12 ppo-bg-secondary">September</h4>
						<h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);" id="ppoAnnualPLanSepHeadingPreview">
							<?php
								echo (ppo_get_daycare_user_annual_plan_sep_heading($user->ID) ? ppo_get_daycare_user_annual_plan_sep_heading($user->ID) : 'Ingen overskrift');
							?>
						</h4>
					</div>
					<div class="my-1">
						<p class="text-white mb-1" id="ppoAnnualPLanSepDescriptionPreview">
							<?php
								echo (ppo_get_daycare_user_annual_plan_sep_description($user->ID) ? ppo_get_daycare_user_annual_plan_sep_description($user->ID) : 'Ingen beskrivelse');
							?>
						</p>
					</div>
				</div>

				<div class="row mb-2">
					<div class="position-relative">
						<h4 class="d-inline-block text-white px-2 py-1 ppo-br-12 ppo-bg-secondary">Oktober</h4>
						<h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);" id="ppoAnnualPLanOctHeadingPreview">
							<?php
								echo (ppo_get_daycare_user_annual_plan_oct_heading($user->ID) ? ppo_get_daycare_user_annual_plan_oct_heading($user->ID) : 'Ingen overskrift');
							?>
						</h4>
					</div>
					<div class="my-1">
						<p class="text-white mb-1" id="ppoAnnualPLanOctDescriptionPreview">
							<?php
								echo (ppo_get_daycare_user_annual_plan_oct_description($user->ID) ? ppo_get_daycare_user_annual_plan_oct_description($user->ID) : 'Ingen beskrivelse');
							?>
						</p>
					</div>
				</div>

				<div class="row mb-2">
					<div class="position-relative">
						<h4 class="d-inline-block text-white px-2 py-1 ppo-br-12 ppo-bg-secondary">November</h4>
						<h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);" id="ppoAnnualPLanNovHeadingPreview">
							<?php
								echo (ppo_get_daycare_user_annual_plan_nov_heading($user->ID) ? ppo_get_daycare_user_annual_plan_nov_heading($user->ID) : 'Ingen overskrift');
							?>
						</h4>
					</div>
					<div class="my-1">
						<p class="text-white mb-1" id="ppoAnnualPLanNovDescriptionPreview">
							<?php
								echo (ppo_get_daycare_user_annual_plan_nov_description($user->ID) ? ppo_get_daycare_user_annual_plan_nov_description($user->ID) : 'Ingen beskrivelse');
							?>
						</p>
					</div>
				</div>

				<div class="row mb-2">
					<div class="position-relative">
						<h4 class="d-inline-block text-white px-2 py-1 ppo-br-12 ppo-bg-secondary">December</h4>
						<h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);" id="ppoAnnualPLanDecHeadingPreview">
							<?php
								echo (ppo_get_daycare_user_annual_plan_dec_heading($user->ID) ? ppo_get_daycare_user_annual_plan_dec_heading($user->ID) : 'Ingen overskrift');
							?>
						</h4>
					</div>
					<div class="my-1">
						<p class="text-white mb-1" id="ppoAnnualPLanDecDescriptionPreview">
							<?php
								echo (ppo_get_daycare_user_annual_plan_dec_description($user->ID) ? ppo_get_daycare_user_annual_plan_dec_description($user->ID) : 'Ingen beskrivelse');
							?>
						</p>
					</div>
				</div>

			</div>

		</div>

	</div>

	<!-- Holiday Details -->
	<div id="holidays" class="ppo-tab-content" style="display:none;">

		<!-- All Holiday Section -->
		<div class="row mb-3 ppo-br-16 ppo-bg-card">
			<div class="text-center ppo-box-shadow py-1 ppo-profile-section-header">
				<h3 class="text-light fs-5 fw-bold">Ferie/Helligdage/Lukkedage</h3>
			</div>

			<!-- Months Data -->
			<div class="p-3">

				<div class="my-3">
					<div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
						<h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 ppo-bg-secondary d-inline-block">Januar</h4>
						<p class="mb-0 px-3 w-75 d-inline-block" id="ppoHolidayPLanJanPreview">
							<?php
								echo (ppo_get_daycare_user_holliday_plan_jan_description($user_id) ? ppo_get_daycare_user_holliday_plan_jan_description($user->ID) : '');
							?>
						</p>
					</div>

				</div>

				<div class="my-3">
					<div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
						<h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 ppo-bg-secondary d-inline-block">Februar</h4>
						<p class="mb-0 px-3 w-75 d-inline-block" id="ppoHolidayPLanFebPreview">
							<?php
								echo (ppo_get_daycare_user_holliday_plan_feb_description($user_id) ? ppo_get_daycare_user_holliday_plan_feb_description($user->ID) : '');
							?>
						</p>

					</div>

				</div>

				<div class="my-3">
					<div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
						<h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 ppo-bg-secondary d-inline-block">Marts</h4>
						<p class="mb-0 px-3 w-75 d-inline-block" id="ppoHolidayPLanMarPreview">
							<?php
								echo (ppo_get_daycare_user_holliday_plan_mar_description($user_id) ? ppo_get_daycare_user_holliday_plan_mar_description($user->ID) : '');
							?>
						</p>

					</div>

				</div>

				<div class="my-3">
					<div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
						<h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 ppo-bg-secondary d-inline-block">April</h4>
						<p class="mb-0 px-3 w-75 d-inline-block" id="ppoHolidayPLanAprPreview">
							<?php
								echo (ppo_get_daycare_user_holliday_plan_apr_description($user_id) ? ppo_get_daycare_user_holliday_plan_apr_description($user->ID) : '');
							?>
						</p>

					</div>

				</div>

				<div class="my-3">
					<div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
						<h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 ppo-bg-secondary d-inline-block">Maj</h4>
						<p class="mb-0 px-3 w-75 d-inline-block" id="ppoHolidayPLanMayPreview">
							<?php
								echo (ppo_get_daycare_user_holliday_plan_may_description($user_id) ? ppo_get_daycare_user_holliday_plan_may_description($user->ID) : '');
							?>
						</p>

					</div>

				</div>

				<div class="my-3">
					<div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
						<h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 ppo-bg-secondary d-inline-block">Juni</h4>
						<p class="mb-0 px-3 w-75 d-inline-block" id="ppoHolidayPLanJunPreview">
							<?php
								echo (ppo_get_daycare_user_holliday_plan_jun_description($user_id) ? ppo_get_daycare_user_holliday_plan_jun_description($user->ID) : '');
							?>
						</p>

					</div>

				</div>

				<div class="my-3">
					<div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
						<h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 d-inline-block ppo-bg-secondary">Juli</h4>
						<p class="mb-0 px-3 w-75 d-inline-block" id="ppoHolidayPLanJulPreview">
							<?php
								echo (ppo_get_daycare_user_holliday_plan_jul_description($user_id) ? ppo_get_daycare_user_holliday_plan_jul_description($user->ID) : '');
							?>
						</p>

					</div>

				</div>

				<div class="my-3">
					<div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
						<h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 d-inline-block ppo-bg-secondary">August</h4>
						<p class="mb-0 px-3 w-75 d-inline-block" id="ppoHolidayPLanAugPreview">
							<?php
								echo (ppo_get_daycare_user_holliday_plan_aug_description($user_id) ? ppo_get_daycare_user_holliday_plan_aug_description($user->ID) : '');
							?>
						</p>

					</div>

				</div>

				<div class="my-3">
					<div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
						<h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 d-inline-block ppo-bg-secondary">September</h4>
						<p class="mb-0 px-3 w-75 d-inline-block" id="ppoHolidayPLanSepPreview">
							<?php
								echo (ppo_get_daycare_user_holliday_plan_sep_description($user_id) ? ppo_get_daycare_user_holliday_plan_sep_description($user->ID) : '');
							?>
						</p>

					</div>

				</div>

				<div class="my-3">
					<div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
						<h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 d-inline-block ppo-bg-secondary">Oktober</h4>
						<p class="mb-0 px-3 w-75 d-inline-block" id="ppoHolidayPLanOctPreview">
							<?php
								echo (ppo_get_daycare_user_holliday_plan_oct_description($user_id) ? ppo_get_daycare_user_holliday_plan_oct_description($user->ID) : '');
							?>
						</p>

					</div>

				</div>

				<div class="my-3">
					<div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
						<h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 d-inline-block ppo-bg-secondary">November</h4>
						<p class="mb-0 px-3 w-75 d-inline-block" id="ppoHolidayPLanNovPreview">
							<?php
								echo (ppo_get_daycare_user_holliday_plan_nov_description($user_id) ? ppo_get_daycare_user_holliday_plan_nov_description($user->ID) : '');
							?>
						</p>

					</div>

				</div>

				<div class="my-3">
					<div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
						<h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 d-inline-block ppo-bg-secondary">December</h4>
						<p class="mb-0 px-3 w-75 d-inline-block" id="ppoHolidayPLanDecPreview">
							<?php
								echo (ppo_get_daycare_user_holliday_plan_dec_description($user_id) ? ppo_get_daycare_user_holliday_plan_dec_description($user->ID) : '');
							?>
						</p>

					</div>

				</div>

			</div>

		</div>

	</div>

</article><!-- #post-<?php the_ID(); ?> -->

<!-- Popup Modal -->
<?php ppo_popup_modal(); ?>
<?php ppo_profile_page_popup_modal(); ?>

<script defer>
	"use strict";
// 	console.log(ppo_data)
	jQuery(document).ready(function() {
			
		
		// Available Spots
		const availableSpotdata = (ppo_data && ppo_data?.available_spots) ? ppo_data.available_spots : {};
		let selectedYear = jQuery( '#ppoAvailableSpots [data-ppo-spot-year].active' ).html()

		// Enabled Selected Months
		ppoUpdateAvailableMonthsPerYear( jQuery( '#ppoAvailableSpots [data-ppo-spot-month]' ), availableSpotdata, selectedYear );

		/* Preview Section */

		if("#ppoAvailableSpots") {
			// Seclect Year
			jQuery( '#ppoAvailableSpots [data-ppo-spot-year]' ).on('click', (e) => {
				e.preventDefault();

				// Reset Options
				jQuery( '#ppoAvailableSpots [data-ppo-spot-year].active' ).removeClass("active");
				jQuery( '#ppoAvailableSpots [data-ppo-spot-month].enabled' ).removeClass("enabled").addClass("disabled");

				// Actions
				e.target.classList.toggle("active")
				selectedYear = e.target.dataset.ppoSpotYear

				// Define Spot Obj Data
				availableSpotdata[`${selectedYear}`] = availableSpotdata[`${selectedYear}`] ? [...availableSpotdata[`${selectedYear}`]] : [];

				// Enabled Selected Months
				ppoUpdateAvailableMonthsPerYear( jQuery( '#ppoAvailableSpots [data-ppo-spot-month]' ), availableSpotdata, selectedYear );
			});
		}
		
		jQuery("#profileInfoTab button").on("click", e => {
			e.preventDefault()
			jQuery("#profileInfoTab button.selected").removeClass("selected").removeClass("ppo-b2-light");
			e.currentTarget.classList.add("selected")
			e.currentTarget.classList.add("ppo-b2-light")

			const eleId = e.currentTarget.dataset.tabContentId

			jQuery('.ppo-tab-content').fadeOut(350)
			jQuery('#' + eleId).fadeIn(350)

		});
		
		function ppoUpdateAvailableMonthsPerYear( dataArr, obj, selectedYear ) {
			if(obj) {
				jQuery.each( dataArr, (idx, item) => {
					if( obj[`${selectedYear}`]?.includes(item.dataset.ppoSpotMonth) ) {
						if(item.classList.contains("disabled")) item.classList.remove('disabled')
						item.classList.add('enabled')
					}
				});
			}
			else null;
		}
	});
</script>