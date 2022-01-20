
<?php 
if( is_cs_framework_active() ) {
	$intech_enable_preloader = cs_get_option('intech_enable_preloader');
}
?>
<?php if( is_cs_framework_active()) :  ?>
	<?php if(!empty($intech_enable_preloader == true )) {
		?>
            <div id="preloader">
                  <div class="group"> 
                        <div class="bigSqr">
                              <div class="square first"></div>
                              <div class="square second"></div>
                              <div class="square third"></div>
                              <div class="square fourth"></div>
                        </div>
                  </div>
            </div>
		<?php 
	}else{
		$intech_enable_preloader = '';
	}
	?>
<?php  else : ?>
      <div id="preloader">
            <div class="group"> 
                  <div class="bigSqr">
                        <div class="square first"></div>
                        <div class="square second"></div>
                        <div class="square third"></div>
                        <div class="square fourth"></div>
                  </div>
            </div>
      </div>
<?php endif; ?>