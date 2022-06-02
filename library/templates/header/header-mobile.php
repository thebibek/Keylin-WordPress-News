<?php
    $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');
    $logo   = ATBS_Core::bk_get_theme_option('bk-logo');
    $mobileLogo   = ATBS_Core::bk_get_theme_option('bk-mobile-logo');
    $logoSOption  = ATBS_Core::bk_get_theme_option('bk-site-logo-size-option');
    if ($logoSOption == 'customize') {
        $logoW   = ATBS_Core::bk_get_theme_option('site-logo-width');
    } else {
        $logoW = '';
    }
    if ((isset($atbs_option['bk-header-inverse'])) && (($atbs_option['bk-header-inverse']) == 1)){
        $inverseClass = 'yes';
    } else {
        $inverseClass = '';
    }
    if ((isset($atbs_option['bk-mobile-menu-inverse'])) && (($atbs_option['bk-mobile-menu-inverse']) == 1)){
        $inverseClass_Mobile = 'yes';
    } else {
        $inverseClass_Mobile = '';
    }
    $atbsAds = 'enable';
    if ((isset($atbs_option['bk-header-ads'])) && ($atbs_option['bk-header-ads'] == 1)) {
        $atbsAds = 'enable';
    } else {
        $atbsAds = 'disable';
    }
    // logo dark mode
    $logoDarkMode   = ATBS_Core::bk_get_theme_option('bk-mobile-logo-dark-mode');
    $logoDarkModeClass = '';
    if (empty($logoDarkMode) || ($logoDarkMode['url'] == '') || !(array_key_exists('url',$logoDarkMode)) ) :
        $logoDarkModeClass = ' not-exist-img-logo';
    endif;
    $darkModeEnabled = ( isset($atbs_option['bk_enable_darkmode']) && $atbs_option['bk_enable_darkmode'] ) ? true : false;
    $darkModeSW      = ( $darkModeEnabled && isset($atbs_option['bk_darkmode_sw']) && $atbs_option['bk_darkmode_sw'] ) ? true : false;
    $darkModeActive  = ATBS_Core::bk_get_darkmode_cookie();
    $logoDarkModeActiveClass = $darkModeActive ? ' logo-dark-mode-active' : '';
?>
<!-- Mobile header -->
<div id="atbs-keylin-mobile-header" class="mobile-header visible-xs visible-sm <?php if ($inverseClass_Mobile == "yes") echo " mobile-header--inverse";?>">
	<div class="mobile-header__inner mobile-header__inner--flex">
        <!-- mobile logo open -->
		<div class="header-branding header-branding--mobile mobile-header__section text-left">
			<div class="header-logo header-logo--mobile flexbox__item text-left atbs-keylin-logo<?php echo esc_attr($logoDarkModeActiveClass); ?><?php echo esc_attr($logoDarkModeClass); ?>">
                <a href="<?php echo esc_url(get_home_url('/'));?>">
                    <?php if (($mobileLogo != null) && (array_key_exists('url',$mobileLogo))) {
                        if ($mobileLogo['url'] != '') {
                    ?>
                    <img class="keylin-img-logo active" src="<?php echo esc_url($mobileLogo['url']);?>" alt="<?php esc_attr_e('mobileLogo', 'keylin');?>"/>
                    <!-- logo dark mode -->
                    <?php if ( ($mobileLogo != null) && (array_key_exists('url',$mobileLogo)) && ($logoDarkMode != null) && (array_key_exists('url',$logoDarkMode)) ) {
                        if ($logoDarkMode['url'] != '') {?>
                        <img class="keylin-img-logo" src="<?php echo esc_url($logoDarkMode['url']);?>" alt="<?php esc_attr_e('mobileLogo', 'keylin');?>"/>
                    <?php }
                    }  ?>
                    <!-- logo dark mode -->
                    <?php
                    } else {?>
                            <span class="logo-text">
                            <?php echo esc_attr(bloginfo( 'name' ));?>
                            </span>
                    <?php }
                    } else {?>
                        <span class="logo-text">
                        <?php echo esc_attr(bloginfo( 'name' ));?>
                        </span>
                    <?php } ?>
                </a>
			</div>
		</div>
        <!-- logo close -->
		<div class="mobile-header__section text-right">
			<div class="flexbox flexbox-center-y">
                <?php if ( $darkModeSW ) : get_template_part( 'library/templates/header/atbs-theme-switch' ); endif; ?>
    			<button type="submit" class="mobile-header-btn js-search-popup">
    				<i class="mdicon mdicon-search mdicon--last hidden-xs"></i><i class="mdicon mdicon-search visible-xs-inline-block"></i>
    			</button>
                <?php if (is_active_sidebar('mobile-offcanvas-widget-area') || has_nav_menu( 'main-menu' ) || has_nav_menu( 'offcanvas-menu' )):?>
    			<a href="#atbs-keylin-offcanvas-mobile" class="offcanvas-menu-toggle mobile-header-btn js-atbs-keylin-offcanvas-toggle">
    				<i class="mdicon mdicon-menu mdicon--last hidden-xs"></i><i class="mdicon mdicon-menu visible-xs-inline-block"></i>
    			</a>
                <?php endif;?>
            </div>
		</div>
	</div>
    </div><!-- Mobile header -->