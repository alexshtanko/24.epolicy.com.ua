<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package intech 
 */
if( is_cs_framework_active() ) {
	$intech_ft_copyright = cs_get_option('intech_ft_copyright');
	$intech_ft_copyright_kses =array(
    'a' => array(
	  'href' => array(),
	  'class' => array()
    ),
    'br' => array(),
    'em' => array(),
    'strong' => array(),
    'span' => array(),
);
}?>
</div><!-- #content -->

<footer id="colophon" class="site-footer">
	<?php 
	if( is_cs_framework_active() ) {
		get_template_part('inc/footer/footer');
	}else{
		get_template_part('inc/footer/footer-default');
	}
	?>
</footer><!-- #colophon -->
</div><!-- #page -->
<div class="to-top" id="back-top"><i class="fa fa-angle-up"></i></div>
<?php wp_footer(); ?>

</body>
</html>
