<?php
/**
 * The template for displaying single posts and pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Edmonton
 * @since Edmonton 1.0
 */

get_header();

setPostViews( get_the_ID() );

$site_content = '';
$site_content_main = '';
$site_content_sidebar = '';

if ( get_theme_mod( 'content_sidebar_position' ) ) {

	$sidebar_position = get_theme_mod( 'content_sidebar_position' );
	
	if ( $sidebar_position ) {

		switch ($sidebar_position) {
			case 'left':
				$site_content = 'site-content-row-reverse';
				$site_content_sidebar = 'main-sidebar-left';
				break;
			
			case 'right':
				$site_content = 'site-content-row';
				$site_content_sidebar = 'main-sidebar-right';
				break;

			case 'top':
				$site_content = 'site-content-column-reverse';
				$site_content_sidebar = 'main-sidebar-top';
				break;

			case 'bottom':
				$site_content = 'site-content-column';
				$site_content_sidebar = 'main-sidebar-bottom';
				break;
		}
	}
}
?>
<main id="main" class="main-post">

	<main id="site-content" class="<?php echo $site_content ?>" role="main">

		<div id="site-content-post">

			<?php
			if ( have_posts() ) {

				while ( have_posts() ) {

					the_post();
					get_template_part( 'template-parts/content', get_post_type() );
				}
			}
			?>

		</div>

		<?php if ( is_active_sidebar( 'sidebar' ) ) { ?>

		<div id="site-content-sitebar" class="<?php echo $site_content_sidebar ?>">
			<!-- sitebar -->


			<div id="true-side" class="sidebar">

				<?php dynamic_sidebar( 'sidebar' ); ?>

			</div>

		</div>

		<?php } ?>

	</main><!-- #site-content -->

</main>

<?php get_footer(); ?>
