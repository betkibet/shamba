<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BizPlus
 */

?>
	<div class="entry-content">
		<?php
		$bizplus_single_post_image_align = bizplus_single_post_image_align(get_the_ID());
		if( 'no-image' != $bizplus_single_post_image_align ){
			if( 'left' == $bizplus_single_post_image_align ){
				echo "<div class='image-left'>";
				the_post_thumbnail('medium');
			}
			elseif( 'right' == $bizplus_single_post_image_align ){
				echo "<div class='image-right'>";
				the_post_thumbnail('medium');
			}
			else{
				echo "<div class='image-full'>";
				the_post_thumbnail('full');
			}
			echo "</div>";/*div end*/
		}
		?>

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bizplus' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php bizplus_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

