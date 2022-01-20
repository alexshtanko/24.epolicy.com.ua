<?php  
require get_template_directory() . '/inc/page-config.php';
if (defined('CS_ACTIVE_FRAMEWORK') && function_exists('cs_get_option')) : ?>
<div class="breadcroumb-boxs">
      <div class="container">
            <div class="breadcroumb-box">
                  <div class="brea-title">
                        <h2><?php if(!empty($intech_custom_page_title)) { echo esc_html($intech_custom_page_title);}else{the_title();}?></h2>
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