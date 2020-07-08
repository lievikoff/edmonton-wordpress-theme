<?php
/**
 * Customizer settings for this theme.
 *
 * @package Edmonton
 * @since Edmonton 1.0
 */

if ( ! class_exists( 'Edmonton_Customize' ) ) {
	/**
	 * CUSTOMIZER SETTINGS
	 */
	class Edmonton_Customize {

		/**
		 * Register customizer options.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		public static function register( $wp_customize ) {

			/**
			 * Site Title & Description.
			 * */
			$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

			$wp_customize->selective_refresh->add_partial(
				'blogname',
				array(
					'selector'        => '.site-title a',
					'render_callback' => 'edmonton_customize_partial_blogname',
				)
			);

			$wp_customize->selective_refresh->add_partial(
				'blogdescription',
				array(
					'selector'        => '.site-description',
					'render_callback' => 'edmonton_customize_partial_blogdescription',
				)
			);

			$wp_customize->selective_refresh->add_partial(
				'custom_logo',
				array(
					'selector'        => '.header-titles [class*=site-]:not(.site-description)',
					'render_callback' => 'edmonton_customize_partial_site_logo',
				)
			);

			$wp_customize->selective_refresh->add_partial(
				'retina_logo',
				array(
					'selector'        => '.header-titles [class*=site-]:not(.site-description)',
					'render_callback' => 'edmonton_customize_partial_site_logo',
				)
			);

			/**
			 * Site Identity
			 */

			/* 2X Header Logo ---------------- */
			$wp_customize->add_setting(
				'retina_logo',
				array(
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				'retina_logo',
				array(
					'type'        => 'checkbox',
					'section'     => 'title_tagline',
					'priority'    => 10,
					'label'       => __( 'Retina logo', 'edmonton' ),
					'description' => __( 'Scales the logo to half its uploaded size, making it sharp on high-res screens.', 'edmonton' ),
				)
			);

			// Header & Footer Background Color.
			$wp_customize->add_setting(
				'header_footer_background_color',
				array(
					'default'           => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'header_footer_background_color',
					array(
						'label'   => __( 'Header &amp; Footer Background Color', 'edmonton' ),
						'section' => 'colors',
					)
				)
			);

			// Enable picking an accent color.
			$wp_customize->add_setting(
				'accent_hue_active',
				array(
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => array( __CLASS__, 'sanitize_select' ),
					'transport'         => 'postMessage',
					'default'           => 'default',
				)
			);

			$wp_customize->add_control(
				'accent_hue_active',
				array(
					'type'    => 'radio',
					'section' => 'colors',
					'label'   => __( 'Primary Color', 'edmonton' ),
					'choices' => array(
						'default' => __( 'Default', 'edmonton' ),
						'custom'  => __( 'Custom', 'edmonton' ),
					),
				)
			);

			/**
			 * Implementation for the accent color.
			 * This is different to all other color options because of the accessibility enhancements.
			 * The control is a hue-only colorpicker, and there is a separate setting that holds values
			 * for other colors calculated based on the selected hue and various background-colors on the page.
			 *
			 * @since Edmonton 1.0
			 */

			// Add the setting for the hue colorpicker.
			$wp_customize->add_setting(
				'accent_hue',
				array(
					'default'           => 344,
					'type'              => 'theme_mod',
					'sanitize_callback' => 'absint',
					'transport'         => 'postMessage',
				)
			);

			// Add setting to hold colors derived from the accent hue.
			$wp_customize->add_setting(
				'accent_accessible_colors',
				array(
					'default'           => array(
						'content'       => array(
							'text'      => '#000000',
							'accent'    => '#cd2653',
							'secondary' => '#6d6d6d',
							'borders'   => '#dcd7ca',
						),
						'header-footer' => array(
							'text'      => '#000000',
							'accent'    => '#cd2653',
							'secondary' => '#6d6d6d',
							'borders'   => '#dcd7ca',
						),
					),
					'type'              => 'theme_mod',
					'transport'         => 'postMessage',
					'sanitize_callback' => array( __CLASS__, 'sanitize_accent_accessible_colors' ),
				)
			);

			// Add the hue-only colorpicker for the accent color.
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'accent_hue',
					array(
						'section'         => 'colors',
						'settings'        => 'accent_hue',
						'description'     => __( 'Apply a custom color for links, buttons, featured images.', 'edmonton' ),
						'mode'            => 'hue',
						'active_callback' => function() use ( $wp_customize ) {
							return ( 'custom' === $wp_customize->get_setting( 'accent_hue_active' )->value() );
						},
					)
				)
			);

			// Update background color with postMessage, so inline CSS output is updated as well.
			$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';

			/**
			 * Social Media
			 */

			$wp_customize->add_panel(
				'social_media',
				array(
					'title'      => __( 'Social Media', 'edmonton' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
				)
			);

			/* Show DeviantArt ----------------------------------------------- */

			$wp_customize->add_section(
				'deviantArt',
				array(
					'title'      => __( 'DeviantArt', 'edmonton' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				)
			);

			$wp_customize->add_setting(
				'show_deviantArt',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => false,
					'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
				)
			);

			$wp_customize->add_control(
				'show_deviantArt',
				array(
					'type'     => 'checkbox',
					'section'  => 'deviantArt',
					'priority' => 10,
					'label'    => __( 'Show', 'edmonton' ),
				)
			);

			$wp_customize->add_setting(
				'url_deviantArt',
				array(
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				'url_deviantArt',
				array(
					'type'     		=> 'url',
					'section'  		=> 'deviantArt',
					'priority' 		=> 10,
					'label'    		=> __( 'URL', 'edmonton' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				)
			);

			$wp_customize->add_setting(
				'icon_deviantArt',
				array(
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Image_Control (
					$wp_customize,
					'icon_deviantArt',
					[
						'type'     		=> 'image',
						'section'  		=> 'deviantArt',
						'priority' 		=> 10,
						'label'    		=> __( 'Icon', 'edmonton' ),
					]
				)
			);

			/* Show Facebook ----------------------------------------------- */

			$wp_customize->add_section(
				'facebook',
				array(
					'title'      => __( 'Facebook', 'edmonton' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				)
			);

			$wp_customize->add_setting(
				'show_facebook',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => true,
					'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
				)
			);

			$wp_customize->add_control(
				'show_facebook',
				array(
					'type'     => 'checkbox',
					'section'  => 'facebook',
					'priority' => 10,
					'label'    => __( 'Show', 'edmonton' ),
				)
			);

			$wp_customize->add_setting(
				'url_facebook',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => 'https://www.facebook.com/',
				)
			);

			$wp_customize->add_control(
				'url_facebook',
				array(
					'type'     		=> 'url',
					'section'  		=> 'facebook',
					'priority' 		=> 10,
					'label'    		=> __( 'URL', 'edmonton' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				)
			);

			$wp_customize->add_setting(
				'icon_facebook',
				array(
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Image_Control (
					$wp_customize,
					'icon_facebook',
					[
						'type'     		=> 'image',
						'section'  		=> 'facebook',
						'priority' 		=> 10,
						'label'    		=> __( 'Icon', 'edmonton' ),
					]
				)
			);

			/* Show Flickr ----------------------------------------------- */

			$wp_customize->add_section(
				'flickr',
				array(
					'title'      => __( 'Flickr', 'edmonton' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				)
			);

			$wp_customize->add_setting(
				'show_flickr',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => false,
					'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
				)
			);

			$wp_customize->add_control(
				'show_flickr',
				array(
					'type'     => 'checkbox',
					'section'  => 'flickr',
					'priority' => 10,
					'label'    => __( 'Show', 'edmonton' ),
				)
			);

			$wp_customize->add_setting(
				'url_flickr',
				array(
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				'url_flickr',
				array(
					'type'     		=> 'url',
					'section'  		=> 'flickr',
					'priority' 		=> 10,
					'label'    		=> __( 'URL', 'edmonton' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				)
			);

			$wp_customize->add_setting(
				'icon_flickr',
				array(
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Image_Control (
					$wp_customize,
					'icon_flickr',
					[
						'type'     		=> 'image',
						'section'  		=> 'flickr',
						'priority' 		=> 10,
						'label'    		=> __( 'Icon', 'edmonton' ),
					]
				)
			);

			/* Show GitHub ----------------------------------------------- */

			$wp_customize->add_section(
				'gitHub',
				array(
					'title'      => __( 'GitHub', 'edmonton' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				)
			);

			$wp_customize->add_setting(
				'show_gitHub',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => true,
					'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
				)
			);

			$wp_customize->add_control(
				'show_gitHub',
				array(
					'type'     => 'checkbox',
					'section'  => 'gitHub',
					'priority' => 10,
					'label'    => __( 'Show', 'edmonton' ),
				)
			);

			$wp_customize->add_setting(
				'url_gitHub',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => 'https://www.github.com/',
				)
			);

			$wp_customize->add_control(
				'url_gitHub',
				array(
					'type'     		=> 'url',
					'section'  		=> 'gitHub',
					'priority' 		=> 10,
					'label'    		=> __( 'URL', 'edmonton' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				)
			);

			$wp_customize->add_setting(
				'icon_gitHub',
				array(
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Image_Control (
					$wp_customize,
					'icon_gitHub',
					[
						'type'     		=> 'image',
						'section'  		=> 'gitHub',
						'priority' 		=> 10,
						'label'    		=> __( 'Icon', 'edmonton' ),
					]
				)
			);

			/* Show Instagram ----------------------------------------------- */

			$wp_customize->add_section(
				'instagram',
				array(
					'title'      => __( 'Instagram', 'edmonton' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				)
			);

			$wp_customize->add_setting(
				'show_instagram',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => true,
					'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
				)
			);

			$wp_customize->add_control(
				'show_instagram',
				array(
					'type'     => 'checkbox',
					'section'  => 'instagram',
					'priority' => 10,
					'label'    => __( 'Show', 'edmonton' ),
				)
			);

			$wp_customize->add_setting(
				'url_instagram',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => 'https://instagram.com/',
				)
			);

			$wp_customize->add_control(
				'url_instagram',
				array(
					'type'     		=> 'url',
					'section'  		=> 'instagram',
					'priority' 		=> 10,
					'label'    		=> __( 'URL', 'edmonton' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				)
			);

			$wp_customize->add_setting(
				'icon_instagram',
				array(
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Image_Control (
					$wp_customize,
					'icon_instagram',
					[
						'type'     		=> 'image',
						'section'  		=> 'instagram',
						'priority' 		=> 10,
						'label'    		=> __( 'Icon', 'edmonton' ),
					]
				)
			);

			/* Show LinkedIn ----------------------------------------------- */

			$wp_customize->add_section(
				'linkedIn',
				array(
					'title'      => __( 'LinkedIn', 'edmonton' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				)
			);

			$wp_customize->add_setting(
				'show_linkedIn',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => false,
					'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
				)
			);

			$wp_customize->add_control(
				'show_linkedIn',
				array(
					'type'     => 'checkbox',
					'section'  => 'linkedIn',
					'priority' => 10,
					'label'    => __( 'Show', 'edmonton' ),
				)
			);

			$wp_customize->add_setting(
				'url_linkedIn',
				array(
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				'url_linkedIn',
				array(
					'type'     		=> 'url',
					'section'  		=> 'linkedIn',
					'priority' 		=> 10,
					'label'    		=> __( 'URL', 'edmonton' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				)
			);

			$wp_customize->add_setting(
				'icon_linkedIn',
				array(
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Image_Control (
					$wp_customize,
					'icon_linkedIn',
					[
						'type'     		=> 'image',
						'section'  		=> 'linkedIn',
						'priority' 		=> 10,
						'label'    		=> __( 'Icon', 'edmonton' ),
					]
				)
			);

			/* Show Pinterest ----------------------------------------------- */

			$wp_customize->add_section(
				'pinterest',
				array(
					'title'      => __( 'Pinterest', 'edmonton' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				)
			);

			$wp_customize->add_setting(
				'show_pinterest',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => true,
					'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
				)
			);

			$wp_customize->add_control(
				'show_pinterest',
				array(
					'type'     => 'checkbox',
					'section'  => 'pinterest',
					'priority' => 10,
					'label'    => __( 'Show', 'edmonton' ),
				)
			);

			$wp_customize->add_setting(
				'url_pinterest',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => 'https://pinterest.com/',
				)
			);

			$wp_customize->add_control(
				'url_pinterest',
				array(
					'type'     		=> 'url',
					'section'  		=> 'pinterest',
					'priority' 		=> 10,
					'label'    		=> __( 'URL', 'edmonton' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				)
			);

			$wp_customize->add_setting(
				'icon_pinterest',
				array(
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Image_Control (
					$wp_customize,
					'icon_pinterest',
					[
						'type'     		=> 'image',
						'section'  		=> 'pinterest',
						'priority' 		=> 10,
						'label'    		=> __( 'Icon', 'edmonton' ),
					]
				)
			);

			/* Show Snapchat ----------------------------------------------- */

			$wp_customize->add_section(
				'snapchat',
				array(
					'title'      => __( 'Snapchat', 'edmonton' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				)
			);

			$wp_customize->add_setting(
				'show_snapchat',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => false,
					'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
				)
			);

			$wp_customize->add_control(
				'show_snapchat',
				array(
					'type'     => 'checkbox',
					'section'  => 'snapchat',
					'priority' => 10,
					'label'    => __( 'Show', 'edmonton' ),
				)
			);

			$wp_customize->add_setting(
				'url_snapchat',
				array(
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				'url_snapchat',
				array(
					'type'     		=> 'url',
					'section'  		=> 'snapchat',
					'priority' 		=> 10,
					'label'    		=> __( 'URL', 'edmonton' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				)
			);

			$wp_customize->add_setting(
				'icon_snapchat',
				array(
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Image_Control (
					$wp_customize,
					'icon_snapchat',
					[
						'type'     		=> 'image',
						'section'  		=> 'snapchat',
						'priority' 		=> 10,
						'label'    		=> __( 'Icon', 'edmonton' ),
					]
				)
			);

			/* Show Telegram ----------------------------------------------- */

			$wp_customize->add_section(
				'telegram',
				array(
					'title'      => __( 'Telegram', 'edmonton' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				)
			);

			$wp_customize->add_setting(
				'show_telegram',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => false,
					'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
				)
			);

			$wp_customize->add_control(
				'show_telegram',
				array(
					'type'     => 'checkbox',
					'section'  => 'telegram',
					'priority' => 10,
					'label'    => __( 'Show', 'edmonton' ),
				)
			);

			$wp_customize->add_setting(
				'url_telegram',
				array(
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				'url_telegram',
				array(
					'type'     		=> 'url',
					'section'  		=> 'telegram',
					'priority' 		=> 10,
					'label'    		=> __( 'URL', 'edmonton' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				)
			);

			$wp_customize->add_setting(
				'icon_telegram',
				array(
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Image_Control (
					$wp_customize,
					'icon_telegram',
					[
						'type'     		=> 'image',
						'section'  		=> 'telegram',
						'priority' 		=> 10,
						'label'    		=> __( 'Icon', 'edmonton' ),
					]
				)
			);

			/* Show TikTok ----------------------------------------------- */

			$wp_customize->add_section(
				'tikTok',
				array(
					'title'      => __( 'TikTok', 'edmonton' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				)
			);

			$wp_customize->add_setting(
				'show_tikTok',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => false,
					'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
				)
			);

			$wp_customize->add_control(
				'show_tikTok',
				array(
					'type'     => 'checkbox',
					'section'  => 'tikTok',
					'priority' => 10,
					'label'    => __( 'Show', 'edmonton' ),
				)
			);

			$wp_customize->add_setting(
				'url_tikTok',
				array(
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				'url_tikTok',
				array(
					'type'     		=> 'url',
					'section'  		=> 'tikTok',
					'priority' 		=> 10,
					'label'    		=> __( 'URL', 'edmonton' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				)
			);

			$wp_customize->add_setting(
				'icon_tikTok',
				array(
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Image_Control (
					$wp_customize,
					'icon_tikTok',
					[
						'type'     		=> 'image',
						'section'  		=> 'tikTok',
						'priority' 		=> 10,
						'label'    		=> __( 'Icon', 'edmonton' ),
					]
				)
			);

			/* Show Tumblr ----------------------------------------------- */

			$wp_customize->add_section(
				'tumblr',
				array(
					'title'      => __( 'Tumblr', 'edmonton' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				)
			);

			$wp_customize->add_setting(
				'show_tumblr',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => false,
					'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
				)
			);

			$wp_customize->add_control(
				'show_tumblr',
				array(
					'type'     => 'checkbox',
					'section'  => 'tumblr',
					'priority' => 10,
					'label'    => __( 'Show', 'edmonton' ),
				)
			);

			$wp_customize->add_setting(
				'url_tumblr',
				array(
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				'url_tumblr',
				array(
					'type'     		=> 'url',
					'section'  		=> 'tumblr',
					'priority' 		=> 10,
					'label'    		=> __( 'URL', 'edmonton' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				)
			);

			$wp_customize->add_setting(
				'icon_tumblr',
				array(
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Image_Control (
					$wp_customize,
					'icon_tumblr',
					[
						'type'     		=> 'image',
						'section'  		=> 'tumblr',
						'priority' 		=> 10,
						'label'    		=> __( 'Icon', 'edmonton' ),
					]
				)
			);

			/* Show Twitter ----------------------------------------------- */

			$wp_customize->add_section(
				'twitter',
				array(
					'title'      => __( 'Twitter', 'edmonton' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				)
			);

			$wp_customize->add_setting(
				'show_twitter',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => true,
					'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
				)
			);

			$wp_customize->add_control(
				'show_twitter',
				array(
					'type'     => 'checkbox',
					'section'  => 'twitter',
					'priority' => 10,
					'label'    => __( 'Show', 'edmonton' ),
				)
			);

			$wp_customize->add_setting(
				'url_twitter',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => 'https://twitter.com/',
				)
			);

			$wp_customize->add_control(
				'url_twitter',
				array(
					'type'     		=> 'url',
					'section'  		=> 'twitter',
					'priority' 		=> 10,
					'label'    		=> __( 'URL', 'edmonton' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				)
			);

			$wp_customize->add_setting(
				'icon_twitter',
				array(
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Image_Control (
					$wp_customize,
					'icon_twitter',
					[
						'type'     		=> 'image',
						'section'  		=> 'twitter',
						'priority' 		=> 10,
						'label'    		=> __( 'Icon', 'edmonton' ),
					]
				)
			);

			/* Show Viber ----------------------------------------------- */

			$wp_customize->add_section(
				'viber',
				array(
					'title'      => __( 'Viber', 'edmonton' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				)
			);

			$wp_customize->add_setting(
				'show_viber',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => false,
					'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
				)
			);

			$wp_customize->add_control(
				'show_viber',
				array(
					'type'     => 'checkbox',
					'section'  => 'viber',
					'priority' => 10,
					'label'    => __( 'Show', 'edmonton' ),
				)
			);

			$wp_customize->add_setting(
				'url_viber',
				array(
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				'url_viber',
				array(
					'type'     		=> 'url',
					'section'  		=> 'viber',
					'priority' 		=> 10,
					'label'    		=> __( 'URL', 'edmonton' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				)
			);

			$wp_customize->add_setting(
				'icon_viber',
				array(
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Image_Control (
					$wp_customize,
					'icon_viber',
					[
						'type'     		=> 'image',
						'section'  		=> 'viber',
						'priority' 		=> 10,
						'label'    		=> __( 'Icon', 'edmonton' ),
					]
				)
			);

			/* Show Wattpad ----------------------------------------------- */

			$wp_customize->add_section(
				'wattpad',
				array(
					'title'      => __( 'Wattpad', 'edmonton' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				)
			);

			$wp_customize->add_setting(
				'show_wattpad',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => false,
					'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
				)
			);

			$wp_customize->add_control(
				'show_wattpad',
				array(
					'type'     => 'checkbox',
					'section'  => 'wattpad',
					'priority' => 10,
					'label'    => __( 'Show', 'edmonton' ),
				)
			);

			$wp_customize->add_setting(
				'url_wattpad',
				array(
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				'url_wattpad',
				array(
					'type'     		=> 'url',
					'section'  		=> 'wattpad',
					'priority' 		=> 10,
					'label'    		=> __( 'URL', 'edmonton' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				)
			);

			$wp_customize->add_setting(
				'icon_wattpad',
				array(
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Image_Control (
					$wp_customize,
					'icon_wattpad',
					[
						'type'     		=> 'image',
						'section'  		=> 'wattpad',
						'priority' 		=> 10,
						'label'    		=> __( 'Icon', 'edmonton' ),
					]
				)
			);

			/* Show WhatsApp ----------------------------------------------- */

			$wp_customize->add_section(
				'whatsApp',
				array(
					'title'      => __( 'WhatsApp', 'edmonton' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				)
			);

			$wp_customize->add_setting(
				'show_whatsApp',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => false,
					'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
				)
			);

			$wp_customize->add_control(
				'show_whatsApp',
				array(
					'type'     => 'checkbox',
					'section'  => 'whatsApp',
					'priority' => 10,
					'label'    => __( 'Show', 'edmonton' ),
				)
			);

			$wp_customize->add_setting(
				'url_whatsApp',
				array(
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				'url_whatsApp',
				array(
					'type'     		=> 'url',
					'section'  		=> 'whatsApp',
					'priority' 		=> 10,
					'label'    		=> __( 'URL', 'edmonton' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				)
			);

			$wp_customize->add_setting(
				'icon_whatsApp',
				array(
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Image_Control (
					$wp_customize,
					'icon_whatsApp',
					[
						'type'     		=> 'image',
						'section'  		=> 'whatsApp',
						'priority' 		=> 10,
						'label'    		=> __( 'Icon', 'edmonton' ),
					]
				)
			);

			/* Show YouTube ----------------------------------------------- */

			$wp_customize->add_section(
				'youTube',
				array(
					'title'      => __( 'YouTube', 'edmonton' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				)
			);

			$wp_customize->add_setting(
				'show_youTube',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => true,
					'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
				)
			);

			$wp_customize->add_control(
				'show_youTube',
				array(
					'type'     => 'checkbox',
					'section'  => 'youTube',
					'priority' => 10,
					'label'    => __( 'Show', 'edmonton' ),
				)
			);

			$wp_customize->add_setting(
				'url_youTube',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => 'https://youtube.com/',
				)
			);

			$wp_customize->add_control(
				'url_youTube',
				array(
					'type'     		=> 'url',
					'section'  		=> 'youTube',
					'priority' 		=> 10,
					'label'    		=> __( 'URL', 'edmonton' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				)
			);

			$wp_customize->add_setting(
				'icon_youTube',
				array(
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Image_Control (
					$wp_customize,
					'icon_youTube',
					[
						'type'     		=> 'image',
						'section'  		=> 'youTube',
						'priority' 		=> 10,
						'label'    		=> __( 'Icon', 'edmonton' ),
					]
				)
			);

			/* Show ВКонтакте ----------------------------------------------- */

			$wp_customize->add_section(
				'vK',
				array(
					'title'      => __( 'ВКонтакте', 'edmonton' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				)
			);

			$wp_customize->add_setting(
				'show_vK',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => false,
					'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
				)
			);

			$wp_customize->add_control(
				'show_vK',
				array(
					'type'     => 'checkbox',
					'section'  => 'vK',
					'priority' => 10,
					'label'    => __( 'Show', 'edmonton' ),
				)
			);

			$wp_customize->add_setting(
				'url_vK',
				array(
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				'url_vK',
				array(
					'type'     		=> 'url',
					'section'  		=> 'vK',
					'priority' 		=> 10,
					'label'    		=> __( 'URL', 'edmonton' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				)
			);

			$wp_customize->add_setting(
				'icon_vK',
				array(
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Image_Control (
					$wp_customize,
					'icon_vK',
					[
						'type'     		=> 'image',
						'section'  		=> 'vK',
						'priority' 		=> 10,
						'label'    		=> __( 'Icon', 'edmonton' ),
					]
				)
			);

			/* Show Одноклассники ----------------------------------------------- */

			$wp_customize->add_section(
				'oK',
				array(
					'title'      => __( 'Одноклассники', 'edmonton' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				)
			);

			$wp_customize->add_setting(
				'show_oK',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => false,
					'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
				)
			);

			$wp_customize->add_control(
				'show_oK',
				array(
					'type'     => 'checkbox',
					'section'  => 'oK',
					'priority' => 10,
					'label'    => __( 'Show', 'edmonton' ),
				)
			);

			$wp_customize->add_setting(
				'url_oK',
				array(
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				'url_oK',
				array(
					'type'     		=> 'url',
					'section'  		=> 'oK',
					'priority' 		=> 10,
					'label'    		=> __( 'URL', 'edmonton' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				)
			);

			$wp_customize->add_setting(
				'icon_oK',
				array(
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Image_Control (
					$wp_customize,
					'icon_oK',
					[
						'type'     		=> 'image',
						'section'  		=> 'oK',
						'priority' 		=> 10,
						'label'    		=> __( 'Icon', 'edmonton' ),
					]
				)
			);

			/**
			 * Theme Options
			 */

			$wp_customize->add_section(
				'options',
				array(
					'title'      => __( 'Theme Options', 'edmonton' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
				)
			);

			/* Show facebook ----------------------------------------------- */

			$wp_customize->add_setting(
				'enable_header_search',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => true,
					'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
				)
			);

			$wp_customize->add_control(
				'enable_header_search',
				array(
					'type'     => 'checkbox',
					'section'  => 'options',
					'priority' => 10,
					'label'    => __( 'Show facebook', 'edmonton' ),
				)
			);

			/* Show author bio ---------------------------------------------------- */

			$wp_customize->add_setting(
				'show_author_bio',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => true,
					'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
				)
			);

			$wp_customize->add_control(
				'show_author_bio',
				array(
					'type'     => 'checkbox',
					'section'  => 'options',
					'priority' => 10,
					'label'    => __( 'Show author bio', 'edmonton' ),
				)
			);

			/* Display full content or excerpts on the blog and archives --------- */

			$wp_customize->add_setting(
				'blog_content',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => 'full',
					'sanitize_callback' => array( __CLASS__, 'sanitize_select' ),
				)
			);

			$wp_customize->add_control(
				'blog_content',
				array(
					'type'     => 'radio',
					'section'  => 'options',
					'priority' => 10,
					'label'    => __( 'On archive pages, posts show:', 'edmonton' ),
					'choices'  => array(
						'full'    => __( 'Full text', 'edmonton' ),
						'summary' => __( 'Summary', 'edmonton' ),
					),
				)
			);

			/**
			 * Template: Cover Template.
			 */
			$wp_customize->add_section(
				'cover_template_options',
				array(
					'title'       => __( 'Cover Template', 'edmonton' ),
					'capability'  => 'edit_theme_options',
					'description' => __( 'Settings for the "Cover Template" page template. Add a featured image to use as background.', 'edmonton' ),
					'priority'    => 42,
				)
			);

			/* Overlay Fixed Background ------ */

			$wp_customize->add_setting(
				'cover_template_fixed_background',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => true,
					'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				'cover_template_fixed_background',
				array(
					'type'        => 'checkbox',
					'section'     => 'cover_template_options',
					'label'       => __( 'Fixed Background Image', 'edmonton' ),
					'description' => __( 'Creates a parallax effect when the visitor scrolls.', 'edmonton' ),
				)
			);

			$wp_customize->selective_refresh->add_partial(
				'cover_template_fixed_background',
				array(
					'selector' => '.cover-header',
					'type'     => 'cover_fixed',
				)
			);

			/* Separator --------------------- */

			$wp_customize->add_setting(
				'cover_template_separator_1',
				array(
					'sanitize_callback' => 'wp_filter_nohtml_kses',
				)
			);

			$wp_customize->add_control(
				new TwentyTwenty_Separator_Control(
					$wp_customize,
					'cover_template_separator_1',
					array(
						'section' => 'cover_template_options',
					)
				)
			);

			/* Overlay Background Color ------ */

			$wp_customize->add_setting(
				'cover_template_overlay_background_color',
				array(
					'default'           => edmonton_get_color_for_area( 'content', 'accent' ),
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'cover_template_overlay_background_color',
					array(
						'label'       => __( 'Overlay Background Color', 'edmonton' ),
						'description' => __( 'The color used for the overlay. Defaults to the accent color.', 'edmonton' ),
						'section'     => 'cover_template_options',
					)
				)
			);

			/* Overlay Text Color ------------ */

			$wp_customize->add_setting(
				'cover_template_overlay_text_color',
				array(
					'default'           => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'cover_template_overlay_text_color',
					array(
						'label'       => __( 'Overlay Text Color', 'edmonton' ),
						'description' => __( 'The color used for the text in the overlay.', 'edmonton' ),
						'section'     => 'cover_template_options',
					)
				)
			);

			/* Overlay Color Opacity --------- */

			$wp_customize->add_setting(
				'cover_template_overlay_opacity',
				array(
					'default'           => 80,
					'sanitize_callback' => 'absint',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				'cover_template_overlay_opacity',
				array(
					'label'       => __( 'Overlay Opacity', 'edmonton' ),
					'description' => __( 'Make sure that the contrast is high enough so that the text is readable.', 'edmonton' ),
					'section'     => 'cover_template_options',
					'type'        => 'range',
					'input_attrs' => edmonton_customize_opacity_range(),
				)
			);

			$wp_customize->selective_refresh->add_partial(
				'cover_template_overlay_opacity',
				array(
					'selector' => '.cover-color-overlay',
					'type'     => 'cover_opacity',
				)
			);
		}

		/**
		 * Sanitization callback for the "accent_accessible_colors" setting.
		 *
		 * @static
		 * @access public
		 * @since Edmonton 1.0
		 * @param array $value The value we want to sanitize.
		 * @return array Returns sanitized value. Each item in the array gets sanitized separately.
		 */
		public static function sanitize_accent_accessible_colors( $value ) {

			// Make sure the value is an array. Do not typecast, use empty array as fallback.
			$value = is_array( $value ) ? $value : array();

			// Loop values.
			foreach ( $value as $area => $values ) {
				foreach ( $values as $context => $color_val ) {
					$value[ $area ][ $context ] = sanitize_hex_color( $color_val );
				}
			}

			return $value;
		}

		/**
		 * Sanitize select.
		 *
		 * @param string $input The input from the setting.
		 * @param object $setting The selected setting.
		 * @return string The input from the setting or the default setting.
		 */
		public static function sanitize_select( $input, $setting ) {
			$input   = sanitize_key( $input );
			$choices = $setting->manager->get_control( $setting->id )->choices;
			return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
		}

		/**
		 * Sanitize boolean for checkbox.
		 *
		 * @param bool $checked Whether or not a box is checked.
		 * @return bool
		 */
		public static function sanitize_checkbox( $checked ) {
			return ( ( isset( $checked ) && true === $checked ) ? true : false );
		}

	}

	// Setup the Theme Customizer settings and controls.
	add_action( 'customize_register', array( 'Edmonton_Customize', 'register' ) );

}

/**
 * PARTIAL REFRESH FUNCTIONS
 * */
if ( ! function_exists( 'edmonton_customize_partial_blogname' ) ) {
	/**
	 * Render the site title for the selective refresh partial.
	 */
	function edmonton_customize_partial_blogname() {
		bloginfo( 'name' );
	}
}

if ( ! function_exists( 'edmonton_customize_partial_blogdescription' ) ) {
	/**
	 * Render the site description for the selective refresh partial.
	 */
	function edmonton_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}
}

if ( ! function_exists( 'edmonton_customize_partial_site_logo' ) ) {
	/**
	 * Render the site logo for the selective refresh partial.
	 *
	 * Doing it this way so we don't have issues with `render_callback`'s arguments.
	 */
	function edmonton_customize_partial_site_logo() {
		edmonton_site_logo();
	}
}


/**
 * Input attributes for cover overlay opacity option.
 *
 * @return array Array containing attribute names and their values.
 */
function edmonton_customize_opacity_range() {
	/**
	 * Filter the input attributes for opacity
	 *
	 * @param array $attrs {
	 *     The attributes
	 *
	 *     @type int $min Minimum value
	 *     @type int $max Maximum value
	 *     @type int $step Interval between numbers
	 * }
	 */
	return apply_filters(
		'edmonton_customize_opacity_range',
		array(
			'min'  => 0,
			'max'  => 90,
			'step' => 5,
		)
	);
}
