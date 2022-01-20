<?php
if (defined('CS_ACTIVE_FRAMEWORK') && function_exists('cs_get_option')) {
    $intech_team_meta = get_post_meta( $post->ID, 'intech_team_meta', true );
}
?>
<div class="project-single-area">
    <div class="container">
        <div class="single-teams">
            <div class="single-team-top">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-4">
                        <div class="single-team-img">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-7 col-lg-8 col-xl-8">
                        <div class="single-team-info">
                            <div class="singlew-tema-name">
                                <h2><?php the_title(); ?></h2>
                                <?php if(!empty($intech_team_meta['intech_team_stitle'])) : ?>
                                <h5><?php echo esc_html($intech_team_meta['intech_team_stitle']); ?></h5>
                                <?php endif; ?>
                            </div>
                            <div class="singl-tema-info-list">
                                <ul>
                                    <?php if(!empty($intech_team_meta['intech_team_age'])) : ?>
                                        <li><span><?php esc_html_e('Age :','intech'); ?></span><?php echo esc_html($intech_team_meta['intech_team_age']); ?></li>
                                    <?php endif; ?>
                                    <?php if(!empty($intech_team_meta['intech_team_blood'])) : ?>
                                        <li><span><?php esc_html_e('Blood Group :','intech'); ?></span><?php echo esc_html($intech_team_meta['intech_team_blood']); ?></li>
                                    <?php endif; ?>
                                    <li class="null"></li>
                                    <?php if(!empty($intech_team_meta['intech_team_work_pro'])) : ?>
                                        <li><span><?php esc_html_e('Work Progress :','intech'); ?></span><?php echo esc_html($intech_team_meta['intech_team_work_pro']); ?></li>
                                    <?php endif; ?>
                                    <?php if(!empty($intech_team_meta['intech_team_email'])) : ?>
                                        <li><span><?php esc_html_e('E-mail :','intech'); ?></span><?php echo esc_html($intech_team_meta['intech_team_email']); ?></li>
                                    <?php endif; ?>
                                    <li class="null"></li>
                                    <?php if(!empty($intech_team_meta['intech_team_phone'])) : ?>
                                        <li><span><?php esc_html_e('Phone :','intech'); ?></span><?php echo esc_html($intech_team_meta['intech_team_phone']); ?></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <?php if($intech_team_meta['intech_team_socials'])  : ?>
                            <div class="single-team-social">
                                <ul>
                                    <?php foreach($intech_team_meta['intech_team_socials'] as $intech_team_social ) : ?>
                                        <li><a target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo esc_attr($intech_team_social['intech_social_link_text']) ?>" href="<?php echo esc_url($intech_team_social['intech_social_link']) ?>"><span class="<?php echo esc_attr($intech_team_social['intech_social_link_icon']) ?>"></span></a></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-team-content">
                <div class="signle-team-histyory">
                    <h2><?php esc_html_e('My history','intech'); ?></h2>
                </div>
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</div>
