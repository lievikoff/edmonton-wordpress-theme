<?php
/**
 * Displays the menus and widgets at the end of the main element.
 * Visually, this output is presented as part of the footer element.
 *
 * @package Edmonton
 * @since Edmonton 1.0
 */

$has_footer_menu = has_nav_menu( 'footer' );
$has_sidebar_1 = is_active_sidebar( 'sidebar-1' );

// Only output the container if there are elements to display.
if ( $has_footer_menu || $has_sidebar_1 ) {
	?>

	<div class="footer-nav-widgets-wrapper header-footer-group">

		<div class="footer-inner section-inner">

			<?php if ( $has_sidebar_1 ) { ?>

				<aside class="footer-widgets-outer-wrapper footer-widgets-cl" role="complementary">

					<div class="footer-widgets-wrapper">

						<?php if ( $has_sidebar_1 ) { ?>

							<div class="footer-widgets column-one grid-item">
								<?php dynamic_sidebar( 'sidebar-1' ); ?>
									
							</div>

						<?php } ?>

					</div><!-- .footer-widgets-wrapper -->

				</aside><!-- .footer-widgets-outer-wrapper -->

			<?php } ?>

			<?php
			$footer_top_classes = '';

			$footer_top_classes .= $has_footer_menu ? ' has-footer-menu' : '';

			if ( $has_footer_menu ) {
				?>

				<div class="footer-top footer-widgets-cl<?php echo $footer_top_classes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output ?>">
					<?php if ( $has_footer_menu ) { ?>

						<nav aria-label="<?php esc_attr_e( 'Footer', 'edmonton' ); ?>" role="navigation" class="footer-menu-wrapper">

							<ul class="footer-menu reset-list-style">

								<?php
								wp_nav_menu(
									array(
										'container'      => '',
										'depth'          => 1,
										'items_wrap'     => '%3$s',
										'theme_location' => 'footer',
									)
								);
								?>

							</ul>
						</nav><!-- .site-nav -->

					<?php } ?>
					<?php 
					if( get_theme_mod( 'social_footer_enable' ) ) {

						get_template_part( 'template-parts/social-media' );
						
					}?>
				</div><!-- .footer-top -->

			<?php } ?>

		</div><!-- .footer-inner -->

	</div><!-- .footer-nav-widgets-wrapper -->

<?php } ?>
