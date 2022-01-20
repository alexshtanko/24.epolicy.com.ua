<?php 
if (defined('CS_ACTIVE_FRAMEWORK') && function_exists('cs_get_option')) {
		$intech_page_id = get_option( 'page_for_posts');
		if(get_post_meta($post->ID, 'intech_page_meta_options', true)){
			$intech_page_meta = get_post_meta($post->ID, 'intech_page_meta_options', true);
		}elseif(get_post_meta($intech_page_id, 'intech_page_meta_options', true)){
			$intech_page_meta = get_post_meta($intech_page_id, 'intech_page_meta_options', true);
		}else{
			$intech_page_meta = array();
		}
		if(array_key_exists('intech_page_title_enable', $intech_page_meta)){
			$intech_page_title_enable = $intech_page_meta['intech_page_title_enable'];
		} else {
			$intech_page_title_enable = true;
		}
		if(array_key_exists('intech_custom_page_title', $intech_page_meta)){
			$intech_custom_page_title = $intech_page_meta['intech_custom_page_title'];
		}
		
	}
?>