<?php
/**
*Template Name: Blank Container
*/
get_header();
?>
<?php get_template_part('inc/breadcroumb'); ?>
<div class="container">
	<div class="intech-black-page without-elementor">
	      <?php
            while ( have_posts() ) : the_post();
                  the_content();
            endwhile;
	      ?>
	</div>
</div>
<?php get_footer();