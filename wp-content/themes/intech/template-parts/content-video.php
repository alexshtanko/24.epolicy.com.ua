<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package intech
 */
	if (defined('CS_ACTIVE_FRAMEWORK') && function_exists('cs_get_option')) {
		$intech_pfv_meta = get_post_meta( $post->ID, 'intech_pfv_meta', true );
		$code = 'iframe';
	}
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('post-single'); ?>>
	<?php if(!empty($intech_pfv_meta['intech_pfv_link'])) : ?>
	<div class="vendor">
		<<?php echo esc_attr($code); ?> width="100%" height="100%" src="<?php echo esc_url($intech_pfv_meta['intech_pfv_link']); ?>" frameborder="0" allowfullscreen="false"></<?php echo esc_attr($code); ?>>
	</div>
	<?php elseif( intech_post_thumbnail() ) : ?>
	<div class="intech-bimg">
		<?php intech_post_thumbnail(); ?>		
	</div>
	<?php endif; ?>
	<?php get_template_part('template-parts/content','summery'); ?>
</div>