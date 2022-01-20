
<?php if( is_cs_framework_active() ) :
      $intech_header_top_options = cs_get_option('intech_header_top_options');
      $intech_header_top_enable = cs_get_option('intech_header_top_enable');
      $intech_header_location_icon = cs_get_option('intech_header_location_icon');
      $intech_header_location = cs_get_option('intech_header_location');
      $intech_header_mail_icon = cs_get_option('intech_header_mail_icon');
      $intech_header_email = cs_get_option('intech_header_email');
      $intech_header_phone_icon = cs_get_option('intech_header_phone_icon');
      $intech_header_phne = cs_get_option('intech_header_phne');
      $intech_header_phne_text = cs_get_option('intech_header_phne_text');
      $intech_header_social_options = cs_get_option('intech_header_social_options');
      $intech_heaer_social_links = cs_get_option('intech_heaer_social_links');
      $intech_hsocial_icon = cs_get_option('intech_hsocial_icon');
      $intech_hsocial_link = cs_get_option('intech_hsocial_link');
?>
<?php if(!empty($intech_header_top_enable)) : ?>
<div class="header-top">
      <div class="container">
            <div class="row">
                  <div class="col-lg-8">
                        <div class="topbar-left">
                              <ul>
                                    <li class="toph-loc">
                                          <i class="<?php if(!empty($intech_header_location_icon)){ echo esc_attr($intech_header_location_icon); } ?>"></i>
                                          <?php if(!empty($intech_header_location)){ echo esc_html($intech_header_location); } ?>
                                    </li>
                                    <li>
                                          <i class="<?php if(!empty($intech_header_mail_icon)){ echo esc_attr($intech_header_mail_icon); } ?>"></i>
                                          <span><?php esc_html_e('Email: ','intech'); ?></span>
                                          <a href="mailto:<?php if(!empty($intech_header_email)){ echo esc_attr($intech_header_email); } ?>"><?php if(!empty($intech_header_email)){ echo esc_html($intech_header_email); } ?>
                                          </a>
                                    </li>
                                    <li>
                                          <i class="<?php if(!empty($intech_header_phone_icon)){ echo esc_attr($intech_header_phone_icon); } ?>"></i>
                                          <a href="tel:<?php if(!empty($intech_header_phne)){ echo esc_attr($intech_header_phne); } ?>"><?php if(!empty($intech_header_phne_text)){ echo esc_html($intech_header_phne_text); } ?>
                                          </a>
                                    </li>
                              </ul>
                        </div>
                  </div>
                  <div class="col-lg-4">
                        <div class="topbar-right">
                              <ul>  <?php if( !empty($intech_heaer_social_links)) : foreach($intech_heaer_social_links as $intech_hsocial) : ?>
                                    <li><a href="<?php echo esc_url($intech_hsocial['intech_hsocial_link']) ?>"><i class="<?php echo esc_attr($intech_hsocial['intech_hsocial_icon']) ?>"></i></a></li>
                                    <?php endforeach; endif; ?>
                              </ul> 
                        </div>
                  </div>
            </div>
      </div>
</div>
<?php endif; endif; ?>