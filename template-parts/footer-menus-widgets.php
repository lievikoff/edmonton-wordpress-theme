<?php
/**
 * Displays the menus and widgets at the end of the main element.
 * Visually, this output is presented as part of the footer element.
 *
 * @package Edmonton
 * @since Edmonton 1.0
 */

$has_footer_menu = has_nav_menu( 'footer' );
$has_sidebar_1 = is_active_sidebar( 'footer-widgets-1' );

// Only output the container if there are elements to display.
if ( $has_footer_menu || $has_sidebar_1 || get_theme_mod( 'social_footer_enable', false ) ) {
	?>

	<div class="footer-nav-widgets-wrapper header-footer-group">

		<div class="footer-inner section-inner">

			<?php if ( $has_sidebar_1 ) { ?>

				<aside class="footer-widgets-outer-wrapper footer-widgets-cl" role="complementary">

					<div class="footer-widgets-wrapper">

						<?php if ( $has_sidebar_1 ) { ?>

							<div class="footer-widgets column-one grid-item">
<<<<<<< Updated upstream
								<?php dynamic_sidebar( 'sidebar-1' ); ?>

=======
								<?php dynamic_sidebar( 'footer-widgets-1' ); ?>
									
>>>>>>> Stashed changes
							</div>

						<?php } ?>

					</div><!-- .footer-widgets-wrapper -->

				</aside><!-- .footer-widgets-outer-wrapper -->

			<?php } ?>

			<div class="footer-top footer-widgets-cl">

				<?php
				if ( get_theme_mod( 'social_footer_enable', false ) ) {

					get_template_part( 'template-parts/social-media' );

				}
				?>

			</div><!-- .footer-top -->

		</div><!-- .footer-inner -->

	</div><!-- .footer-nav-widgets-wrapper -->

<?php } ?>
