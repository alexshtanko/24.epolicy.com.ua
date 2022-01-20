<?php 
if(get_post_meta( $post->ID, 'intech_page_meta_options', true)) {
	$intech_meta = get_post_meta( $post->ID, 'intech_page_meta_options', true );
} else {
  $intech_meta = array();
}
if(is_array($intech_meta) && array_key_exists('intech_page_ft_select', $intech_meta) && $intech_meta['intech_page_ft_select'] !== 'none' && $intech_meta['intech_page_ft_enable'] == true ){
	$select_footer = $intech_meta['intech_page_ft_select'];
}elseif(!empty(cs_get_option('intech_ft_select'))){
	$select_footer = cs_get_option('intech_ft_select');
}else{
	$select_footer = 'one';
}
get_template_part('inc/footer/footer-'.$select_footer.'');
?>