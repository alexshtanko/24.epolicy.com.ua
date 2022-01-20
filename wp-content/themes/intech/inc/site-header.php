<?php 
      $intech_page_id = get_the_ID();
      if(get_post_meta($intech_page_id, 'intech_page_meta_options', true)){
            $intech_page_meta = get_post_meta($intech_page_id, 'intech_page_meta_options', true);
      }else{
            $intech_page_meta = array();
    }
    if(array_key_exists('intech_page_header_select', $intech_page_meta)){
            $intech_page_header_select = $intech_page_meta['intech_page_header_select'];
      }
      if(array_key_exists('intech_page_header_enable', $intech_page_meta)){
            $intech_page_header_enable = $intech_page_meta['intech_page_header_enable'];
      }
$intech_header_style_select = cs_get_option('intech_header_style_select');
if(array_key_exists('intech_page_header_select', $intech_page_meta) && array_key_exists('intech_page_header_enable', $intech_page_meta) && $intech_page_meta['intech_page_header_select'] !== '0'  && $intech_page_meta['intech_page_header_enable'] == 'true' ) {
      if($intech_page_meta['intech_page_header_select'] == '1' ){
            get_template_part( 'inc/header/style/header-style','1' );
      }elseif($intech_page_meta['intech_page_header_select'] == '2' ){
            get_template_part( 'inc/header/style/header-style','2' );
      }elseif($intech_page_meta['intech_page_header_select'] == '3' ){
            get_template_part( 'inc/header/style/header-style','3' );
      }elseif($intech_page_meta['intech_page_header_select'] == '4' ){
            get_template_part( 'inc/header/style/header-style','4' );
      }elseif($intech_page_meta['intech_page_header_select'] == '5' ){
            get_template_part( 'inc/header/style/header-style','5' ); 
      }elseif($intech_page_meta['intech_page_header_select'] == '6' ){
            get_template_part( 'inc/header/style/header-style','6' ); 
      }
}else{
      if($intech_header_style_select == '1'){
            get_template_part( 'inc/header/style/header-style','1' );
      }elseif($intech_header_style_select == '2' ){
            get_template_part( 'inc/header/style/header-style','2' );
      }elseif($intech_header_style_select == '3' ){
            get_template_part( 'inc/header/style/header-style','3' );
      }elseif($intech_header_style_select == '4' ){
            get_template_part( 'inc/header/style/header-style','4' );
      }elseif($intech_header_style_select == '5' ){
            get_template_part( 'inc/header/style/header-style','5' );
      }elseif($intech_header_style_select == '6' ){
            get_template_part( 'inc/header/style/header-style','6' );
      }else{
            get_template_part( 'inc/header/style/header-style','1' ); 
      }
}
?>
