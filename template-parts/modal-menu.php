<?php
/**
 * Displays the menu icon and modal
 *
 * @package Edmonton
 * @since Edmonton 1.0
 */

?>

<div class="menu-modal cover-modal header-footer-group" data-modal-target-string=".menu-modal">

	<div class="menu-modal-inner modal-inner">

		<div class="menu-wrapper section-inner">

			<div class="menu-top">

				<button class="toggle close-nav-toggle fill-children-current-color" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".menu-modal">
					<span class="toggle-text"><?php _e( 'Close Menu', 'edmonton' ); ?></span>
					<?php edmonton_the_theme_svg( 'cross' ); ?>
				</button><!-- .nav-toggle -->

				<?php

				$mobile_menu_location = '';

				// If the mobile menu location is not set, use the primary and expanded locations as fallbacks, in that order.
				if ( has_nav_menu( 'mobile' ) ) {
					$mobile_menu_location = 'mobile';
				} elseif ( has_nav_menu( 'primary' ) ) {
					$mobile_menu_location = 'primary';
				} elseif ( has_nav_menu( 'expanded' ) ) {
					$mobile_menu_location = 'expanded';
				}

				if ( has_nav_menu( 'expanded' ) ) {

					$expanded_nav_classes = '';

					if ( 'expanded' === $mobile_menu_location ) {
						$expanded_nav_classes .= ' mobile-menu';
					}

					?>

					<nav class="expanded-menu<?php echo esc_attr( $expanded_nav_classes ); ?>" aria-label="<?php esc_attr_e( 'Expanded', 'edmonton' ); ?>" role="navigation">

						<ul class="modal-menu reset-list-style">
							<?php
							if ( has_nav_menu( 'expanded' ) ) {
								wp_nav_menu(
									array(
										'container'      => '',
										'items_wrap'     => '%3$s',
										'show_toggles'   => true,
										'theme_location' => 'expanded',
									)
								);
							}
							?>
						</ul>

					</nav>

					<?php
				}

				if ( 'expanded' !== $mobile_menu_location ) {
					?>

					<nav class="mobile-menu" aria-label="<?php esc_attr_e( 'Mobile', 'edmonton' ); ?>" role="navigation">

						<ul class="modal-menu reset-list-style">

						<?php
						if ( $mobile_menu_location ) {

							wp_nav_menu(
								array(
									'container'      => '',
									'items_wrap'     => '%3$s',
									'show_toggles'   => true,
									'theme_location' => $mobile_menu_location,
								)
							);

						} else {

							wp_list_pages(
								array(
									'match_menu_classes' => true,
									'show_toggles'       => true,
									'title_li'           => false,
									'walker'             => new Edmonton_Walker_Page(),
								)
							);

						}
						?>

						</ul>

					</nav>

					<?php
				}
				?>

			</div><!-- .menu-top -->

			<div class="menu-bottom">

				<?php if ( has_nav_menu( 'social' ) ) { ?>

					<div class="alt-navigation-social-media">

				<?php 
				
				$social_media_list = array (
					'deviantArt',
					'facebook',
					'flickr',
					'gitHub',
					'instagram',
					'linkedIn',
					'pinterest',
					'snapchat',
					'telegram',
					'tikTok',
					'tumblr',
					'twitter',
					'viber',
					'wattpad',
					'whatsApp',
					'youTube',
					'vK',
					'oK',
				);

				foreach ( $social_media_list as $social_media ) {
					
					if ( get_theme_mod( 'show_'.$social_media ) ) {
						
						?>

						<div class="social-media">
							<a class="social-media-block" href="<?php echo esc_url( get_theme_mod( 'url_'.$social_media ) );?>">
								<?php if ( get_theme_mod( 'icon_'.$social_media ) ) { ?>

								<img src="<?php echo esc_url( get_theme_mod( 'icon_'.$social_media ) );?>">

								<?php 
									} else {
										edmonton_the_theme_svg(strtolower($social_media), 'social', '#ffffff');
									}
								?>
							</a>
						</div>
						<?php
					}
				}
				?>
				</div>
				<?php } ?>

			</div><!-- .menu-bottom -->

		</div><!-- .menu-wrapper -->

	</div><!-- .menu-modal-inner -->

</div><!-- .menu-modal -->
