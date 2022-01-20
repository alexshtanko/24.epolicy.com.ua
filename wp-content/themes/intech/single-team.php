<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package intech
 */

get_header();
?>
<?php get_template_part('inc/breadcroumb'); ?>
<div class="default-page-section">
      <div class="team-single-page">
            <div class="theme-content">
            <?php
                  while ( have_posts() ) :
                        the_post();
                        get_template_part( 'template-parts/content', get_post_type() );
                  endwhile; 
                  ?>
            </div>
      </div>	
</div>
<?php get_footer(); ?>
