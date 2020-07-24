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
						'max'  => 10,
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
					'settings'	=> 'radio_image_setting',
					'settings'  => 'header_logo_position',
					'style'		=> 'margin: 2px',
					'default'	=> 'center',
					'choices'   => [
						'left' => [
							'label' => esc_attr__( 'Logo Left' ),
							'path'  => '<svg version="1.0" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"  width="84px" height="57px" viewBox="0 0 1200.000000 810.000000" preserveAspectRatio="xMidYMid meet"> <g transform="translate(0.000000,810.000000) scale(0.100000,-0.100000)" fill="#0085BA" stroke="none"> <path d="M0 4050 l0 -4050 6000 0 6000 0 0 4050 0 4050 -6000 0 -6000 0 0 -4050z m11880 3130 l0 -800 -5880 0 -5880 0 0 800 0 800 5880 0 5880 0 0 -800z m0 -3970 l0 -3090 -5880 0 -5880 0 0 3090 0 3090 5880 0 5880 0 0 -3090z"/> <path d="M1864 7416 l-34 -34 0 -176 c0 -193 7 -222 55 -244 19 -9 198 -12 695 -12 497 0 676 3 695 12 48 22 55 51 55 244 l0 176 -34 34 -34 34 -682 0 -682 0 -34 -34z"/> <path d="M5164 7296 c-30 -30 -34 -40 -34 -85 0 -27 5 -62 12 -76 27 -59 -164 -55 2687 -55 2010 0 2626 3 2646 12 36 16 55 57 55 119 0 45 -4 55 -34 85 l-34 34 -2632 0 -2632 0 -34 -34z"/> </g> </svg>',
						],
						'center' => [
							'label' => esc_attr__( 'Logo Center' ),
							'path'	=> '<svg version="1.0" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"  width="84px" height="57px" viewBox="0 0 1200.000000 810.000000" preserveAspectRatio="xMidYMid meet"> <g transform="translate(0.000000,810.000000) scale(0.100000,-0.100000)" fill="#0085BA" stroke="none"> <path d="M0 4050 l0 -4050 6000 0 6000 0 0 4050 0 4050 -6000 0 -6000 0 0 -4050z m11880 3130 l0 -800 -5880 0 -5880 0 0 800 0 800 5880 0 5880 0 0 -800z m0 -3970 l0 -3090 -5880 0 -5880 0 0 3090 0 3090 5880 0 5880 0 0 -3090z"/> <path d="M5284 7666 l-34 -34 0 -176 c0 -193 7 -222 55 -244 19 -9 198 -12 695 -12 497 0 676 3 695 12 48 22 55 51 55 244 l0 176 -34 34 -34 34 -682 0 -682 0 -34 -34z"/> <path d="M3334 6846 c-30 -30 -34 -40 -34 -85 0 -27 5 -62 12 -76 27 -59 -164 -55 2687 -55 2010 0 2626 3 2646 12 36 16 55 57 55 119 0 45 -4 55 -34 85 l-34 34 -2632 0 -2632 0 -34 -34z"/> </g> </svg>',
						],
						'right' => [
							'label' => esc_attr__( 'Logo Right' ),
							'path'  => '<svg version="1.0" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"  width="84px" height="57px" viewBox="0 0 1200.000000 810.000000" preserveAspectRatio="xMidYMid meet"> <g transform="translate(0.000000,810.000000) scale(0.100000,-0.100000)" fill="#0085BA" stroke="none"> <path d="M0 4050 l0 -4050 6000 0 6000 0 0 4050 0 4050 -6000 0 -6000 0 0 -4050z m11880 3130 l0 -800 -5880 0 -5880 0 0 800 0 800 5880 0 5880 0 0 -800z m0 -3970 l0 -3090 -5880 0 -5880 0 0 3090 0 3090 5880 0 5880 0 0 -3090z"/> <path d="M9214 7406 l-34 -34 0 -176 c0 -193 7 -222 55 -244 19 -9 198 -12 695 -12 497 0 676 3 695 12 48 22 55 51 55 244 l0 176 -34 34 -34 34 -682 0 -682 0 -34 -34z"/> <path d="M1864 7286 c-30 -30 -34 -40 -34 -85 0 -27 5 -62 12 -76 27 -59 -164 -55 2687 -55 2010 0 2626 3 2646 12 36 16 55 57 55 119 0 45 -4 55 -34 85 l-34 34 -2632 0 -2632 0 -34 -34z"/> </g> </svg>',
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
					'priority'    => 10,
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
				'header_general_border_bottom_width', 
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field( 
				'header_general_border_bottom_width', 
				[
					'type'      => 'slider',
					'label'     => esc_attr__( 'Border bottom width', 'text-domain' ),
					'section'   => 'header_navigation',
					'settings'  => 'header_general_border_bottom_width',
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

