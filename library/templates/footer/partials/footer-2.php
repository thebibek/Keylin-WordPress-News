<?php
    $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');

    if ((isset($atbs_option['bk-footer-inverse'])) && (($atbs_option['bk-footer-inverse']) == 1)){
        $inverseClass = 'yes';
    }else {
        $inverseClass = '';
    }
    if ((isset($atbs_option['bk-footer-pattern'])) && (($atbs_option['bk-footer-pattern']) == 1)){
        $hasPattern = 'yes';
    }else {
        $hasPattern = '';
    }
    $logo   = ATBS_Core::bk_get_theme_option('bk-footer-logo');
    $logoW  = ATBS_Core::bk_get_theme_option('footer-logo-width');
    // logo dark mode
    $logoDarkMode   = ATBS_Core::bk_get_theme_option('bk-footer-logo-dark-mode');
    $logoDarkModeClass = '';
    if (empty($logoDarkMode) || ($logoDarkMode['url'] == '') || !(array_key_exists('url',$logoDarkMode)) ) :
        $logoDarkModeClass = ' not-exist-img-logo';
    endif;

    $darkModeActive  = ATBS_Core::bk_get_darkmode_cookie();
    $logoDarkModeActiveClass = $darkModeActive ? ' logo-dark-mode-active text-center' : ' text-center';
?>
<footer class="site-footer footer-2 <?php if ($hasPattern == "yes") echo " has-bg-pattern";?> <?php if ($inverseClass == "yes") echo " site-footer--inverse inverse-text";?>">
    <div class="site-footer__section">
		<div class="container">
			<div class="site-footer__section-inner text-center">
				<div class="site-logo atbs-keylin-logo<?php echo esc_attr($logoDarkModeActiveClass); ?><?php echo esc_attr($logoDarkModeClass); ?>">
					<a href="<?php echo esc_url(get_home_url('/'));?>">
                        <!-- logo open -->

                        <?php if (($logo != null) && (array_key_exists('url',$logo))) {
                                if ($logo['url'] != '') {
                            ?>
                            <img class="keylin-img-logo active" src="<?php echo esc_url($logo['url']);?>" alt="<?php esc_attr_e('logo', 'keylin');?>" <?php if($logoW != '') {echo 'width="'.esc_attr($logoW).'"';}?>/>
                                <!-- logo dark mode -->
                                <?php if ( ($logo != null) && (array_key_exists('url',$logo)) && ($logoDarkMode != null) && (array_key_exists('url',$logoDarkMode)) ) {
                                    if ($logoDarkMode['url'] != '') {?>
                                    <img class="keylin-img-logo" src="<?php echo esc_url($logoDarkMode['url']);?>" alt="<?php esc_attr_e('logo', 'keylin');?>"  <?php if($logoW != '') {echo 'width="'.esc_attr($logoW).'"';}?>/>
                                <?php }
                                }  ?>
                                <!-- logo dark mode -->
                        <?php } else {?>
                            <span class="logo-text">
                            <?php echo esc_attr(bloginfo( 'name' ));?>
                            </span>
                        <?php }
                        } else {?>
                            <span class="logo-text">
                            <?php echo esc_attr(bloginfo( 'name' ));?>
                            </span>
                        <?php } ?>
                        <!-- logo close -->
					</a>
				</div>
			</div>
		</div>
	</div>
    <?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
	<div class="site-footer__section">
		<div class="container">
			<nav class="footer-menu text-center">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer-menu',
                        'depth' => '1',
                        'menu_class' => 'navigation navigation--footer navigation--inline',
                        )
                );
                ?>
			</nav>
		</div>
	</div>
    <?php endif;?>
    <?php if (isset($atbs_option['footer-social']) && ($atbs_option['footer-social'] != '')) :?>
	<div class="site-footer__section">
		<div class="container">
			<ul class="social-list social-list--lg list-center">
				<?php
                    echo ATBS_Core::bk_get_social_media_links($atbs_option['footer-social']);
                ?>
			</ul>
		</div>
	</div>
    <?php endif;?>
    <?php if (isset($atbs_option['footer-copyright-text']) && ($atbs_option['footer-copyright-text'] != '')) :?>
	<div class="site-footer__section">
		<div class="container">
			<div class="text-center">
                <?php
                    $atbs_allow_html = array(
                        'a' => array(
                            'href' => array(),
                            'title' => array()
                        ),
                        'br' => array(),
                        'em' => array(),
                        'strong' => array(),
                        'img' => array(
                            'src' => array(),
                            'alt' => array(),
                            'class' => array(),
                            'draggable' => array()
                        )
                    );
                    echo wp_kses($atbs_option['footer-copyright-text'], $atbs_allow_html);
                ?>
			</div>
		</div>
	</div>
    <?php endif;?>
</footer>
<?php
    if ((isset($atbs_option['bk-sticky-menu-switch'])) && ($atbs_option['bk-sticky-menu-switch'] == 1)):
        get_template_part( 'library/templates/header/atbs-sticky-header' );
    endif;

    if ( function_exists('login_with_ajax') ) {
        get_template_part( 'library/templates/atbs-login-modal' );
    }

    if ( isset($atbs_option ['bk-offcanvas-desktop-switch']) && ($atbs_option ['bk-offcanvas-desktop-switch'] != 0) ){
        get_template_part( 'library/templates/offcanvas/offcanvas-desktop' );
    }

    get_template_part( 'library/templates/offcanvas/offcanvas-mobile' );

    if ((isset($atbs_option['bk-header-subscribe-switch'])) && ($atbs_option['bk-header-subscribe-switch'] == 1)):
        get_template_part( 'library/templates/atbs-subscribe-modal' );
    endif;
    get_template_part( 'library/templates/header/header-search-popup' );

?>
<!-- go top button -->
<a href="#" class="atbs-keylin-go-top btn btn-default hidden-xs js-go-top-el"><i class="mdicon mdicon-arrow_upward"></i></a>