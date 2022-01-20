<?php
/**
*Template Name: Blank Page
*/
get_header();
?>
<?php get_template_part('inc/breadcroumb'); ?>
<div class="intech-black-page">
      <?php
            while ( have_posts() ) : the_post();
                  the_content();
            endwhile;
      ?>
      
</div>
<?php get_footer();