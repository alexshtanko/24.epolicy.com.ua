<?php 
$intech_fotter3_info = cs_get_option('intech_fotter3_info')
?>
<div class="footer-three">
    <?php if(!empty($intech_fotter3_info)) : ?>
    <div class="ft3-top">
        <div class="container">
            <div class="row">
                <?php  foreach( $intech_fotter3_info as $ft3) : ?>
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="ft3-item">
                            <div class="ft3-icon">
                                <i class="<?php echo esc_attr($ft3['intech_ft3_icon']); ?>"></i>
                            </div>
                            <div class="ft3-content">
                                <label><?php echo esc_html($ft3['intech_ft3_label']) ?></label>
                                <?php 
                                if(!empty($ft3['intech_ft3_link'])){
                                    echo '<a href="'.esc_url($ft3['intech_ft3_link']).'">';
                                }
                                echo '<span>'.esc_html($ft3['intech_ft3_dec']).'</span>';
                                if(!empty($ft3['intech_ft3_link'])){
                                    echo '</a>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php get_template_part('inc/footer/footer','widgets'); ?>
    <div class="footer-copyright-area">
        <div class="container text-center">
            <div class="copyright">
                <p>
                <?php if(!empty($intech_ft_copyright)){
                    echo wp_kses(wpautop($intech_ft_copyright), $intech_ft_copyright_kses);
                }else{
                    esc_html_e('Copyright 2020 Themepul All Rights Reserved.','intech');
                } ?>
                </p>
            </div>
        </div>
    </div>
</div>