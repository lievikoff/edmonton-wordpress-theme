<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
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
								<?php edmonton_the_theme_svg( 'ellipsis' ); ?>
							</span>
							<span class="toggle-text"><?php _e( 'Menu', 'edmonton' ); ?></span>
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

						} elseif ( ! has_nav_menu( 'expanded' ) ) {

							wp_list_pages(
								array(
									'match_menu_classes' => true,
									'show_sub_menu_icons' => true,
									'title_li' => false,
									'walker'   => new TwentyTwenty_Walker_Page(),
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
				get_search_form( 'Search this site' );
				?>

			</div>

			<div class="alt-navigation-menu">
				<?php
				wp_nav_menu(
					array(
						'container'  		=> '',
						'items_wrap' 		=> '%3$s',
						'theme_location' 	=> 'social',
					)
				);
				?>
			</div>

		</div>
		<?php
		// Output the menu modal.
		get_template_part( 'template-parts/modal-menu' );
