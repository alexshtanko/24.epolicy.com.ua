<?php if( is_cs_framework_active() ){
      $intech_header_quote_options = cs_get_option('intech_header_quote_options');
      $intech_header_quote_enable = cs_get_option('intech_header_quote_enable');
      $intech_header_quote_link_option = cs_get_option('intech_header_quote_link_option');
      $intech_header_quote_link_text = cs_get_option('intech_header_quote_link_text');
      $intech_header_quote_link_page = cs_get_option('intech_header_quote_link_page');
      $intech_header_quote_sub_hadding = cs_get_option('intech_header_quote_sub_hadding');
      $intech_header_quote_hadding = cs_get_option('intech_header_quote_hadding');
      $intech_header_quote_icon = cs_get_option('intech_header_quote_icon');
      if( $intech_header_quote_link_option == 2 ){
            $intech_quote_source = get_page_link($intech_header_quote_link_page);
      }else{
            $intech_quote_source = $intech_header_quote_link_text;
      }
}  
if(!empty($intech_header_quote_enable == true )) : ?>
<div class="header-quote">
      <a href="<?php echo esc_url($intech_quote_source); ?>">
            <?php if(!empty($intech_header_quote_icon)) : ?>
            <div class="header-quote-icon">
                  <i class="<?php echo esc_attr($intech_header_quote_icon); ?>"></i>
            </div>
            <?php endif; ?>
            <div class="header-quote-content">
                  <h4><?php echo esc_html($intech_header_quote_sub_hadding); ?></h4>
                  <h2><?php echo esc_html($intech_header_quote_hadding); ?></h2>
            </div>
      </a>
</div>
<?php endif; ?>
<?php 
if ( class_exists( 'WooCommerce' ) ) {
      intech_woocommerce_header_cart();
}
?>