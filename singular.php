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
if ( is_single() || is_page() && !is_page_template( 'templates/template-about-us.php' ) && !is_page_template( 'templates/template-contact.php' ) ) {
	set_post_views( get_the_ID() );
}

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

if ( !is_active_sidebar( 'sidebar-1' ) ) {
	$site_content = 'site-content-column';
}
?>

<main id="main" class="main-post">

	<?php if ( is_page_template( 'templates/template-about-us.php' ) || is_page_template( 'templates/template-contact.php' ) ) {

		if ( have_posts() ) {

			while ( have_posts() ) {

				the_post();
				get_template_part( 'template-parts/content-about-us', get_post_type() );
			}
		}

	} else { ?>

		<main id="site-content" class="<?php echo $site_content ?>" role="main">

			<div id="site-content-post" style="<?php echo ( is_active_sidebar( 'sidebar-1' ) ) ? '' : 'width: 100%;' ?>">

				<?php
				if ( have_posts() ) {

					while ( have_posts() ) {

						the_post();
						get_template_part( 'template-parts/content', get_post_type() );
					}
				}
				?>

			</div>

			<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>

			<div id="site-content-sitebar" class="<?php echo $site_content_sidebar ?>">
				<!-- sitebar -->


				<div id="true-side" class="sidebar">

					<?php dynamic_sidebar( 'sidebar-1' ); ?>

				</div>

			</div>

			<?php } ?>

		</main><!-- #site-content -->

	<?php } ?>

</main>

<?php get_footer(); ?>
