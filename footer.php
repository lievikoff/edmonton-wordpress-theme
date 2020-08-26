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

			<footer id="site-footer" role="contentinfo" class="<?php if( is_404() ) echo 'footer-404'?> header-footer-group">

				<div class="section-inner">

					<div class="footer-credits">

						<p class="footer-copyright">&copy;
							<?php
							echo date_i18n(
								/* translators: Copyright date format, see https://www.php.net/date */
								_x( 'Y', 'copyright date format', 'edmonton' )
							);
							?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
						</p><!-- .footer-copyright -->

						<p class="powered-by-wordpress">
							<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'edmonton' ) ); ?>">
								<?php _e( 'by Chapak. All Right Reserved.', 'edmonton' ); ?>
							</a>
						</p><!-- .powered-by-wordpress -->

					</div><!-- .footer-credits -->

				</div><!-- .section-inner -->

			</footer><!-- #site-footer -->

		</div><!-- #footer-container -->

		<?php wp_footer(); ?>

	</body>
</html>
