<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package intech
 */

get_header();
if (defined('CS_ACTIVE_FRAMEWORK') && function_exists('cs_get_option')) : ?>
<div class="breadcroumb-boxs">
      <div class="container">
            <div class="breadcroumb-box">
                  <div class="brea-title">
                        <h2>
                        	<?php printf( esc_html__( 'Search Results for: %s', 'intech' ), '<span>' . get_search_query() . '</span>' ); ?>
                        </h2>
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
                        <h2>
                        	<?php printf( esc_html__( 'Search Results for: %s', 'intech' ), '<span>' . get_search_query() . '</span>' ); ?>
                        </h2>
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
					<?php if ( have_posts() ) :
							while ( have_posts() ) :
								the_post();
								get_template_part( 'template-parts/content', 'search' );
							endwhile;
							?>
							<?php if( get_the_post_navigation() ) : ?>
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
							<?php endif;  ?>
							<?php
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
