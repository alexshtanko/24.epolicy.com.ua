<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package intech
 */

get_header();
?>
<div class="breadcroumb-boxs">
      <div class="container">
            <div class="breadcroumb-box">
                  <div class="brea-title">
                        <h2><?php esc_html_e('Our Blog','intech'); ?></h2>
                  </div>
            </div>
      </div>
</div>
<?php get_template_part( 'template-parts/intech-blog' ); ?>
<?php get_footer(); ?>
