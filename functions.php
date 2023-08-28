<?php

/**
 * Find Dinppo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Find_Dinppo
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function find_dinppo_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Find Dinppo, use a find and replace
		* to change 'find-dinppo' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('find-dinppo', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'find-dinppo'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'find_dinppo_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'find_dinppo_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function find_dinppo_content_width()
{
	$GLOBALS['content_width'] = apply_filters('find_dinppo_content_width', 640);
}
add_action('after_setup_theme', 'find_dinppo_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function find_dinppo_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'find-dinppo'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'find-dinppo'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'find_dinppo_widgets_init');

/**
 * User Roles
 */
function ppo_custom_user_roles()
{
	add_role(
		'day_care',
		'Daycare',
		array(
			'read'         => true,
			'edit_posts'   => true,
			'upload_files' => true,
		),
	);
	add_role(
		'family_member',
		'Family member',
		array(
			'read'         => true,
			'edit_posts'   => false,
			'upload_files' => true,
		),
	);
}

// Add the day_care and family_member.
add_action('init', 'ppo_custom_user_roles');


/**
 * Enqueue scripts and styles.
 */
function find_dinppo_scripts()
{
	
	wp_enqueue_script('tiny-mce');
	
	wp_enqueue_style('find-dinppo-bs5', "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css");
	wp_enqueue_style('find-dinppo-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('find-dinppo-style', 'rtl', 'replace');

	wp_enqueue_script('find-dinppo-jquery-min', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js');
	wp_enqueue_script('find-dinppo-touchSwipe-min', '//cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.19/jquery.touchSwipe.min.js');
	wp_enqueue_script('find-dinppo-bs5-min', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js');
	wp_enqueue_script('find-dinppo-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
// 	wp_enqueue_script('find-dinppo-customizer', get_template_directory_uri() . '/js/customizer.js', array(), null, true);

	wp_localize_script("find-dinppo-navigation", "ppo_data", array(
		'ajax_url'	=> esc_url(admin_url("/wp-ajax.php")),
		'subs_details_list'	=> ppo_all_subscription_detail()
	));

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'find_dinppo_scripts');

// function find_dinppo_scripts_admin()
// {
// 	wp_enqueue_script('tiny-mce');
// 	wp_enqueue_script('find-dinppo-customizer', get_template_directory_uri() . '/js/customizer.js', array(), null, true);
// }
// add_action('admin_enqueue_scripts', 'find_dinppo_scripts_admin');

// function ppo_editor_customizer_script() {
//     wp_enqueue_script( 'wp-editor-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'jquery' ), false, true );
// }
// add_action( 'customize_controls_enqueue_scripts', 'ppo_editor_customizer_script' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Ajax Actions additions.
 */
require get_template_directory() . '/inc/ajax-actions.php';

/**
 * Ajax Actions additions.
 */
require get_template_directory() . '/inc/daycare-metadata.php';


/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}


function ppo_get_dir($path = null)
{
	return $path ? esc_url(get_template_directory_uri() . $path) : '';
}

function ppo_popup_modal()
{
	get_template_part('/template-parts/partials/popups/content', 'star-detail-popup');
}

function ppo_invoice_modal()
{
	get_template_part('/template-parts/partials/popups/content', 'invoice-popup');
}

function ppo_cancel_modal()
{
	get_template_part('/template-parts/partials/popups/content', 'cancel-popup');
}

function ppo_manage_plan_modal()
{
	get_template_part('/template-parts/partials/popups/content', 'manage-plan-page-popup');
}

function ppo_profile_page_popup_modal()
{
	get_template_part('/template-parts/partials/popups/content', 'non-logged-in-user-popup');
}

function ppo_edit_manage_plan_modal()
{
	get_template_part('/template-parts/partials/popups/content', 'edit-manage-plan-page-popup');
}


function ppo_get_premium_daycare_carousel()
{
	get_template_part('/template-parts/partials/carousel/content', 'premium-daycare-carousel');
}

function ppo_get_daycare_grid_list()
{
	get_template_part('/template-parts/partials/content', 'daycare-grid-list');
}

function ppo_edit_family_member_profile_image()
{
	get_template_part('/template-parts/partials/content', 'family-member-profile-image-edit');
}

/**
 * Get User Roles
 */
function ppo_get_current_user_roles()
{

	if (is_user_logged_in()) {

		$user = wp_get_current_user();

		$roles = (array) $user->roles;

		return $roles; // This will returns an array

	} else {

		return array();
	}
}

/**
 * Get User Gravatar by ID
 * param - ID
 */
function ppo_get_user_avatar($user_id)
{
	return $user_id ? esc_url(get_avatar_url($user_id)) : '';
}

function ppo_get_daycares()
{
	return get_users(array('role__in' => array('day_care'))) ?? [];
}

function ppo_get_family_members()
{
	return get_users(array('role__in' => array('family_member'))) ?? [];
}

function ppo_user_has_role($user_id, $role_name)
{
	$user_meta = get_userdata($user_id);
	$user_roles = $user_meta->roles;
	return in_array($role_name, $user_roles);
}

/**
 * 
 * Heart Icon
 * 
 */
function ppo_heart_icon( $daycare, $current_user=null ) {
	$is_visitor = !is_user_logged_in() ? true : false;
	?>
	<button class="border-0 bg-transparent p-0 w-auto" id="ppoBtn<?php echo esc_html($daycare->ID); ?>" data-is-liked="liked" onclick="ppoToggleDaycareLikeAction(this);"<?php echo ( $is_visitor ? ' data-bs-toggle="modal" data-bs-target="#ppoNonLoggedInUserInfoModal"' : '' ); ?>>
		<img src="<?php echo ppo_get_dir("/assets/images/profile/heart-outline.png") ?>" style="width:32px;" class="ppo-not-liked" />
		<img src="<?php echo ppo_get_dir("/assets/images/heart-fill.png") ?>" style="width:32px;display:none;" class="ppo-liked" />
	</button>
<?php
}

/**
 * 
 * ToolTip
 * 
 */
function ppo_label_with_tooltip($input_id, $name="CVR Nummer", $message=null) {
	?>
	<label for="<?php echo trim($input_id); ?>" class="text-white mb-1 fw-bold fs-5">
		<?php echo $name; ?>
		&nbsp;
		<button type="button" class="btn border-0 ppo-br-16 fs-6 text-white bg-dark px-2 py-0 d-inline-block" data-bs-toggle="tooltip" data-bs-placement="right" title="<?php echo ($message ? esc_attr($message) : 'Angiv venligst dit momsregistreringsnummer, hvis det er relevant. Dette vil skire korrekt skattemaessig behandling af dine fremtidige fakturer og ordrer.'); ?>" style="cursor: help !important;">
		  &quest;
		</button>
	</label>
<?php
}

/**
 * Modify Content Based on Subscription Plan
 */

function ppo_all_subscription_detail()
{
	return array(
		'gratis' => array(
			'plan'				=> 'Gratis',
			'month_rate'		=> 0,
			'icon'				=> 'star-black',
			'icon_url'			=> ppo_get_dir("/assets/images/member-stars/star-black.png"),
			'annual_rate'		=> 0,
			'saved_percentage'	=> '0%',
		),
		'basic' => array(
			'plan'				=> 'Basic',
			'month_rate'		=> 25,
			'icon'				=> 'star-green',
			'icon_url'			=> ppo_get_dir("/assets/images/member-stars/star-green.png"),
			'annual_rate'		=> 180,
			'saved_percentage'	=> '40%',
		),
		'starter' => array(
			'plan'				=> 'Starter',
			'month_rate'		=> 35,
			'icon'				=> 'star-yellow',
			'icon_url'			=> ppo_get_dir("/assets/images/member-stars/star-yellow.png"),
			'annual_rate'		=> 240,
			'saved_percentage'	=> '45%',
		),
		'pro' => array(
			'plan'				=> 'Pro',
			'month_rate'		=> 70,
			'icon'				=> 'star-light-blue',
			'icon_url'			=> ppo_get_dir("/assets/images/member-stars/star-light-blue.png"),
			'annual_rate'		=> 420,
			'saved_percentage'	=> '50%',
		),
		'premium' => array(
			'plan'				=> 'Premium',
			'month_rate'		=> 100,
			'icon'				=> 'premium',
			'icon_url'			=> ppo_get_dir("/assets/images/member-stars/premium.png"),
			'annual_rate'		=> 540,
			'saved_percentage'	=> '55%',
		)
	);
}

function ppo_subscription_detail($plan_name = '')
{

	switch ($plan_name) {
		case 'free':
		case 'gratis':
			$data['plan'] = 'Gratis';
			$data['month_rate'] = 0;
			$data['icon'] = 'star-black';
			$data['annual_rate'] = 0;
			$data['saved_percentage'] = '0%';
			break;
		case 'basic':
			$data['plan'] = 'Basic';
			$data['month_rate'] = 25;
			$data['icon'] = 'star-green';
			$data['annual_rate'] = 180;
			$data['saved_percentage'] = '40%';
			break;
		case 'starter':
			$data['plan'] = 'Starter';
			$data['month_rate'] = 35;
			$data['icon'] = 'star-yellow';
			$data['annual_rate'] = 240;
			$data['saved_percentage'] = '45%';
			break;
		case 'pro':
			$data['plan'] = 'Pro';
			$data['month_rate'] = 70;
			$data['icon'] = 'star-light-blue';
			$data['annual_rate'] = 420;
			$data['saved_percentage'] = '50%';
			break;
		case 'premium':
			$data['plan'] = 'Premium';
			$data['month_rate'] = 100;
			$data['icon'] = 'premium';
			$data['annual_rate'] = 540;
			$data['saved_percentage'] = '55%';
			break;
		default:
			$data['plan'] = 'Gratis';
			$data['month_rate'] = 0;
			$data['icon'] = 'star-black';
			$data['annual_rate'] = 0;
			$data['saved_percentage'] = '0%';
			break;
	}

	return $data;
}

function ppo_get_subscription_plan_list()
{
	return array(
		'gratis' => array(
			'plan'			=> "Gratis",
			'star_icon'	=> ppo_get_dir("/assets/images/member-stars/star-black.png")
		),
		'basic' => array(
			'plan'			=> "Basic",
			'star_icon'	=> ppo_get_dir("/assets/images/member-stars/star-green.png")
		),
		'starter' => array(
			'plan'			=> "Starter",
			'star_icon'	=> ppo_get_dir("/assets/images/member-stars/star-yellow.png")
		),
		'pro' => array(
			'plan'			=> "Pro",
			'star_icon'	=> ppo_get_dir("/assets/images/member-stars/star-light-blue.png")
		),
		'premium' => array(
			'plan'			=> "Premium",
			'star_icon'	=> ppo_get_dir("/assets/images/member-stars/premium.png")
		),
	);
}

function ppo_get_next_subs_plan_slug($param) {
	$next_slug='';
	switch ($param) {
		case 'gratis':
		case '' :
		case 'free':
			$next_slug = 'basic-plan';
			break;
		case 'basic':
			$next_slug = 'starter-plan';
			break;
		case 'starter':
			$next_slug = 'pro-plan';
			break;
		case 'pro':
			$next_slug = 'premium-plan';
			break;
		case 'premium':
			$next_slug = 'premium-plan';
			break;
		default:
			$next_slug = 'basic-plan';
			break;
	}
	return $next_slug;
}

/**
 * Helper Functions
 */
function ppo_get_daycare_subscription_plan($user_id) {
	return @get_user_meta( $user_id, '_daycare_subscription_plan', true ) ? strtolower(esc_html(get_user_meta( $user_id, '_daycare_subscription_plan', true ))) : 'gratis';
}
function ppo_get_daycare_address($user_id) {
	return @get_user_meta( $user_id, '_daycare_address', true ) ? esc_html(get_user_meta( $user_id, '_daycare_address', true )) : '';
}
function ppo_get_daycare_postcode($user_id) {
	return @get_user_meta( $user_id, '_daycare_postcode', true ) ? esc_html(get_user_meta( $user_id, '_daycare_postcode', true )) : '';
}
function ppo_get_daycare_building($user_id) {
	return @get_user_meta( $user_id, '_daycare_building', true ) ? esc_html(get_user_meta( $user_id, '_daycare_building', true )) : '';
}
function ppo_get_daycare_road_number($user_id) {
	return @get_user_meta( $user_id, '_daycare_road_number', true ) ? esc_html(get_user_meta( $user_id, '_daycare_road_number', true )) : '';
}
function ppo_get_daycare_house_number($user_id) {
	return @get_user_meta( $user_id, '_daycare_house_number', true ) ? esc_html(get_user_meta( $user_id, '_daycare_house_number', true )) : '';
}
function ppo_get_daycare_gallery($user_id) {
	return @get_user_meta( $user_id, '_daycare_gallery', true ) ? esc_html(get_user_meta( $user_id, '_daycare_gallery', true )) : '';
}
function ppo_get_daycare_city($user_id) {
	return @get_user_meta( $user_id, '_daycare_city', true ) ? esc_html(get_user_meta( $user_id, '_daycare_city', true )) : '';
}
function ppo_get_daycare_telephone_number($user_id) {
	return @get_user_meta( $user_id, '_daycare_telephone_number', true ) ? esc_html(get_user_meta( $user_id, '_daycare_telephone_number', true )) : '';
}
function ppo_get_daycare_kids_number($user_id) {
	return @get_user_meta( $user_id, '_daycare_kids_number', true ) ? esc_html(get_user_meta( $user_id, '_daycare_kids_number', true )) : 0;
}
function ppo_get_daycare_info_source($user_id) {
	return @get_user_meta( $user_id, '_daycare_info_source', true ) ? esc_html(get_user_meta( $user_id, '_daycare_info_source', true )) : '';
}
// Like
function ppo_get_daycare_user_who_like($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_who_like', true ) ? get_user_meta( $user_id, '_daycare_user_who_like', true ) : '';
}
// Does Smoke
function ppo_get_daycare_user_does_smoke($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_does_smoke', true ) ? 1 : 0;
}

function ppo_get_daycare_user_available_spots($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_available_spots', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_available_spots', true )) : '';
}
function ppo_get_daycare_user_keywords($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_keywords', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_keywords', true )) : '';
}
// Price
function ppo_get_daycare_user_monthly_rate($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_monthly_rate', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_monthly_rate', true )) : '';
}
function ppo_get_daycare_user_municipality_subsidy_rate($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_municipality_subsidy_rate', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_municipality_subsidy_rate', true )) : '';
}
function ppo_get_daycare_user_total_price($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_total_price', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_total_price', true )) : '';
}

// Social Handlers
function ppo_get_daycare_website($user_id) {
	return @get_user_meta( $user_id, 'user_website', true ) ? esc_html(get_user_meta( $user_id, 'user_website', true )) : '';
}
function ppo_get_daycare_fb_handler($user_id) {
	return @get_user_meta( $user_id, '_daycare_fb_handler', true ) ? esc_html(get_user_meta( $user_id, '_daycare_fb_handler', true )) : '';
}
function ppo_get_daycare_instagram_handler($user_id) {
	return @get_user_meta( $user_id, '_daycare_instagram_handler', true ) ? esc_html(get_user_meta( $user_id, '_daycare_instagram_handler', true )) : '';
}
function ppo_get_daycare_twitter_handler($user_id) {
	return @get_user_meta( $user_id, '_daycare_twitter_handler', true ) ? esc_html(get_user_meta( $user_id, '_daycare_twitter_handler', true )) : '';
}
function ppo_get_daycare_yt_handler($user_id) {
	return @get_user_meta( $user_id, '_daycare_yt_handler', true ) ? esc_html(get_user_meta( $user_id, '_daycare_yt_handler', true )) : '';
}

function ppo_get_daycare_user_included_in_price($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_included_in_price', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_included_in_price', true )) : '';
}
function ppo_get_daycare_user_bring_your_own($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_bring_your_own', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_bring_your_own', true )) : '';
}

// Certificates
function ppo_get_daycare_user_certificates_owned($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_certificates_owned', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_certificates_owned', true )) : '';
}

// 	Annual Plans
function ppo_get_daycare_user_annual_plan_jan_heading($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_annual_plan_jan_heading', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_annual_plan_jan_heading', true )) : '';
}
function ppo_get_daycare_user_annual_plan_feb_heading($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_annual_plan_feb_heading', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_annual_plan_feb_heading', true )) : '';
}
function ppo_get_daycare_user_annual_plan_mar_heading($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_annual_plan_mar_heading', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_annual_plan_mar_heading', true )) : '';
}
function ppo_get_daycare_user_annual_plan_apr_heading($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_annual_plan_apr_heading', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_annual_plan_apr_heading', true )) : '';
}
function ppo_get_daycare_user_annual_plan_may_heading($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_annual_plan_may_heading', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_annual_plan_may_heading', true )) : '';
}
function ppo_get_daycare_user_annual_plan_jun_heading($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_annual_plan_jun_heading', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_annual_plan_jun_heading', true )) : '';
}
function ppo_get_daycare_user_annual_plan_jul_heading($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_annual_plan_jul_heading', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_annual_plan_jul_heading', true )) : '';
}
function ppo_get_daycare_user_annual_plan_aug_heading($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_annual_plan_aug_heading', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_annual_plan_aug_heading', true )) : '';
}
function ppo_get_daycare_user_annual_plan_sep_heading($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_annual_plan_sep_heading', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_annual_plan_sep_heading', true )) : '';
}
function ppo_get_daycare_user_annual_plan_oct_heading($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_annual_plan_oct_heading', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_annual_plan_oct_heading', true )) : '';
}
function ppo_get_daycare_user_annual_plan_nov_heading($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_annual_plan_nov_heading', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_annual_plan_nov_heading', true )) : '';
}
function ppo_get_daycare_user_annual_plan_dec_heading($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_annual_plan_dec_heading', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_annual_plan_dec_heading', true )) : '';
}

function ppo_get_daycare_user_annual_plan_jan_description($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_annual_plan_jan_description', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_annual_plan_jan_description', true )) : '';
}
function ppo_get_daycare_user_annual_plan_feb_description($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_annual_plan_feb_description', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_annual_plan_feb_description', true )) : '';
}
function ppo_get_daycare_user_annual_plan_mar_description($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_annual_plan_mar_description', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_annual_plan_mar_description', true )) : '';
}
function ppo_get_daycare_user_annual_plan_apr_description($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_annual_plan_apr_description', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_annual_plan_apr_description', true )) : '';
}
function ppo_get_daycare_user_annual_plan_may_description($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_annual_plan_may_description', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_annual_plan_may_description', true )) : '';
}
function ppo_get_daycare_user_annual_plan_jun_description($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_annual_plan_jun_description', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_annual_plan_jun_description', true )) : '';
}
function ppo_get_daycare_user_annual_plan_jul_description($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_annual_plan_jul_description', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_annual_plan_jul_description', true )) : '';
}
function ppo_get_daycare_user_annual_plan_aug_description($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_annual_plan_aug_description', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_annual_plan_aug_description', true )) : '';
}
function ppo_get_daycare_user_annual_plan_sep_description($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_annual_plan_sep_description', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_annual_plan_sep_description', true )) : '';
}
function ppo_get_daycare_user_annual_plan_oct_description($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_annual_plan_oct_description', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_annual_plan_oct_description', true )) : '';
}
function ppo_get_daycare_user_annual_plan_nov_description($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_annual_plan_nov_description', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_annual_plan_nov_description', true )) : '';
}
function ppo_get_daycare_user_annual_plan_dec_description($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_annual_plan_dec_description', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_annual_plan_dec_description', true )) : '';
}
		
// 	Holliday Plans
function ppo_get_daycare_user_holliday_plan_jan_description($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_holliday_plan_jan_description', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_holliday_plan_jan_description', true )) : '';
}
function ppo_get_daycare_user_holliday_plan_feb_description($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_holliday_plan_feb_description', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_holliday_plan_feb_description', true )) : '';
}
function ppo_get_daycare_user_holliday_plan_mar_description($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_holliday_plan_mar_description', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_holliday_plan_mar_description', true )) : '';
}
function ppo_get_daycare_user_holliday_plan_apr_description($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_holliday_plan_apr_description', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_holliday_plan_apr_description', true )) : '';
}
function ppo_get_daycare_user_holliday_plan_may_description($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_holliday_plan_may_description', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_holliday_plan_may_description', true )) : '';
}
function ppo_get_daycare_user_holliday_plan_jun_description($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_holliday_plan_jun_description', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_holliday_plan_jun_description', true )) : '';
}
function ppo_get_daycare_user_holliday_plan_jul_description($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_holliday_plan_jul_description', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_holliday_plan_jul_description', true )) : '';
}
function ppo_get_daycare_user_holliday_plan_aug_description($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_holliday_plan_aug_description', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_holliday_plan_aug_description', true )) : '';
}
function ppo_get_daycare_user_holliday_plan_sep_description($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_holliday_plan_sep_description', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_holliday_plan_sep_description', true )) : '';
}
function ppo_get_daycare_user_holliday_plan_oct_description($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_holliday_plan_oct_description', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_holliday_plan_oct_description', true )) : '';
}
function ppo_get_daycare_user_holliday_plan_nov_description($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_holliday_plan_nov_description', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_holliday_plan_nov_description', true )) : '';
}
function ppo_get_daycare_user_holliday_plan_dec_description($user_id) {
	return @get_user_meta( $user_id, '_daycare_user_holliday_plan_dec_description', true ) ? esc_html(get_user_meta( $user_id, '_daycare_user_holliday_plan_dec_description', true )) : '';
}


/**
 * Chat Room
 */
function ppo_chat_room()
{
	get_template_part("/template-parts/partials/chat-room/content", 'chat-room');
}

/**
 * Custom Select Tag for Subscription Plans
 */
function ppo_select_plans()
{
	get_template_part("/template-parts/partials/content", "custom-select-tag");
}

/**
 * SEO Content DOM Section
 */
function ppo_seo_content_embeded()
{
	if (get_the_content()) :
?>
		<!-- SEO Content Section -->
		<div class="row mb-4 ppo-br-16 shadow bg-white">
			<div class="ppo-profile-section-content p-4">
				<?php the_content(); ?>
			</div>
		</div>
	<?php
	endif;
}

/**
 * SEO Content DOM Section
 */
function ppo_form_field_warning_msg($msg = "")
{
	?>
	<div class="invalid-feedback mb-2 ppo-bg-secondary ppo-br-16 fs-6 px-4 py-1 justify-content-center align-items-center text-white">
		<img src="<?php echo ppo_get_dir("/assets/images/errors&warnings/warning.png"); ?>" style="width:20px;border-radius:4px;" class="me-2 bg-white" />
		<?php echo esc_html($msg); ?>
	</div>
<?php
}

/**
 * SEO Content DOM Section
 */
function ppo_password_toggle_text($ele_id = "")
{
?>
	<span onclick="toggleInputType(this, '<?php echo $ele_id; ?>');" class="position-absolute bg-transparent text-light fw-bold text-decoration-none ppo-cursor-pointer" style="top:4px;right:16px;z-index:9;">Vis</span>
<?php
}

/**
 * SEO Content DOM Section
 */
function ppo_field_required_indicator()
{
?>
	<span class="ppo-color-red fw-bolder fs-4">*</span>
<?php
}


/**
 * 
 * ==================
 * CUSTOM POST TYPES
 * ==================
 * 
 */
add_action("init", "ppo_generate_necessary_cpt");

function ppo_generate_necessary_cpt()
{
	/**
	 * FAQ
	 * ++++
	 */
	$faq_labels = array(
		'name' => _x('Frequently Asked Questions', 'post type general name'),
		'singular_name' => _x('Frequently Asked Question', 'post type singular name'),
		'add_new' => _x('Add New', 'Question'),
		'add_new_item' => __('Add New Question'),
		'edit_item' => __('Edit Question'),
		'new_item' => __('New Question'),
		'all_items' => __('All Questions'),
		'view_item' => __('View Question'),
		'search_items' => __('Search questions'),
		'not_found' => __('No questions found'),
		'not_found_in_trash' => __('No questions found in the Trash'),
		'parent_item_colon' => '',
		'menu_name' => 'Frequently Asked Questions'
	);

	// args array
	$faq_args = array(
		'labels' => $faq_labels,
		'description' => 'Displays Frequently Asked Questions and their ratings',
		'public' => true,
		'hierarchical' => false,
		'menu_position' => 4,
		'supports' => array('title', 'editor'),
		'has_archive' => false,
		'show_admin_column' => true,
		'show_in_rest' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon'	=> 'dashicons-editor-help'
	);

	register_post_type('ppo_faq', $faq_args);

	/**
	 * Invoices
	 * ++++
	 */
	$invoice_labels = array(
		'name' => _x('Invoices', 'post type general name'),
		'singular_name' => _x('Invoice', 'post type singular name'),
		'add_new' => _x('Add New', 'Invoice'),
		'add_new_item' => __('Add New Invoice'),
		'edit_item' => __('Edit Invoice'),
		'new_item' => __('New Invoice'),
		'all_items' => __('All Invoices'),
		'view_item' => __('View Invoice'),
		'search_items' => __('Search invoices'),
		'not_found' => __('No invoices found'),
		'not_found_in_trash' => __('No invoices found in the Trash'),
		'parent_item_colon' => '',
		'menu_name' => 'Invoices'
	);

	// args array
	$invoice_args = array(
		'labels' => $invoice_labels,
		'description' => 'Displays Invoices and their ratings',
		'public' => true,
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array('title', 'editor'),
		'has_archive' => false,
		'show_admin_column' => true,
		'show_in_rest' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon'	=> 'dashicons-clipboard'
	);

	register_post_type('ppo_invoices', $invoice_args);

	/**
	 * cards
	 * ++++
	 */
	$card_labels = array(
		'name' => _x('Credit or Debit Cards', 'post type general name'),
		'singular_name' => _x('credit or debit Card', 'post type singular name'),
		'add_new' => _x('Add New', 'credit or debit Card'),
		'add_new_item' => __('Add New credit or debit Card'),
		'edit_item' => __('Edit credit or debit Card'),
		'new_item' => __('New credit or debit Card'),
		'all_items' => __('All credit or debit Cards'),
		'view_item' => __('View credit or debit Card'),
		'search_items' => __('Search credit or debit Cards'),
		'not_found' => __('No credit or debit Cards found'),
		'not_found_in_trash' => __('No credit or debit Cards found in the Trash'),
		'parent_item_colon' => '',
		'menu_name' => 'Credit or Debit Cards'
	);

	// args array
	$card_args = array(
		'labels' => $card_labels,
		'description' => 'Displays cards and their ratings',
		'public' => false,
		'hierarchical' => false,
		'menu_position' => 6,
		'supports' => array('title'),
		'has_archive' => false,
		'show_admin_column' => false,
		'show_in_rest' => true,
		'show_ui' => true,
		'query_var' => false,
		'menu_icon'	=> 'dashicons-bank', /*'dashicons-money-alt'*/
	);

	register_post_type('ppo_cards', $card_args);

	/**
	 * Orders
	 * ++++
	 */
	$order_labels = array(
		'name' => _x('Orders', 'post type general name'),
		'singular_name' => _x('Order', 'post type singular name'),
		'add_new' => _x('Add New', 'Order'),
		'add_new_item' => __('Add New Order'),
		'edit_item' => __('Edit Order'),
		'new_item' => __('New Order'),
		'all_items' => __('All Orders'),
		'view_item' => __('View Order'),
		'search_items' => __('Search orders'),
		'not_found' => __('No orders found'),
		'not_found_in_trash' => __('No orders found in the Trash'),
		'parent_item_colon' => '',
		'menu_name' => 'Orders'
	);

	// args array
	$order_args = array(
		'labels' => $order_labels,
		'description' => 'Displays Orders and their ratings',
		'public' => true,
		'hierarchical' => false,
		'menu_position' => 6,
		'supports' => array('title'),
		'has_archive' => false,
		'show_admin_column' => true,
		'show_in_rest' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon'	=> 'dashicons-cart'
	);

	register_post_type('ppo_orders', $order_args);

	/**
	 * Subscription Plans
	 * ++++++++++++++++++
	 */
	$order_labels = array(
		'name' => _x('Subscription plans', 'post type general name'),
		'singular_name' => _x('Subscription plan', 'post type singular name'),
		'add_new' => _x('Add New', 'Subscription plan'),
		'add_new_item' => __('Add New Subscription plan'),
		'edit_item' => __('Edit Subscription plan'),
		'new_item' => __('New subscription plan'),
		'all_items' => __('All Subscription plans'),
		'view_item' => __('View Order'),
		'search_items' => __('Search subscription plans'),
		'not_found' => __('No subscription plans found'),
		'not_found_in_trash' => __('No subscription plans found in the Trash'),
		'parent_item_colon' => '',
		'menu_name' => 'Subscription plans'
	);

	// args array
	$order_args = array(
		'labels' => $order_labels,
		'description' => 'Displays Subscription plans and their details',
		'public' => true,
		'hierarchical' => false,
		'menu_position' => 6,
		'supports' => array('title', 'editor', 'thumbnail'),
		'has_archive' => false,
		'show_admin_column' => true,
		'show_in_rest' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon'	=> 'dashicons-star-filled'
	);

	register_post_type('ppo_subscriptions', $order_args);
}

/**
 * 
 * 	Content Genrator func from Customizer Settings
 * ================================================
 */
function ppo_shortcode_form_generator_from_customizer($customizer_id) {
	if (get_theme_mod($customizer_id)) :
		echo do_shortcode( get_theme_mod($customizer_id) );
    endif;
}

function ppo_text_content_generator_from_customizer($customizer_id) {
	if (get_theme_mod($customizer_id)) :
		echo get_theme_mod($customizer_id);
    endif;
}


/**
 * ==========
 * REDIRECTS
 * ==========
 */
add_action("wp", "ppo_redirects");
function ppo_redirects()
{
	if(is_user_logged_in()) {
		$user_roles = ppo_get_current_user_roles();
		$is_daycare = is_array($user_roles) && in_array( 'day_care', $user_roles ) ? true : false;
		
		if (is_page("log-ind") || is_page("sign-up") || is_page("opret-konto-som-ppo") || is_page("opret-konto-som-burger") ) {
			wp_redirect(home_url("/profile/"), 302);
			exit;
		}
		if( $is_daycare && is_page("profile-daycare") ) {
			wp_redirect(home_url("/profile/"), 302);
			exit;
		}
	}
	else {
		if ( is_page("profile") ) {
			wp_redirect(home_url("/log-ind/"), 302);
			exit;
		}
		if ( is_page("profile-daycare") ) {
			wp_redirect(home_url("/"), 302);
			exit;
		}
	}

}

function ppo_login_redirect( $redirect_to, $request, $user ) {
	//validating user login and roles
    if (isset($user->roles) && is_array($user->roles)) {
        //is this a day_care subscriber?
        if (in_array('day_care', $user->roles) || in_array('family_member', $user->roles)) {
            // redirect them to their profile page
            $redirect_to = esc_url(home_url("/profile/"));
        }
		elseif (in_array('subscriber', $user->roles) ) {
            // redirect them to Front page
            $redirect_to = esc_url(home_url());
        }
// 		else {
//             //all other members
//             $redirect_to = "https://mysite.com/members";;
//         }
    }
 
    return $redirect_to;
}
add_filter( 'login_redirect', 'ppo_login_redirect', 10, 3 );


/**
 *	======
 *	LOG IN
 *	======
 */
add_action("wp", "ppo_signin_signup_actions");
function ppo_signin_signup_actions() {
	if( is_page('log-ind') ) {
		if( isset($_POST['ppo_submit_login']) ) {
			$username = isset($_POST['ppo_username']) && $_POST['ppo_username'] ? sanitize_text_field(strtolower($_POST['ppo_username'])) : '';
			$password = isset($_POST['ppo_password']) && $_POST['ppo_password'] ? $_POST['ppo_password'] : '';
			$remember = isset($_POST['ppo_remember']) && $_POST['ppo_remember'] == '1' ? true : false;

			$creds = array(
				'user_login'    => $username,
				'user_password' => $password,
				'remember'      => $remember
			);

			$user = wp_signon( $creds, false );

			if ( is_wp_error( $user ) ) {
				echo $user->get_error_message();
			}
			else {
				wp_safe_redirect(home_url("/profile/"));
				exit();
			}
		}
		
	}
	
	if( is_page('opret-konto-som-ppo') || is_page('opret-konto-som-burger') ) {
		if( isset($_POST['ppo_user_signup_submit']) ) :
			$user_login = sanitize_text_field( $_POST['ppo_user_login'] );
			$user_email = sanitize_email( $_POST['ppo_user_email'] );

			$user = register_new_user( $user_login, $user_email ); // signup_user( $user_name = '', $user_email = '', $errors = '' )
			if ( ! is_wp_error( $user ) ) {
				$redirect_to = ! empty( $_POST['redirect_to'] ) ? $_POST['redirect_to'] : esc_url(home_url('/wp-login.php?checkemail=registered'));
				wp_safe_redirect( $redirect_to );
				exit();
			}
			else {
				echo $user->get_error_message();
			}
		endif;
	}
}