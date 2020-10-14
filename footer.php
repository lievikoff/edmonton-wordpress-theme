<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Edmonton
 * @since Edmonton 1.0
 */

?>
		<div id="footer-container">

			<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

			<footer id="site-footer" role="contentinfo" class="header-footer-group">

				<div id="footer-user-text" class="section-inner">

					<p class="footer-copyright footer-user-text">

						<?php
						if ( get_theme_mod( 'footer_text' ) ) {
							echo get_theme_mod( 'footer_text' );
						}
						?>

					</p>

					<div class="footer-credits">

						<div class="footer-inner-wrap">
							<p class="footer-copyright">&copy;
								<?php
								echo date_i18n(
									/* translators: Copyright date format, see https://www.php.net/date */
									_x( 'Y', 'copyright date format', 'edmonton' )
								);
								?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
							</p><!-- .footer-copyright -->

							<p class="powered-by-edmonton">
								<a href="<?php echo esc_url( __( '#', 'edmonton' ) ); ?>">
									<?php echo __( 'by Chapak. ', 'edmonton' ); ?>
								</a>
							</p><!-- .powered-by-edmonton -->
						</div>


						<p class="after-powered-by-edmonton">
							<?php _e( 'All Right Reserved.', 'edmonton' ); ?>
						</p><!-- .after-powered-by-edmonton -->

					</div><!-- .footer-credits -->

				</div><!-- .section-inner -->

			</footer><!-- #site-footer -->

		</div><!-- #footer-container -->

		<?php wp_footer(); ?>

	</body>
</html>
