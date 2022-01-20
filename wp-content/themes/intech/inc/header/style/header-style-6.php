<?php 
$button_text = cs_get_option('intech_header_quote2_text');
$button_url = cs_get_option('intech_header_quote2_url');
?>
<div class="header-area header6">
      <header id="masthead" class="site-header">
            <div class="header-main-area" id="header-stikcy">
                  <div class="header-main-inner">
                        <div class="container">
                              <nav class="navbar navbar-expand-lg">
                                <div class="site-branding">
                                        <?php get_template_part( 'inc/header/header-logo' ); ?>
                                </div>
                                <div class="header-menu mr-auto ml-5"> 
                                        <?php get_template_part( 'inc/header/header-menu' ); ?>
                                </div>
                                <div class="quote-button">
                                    <a href="<?php echo esc_url($button_url); ?>" class="quote-btn-2"><?php echo esc_html($button_text); ?></a>
                                </div>
                              </nav>
                        </div>
                  </div>
            </div>
      </header>
</div>