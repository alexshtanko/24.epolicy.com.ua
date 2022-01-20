<?php
/**
*Template Name: Onepage Template
*/
get_header();
?>
<div class="intech-onepage-template">
      <?php
            while ( have_posts() ) : the_post();
                  the_content();
            endwhile;
      ?>
</div>
<?php get_footer();