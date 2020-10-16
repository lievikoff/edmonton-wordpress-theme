<?php
/**
 * The template for displaying Author info
 *
 * @package Edmonton
 * @since Edmonton 1.0
 */

if ( (bool) get_the_author_meta( 'description' ) && (bool) get_theme_mod( 'show_author_bio', true ) ) : ?>
<div class="author-bio-box">
	<h2 class="author-title heading-size-4">
			<?php echo __( 'About the author: ', 'edmonton' ); ?>
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php echo esc_html( get_the_author() ); ?>
			</a>
		</h2>
	<div class="author-bio">
		
		<div class="author-avatar vcard">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 160 ); ?>
		</div>
			
		<div class="author-description">
			<?php echo wp_kses_post( wpautop( get_the_author_meta( 'description' ) ) ); ?>
		</div><!-- .author-description -->
	</div><!-- .author-bio -->
</div><!-- .author-bio-box-->
<?php endif; ?>
