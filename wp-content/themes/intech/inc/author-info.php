<?php
	if (defined('CS_ACTIVE_FRAMEWORK') && function_exists('cs_get_option')) :
		$intech_ainfo_enable = cs_get_option('intech_author_info_enable');
	 if(!empty($intech_ainfo_enable == true)) : ?>
	<div class="intech-author-info">
		<div class="row">
			<div class="col-md-2 col-sm-3 intech-authorimage">
				<?php echo get_avatar( get_the_author_meta( 'ID' )); ?>
			</div>
			<div class="col-md-10 col-sm-9">

				<div class="intech-author-name">
					<h3><?php the_author_meta( 'display_name'); ?></h3>
				</div>
				<div class="intech-author-dec">
					<p>
						<?php the_author_meta('description'); ?>
					</p>
				</div>
				<?php
					$intech_user_cm = wp_get_user_contact_methods()
				?>
				<div class="intech-author-socila">
					<ul>
						<?php
						foreach ($intech_user_cm as $intech_ucm_key => $intech_ucm_value) :
							$intech_cm_link = get_user_meta(get_the_author_meta('ID'), $intech_ucm_key, true);
						?>
						<?php if($intech_cm_link) : ?>
						<li>
							<a data-toggle="tooltip" data-placement="top" data-original-title="<?php echo esc_attr($intech_ucm_key) ?>" href="<?php echo esc_url($intech_cm_link); ?>"><span class="fa fa-<?php echo esc_attr($intech_ucm_key) ?>"></span>
							</a>
						</li>
						<?php endif; ?>
						<?php
						endforeach;	
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
<?php endif; endif; ?>