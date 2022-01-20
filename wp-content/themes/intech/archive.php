<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package intech 
 */

get_header();
?>
<?php  
require get_template_directory() . '/inc/page-config.php';
if (defined('CS_ACTIVE_FRAMEWORK') && function_exists('cs_get_option')) : ?>
<div class="breadcroumb-boxs">
      <div class="container">
            <div class="breadcroumb-box">
                  <div class="brea-title">
                        <h2><?php the_archive_title(); ?></h2>
                  </div>
                  <?php if(function_exists('bcn_display')) : ?>
                  <div class="bcn_display">
                        <?php bcn_display(); ?>
                  </div>
                  <?php endif; ?>
            </div>
      </div>
</div>
<?php else : ?>
<div class="breadcroumb-boxs">
      <div class="container">
            <div class="breadcroumb-box">
                  <div class="brea-title">
                        <h2><?php the_title(); ?></h2>
                  </div>
            </div>
      </div>
</div>
<?php endif; ?>
<div class="default-page-section">
	<div class="container">
		<div class="row">
			<div class="<?php if(is_active_sidebar('sidebar-1')) : ?>col-lg-8 <?php else : ?>col-lg-11 <?php endif; ?> col-md-12 col-sm-12 col-12">
				<div class="theme-content">
                            <?php if ( have_posts() ) : ?>
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );
		
					endwhile;
					the_posts_navigation();
		
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>
				</div>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
