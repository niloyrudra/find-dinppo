<?php

/**
 * Find Dinppo Theme Customizer
 *
 * @package Find_Dinppo
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function find_dinppo_customize_register($wp_customize)
{
	/**
	 * Add our Customizer content
	 */
	if ( class_exists( 'WP_Customize_Control' ) ) {
	   // Add all your Customizer Custom Control classes here...
	   class Text_Editor_Custom_Control extends WP_Customize_Control
		{
			     /**
				* The type of control being rendered
				*/
			   public $type = 'ppo_custom_control';

			   /**
				* Enqueue our scripts and styles
				*/
			   public function enqueue() {
				  // Enqueue our scripts here...
					wp_enqueue_script('find-dinppo-customizer', get_template_directory_uri() . '/js/customizer.js', array('jQeury'), false, true);
			   }

			   /**
				* Render the control in the customizer
				*/
			  public function render_content()
			   {
					
					?>
					<label>
					<span class="customize-text_editor"><?php echo esc_html( $this->label ); ?></span>

						<?php $settings = array(
								'textarea_name'		=> $this->id,
								'media_buttons'		=> true,
								'textarea_rows'		=> 8,
								'quicktags'			=> true, // array('bold','italic','underline','separator','alignleft','aligncenter','alignright','separator','link','unlink','undo','redo'),
								'tinymce'           => true,
								'teeny'				=> true,
						  );
						  wp_editor($this->value(), $this->id, $settings ); ?>
					</label>
					<?php
				  do_action('admin_print_footer_scripts');
			   }
		}
	}
	
	
	
	$wp_customize->get_setting('blogname')->transport         = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
	
	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'find_dinppo_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'find_dinppo_customize_partial_blogdescription',
			)
		);
		
	}
	
	/* ************************************************************************** */
	
	/**
	 * *******************
	 * 		Panel
	 * *******************
	 */
	// Theme Options Panel
	$wp_customize->add_panel( 'ppo_theme_options', 
		array(
			'priority'       => 30,
			'title'            => __( 'Theme Options', 'nd_dosth' ),
			'description'      => __( 'Theme Modifications like theme texts and forms preferences can be done here', 'find-dinppo' ),
		) 
	);
	
	// Text Options Section Inside Theme
	/**
	 * *******************
	 * 		Section
	 * *******************
	 */
	// Home Page Section
	$wp_customize->add_section(
		'homepage_section',
		array(
			'title' => __('Homepage Edit Section', 'find-dinppo'),
			'priority' => 1,
			'description' => __('This is the section where you can edit home page text sections.', 'find-dinppo'),
			'panel'         => 'ppo_theme_options'
		)
	);
	// Contact Page Section
	$wp_customize->add_section(
		'contact_form_section',
		array(
			'title' => __('Contact Form Section', 'find-dinppo'),
			'priority' => 2,
			'description' => __('This is the section where you can edit your contact page form section.', 'find-dinppo'),
			'panel'         => 'ppo_theme_options'
		)
	);
	// Feedback Page Section
	$wp_customize->add_section(
		'feedback_form_section',
		array(
			'title' => __('Feedback Form Section', 'find-dinppo'),
			'priority' => 3,
			'description' => __('This is the section where you can edit your feedback page form section.', 'find-dinppo'),
			'panel'         => 'ppo_theme_options'
		)
	);

	// Social Handler
	$wp_customize->add_section(
		'social_handlers_section',
		array(
			'title' => __('Social Media Section', 'find-dinppo'),
			'priority' => 4,
			'description' => __('This is the section where you can edit/add your social handlers.', 'find-dinppo'),
			'panel'         => 'ppo_theme_options'
		)
	);
	
	// Text options
	$wp_customize->add_section(
		'ppo_copyright_section', 
		array(
			'title'         => __( 'Copyright Section', 'nd_dosth' ),
			'priority'      => 3,
			'panel'         => 'ppo_theme_options'
		) 
	);
	
	
	/* ************************************************************************** */
	
	
	/**
	 * *******************
	 * 		Settings
	 * *******************
	 */
	// Home Page
	$wp_customize->add_setting(
		'home_top_text_section',
		array(
			'default' => '',
			'type' => 'theme_mod', /*'option'*/
		)
	);
	$wp_customize->add_setting(
		'home_second_text_section',
		array(
			'default' => '',
			'type' => 'theme_mod', /*'option'*/
		)
	);
	
	// Contact Form Page
	$wp_customize->add_setting(
		'contact_form_content_block',
		array(
			'default' => '',
			'type' => 'theme_mod'
		)
	);
	$wp_customize->add_setting(
		'contact_form_shortcode_block',
		array(
			'default' => '',
			'type' => 'theme_mod'
		)
	);
	// Feedback Form Page
	$wp_customize->add_setting(
		'feedback_form_content_block',
		array(
			'default' => '',
			'type' => 'theme_mod'
		)
	);
	$wp_customize->add_setting(
		'feedback_form_shortcode_block',
		array(
			'default' => '',
			'type' => 'theme_mod',
// 			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	// Social Media Handlers
	$wp_customize->add_setting(
		'social_handler_fb',
		array(
			'default' => '',
			'type' => 'theme_mod',
// 			'sanitize_callback' => 'sanitize_url', // 'sanitize_text_field'
			'transport' => 'refresh',
      		'sanitize_callback' => 'esc_url_raw'
		)
	);
	$wp_customize->add_setting(
		'social_handler_instagram',
		array(
			'default' => '',
			'type' => 'theme_mod',
// 			'sanitize_callback' => 'sanitize_url', // 'sanitize_text_field'
			'transport' => 'refresh',
      		'sanitize_callback' => 'esc_url_raw'
		)
	);
	$wp_customize->add_setting(
		'social_handler_yt',
		array(
			'default' => '',
			'type' => 'theme_mod',
// 			'sanitize_callback' => 'sanitize_url', // 'sanitize_text_field'
			'transport' => 'refresh',
      		'sanitize_callback' => 'esc_url_raw'
		)
	);
	$wp_customize->add_setting(
		'social_handler_star',
		array(
			'default' => '',
			'type' => 'theme_mod',
// 			'sanitize_callback' => 'sanitize_url', // 'sanitize_text_field'
			'transport' => 'refresh',
      		'sanitize_callback' => 'esc_url_raw'
		)
	);
	
	
	// Setting for Copyright text.
	$wp_customize->add_setting( 'ppo_copyright_text',
		array(
			'default'           => __( 'All rights reserved ', 'find-dinppo' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		)
	);
	
	
	/**
	 * *******************
	 * 		Control
	 * *******************
	 */
	//Home Top Section
	$wp_customize->add_control(
		new WP_Customize_Control(
// 		new Text_Editor_Custom_Control(
			$wp_customize,
			'home_top_text_section',
			array(
				'label' => __('Top Section', 'find-dinppo'),
				'section' => 'homepage_section',
				'settings' => 'home_top_text_section',
				'type'	=> 'textarea',
// 				'input_attrs' => array(
// 					 'toolbar1' => 'bold italic bullist numlist alignleft aligncenter alignright link',
// 					 'mediaButtons' => true,
// 				  )
			)
		)
	);
	//Home Second Top Section
	$wp_customize->add_control(
		new WP_Customize_Control(
// 		new Text_Editor_Custom_Control(
			$wp_customize,
			'home_second_text_section',
			array(
				'label' => __('Second Top Section', 'find-dinppo'),
				'section' => 'homepage_section',
				'settings' => 'home_second_text_section',
				'type'	=> 'textarea',
				'input_attrs' => array(
					 'toolbar1' => 'bold italic bullist numlist alignleft aligncenter alignright link',
					 'mediaButtons' => true,
				  )
			)
		)
	);
	
	//Contact Form Section
	$wp_customize->add_control(
		new WP_Customize_Control(
// 		new Text_Editor_Custom_Control(
			$wp_customize,
			'contact_form_content_block',
			array(
				'label' => __('Contact Form Description', 'find-dinppo'),
				'section' => 'contact_form_section',
				'settings' => 'contact_form_content_block',
				'type'	=> 'textarea'
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
// 		new Text_Editor_Custom_Control(
			$wp_customize,
			'contact_form_shortcode_block',
			array(
				'label' => __('Contact Form [SHORTCODE]', 'find-dinppo'),
				'section' => 'contact_form_section',
				'settings' => 'contact_form_shortcode_block',
				'type'	=> 'textarea'
			)
		)
	);
	
	//Feedback Form Section
	$wp_customize->add_control(
		new WP_Customize_Control(
// 		new Text_Editor_Custom_Control(
			$wp_customize,
			'feedback_form_content_block',
			array(
				'label' => __('Feedback Form Description', 'find-dinppo'),
				'section' => 'feedback_form_section',
				'settings' => 'feedback_form_content_block',
				'type'	=> 'textarea'
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
// 		new Text_Editor_Custom_Control(
			$wp_customize,
			'feedback_form_shortcode_block',
			array(
				'label' => __('Feedback Form [SHORTCODE]', 'find-dinppo'),
				'section' => 'feedback_form_section',
				'settings' => 'feedback_form_shortcode_block',
				'type'	=> 'textarea'
			)
		)
	);
	
	// Control for Copyright text
	$wp_customize->add_control( 
		new WP_Customize_Control(
// 		new Text_Editor_Custom_Control(
			$wp_customize,
			'ppo_copyright_text',
			array(
				'type'        => 'textarea',
				'priority'    => 10,
				'section'     => 'ppo_copyright_section',
				'label'       => 'Copyright text',
				'description' => 'Text put here will be outputted in the footer',
			)
		)
	);
	
	// Social Handlers
	// Facebook
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'social_handler_fb',
			array(
				'label' => __('Facebook Link', 'find-dinppo'),
				'section' => 'social_handlers_section',
				'settings' => 'social_handler_fb',
				'type'	=> 'url'
			)
		)
	);
	// Instagram
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'social_handler_instagram',
			array(
				'label' => __('Intagram Link', 'find-dinppo'),
				'section' => 'social_handlers_section',
				'settings' => 'social_handler_instagram',
				'type'	=> 'url'
			)
		)
	);
	// Youtube
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'social_handler_yt',
			array(
				'label' => __('Youtube Link', 'find-dinppo'),
				'section' => 'social_handlers_section',
				'settings' => 'social_handler_yt',
				'type'	=> 'url'
			)
		)
	);
	// Star Social
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'social_handler_star',
			array(
				'label' => __('Star Link', 'find-dinppo'),
				'section' => 'social_handlers_section',
				'settings' => 'social_handler_star',
				'type'	=> 'url'
			)
		)
	);
	
	
}
add_action('customize_register', 'find_dinppo_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function find_dinppo_customize_partial_blogname()
{
	bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function find_dinppo_customize_partial_blogdescription()
{
	bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function find_dinppo_customize_preview_js()
{
	wp_enqueue_script('find-dinppo-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), _S_VERSION, true);
}
add_action('customize_preview_init', 'find_dinppo_customize_preview_js');
