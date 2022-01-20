<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package intech
 */
	if (defined('CS_ACTIVE_FRAMEWORK') && function_exists('cs_get_option')) {
		$intech_pfa_meta = get_post_meta( $post->ID, 'intech_pfa_meta', true );
		$code = 'iframe';
	}
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('post-single'); ?>>
	<?php if(!empty($intech_pfa_meta['intech_pfa_link'])) : ?>
	<div class="post-audio">
        <<?php echo esc_attr($code); ?> width="100%" height="100%" scrolling="no" frameborder="no" allow="autoplay" src="<?php echo esc_url($intech_pfa_meta['intech_pfa_link']) ?>"></<?php echo esc_attr($code); ?>>
    </div>
	<?php else : ?>
	<div class="intech-bimg">
		<?php intech_post_thumbnail(); ?>		
	</div>
	<?php endif; ?>
	<?php get_template_part('template-parts/content','summery'); ?>
</div>