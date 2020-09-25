<?php
/**
 * Header file for the Edmonton WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Edmonton
 * @since Edmonton 1.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>

	</head>
	
	<body <?php body_class(); ?>>

	

		<?php
		wp_body_open();
		?>

		<header id="site-header" class="header-footer-group" role="banner">

			<div class="header-inner section-inner">

				<div class="header-titles-wrapper">

					<?php

					// Check whether the header search is activated in the customizer.
					$enable_header_search = get_theme_mod( 'enable_header_search', true );

					if ( true === $enable_header_search ) {

						?>

						<button class="toggle search-toggle mobile-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
							<span class="toggle-inner">
								<span class="toggle-icon">
									<?php edmonton_the_theme_svg( 'search' ); ?>
								</span>
							</span>
						</button><!-- .search-toggle -->

					<?php } ?>

					<div class="header-titles">

						<?php
							// Site title or logo.
							edmonton_site_logo();

							// Site description.
							edmonton_site_description();
						?>

					</div><!-- .header-titles -->

					<button class="toggle nav-toggle mobile-nav-toggle" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
						<span class="toggle-inner">
							<span class="toggle-icon">
								<?php edmonton_the_theme_svg( 'mobile-menu' ); ?>
							</span>
						</span>
					</button><!-- .nav-toggle -->

				</div><!-- .header-titles-wrapper -->

			</div><!-- .header-inner -->

		</header><!-- #site-header -->

		<div class="header-navigation-wrapper">

			<?php
			if ( has_nav_menu( 'primary' ) || ! has_nav_menu( 'expanded' ) ) {
				?>

					<nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e( 'Horizontal', 'edmonton' ); ?>" role="navigation">

						<ul class="primary-menu reset-list-style">

						<?php
						if ( has_nav_menu( 'primary' ) ) {

							wp_nav_menu(
								array(
									'container'  		=> '',
									'items_wrap' 		=> '%3$s',
									'theme_location'	=> 'primary',
								)
							);

						} else if ( ! has_nav_menu( 'expanded' ) ) {

							wp_list_pages(
								array(
									'match_menu_classes' => true,
									'show_sub_menu_icons' => true,
									'title_li' => false,
									'walker'   => new Edmonton_Walker_Page(),
								)
							);

						}
						?>

						</ul>

					</nav><!-- .primary-menu-wrapper -->

				<?php
			}
			?>

		</div><!-- .header-navigation-wrapper -->
		<div class="alt-navigation-wrapper">

			<div class="alt-navigation-search">

				<?php
					
					get_search_form();
				?>

			</div>

			<div class="alt-navigation-social-media">

				<?php 
					get_template_part( 'template-parts/social-media' );
				?>

			</div>

			<?php				
			if ( true === $enable_header_search ) {

				get_template_part( 'template-parts/modal-search' );

			}
			?>

		</div>

		<?php if ( !is_404() ) {
		?>

		<div class="cover" ></div>

		<?php }?>
		<?php
		$enable_breadcrumbs = get_theme_mod( 'breadcrumbs_enable' );
		$pageNum = get_query_var('paged');

		if ( $enable_breadcrumbs === true ) {

			if( !is_front_page() && $pageNum == 0  || is_front_page() && $pageNum != 0){

				the_breadcrumb( get_theme_mod( 'breadcrumbs_separator' ) );

			}

		}
		
		// Output the menu modal.
		get_template_part( 'template-parts/modal-menu' );
