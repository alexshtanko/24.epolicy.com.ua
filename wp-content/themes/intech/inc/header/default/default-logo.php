<div class="site-branding">
<?php
if( function_exists('the_custom_logo') && has_custom_logo() ):
    the_custom_logo();
    else: ?>
	<div class="rafo-logo-default">
		<h1 class="default-logo">
			<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
            	<?php bloginfo('title'); ?>
            </a>
		</h1>
	</div>
<?php endif; ?>
</div>
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