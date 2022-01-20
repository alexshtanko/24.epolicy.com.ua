<?php 
 if( is_cs_framework_active()){
	$intech_header_logo_enable = cs_get_option('intech_header_logo_enable');
	$intech_header_image_logo = cs_get_option('intech_header_image_logo');
	$intech_page_id = get_the_ID();
	if(get_post_meta($intech_page_id, 'intech_page_meta_options', true)){
		$intech_page_meta = get_post_meta($intech_page_id, 'intech_page_meta_options', true);
	}else{
		$intech_page_meta = array();
	}
	if(array_key_exists('intech_page_logo_enable', $intech_page_meta)){
		$intech_page_logo_enable = $intech_page_meta['intech_page_logo_enable'];
	}
	if(array_key_exists('intech_page_logo_upload', $intech_page_meta)){
		$intech_page_logo_upload = $intech_page_meta['intech_page_logo_upload'];
	}
	
}
?>
<?php 
if(!empty($intech_header_logo_enable == 'true' ) || array_key_exists('intech_page_logo_upload', $intech_page_meta) && !empty($intech_page_logo_enable == 'true' )){
	?>
	<div class="rafo-logo-default">
		<?php if( array_key_exists('intech_page_logo_enable', $intech_page_meta) && !empty($intech_page_meta['intech_page_logo_enable'] == 'true' )) : $intech_logo_src2 = wp_get_attachment_image_src($intech_page_logo_upload,'full',false) ?>
		<div class="theme-logo">
			<a class="d-flex align-items-center justify-content-center" href="<?php echo esc_url(home_url('/')); ?>">
				<img src="<?php echo esc_url($intech_logo_src2[0])  ?>" alt="<?php the_title_attribute(); ?>">
			</a>
		</div>
		<?php elseif(!empty($intech_header_image_logo)) :  $intech_logo_src1 = wp_get_attachment_image_src($intech_header_image_logo,'full',false) ?>
		<div class="theme-logo">
			<a class="d-flex align-items-center justify-content-center" href="<?php echo esc_url(home_url('/')); ?>">
				<img src="<?php echo esc_url($intech_logo_src1[0])  ?>" alt="<?php the_title_attribute(); ?>">
			</a>
		</div>
		<?php endif; ?>
	</div>
	<?php 
}else{
	if( function_exists('the_custom_logo') && has_custom_logo() ):
	the_custom_logo();
	else:?>
		<div class="abos-logo-default">
			<h1 class="default-logo">
				<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
					<?php bloginfo('title'); ?>
				</a>
			</h1>
		</div>
	<?php 
	endif;
}		
?>
<?php
if ( has_nav_menu( 'main-menu' ) ) {
    ?>
	<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navmenu">
		<span class="main-menu-btn">
			<span class="main-menu-btn-icon"></span>
		</span>
	</button>
	<?php
}?>