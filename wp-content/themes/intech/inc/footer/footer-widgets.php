
<?php 

$footer_col = '3_3_3_3';
if( is_cs_framework_active() ){
	$footer_col = esc_attr(cs_get_option('footer_column_layout'));
}
$footer_start	= '';
$footer_end		= '';
if ( is_active_sidebar( 'footer-1-widget-area' ) || is_active_sidebar( 'footer-2-widget-area' ) || is_active_sidebar( 'footer-3-widget-area' ) || is_active_sidebar( 'footer-4-widget-area' )) 
{
	$footer_start='<div class="footer-widget-section">';
	$footer_end='</div>';
}	

echo wp_kses_post($footer_start);
if ( is_active_sidebar( 'footer-1-widget-area' ) || is_active_sidebar( 'footer-2-widget-area' ) || is_active_sidebar( 'footer-3-widget-area' ) || is_active_sidebar( 'footer-4-widget-area' ) ) 
{
    ?>
	<div class="footer-top intech-footer-widgets">
	    <div class="container">
	        <?php 
			if($footer_col == '3_3_3_3'){
	        ?>
	        <div class="row justify-content-between no-gutters">
	        	<?php if ( is_active_sidebar( 'footer-1-widget-area' ) ) : ?>
					<div class="widget-area col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="intech-ft-content">
                            <?php dynamic_sidebar( 'footer-1-widget-area' ); ?>
                        </div>
					</div><!-- .widget-area -->
				<?php endif; ?>
	        	<?php if ( is_active_sidebar( 'footer-2-widget-area' ) ) : ?>
					<div class="widget-area col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="intech-ft-content">
                            <?php dynamic_sidebar( 'footer-2-widget-area' ); ?>
                        </div>
					</div><!-- .widget-area -->
				<?php endif; ?>	
	        	<?php if ( is_active_sidebar( 'footer-3-widget-area' ) ) : ?>
					<div class="widget-area col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="intech-ft-content">
                            <?php dynamic_sidebar( 'footer-3-widget-area' ); ?>
                        </div>
					</div><!-- .widget-area -->
                <?php endif; ?>	
                <?php if ( is_active_sidebar( 'footer-4-widget-area' ) ) : ?>
					<div class="widget-area col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="intech-ft-content">
                            <?php dynamic_sidebar( 'footer-4-widget-area' ); ?>
                        </div>
					</div><!-- .widget-area -->
				<?php endif; ?>							
	        </div>
	    	<?php }else{ ?>
	    		<div class="row justify-content-between">
	    			<?php
					$footer_col = explode('_', $footer_col);
					
					if( is_array($footer_col) && count($footer_col)>0 ){
						$i = 1;
						foreach($footer_col as $col){
						// ROW width class
						$row_class = 'col-xs-12 col-sm-6 col-md-6 col-lg-'.$col;
						if ( is_active_sidebar( 'footer-'.$i.'-widget-area' ) ) : ?>
							<div class="widget-area <?php echo esc_attr($row_class); ?> footer-widget-area intech-ft-content">
								<?php dynamic_sidebar( 'footer-'.$i.'-widget-area' ); ?>
							</div><!-- .widget-area -->
						<?php endif;
						$i++;
						} // Foreach
					} // If	    			
	    			?>
	    		</div>	
	    	<?php } ?>   		
	    </div>    
	</div>
	<?php
}
echo wp_kses_post($footer_end);
?>