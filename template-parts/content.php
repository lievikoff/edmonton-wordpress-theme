<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Edmonton
 * @since Edmonton 1.0
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div id="post-content">
		<?php
		get_template_part( 'template-parts/featured-image' );
		get_template_part( 'template-parts/entry-header' );
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
			
			<div id="post-footer">

				<div class="author-post">

					<?php
					$author_id = get_post_field ( 'post_author', get_the_ID() );
					$name = get_the_author_meta( 'display_name' , $author_id ); 

					echo 'Posted by ' . '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . $name . '</a> ';

					if ( count( get_the_category() ) != 0 ) {
						echo " in ";
					}
					get_the_category_custom( NULL );
					?>

				</div>

				<div class="post-date-footer block-footer">
            		<a href="<?php echo preg_replace('/([^\/]*)\/$/mi', '', get_the_permalink()); ?>"><?php the_time( 'j M Y' ); ?></a>
       			</div>

			</div>

			<?php
			wp_link_pages(
				array(
					'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'edmonton' ) . '"><span class="label">' . __( 'Pages:', 'edmonton' ) . '</span>',
					'after'       => '</nav>',
					'link_before' => '<span class="page-number">',
					'link_after'  => '</span>',
				)
			);

			edit_post_link();

			// Single bottom post meta.
			
			if ( post_type_supports( get_post_type( get_the_ID() ), 'author' ) && is_single() ) {

				get_template_part( 'template-parts/entry-author-bio' );

			}
			?>

		</div><!-- .section-inner -->

		<?php
		if ( is_single() ) {

			get_template_part( 'template-parts/navigation' );

		}
		?>

	</div><!-- #post-content -->

	<?php
	/**
	 *  Output comments wrapper if it's a post, or if comments are open,
	 * or if there's a comment number – and check for password.
	 * */
	if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
		?>

		<div class="comments-wrapper">

			<?php comments_template(); ?>

		</div><!-- .comments-wrapper -->

		<?php
	}
	?>

</article><!-- .post -->
