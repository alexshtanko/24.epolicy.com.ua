<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package intech
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class('post-single'); ?>>
	<?php if(intech_post_thumbnail()) : ?>
		<div class="img-post">
		<?php intech_post_thumbnail(); ?>
		</div>
	<?php endif; ?>
	<?php get_template_part('template-parts/content','summery'); ?>
</div><!-- #post-<?php the_ID(); ?> -->
