<?php
/**
 * The default template for displaying content
 *
 * Used for both about us.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Edmonton
 * @since Edmonton 1.0
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div id="post-content-about-us">
		<?php
		get_template_part( 'template-parts/entry-header-about-and-contact' );
		?>

		<div class="<?php echo is_page_template( 'templates/template-full-width.php' ) ? '' : 'thin'; ?> ">

			<div class="entry-content">

				<?php
				if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
					the_excerpt();
				} else {
					the_content( __( 'Continue reading', 'edmonton' ) );
				}
				?>

			</div><!-- .entry-content -->

		</div><!-- .post-inner -->

		<div class="section-inner">
			
			<?php
			edit_post_link();
			?>

		</div><!-- .section-inner -->

	</div><!-- #post-content -->

	<?php
	/**
	 *  Output comments wrapper if it's a post, or if comments are open,
	 * or if there's a comment number – and check for password.
	 * */
	?>

</article><!-- .post -->
