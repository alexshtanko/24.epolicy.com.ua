<?php
/**
 * The template for displaying WP account
 *
 * Template Name: WP account
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package intech
 */

get_header();
?>
<?php get_template_part('inc/breadcroumb'); ?>
<div class="default-page-section">
    <div class="container" data="page-account">
        <div class="row">
<!--            <div class="--><?php //if(is_active_sidebar('sidebar-1')) : ?><!--col-lg-8 --><?php //else : ?><!--col-lg-11 --><?php //endif; ?><!-- col-md-12 col-sm-12 col-12">-->
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="theme-content">
                    <?php
                    while ( have_posts() ) :
                        the_post();

                        get_template_part( 'template-parts/content', 'page' );?>

                        <?php /* if( get_the_post_navigation() ) : ?>
                        <div class="theme-post-navication">
                            <div class="nave-arcive">
                                <a href="<?php echo esc_url(home_url('/')); ?>"><i class="fa fa-th-large"></i></a>
                            </div>
                            <?php
                            // Previous/next post navigation.
                            the_post_navigation(array(
                                'next_text' => '<span class="meta-nav">' . esc_html__( 'Next Post', 'intech' ) . '</span><h3 class="title">%title</h3>',
                                'prev_text' => '<span class="meta-nav">' . esc_html__( 'Prev Post', 'intech' ) . '</span><h3 class="title">%title</h3>',
                            ));
                            ?>
                        </div>
                    <?php endif; */

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
                    ?>
                </div>
            </div>
            <?php // get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
