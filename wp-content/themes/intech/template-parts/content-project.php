<?php
if (defined('CS_ACTIVE_FRAMEWORK') && function_exists('cs_get_option')) {
    $intech_project_meta = get_post_meta( $post->ID, 'intech_project_meta', true );
}
?>
<div class="project-single-area">
    <div class="container">
        <div class="project-thum">
            <?php the_post_thumbnail('intech-project-full', array('class' => 'img-responsive')); ?>
        </div>
        <div class="project-s-contents row">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="pro-category">
                    <h2><?php esc_html_e('our project history','intech'); ?></h2>
                    <ul>
                        <?php if( !empty($intech_project_meta['intech_pro_title'])) : ?>
                        <li><span><?php esc_html_e('project Title :','intech'); ?></span><?php echo esc_html($intech_project_meta['intech_pro_title']); ?></li>
                        <?php endif; ?>
                        <?php if( !empty($intech_project_meta['intech_pro_client'])) : ?>
                            <li><span><?php esc_html_e('Client :','intech'); ?></span><?php echo esc_html($intech_project_meta['intech_pro_client']); ?></li>
                        <?php endif; ?>
                        <li><span class="rafo-null"></span></li>
                        <?php if( !empty($intech_project_meta['intech_pro_status'])) : ?>
                            <li><span><?php esc_html_e('Status :','intech'); ?></span><?php echo esc_html($intech_project_meta['intech_pro_status']); ?></li>
                        <?php endif; ?>
                        <li><span><?php esc_html_e('Category :','intech') ?></span>
                            <?php $intech_project_catagory = get_the_terms( get_the_ID(), 'project_cat' ); 
                            foreach($intech_project_catagory as $project_cat ) :  ?>
                                <label><?php echo esc_html($project_cat->name) ?></label>
                            <?php endforeach; ?>
                        </li>
                        <li><span class="rafo-null"></span></li>
                        <?php if( !empty($intech_project_meta['intech_pro_date'])) : ?>
                            <li><span><?php esc_html_e('Date :','intech'); ?></span><?php echo esc_html($intech_project_meta['intech_pro_date']); ?></li>
                        <?php endif; ?>
                        <?php if( !empty($intech_project_meta['intech_pro_value'])) : ?>
                            <li><span><?php esc_html_e('Value :','intech'); ?></span><?php echo esc_html($intech_project_meta['intech_pro_value']); ?></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <div class="pro-s-content">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
