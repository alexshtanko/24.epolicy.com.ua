<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package intech
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('post-single'); ?>>
      <?php if( intech_post_thumbnail() ) : ?>
	<div class="intech-bimg">
		<?php intech_post_thumbnail(); ?>		
	</div>
	<?php endif; ?>
	<div class="blog-article">
		<div class="intech-page-content">
			<?php
			the_content();
			wp_link_pages( array(
				'before'     => '<div class="page-links post-pagination"><p>' . esc_html__( 'Pages:', 'intech' ).'</p><ul class="page-numbers"><li>',
	            'separator'        => '</li><li>',
	            'after'            => '</li></ul></div>',
	            'next_or_number'   => 'number',
	            'nextpagelink'     => esc_html__( 'Next Page', 'intech'),
	            'previouspagelink' => esc_html__( 'Prev Page', 'intech' ),
			) );
			?>
		</div>
	</div>
</div>
