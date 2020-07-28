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
		 */
		public static function register() {

			/**
			 * Header
			 */

			Kirki::add_panel( 
				'header', 
				[
					'title'          => esc_html__( 'Header', 'kirki' ),
					'priority'       => 90,
				] 
			);

			/** Header General ------------------------------------------------------ */

			Kirki::add_section( 
				'header_general', 
				[
					'title'          => esc_html__( 'General', 'kirki' ),
					'description'    => esc_html__( 'General description.', 'kirki' ),
					'panel'          => 'header',
				]
			);

			Kirki::add_config( 
				'header_general_font', 
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field( 
				'header_general_font', 
				[
				'type'        => 'typography',
				'settings'    => 'header_general_font',
				'label'       => esc_html__( 'Font Style', 'kirki' ),
				'section'     => 'header_general',
				'default'     => [
					'font-family'    => 'Roboto',
					'variant'        => 'regular',
					'font-size'      => '16px',
					'color'          => '#ffffff',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.site-description',
					],
				],
			] );

			Kirki::add_config( 
				'header_general_color', 
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field( 
				'header_general_color', 
				[
					'type'      => 'color',
					'settings'  => 'title_text',
					'label'     => esc_attr__( 'Header color', 'text-domain' ),
					'section'   => 'header_general',
					'settings'  => 'header_general_color',
					'default'   => '#202020',
					'transport' => 'auto',
					'output'    => [
						[
							'element' => '#site-header',
							'property' => 'background-color'
						],
					],
				]
			);

			Kirki::add_config( 
				'header_general_border_bottom_color', 
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field( 
				'header_general_border_bottom_color', 
				[
					'type'      => 'color',
					'label'     => esc_attr__( 'Bottom border color', 'text-domain' ),
					'section'   => 'header_general',
					'settings'  => 'header_general_border_bottom_color',
					'default'   => '#303030',
					'transport' => 'auto',
					'output'    => [
						[
							'element' => '#site-header',
							'property' => 'border-bottom-color'
						],
					],
				]
			);

			Kirki::add_config( 
				'header_general_border_bottom_width', 
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field( 
				'header_general_border_bottom_width', 
				[
					'type'      => 'slider',
					'label'     => esc_attr__( 'Bottom border width', 'text-domain' ),
					'section'   => 'header_general',
					'settings'  => 'header_general_border_bottom_width',
					'default'     => 1,
					'transport' => 'auto',
					'output'    => [
						[
							'element' => '#site-header',
							'property' => 'border-bottom-width',
							'suffix'  => 'px',
						],
					],
					'choices'     => [
						'min'  => 0,
						'max'  => 5,
						'step' => 1,
					],
				]
			);

			Kirki::add_config( 
				'header_logo_position', 
				[
					'capability'    => 'edit_theme_options',
					'transport'     => 'postMessage',
				]
			);

			Kirki::add_field( 
				'header_logo_position', 
				[
					'type'      => 'radio-image',
					'label'     => esc_attr__( 'Layout', 'text-domain' ),
					'section'   => 'header_general',
					'settings'  => 'header_logo_position',
					'default'	=> 'center',
					'choices'   => [
						'left' => [
							'title' => esc_attr__( 'Logo Left' ),
							'path'  => '<svg width="85" height="57" viewBox="0 0 85 57" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="85" height="57" transform="matrix(-1 0 0 1 85 0)" fill="none"/><path d="M84.7214 28.5V57H42.371H0.0206504V28.5V-1.22935e-07H42.371H84.7214V28.5ZM0.867658 11.1537V21.463H42.371H83.8744V11.1537V0.844444H42.371H0.867658V11.1537ZM0.867658 39.0907V56.1556H42.371H83.8744V39.0907V22.0259H42.371H0.867658V39.0907Z" fill="#004BA4"/><path d="M23.8992 7.34667C24.0404 7.48037 24.238 7.76186 24.3368 7.98L24.5133 8.38111V11.407V14.44L24.3015 14.8833C24.1745 15.1437 23.991 15.397 23.8498 15.5096L23.6027 15.6926H15.655H7.70724L7.4602 15.5096C7.31903 15.397 7.13551 15.1437 7.00846 14.8833L6.79671 14.44V11.4V8.36L7.00846 7.91667C7.13551 7.6563 7.31903 7.40297 7.4602 7.29037L7.70724 7.10741H15.6691H23.638L23.8992 7.34667Z" fill="#004BA4"/><path d="M79.357 9.9926C79.4135 10.0207 79.5476 10.0841 79.6535 10.1193C79.9923 10.253 80.0981 10.5133 80.0981 11.1889C80.0981 11.7237 80.077 11.8152 79.9217 12.0193C79.8229 12.1389 79.6323 12.2726 79.4982 12.3148C79.3217 12.3711 72.3551 12.3852 55.6267 12.3711L31.9952 12.35L31.7693 12.1248C31.5505 11.8996 31.5435 11.8856 31.5435 11.2382C31.5364 10.4641 31.6211 10.253 32.0093 10.0559C32.2634 9.92223 32.7787 9.92223 55.7608 9.92926C68.6777 9.92926 79.3005 9.95741 79.357 9.9926Z" fill="#004BA4"/></svg>',
						],
						'center' => [
							'title' => esc_attr__( 'Logo Center' ),
							'path'	=> '<svg width="85" height="57" viewBox="0 0 85 57" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="85" height="57" transform="matrix(-1 0 0 1 85 0)" fill="none"/><path d="M84.7214 28.5V57H42.371H0.0206504V28.5V-1.22935e-07H42.371H84.7214V28.5ZM0.867658 11.1537V21.463H42.371H83.8744V11.1537V0.844444H42.371H0.867658V11.1537ZM0.867658 39.0907V56.1556H42.371H83.8744V39.0907V22.0259H42.371H0.867658V39.0907Z" fill="#004BA4"/><path d="M50.1025 4.23926C50.2436 4.37297 50.4413 4.65445 50.5401 4.8726L50.7166 5.27371V8.29963V11.3326L50.5048 11.7759C50.3777 12.0363 50.1942 12.2896 50.0531 12.4022L49.806 12.5852H41.8583H33.9105L33.6635 12.4022C33.5223 12.2896 33.3388 12.0363 33.2117 11.7759L33 11.3326V8.2926V5.2526L33.2117 4.80926C33.3388 4.54889 33.5223 4.29556 33.6635 4.18297L33.9105 4H41.8724H49.8413L50.1025 4.23926Z" fill="#004BA4"/><path d="M65.814 15.0657C65.8704 15.0939 66.0045 15.1572 66.1104 15.1924C66.4492 15.3261 66.5551 15.5865 66.5551 16.262C66.5551 16.7968 66.5339 16.8883 66.3786 17.0924C66.2798 17.212 66.0892 17.3457 65.9551 17.3879C65.7787 17.4442 58.812 17.4583 42.0836 17.4442L18.4521 17.4231L18.2263 17.1979C18.0075 16.9728 18.0004 16.9587 18.0004 16.3113C17.9933 15.5372 18.078 15.3261 18.4663 15.129C18.7204 14.9953 19.2356 14.9953 42.2177 15.0024C55.1346 15.0024 65.7575 15.0305 65.814 15.0657Z" fill="#004BA4"/></svg>',
						],
						'right' => [
							'title' => esc_attr__( 'Logo Right' ),
							'path'  => '<svg width="85" height="57" viewBox="0 0 85 57" fill="none" xmlns="http://www.w3.org/2000/svg" id="first-layout"><rect width="85" height="57" fill="none"/><path d="M0.278625 28.5V57H42.629H84.9793V28.5V-1.22935e-07H42.629H0.278625V28.5ZM84.1323 11.1537V21.463H42.629H1.12563V11.1537V0.844444H42.629H84.1323V11.1537ZM84.1323 39.0907V56.1556H42.629H1.12563V39.0907V22.0259H42.629H84.1323V39.0907Z" fill="#004BA4"/><path d="M61.1008 7.34667C60.9596 7.48037 60.762 7.76186 60.6632 7.98L60.4867 8.38111V11.407V14.44L60.6985 14.8833C60.8255 15.1437 61.009 15.397 61.1502 15.5096L61.3973 15.6926H69.345H77.2928L77.5398 15.5096C77.681 15.397 77.8645 15.1437 77.9915 14.8833L78.2033 14.44V11.4V8.36L77.9915 7.91667C77.8645 7.6563 77.681 7.40297 77.5398 7.29037L77.2928 7.10741H69.3309H61.362L61.1008 7.34667Z" fill="#004BA4"/><path d="M5.64299 9.9926C5.58652 10.0207 5.45241 10.0841 5.34653 10.1193C5.00773 10.253 4.90186 10.5133 4.90186 11.1889C4.90186 11.7237 4.92303 11.8152 5.07832 12.0193C5.17713 12.1389 5.36771 12.2726 5.50182 12.3148C5.67828 12.3711 12.6449 12.3852 29.3733 12.3711L53.0048 12.35L53.2307 12.1248C53.4495 11.8996 53.4565 11.8856 53.4565 11.2382C53.4636 10.4641 53.3789 10.253 52.9907 10.0559C52.7366 9.92223 52.2213 9.92223 29.2392 9.92926C16.3223 9.92926 5.69945 9.95741 5.64299 9.9926Z" fill="#004BA4"/></svg>',
						],
					],
				]
			);	

			/** Header Navigation --------------------------------------------------------------------- */
			Kirki::add_section( 
				'header_navigation', 
				[
					'title'          => esc_html__( 'Navigation', 'kirki' ),
					'description'    => esc_html__( 'Navigation description.', 'kirki' ),
					'panel'          => 'header',
				]
			);

			Kirki::add_config( 
				'header_navigation_font', 
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field( 
				'header_navigation_font', 
				[
					'type'        => 'typography',
					'settings'    => 'header_navigation_font',
					'label'       => esc_html__( 'Font Style', 'kirki' ),
					'section'     => 'header_navigation',
					'default'     => [
						'font-family'    => 'Roboto',
						'variant'        => 'regular',
						'font-size'      => '14px',
						'color'          => '#ffffff',
					],
					'transport'   => 'auto',
					'output'      => [
						[
							'element' => '.primary-menu li',
						],
						[
							'element' => '.primary-menu li a, .primary-menu .icon',
							'suffix'  => '!important',
						],
					],
				] 
			);

			Kirki::add_config( 
				'header_navigation_color', 
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field( 
				'header_navigation_color', 
				[
					'type'      => 'color',
					'settings'  => 'title_text',
					'label'     => esc_attr__( 'Navigation color', 'text-domain' ),
					'section'   => 'header_navigation',
					'settings'  => 'header_navigation_color',
					'default'   => '#202020',
					'transport' => 'auto',
					'output'    => [
						[
							'element' => '.primary-menu-wrapper',
							'property' => 'background-color'
						],
					],
				]
			);

			Kirki::add_config( 
				'header_navigation_border_top_color', 
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field( 
				'header_navigation_border_top_color', 
				[
					'type'      => 'color',
					'label'     => esc_attr__( 'Border top color', 'text-domain' ),
					'section'   => 'header_navigation',
					'settings'  => 'header_navigation_border_top_color',
					'default'   => '#000000',
					'transport' => 'auto',
					'output'    => [
						[
							'element' => 'nav.primary-menu-wrapper',
							'property' => 'border-top-color'
						],
					],
				]
			);

			Kirki::add_config( 
				'header_navigation_border_top_width', 
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field( 
				'header_navigation_border_top_width', 
				[
					'type'      => 'slider',
					'label'     => esc_attr__( 'Border top width', 'text-domain' ),
					'section'   => 'header_navigation',
					'settings'  => 'header_navigation_border_top_width',
					'default'     => 1,
					'transport' => 'auto',
					'output'    => [
						[
							'element' => 'nav.primary-menu-wrapper',
							'property' => 'border-top-width',
							'suffix'  => 'px',
						],
					],
					'choices'     => [
						'min'  => 0,
						'max'  => 10,
						'step' => 1,
					],
				]
			);

			Kirki::add_config( 
				'header_navigation_border_bottom_color', 
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field( 
				'header_navigation_border_bottom_color', 
				[
					'type'      => 'color',
					'label'     => esc_attr__( 'Border bottom color', 'text-domain' ),
					'section'   => 'header_navigation',
					'settings'  => 'header_navigation_border_bottom_color',
					'default'   => '#000000',
					'transport' => 'auto',
					'output'    => [
						[
							'element' => 'nav.primary-menu-wrapper',
							'property' => 'border-bottom-color'
						],
					],
				]
			);

			Kirki::add_config( 
				'header_navigation_border_bottom_width', 
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field( 
				'header_navigation_border_bottom_width', 
				[
					'type'      => 'slider',
					'label'     => esc_attr__( 'Border bottom width', 'text-domain' ),
					'section'   => 'header_navigation',
					'settings'  => 'header_navigation_border_bottom_width',
					'default'     => 0,
					'transport' => 'auto',
					'output'    => [
						[
							'element' => 'nav.primary-menu-wrapper',
							'property' => 'border-bottom-width',
							'suffix'  => 'px',
						],
					],
					'choices'     => [
						'min'  => 0,
						'max'  => 10,
						'step' => 1,
					],
				]
			);

			Kirki::add_config( 
				'header_navigation_left_side_separator_color', 
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field( 
				'header_navigation_left_side_separator_color', 
				[
					'type'      => 'color',
					'label'     => esc_attr__( 'Left side of separator color', 'text-domain' ),
					'section'   => 'header_navigation',
					'settings'  => 'header_navigation_left_side_separator_color',
					'default'   => '#000000',
					'transport' => 'auto',
					'output'    => [
						[
							'element' => 'ul.primary-menu > li',
							'property' => 'border-left-color'
						],
					],
				]
			);

			Kirki::add_config( 
				'header_navigation_left_side_separator_width', 
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field( 
				'header_navigation_left_side_separator_width', 
				[
					'type'      => 'slider',
					'label'     => esc_attr__( 'Left side of separator width', 'text-domain' ),
					'section'   => 'header_navigation',
					'settings'  => 'header_navigation_left_side_separator_width',
					'default'     => 1,
					'transport' => 'auto',
					'output'    => [
						[
							'element' 	=> 'ul.primary-menu > li',
							'property'  => 'border-left-width',
							'suffix'    => 'px',
							'exclude'   => '.primary-menu > li:first-child',
						],
					],
					'choices'     => [
						'min'  => 0,
						'max'  => 5,
						'step' => 1,
					],
				]
			);

			Kirki::add_config( 
				'header_navigation_right_side_separator_color', 
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field( 
				'header_navigation_right_side_separator_color', 
				[
					'type'      => 'color',
					'label'     => esc_attr__( 'Right side of separator color', 'text-domain' ),
					'section'   => 'header_navigation',
					'settings'  => 'header_navigation_right_side_separator_color',
					'default'   => '#303030',
					'transport' => 'auto',
					'output'    => [
						[
							'element' => 'ul.primary-menu > li',
							'property' => 'border-right-color'
						],
					],
				]
			);

			Kirki::add_config( 
				'header_navigation_right_side_separator_width', 
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field( 
				'header_navigation_right_side_separator_width', 
				[
					'type'      => 'slider',
					'label'     => esc_attr__( 'Right side of separator width', 'text-domain' ),
					'section'   => 'header_navigation',
					'settings'  => 'header_navigation_right_side_separator_width',
					'default'     => 1,
					'transport' => 'auto',
					'output'    => [
						[
							'element' 	=> 'ul.primary-menu > li',
							'property'  => 'border-right-width',
							'suffix'    => 'px',
							'exclude'   => '.primary-menu > li:first-child',
						],
					],
					'choices'     => [
						'min'  => 0,
						'max'  => 5,
						'step' => 1,
					],
				]
			);

			/** Header Bar ----------------------------------------------------------------- */

			Kirki::add_section( 
				'header_bar', 
				[
					'title'          => esc_html__( 'Bar', 'kirki' ),
					'description'    => esc_html__( 'Bar description.', 'kirki' ),
					'panel'          => 'header',
				]
			);

			Kirki::add_config( 
				'header_bar_font', 
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field( 
				'header_bar_font', 
				[
					'type'        => 'typography',
					'settings'    => 'header_bar_font',
					'label'       => esc_html__( 'Font Style', 'kirki' ),
					'section'     => 'header_bar',
					'default'     => [
						'font-family'    => 'Roboto',
						'variant'        => 'regular',
						'font-size'      => '14px',
						'color'          => '#202020',
					],
					'priority'    => 10,
					'transport'   => 'auto',
					'output'      => [
						[
							'element' => '.alt-navigation-search input, .alt-navigation-search input::-webkit-input-placeholder, .alt-navigation-search input::-moz-placeholder',
						],
					],
				] 
			);

			Kirki::add_config( 
				'header_bar_color', 
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field( 
				'header_bar_color', 
				[
					'type'      => 'color',
					'label'     => esc_attr__( 'Bar color', 'text-domain' ),
					'section'   => 'header_bar',
					'settings'  => 'header_bar_color',
					'default'   => '#ffffff',
					'transport' => 'auto',
					'output'    => [
						[
							'element' => '.alt-navigation-wrapper',
							'property' => 'background-color'
						],
					],
				]
			);
			
			Kirki::add_config( 
				'header_bar_border_bottom_color', 
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field( 
				'header_bar_border_bottom_color', 
				[
					'type'      => 'color',
					'label'     => esc_attr__( 'Border bottom color', 'text-domain' ),
					'section'   => 'header_bar',
					'settings'  => 'header_bar_border_bottom_color',
					'default'   => '#E5E5E5',
					'transport' => 'auto',
					'output'    => [
						[
							'element' => '.alt-navigation-wrapper',
							'property' => 'border-bottom-color'
						],
					],
				]
			);

			Kirki::add_config( 
				'header_bar_border_bottom_width', 
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field( 
				'header_bar_border_bottom_width', 
				[
					'type'      => 'slider',
					'label'     => esc_attr__( 'Border bottom width', 'text-domain' ),
					'section'   => 'header_bar',
					'settings'  => 'header_bar_border_bottom_width',
					'default'     => 2,
					'transport' => 'auto',
					'output'    => [
						[
							'element' => '.alt-navigation-wrapper',
							'property' => 'border-bottom-width',
							'suffix'  => 'px',
						],
					],
					'choices'     => [
						'min'  => 0,
						'max'  => 10,
						'step' => 1,
					],
				]
			);

			Kirki::add_config( 
				'header_bar_separator_color', 
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field( 
				'header_bar_separator_color', 
				[
					'type'      => 'color',
					'label'     => esc_attr__( 'Separator color', 'text-domain' ),
					'section'   => 'header_bar',
					'settings'  => 'header_bar_separator_color',
					'default'   => '#f8f8f8',
					'transport' => 'auto',
					'output'    => [
						[
							'element' => '.alt-navigation-wrapper .alt-navigation-social-media .social-media, .menu-bottom .social-media',
							'property' => 'border-right-color'
						],
					],
				]
			);

			Kirki::add_config( 
				'header_bar_separator_width', 
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field( 
				'header_bar_separator_width', 
				[
					'type'      => 'slider',
					'label'     => esc_attr__( 'Separator width', 'text-domain' ),
					'section'   => 'header_bar',
					'settings'  => 'header_bar_separator_width',
					'default'     => 1,
					'transport' => 'auto',
					'output'    => [
						[
							'element' => '.alt-navigation-wrapper .alt-navigation-social-media .social-media, .menu-bottom .social-media',
							'property' => 'border-right-width',
							'suffix'  => 'px',
						],
					],
					'choices'     => [
						'min'  => 0,
						'max'  => 5,
						'step' => 1,
					],
				]
			);

			/**
			 * Social Media
			 */

			Kirki::add_panel(
				'social_media',
				[
					'title'      => esc_html__( 'Social Media', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
				]
			);

			

			/* Icon display setting ----------------------------------------------- */

			Kirki::add_section(
				'display_setting',
				[
					'title'      => esc_html__( 'Display setting', 'kirki' ),
					'priority'   => 40,
					'panel'      => 'social_media',
					'icon'		 => 'dashicons-admin-generic',
				]
			);

			Kirki::add_config(
				'show_icon_background',
				[
					'capability'        => 'edit_theme_options',
					'default'           => false,
				]
			);
			
			Kirki::add_field(
				'show_icon_background',
				[
					'type'        => 'checkbox',
					'settings'    => 'checkbox_setting',
					'settings'    => 'show_icon_background',
					'section'  	  => 'display_setting',
					'priority' 	  => 10,
					'label'    	  => esc_html__( 'Show icon background', 'kirki' ),
				]
			);

			Kirki::add_config(
				'color_icon_background',
				[
					'capability'        => 'edit_theme_options',
					'transport'         => 'postMessage',
				]
			);
			
			Kirki::add_field(
				'color_icon_background',
				[
					'type'        => 'color',
					'settings'    => 'color_setting_rgba',
					'settings'    => 'color_icon_background',
					'section'     => 'display_setting',
					'priority'    => 10,
					'label'       => esc_html__( 'Icon background color', 'kirki' ),
				]
			);

			Kirki::add_config(
				'color_icon',
				[
					'capability'        => 'edit_theme_options',
					'transport'         => 'postMessage',
				]
			);
			
			Kirki::add_field(
				'color_icon',
				[
					'type'        => 'color',
					'settings'    => 'color_setting_rgba',
					'settings'    => 'color_icon',
					'section'  => 'display_setting',
					'priority' => 10,
					'label'    => esc_html__( 'Icon color', 'kirki' ),
				]
			);

			Kirki::add_config(
				'border_radius_social_icon_background',
				[
					'capability'        => 'edit_theme_options',
					'transport'         => 'auto',
				]
			);
			
			Kirki::add_field(
				'border_radius_social_icon_background',
				[
					'type'	   => 'slider',
					'settings' => 'slider_setting',
					'settings' => 'border_radius_social_icon_background',
					'label'    => esc_html__( 'Border-radius of social media icon', 'kirki' ),
					'section'  => 'display_setting',
					'default'  => 6,
					'choices'  => [
						'min'	=> 1,
						'max'	=> 25,
						'step'	=> 1,
					],
					'output'   => [
						[
							'element'	=> '.alt-navigation-social-media a',
							'property'	=> 'border-radius',
							'suffix'    => 'px',
						],
					],
				]
			);

			Kirki::add_config(
				'href_target',
				[
					'capability'        => 'edit_theme_options',
					'transport'         => 'auto',
				]
			);
			
			Kirki::add_field(
				'href_target',
				[
					'type'	   => 'toggle',
					'settings' => 'toggle_setting',
					'settings' => 'href_target',
					'section'  => 'display_setting',
					'priority' => 10,
					'label'    => esc_html__( 'Open link in new tab', 'kirki' ),
				]
			);

			/* Social display order ----------------------------------------------- */

			Kirki::add_section(
				'social_media_order_section',
				[
					'title'      	=> esc_html__( 'Social media order', 'kirki' ),
					'description'   => esc_html__( 'Here you can change the order in which social media icons are displayed on your website.', 'kirki' ),
					'priority'   	=> 40,
					'panel'      	=> 'social_media',
					'icon'			=> 'dashicons-visibility',
				]
			);

			Kirki::add_config(
				'social_media_order',
				[
					'capability'        => 'edit_theme_options',
					'default'           => false,
				]
			);

			Kirki::add_field( 
				'social_media_order', 
				[
					'type'      => 'sortable',
					'settings'  => 'sortable_setting',
					'settings'  => 'social_media_order',
					'section'   => 'social_media_order_section',
					'default'	=>	[
						'facebook',
						'gitHub',
						'instagram',
						'pinterest',
						'twitter',
						'youTube', 
					],
					'choices'   => [
						'500px'			=> esc_html__( '500px', 'kirki' ),
						'amazon' 		=> esc_html__( 'amazon', 'kirki' ),
						'bandcamp' 		=> esc_html__( 'bandcamp', 'kirki' ),
						'behance' 		=> esc_html__( 'behance', 'kirki' ),
						'codepan' 		=> esc_html__( 'codepan', 'kirki' ),
						'deviantArt'	=> esc_html__( 'deviantArt', 'kirki' ),
						'dropbox'		=> esc_html__( 'dropbox', 'kirki' ),
						'facebook' 		=> esc_html__( 'facebook', 'kirki' ),
						'flickr' 		=> esc_html__( 'flickr', 'kirki' ),
						'gitHub'		=> esc_html__( 'gitHub', 'kirki' ),
						'google' 		=> esc_html__( 'google', 'kirki' ),
						'instagram'		=> esc_html__( 'instagram', 'kirki' ),
						'linkedIn' 		=> esc_html__( 'linkedIn', 'kirki' ),
						'pinterest' 	=> esc_html__( 'pinterest', 'kirki' ),
						'reddit' 		=> esc_html__( 'reddit', 'kirki' ),
						'skype' 		=> esc_html__( 'skype', 'kirki' ),
						'snapchat' 		=> esc_html__( 'snapchat', 'kirki' ),
						'telegram' 		=> esc_html__( 'telegram', 'kirki' ),
						'tikTok' 		=> esc_html__( 'tikTok', 'kirki' ),
						'tumblr' 		=> esc_html__( 'tumblr', 'kirki' ),
						'twitch' 		=> esc_html__( 'twitch', 'kirki' ),
						'twitter' 		=> esc_html__( 'twitter', 'kirki' ),
						'viber' 		=> esc_html__( 'viber', 'kirki' ),
						'wattpad' 		=> esc_html__( 'wattpad', 'kirki' ),
						'whatsApp' 		=> esc_html__( 'whatsApp', 'kirki' ),
						'youTube' 		=> esc_html__( 'youTube', 'kirki' ),
						'vK' 			=> esc_html__( 'vK', 'kirki' ),
						'oK' 			=> esc_html__( 'oK', 'kirki' ),
					],
					'priority'  => 10,
				]
			);

			/* Show DeviantArt ----------------------------------------------- */

			Kirki::add_section(
				'deviantArt',
				[
					'title'      => esc_html__( 'DeviantArt', 'kirki' ),
					'priority'   => 40,
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_deviantArt',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'url_deviantArt',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings'    	=> 'url_deviantArt',
					'section'  		=> 'deviantArt',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_deviantArt',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_deviantArt',
				[
					'type'     		=> 'image',
					'settings'    	=> 'image_setting_url',
					'settings'    	=> 'icon_deviantArt',
					'section'  		=> 'deviantArt',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show Facebook ----------------------------------------------- */

			Kirki::add_section(
				'facebook',
				[
					'title'      => esc_html__( 'Facebook', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_facebook',
				[
					'capability'  => 'edit_theme_options',
					'default'     => 'https://www.facebook.com/',
				]
			);

			Kirki::add_field(
				'url_facebook',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings' 		=> 'url_facebook',
					'section'  		=> 'facebook',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_facebook',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_facebook',
				[
					'type'     		=> 'image',
					'settings'    	=> 'image_setting_url',
					'settings'    	=> 'icon_facebook',
					'section'  		=> 'facebook',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show Flickr ----------------------------------------------- */

			Kirki::add_section(
				'flickr',
				[
					'title'      => esc_html__( 'Flickr', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_flickr',
				[
					'capability'        => 'edit_theme_options',
				]
			);
			
			Kirki::add_field(
				'url_flickr',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings' 		=> 'url_flickr',
					'section'  		=> 'flickr',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_flickr',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_flickr',
				[
					'type'     		=> 'image',
					'settings'    	=> 'image_setting_url',
					'settings'    	=> 'icon_flickr',
					'section'  		=> 'flickr',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show GitHub ----------------------------------------------- */

			Kirki::add_section(
				'gitHub',
				[
					'title'      => esc_html__( 'GitHub', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_gitHub',
				[
					'capability'        => 'edit_theme_options',
					'default'           => 'https://www.github.com/',
				]
			);

			Kirki::add_field(
				'url_gitHub',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings'		=> 'url_gitHub',
					'section'  		=> 'gitHub',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_gitHub',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_gitHub',
				[
					'type'     		=> 'image',
					'settings'    	=> 'image_setting_url',
					'settings'    	=> 'icon_gitHub',
					'section'  		=> 'gitHub',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show Instagram ----------------------------------------------- */

			Kirki::add_section(
				'instagram',
				[
					'title'      => esc_html__( 'Instagram', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_instagram',
				[
					'capability'        => 'edit_theme_options',
					'default'           => 'https://instagram.com/',
				]
			);

			Kirki::add_field(
				'url_instagram',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings' 		=> 'url_instagram',
					'section'  		=> 'instagram',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_instagram',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_instagram',
				[
					'type'     		=> 'image',
					'settings'    	=> 'image_setting_url',
					'settings'    	=> 'icon_instagram',
					'section'  		=> 'instagram',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show LinkedIn ----------------------------------------------- */

			Kirki::add_section(
				'linkedIn',
				[
					'title'      => esc_html__( 'LinkedIn', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_linkedIn',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'url_linkedIn',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings' 		=> 'url_linkedIn',
					'section'  		=> 'linkedIn',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_linkedIn',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_linkedIn',
				[
					'type'     		=> 'image',
					'settings'    	=> 'image_setting_url',
					'settings'    	=> 'icon_linkedIn',
					'section'  		=> 'linkedIn',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show Pinterest ----------------------------------------------- */

			Kirki::add_section(
				'pinterest',
				[
					'title'      => esc_html__( 'Pinterest', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_pinterest',
				[
					'capability'        => 'edit_theme_options',
					'default'           => 'https://pinterest.com/',
				]
			);

			Kirki::add_field(
				'url_pinterest',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings' 		=> 'url_pinterest',
					'section'  		=> 'pinterest',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_pinterest',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_pinterest',
				[
					'type'     		=> 'image',
					'settings'    	=> 'image_setting_url',
					'settings'    	=> 'icon_pinterest',
					'section'  		=> 'pinterest',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show Snapchat ----------------------------------------------- */

			Kirki::add_section(
				'snapchat',
				[
					'title'      => esc_html__( 'Snapchat', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_snapchat',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'url_snapchat',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings' 		=> 'url_snapchat',
					'section'  		=> 'snapchat',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_snapchat',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_snapchat',
				[
					'type'     		=> 'image',
					'settings'    	=> 'image_setting_url',
					'settings'    	=> 'icon_snapchat',
					'section'  		=> 'snapchat',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show Telegram ----------------------------------------------- */

			Kirki::add_section(
				'telegram',
				[
					'title'      => esc_html__( 'Telegram', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_telegram',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'url_telegram',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings' 		=> 'url_telegram',
					'section'  		=> 'telegram',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_telegram',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_telegram',
				[
					'type'     		=> 'image',
					'settings'    	=> 'image_setting_url',
					'settings'    	=> 'icon_telegram',
					'section'  		=> 'telegram',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show TikTok ----------------------------------------------- */

			Kirki::add_section(
				'tikTok',
				[
					'title'      => esc_html__( 'TikTok', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_tikTok',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'url_tikTok',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings' 		=> 'url_tikTok',
					'section'  		=> 'tikTok',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_tikTok',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_tikTok',
				[
					'type'     		=> 'image',
					'settings'    	=> 'image_setting_url',
					'settings'    	=> 'icon_tikTok',
					'section'  		=> 'tikTok',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show Tumblr ----------------------------------------------- */

			Kirki::add_section(
				'tumblr',
				[
					'title'      => esc_html__( 'Tumblr', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_tumblr',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'url_tumblr',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings' 		=> 'url_tumblr',
					'section'  		=> 'tumblr',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_tumblr',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_tumblr',
				[
					'type'     		=> 'image',
					'settings'    	=> 'image_setting_url',
					'settings'    	=> 'icon_tumblr',
					'section'  		=> 'tumblr',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show Twitter ----------------------------------------------- */

			Kirki::add_section(
				'twitter',
				[
					'title'      => esc_html__( 'Twitter', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_twitter',
				[
					'capability'        => 'edit_theme_options',
					'default'           => 'https://twitter.com/',
				]
			);

			Kirki::add_field(
				'url_twitter',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings' 		=> 'url_twitter',
					'section'  		=> 'twitter',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_twitter',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_twitter',
				[
					'type'     		=> 'image',
					'settings'    	=> 'image_setting_url',
					'settings'    	=> 'icon_twitter',
					'section'  		=> 'twitter',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show Viber ----------------------------------------------- */

			Kirki::add_section(
				'viber',
				[
					'title'      => esc_html__( 'Viber', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_viber',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'url_viber',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings' 		=> 'url_viber',
					'section'  		=> 'viber',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_viber',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_viber',
				[
					'type'     		=> 'image',
					'settings'    	=> 'image_setting_url',
					'settings'    	=> 'icon_viber',
					'section'  		=> 'viber',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show Wattpad ----------------------------------------------- */

			Kirki::add_section(
				'wattpad',
				[
					'title'      => esc_html__( 'Wattpad', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_wattpad',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'url_wattpad',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings' 		=> 'url_wattpad',
					'section'  		=> 'wattpad',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_wattpad',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_wattpad',
				[
					'type'     		=> 'image',
					'settings'    	=> 'image_setting_url',
					'settings'    	=> 'icon_wattpad',
					'section'  		=> 'wattpad',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show WhatsApp ----------------------------------------------- */

			Kirki::add_section(
				'whatsApp',
				[
					'title'      => esc_html__( 'WhatsApp', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_whatsApp',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'url_whatsApp',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings' 		=> 'url_whatsApp',
					'section'  		=> 'whatsApp',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_whatsApp',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_whatsApp',
				[
					'type'     		=> 'image',
					'settings'    	=> 'image_setting_url',
					'settings'    	=> 'icon_whatsApp',
					'section'  		=> 'whatsApp',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show YouTube ----------------------------------------------- */

			Kirki::add_section(
				'youTube',
				[
					'title'      => esc_html__( 'YouTube', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_youTube',
				[
					'capability'        => 'edit_theme_options',
					'default'           => 'https://youtube.com/',
				]
			);

			Kirki::add_field(
				'url_youTube',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings' 		=> 'url_youTube',
					'section'  		=> 'youTube',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_youTube',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_youTube',
				[
					'type'     		=> 'image',
					'settings'    	=> 'image_setting_url',
					'settings'    	=> 'icon_youTube',
					'section'  		=> 'youTube',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show ВКонтакте ----------------------------------------------- */

			Kirki::add_section(
				'vK',
				[
					'title'      => esc_html__( 'ВКонтакте', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_vK',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'url_vK',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings' 		=> 'url_vK',
					'section'  		=> 'vK',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_vK',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_vK',
				[
					'type'     		=> 'image',
					'settings'    	=> 'image_setting_url',
					'settings'    	=> 'icon_vK',
					'section'  		=> 'vK',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show Одноклассники ----------------------------------------------- */

			Kirki::add_section(
				'oK',
				[
					'title'      => esc_html__( 'Одноклассники', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_oK',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'url_oK',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings' 		=> 'url_oK',
					'section'  		=> 'oK',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_oK',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_oK',
				[
					'type'     		=> 'image',
					'settings'    	=> 'image_setting_url',
					'settings'    	=> 'icon_oK',
					'section'  		=> 'oK',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);
		}
	}

	// Setup the Theme Customizer settings and controls.
	add_action( 'init', array( 'Edmonton_Customize', 'register' ) );

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

function edmonton_customize_opacity_range_header_width() {
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
			'min'  => 100,
			'max'  => 3000,
			'step' => 1,
		)
	);
}

