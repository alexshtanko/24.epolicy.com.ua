<?php get_template_part('inc/footer/footer','widgets'); ?>
<div class="footer-copyright-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex flex-wrap align-content-center">
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
            <div class="col-md-6 d-flex justify-content-end">
                <div class="footer-menu">
                    <?php
                        if ( has_nav_menu( 'footer-menu' ) ) {
                            wp_nav_menu( array(
                                'container_id'=>'footermenu',
                                'menu_class'=>'navbar-nav mr-auto ml-auto sm sm-simple',
                                'menu_id'=>'footer-menu',
                                'theme_location'=>'footer-menu',
                                'echo'            => true,
                                'fallback_cb'     => false,
                            ));
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>