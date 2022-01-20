<?php 

// active framework 

function is_cs_framework_active() {
	return ( function_exists( 'cs_get_option' ) ) ? true : false;
}

// Comment section 
function intech_comment_form_field($fields){
	$comment_field = $fields['comment'];
	unset($fields['comment']);
	$fields['comment'] = $comment_field;
	$cookies_field = $fields['cookies'];
	unset($fields['cookies']);
	$fields['cookies'] = $cookies_field;
	return $fields;
}
add_filter('comment_form_fields','intech_comment_form_field');

// intech pagination
if ( !function_exists('intech_pagination') ) {
    function intech_pagination(){
        the_posts_pagination(array(
            'screen_reader_text' => '',
            'prev_text'          => '<i class="fa fa-angle-left"></i>',
            'next_text'          => '<i class="fa fa-angle-right"></i>',
            'type'               => 'list',
            'mid_size'           => 1,
        ));
    }
}

// Add Span In category number
add_filter('wp_list_categories', 'intech_cat_count_span');
function intech_cat_count_span($links) {
  $links = str_replace('</a> (', '</a> <span>(', $links);
  $links = str_replace(')', ')</span>', $links);
  return $links;
}
// Add Span In archive number
function intech_the_archive_count($links) {
    $links = str_replace('</a>'.esc_attr__('&nbsp;','intech').'(', '</a> <span>(', $links);
    $links = str_replace(')', ')</span>', $links);
    return $links;
}
add_filter('get_archives_link', 'intech_the_archive_count');