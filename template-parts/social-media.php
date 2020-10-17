<?php
/**
 * A template partial to output pagination for the Edmonton default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Edmonton
 * @since Edmonton 1.0
 */

/**
 * Translators:
 * This text contains HTML to allow the text to be shorter on small screens.
 * The text inside the span with the class nav-short will be hidden on small screens.
 */

$social_media_list = get_theme_mod( 'social_media_order', [ 'facebook', 'gitHub', 'instagram', 'pinterest', 'twitter', 'youTube' ] );

foreach ( $social_media_list as $social_media ) {
    ?>

    <div class="social-media">
        
        <a class="social-media-block" style="cursor: pointer !important;" href="<?php echo esc_url( get_theme_mod( 'url_'.$social_media ) );?>" target="<?php echo ( get_theme_mod( 'href_target', false ) ) ? '_blank' : ''; ?>">
        
            <?php if ( get_theme_mod( 'icon_'.$social_media ) ) { ?>

            <img src="<?php echo esc_url( get_theme_mod( 'icon_'.$social_media ) );?>">

            <?php 
            } else {
                edmonton_the_theme_svg( strtolower( $social_media ), 'social');
            }
            ?>	

        </a>

    </div>

    <?php
}
?>