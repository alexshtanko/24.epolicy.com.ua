<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package intech
 */
	if (defined('CS_ACTIVE_FRAMEWORK') && function_exists('cs_get_option')) {
	$intech_pfg_meta = get_post_meta( $post->ID, 'intech_pfg_meta', true );
	}
	?>
<div id="post-<?php the_ID(); ?>" <?php post_class('post-single'); ?>>
	<?php if(!empty($intech_pfg_meta['intech_pfg_link'])) : $intech_pfgs = explode(",",$intech_pfg_meta['intech_pfg_link']); ?>
	<div class="intech-pfg">
		<div class="intech-pfg-items" id="intech-post-gallery">
		<?php foreach($intech_pfgs as $intech_pfg) : $intech_pfg_source = wp_get_attachment_image_src($intech_pfg,'intech-pro-larg') ?>
			<div class="item">
				<img src="<?php echo esc_url($intech_pfg_source[0]); ?>" alt="<?php the_title_attribute(); ?>">
			</div>
		<?php endforeach; ?>
		</div>
	</div>
	<?php else : ?>
	<div class="intech-bimg">
		<?php intech_post_thumbnail(); ?>		
	</div>
	<?php endif; ?>
	<?php get_template_part('template-parts/content','summery'); ?>
</div>
