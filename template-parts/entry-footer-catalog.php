<?php
/**
 * Displays the post header
 *
 * @package Edmonton
 * @since Edmonton 1.0
 */
?>

<footer class="entry-footer-catalog">

	<div class="entry-footer-inner-catalog">

        <div class="comments-footer-catalog block-footer-catalog">
            
            <?php
            comments_popup_link( 'No comments', '1 comment', '% comments', false, '');
            ?>

        </div>

        <div class="post-date-footer-catalog block-footer-catalog">
            <a href="<?php the_permalink(); ?>"><?php the_time( 'j M Y' ); ?></a>
        </div>
        
    </div><!-- .entry-footer-inner -->

</footer><!-- .entry-footer -->
