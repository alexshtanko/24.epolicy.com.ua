<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package intech 
 */

get_header();
?>
<?php  
if( is_cs_framework_active() ) {
	$intech_page_error_img_enable = cs_get_option('intech_page_error_img_enable');
	$intech_page_error_img = cs_get_option('intech_page_error_img');
	$intech_page_error_text = cs_get_option('intech_page_error_text');
	$intech_page_error_small_text = cs_get_option('intech_page_error_small_text');
	$intech_page_error_dec = cs_get_option('intech_page_error_dec');
}
if (defined('CS_ACTIVE_FRAMEWORK') && function_exists('cs_get_option')) : ?>
<div class="breadcroumb-boxs">
      <div class="container">
            <div class="breadcroumb-box">
                  <div class="brea-title">
                        <h2>
				<?php if(! is_cs_framework_active()) : ?>
					<?php esc_html_e('Oops! That page can not be found.','intech') ?>
				<?php elseif(!empty($intech_page_error_small_text)) : ?>
					<?php echo esc_html($intech_page_error_small_text); ?>
				<?php endif; ?>
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
                        <h2><?php esc_html_e('Oops! That page can not be found.','intech') ?></h2>
                  </div>
            </div>
      </div>
</div>
<?php endif; ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main container">
		<div class="error-404 not-found">
			<?php if(! is_cs_framework_active()) : ?>
				<h1><?php esc_html_e('404','intech') ?></h1>
			<?php else : ?>
				<?php if(!empty($intech_page_error_img_enable == 'true')) : $intech_error_source = wp_get_attachment_image_src($intech_page_error_img,'large', true) ?>
					<div class="intech-error-imgs">
						<img src="<?php echo esc_url($intech_error_source[0]); ?>" alt="<?php esc_attr_e('404 Not Found','intech'); ?>">
					</div>
				<?php elseif(!empty($intech_page_error_text)) : ?>
					<h1><?php echo esc_html($intech_page_error_text); ?></h1>
				<?php endif; ?>
			<?php endif; ?>
			<div class="not-found-dec">
				<?php if(! is_cs_framework_active()) : ?>
					<p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?','intech') ?></p>
				<?php elseif(!empty($intech_page_error_dec)) : ?>
						<p><?php echo esc_html($intech_page_error_dec); ?></p>
				<?php endif; ?>
			</div>
			<div class="intech-error-home">
				<div class="theme-buttons">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="theme-button colorbg">
						<?php esc_html_e('Back To Home','intech') ?> <i class="flaticon-right-arrow"></i>
					</a>
				</div>
			</div>
		</div><!-- .error-404 -->
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
