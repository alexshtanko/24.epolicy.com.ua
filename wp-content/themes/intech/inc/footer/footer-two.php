<div class="footer-two">
    <div class="ftarea" >
        <ul class="ftcircles"> <li></li> <li></li><li></li> <li></li><li></li><li></li><li></li><li></li><li></li><li></li></ul>
    </div >
    <div class="ft2-widgets">
        <div class="container">
            <div class="row">
                <?php 
                    $intech_ft2_item1 = cs_get_option('intech_ft2_items1');
                    $intech_ft2_item2 = cs_get_option('intech_ft2_items2');
                    $intech_ft2_item3 = cs_get_option('intech_ft2_items3');
                    $image = $intech_ft2_item1['intech_ft2_clogo'];
                    if(!empty($intech_ft2_item1)){
                        echo '
                        <div class="widget-area col-xs-12 col-sm-12 col-md-6 col-lg-3">
                            <div class="intech-ft-content">
                                <div class="intech-ft-content">
                                    ';
                                    if(!empty($image)){
                                        echo '<div class="ft-img">
                                        <img src="'.esc_url($image).'" alt="'.esc_html('Intech by themepul','intechcore').'">
                                        </div>';
                                    }
                                    echo '
                                    <p>'.esc_html($intech_ft2_item1['intech_ft2_dec']).'</p>
                                    <div class="opening">
                                        <label>'.esc_html('Open Days:','intechcore').'</label>
                                        <span>'.esc_html($intech_ft2_item1['intech_ft2_open']).'</span>
                                    </div>
                                    <div class="opentime">
                                        <label>'.esc_html('Open Time:','intechcore').'</label>
                                        <span>'.esc_html($intech_ft2_item1['intech_ft2_open_time']).'</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                    if(!empty($intech_ft2_item3)){
                        echo '
                        <div class="widget-area col-xs-12 col-sm-12 col-md-6 col-lg-3">
                            <div class="intech-ft-content">
                                <div class="intech-ft-content">
                                    <h2 class="widtet-title">'.esc_html($intech_ft2_item3['intech_2ft_title3']).'</h2>
                                    <div class="ft-newsletter-dec">
                                        <p>'.esc_html($intech_ft2_item3['intech_2ft_news_dec']).'</p>
                                    </div>
                                    <div class="ft-newinput">
                                        '.do_shortcode($intech_ft2_item3['intech_2ft_news_code']).'
                                    </div>
                                    <div class="new-social">
                                        <ul>
                                            <li><a class="fb" href="'.esc_url($intech_ft2_item3['intech_2ft_fb']).'"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twi" href="'.esc_url($intech_ft2_item3['intech_2ft_twi']).'"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="pin" href="'.esc_url($intech_ft2_item3['intech_2ft_pintarest']).'"><i class="fa fa-pinterest"></i></a></li>
                                            <li><a class="inst" href="'.esc_url($intech_ft2_item3['intech_2ft_instagram']).'"><i class="fa fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                    if(!empty($intech_ft2_item2)){
                        echo '
                        <div class="widget-area col-xs-12 col-sm-12 col-md-6 col-lg-3">
                            <div class="intech-ft-content">
                                <div class="intech-ft-content">
                                    <h2 class="widtet-title">'.esc_html($intech_ft2_item2['intech_2ft_2title']).'</h2>
                                    <div class="ft2-info-lists">
                                        <div class="item">
                                            <div class="icon">
                                                <i class="fa fa-map-marker"></i>
                                            </div>
                                            <div class="item-info">
                                               <span>'.esc_html($intech_ft2_item2['intech_2ft_location']).'</span>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="icon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <div class="item-info">
                                               <span>'.esc_html($intech_ft2_item2['intech_2ft_phone']).'</span>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="icon">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                            <div class="item-info">
                                               <span>'.esc_html($intech_ft2_item2['intech_2ft_email']).'</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                    ?>
                    <?php 
                    $intech_ft2_item4 = cs_get_option('intech_ft2_items4');
                    
                    if(!empty($intech_ft2_item4)) : ?>
                    <script>
                        jQuery(document).ready(function($) {
                            $('.imstagram-gallery').magnificPopup({
                                delegate: 'a',
                                type: 'image',
                                closeOnContentClick: false,
                                closeBtnInside: false,
                                mainClass: 'mfp-with-zoom mfp-img-mobile',
                                gallery: {
                                    enabled: true
                                },
                                zoom: {
                                    enabled: true,
                                    duration: 300, // don't foget to change the duration also in CSS
                                    opener: function(element) {
                                        return element.find('img');
                                    }
                                }
                                
                            });
                        });
                    </script>
                    <div class="widget-area col-xs-12 col-sm-12 col-md-6 col-lg-3">
                        <div class="intech-ft-content">
                            <div class="intech-ft-content">
                                <h2 class="widtet-title"><?php echo esc_html($intech_ft2_item4['intech_2ft_title4']); ?></h2>
                                <div class="imstagram-gallery">

                                    <?php 
                                    if(!empty($intech_ft2_item4['intech_2ft_insta_img'])){
                                        $gallery = $intech_ft2_item4['intech_2ft_insta_img'];
                                        $ids = explode( ',', $gallery );
                                        foreach( $ids as $ftim ){
                                           $img =  wp_get_attachment_image_src( $ftim, 'full' );
                                           echo '<a data-effect="mfp-zoom-in" href="'.esc_url($img[0]).'" data-source="'.esc_url($img[0]).'"><img src="'.esc_url($img[0]).'" alt="'.esc_attr('intech by themepul','intechcore').'"></a>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?> 
            </div>
        </div>
    </div>
    
    <div class="footer-copyright2">
        <div class="container">
                <div class="text-center">
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
</div>