<?php
    $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');
    if ((isset($atbs_option['bk-sticky-header-logo'])) && (($atbs_option['bk-sticky-header-logo']) != NULL)){
        $stickyLogo = $atbs_option['bk-sticky-header-logo'];
        if (($stickyLogo != null) && (array_key_exists('url',$stickyLogo))) {
            if ($stickyLogo['url'] == '') {
                $stickyLogo = ATBS_Core::bk_get_theme_option('bk-logo');
            }
        }
    } else {
        $stickyLogo = ATBS_Core::bk_get_theme_option('bk-logo');
    }

    if ((isset($atbs_option['bk-sticky-menu-inverse'])) && (($atbs_option['bk-sticky-menu-inverse']) == 1)){
        $inverseClass = 'navigation-bar--inverse';
        $socialInverseClass = 'social-list--inverse';
    } else {
        $inverseClass = '';
        $socialInverseClass = '';
    }

    $headerSkin = '';

    $bkHeaderType = '';
    $bkStickyNavClass = '';
    if ((isset($atbs_option['bk-header-type'])) && (($atbs_option['bk-header-type']) != NULL)){
        $bkHeaderType = $atbs_option['bk-header-type'];
    } else {
        $bkHeaderType == 'site-header-1';
    }

    $bkStickyNavClass = 'navigation-bar navigation-bar--fullwidth hidden-xs hidden-sm '.$inverseClass;

    // For Default Header Style
    if ($bkHeaderType == 'site-header-3') {
        $headerSkin = 'site-header--skin-1';
    }
    elseif ($bkHeaderType == 'site-header-5') {
        $headerSkin = 'site-header--skin-2';
    }
    elseif ($bkHeaderType == 'site-header-6') {
        $headerSkin = 'site-header--skin-5';
    }
    elseif ($bkHeaderType == 'site-header-7') {
        $headerSkin = 'site-header--skin-3';
    }
    elseif ($bkHeaderType == 'site-header-8') {
        $headerSkin = 'site-header--skin-4';
    }
    //Scroll Single Percent SW
    $scrollSinglePercentSW = 0;
    $scrollSinglePercentSW = isset($atbs_option['bk-scroll-percent-sw']) ? $atbs_option['bk-scroll-percent-sw'] : 0;
    if ($scrollSinglePercentSW == 'On') :
        $scrollSinglePercentSW = 1;
    endif;
    // logo dark mode
    $logoDarkMode   = ATBS_Core::bk_get_theme_option('bk-sticky-header-logo-dark-mode');
    $logoDarkModeClass = '';
    if (empty($logoDarkMode) || ($logoDarkMode['url'] == '') || !(array_key_exists('url',$logoDarkMode)) ) :
        $logoDarkModeClass = ' not-exist-img-logo';
    endif;

    $darkModeEnabled = ( isset($atbs_option['bk_enable_darkmode']) && $atbs_option['bk_enable_darkmode'] ) ? true : false;
    $darkModeSW      = ( $darkModeEnabled && isset($atbs_option['bk_darkmode_sw']) && $atbs_option['bk_darkmode_sw'] ) ? true : false;
    $darkModeActive  = ATBS_Core::bk_get_darkmode_cookie();
    $logoDarkModeActiveClass = $darkModeActive ? ' logo-dark-mode-active' : '';
?>
<!-- Sticky header -->
<div id="atbs-keylin-sticky-header" class="sticky-header js-sticky-header <?php echo esc_attr($headerSkin);?>">
    <!-- Navigation bar -->
    <nav class="<?php echo esc_html($bkStickyNavClass);?>">
        <div class="navigation-bar__inner">
            <div class="navigation-bar__section">
                <?php if (is_active_sidebar('offcanvas-widget-area') || has_nav_menu( 'main-menu' ) || has_nav_menu( 'offcanvas-menu' )):?>
                    <?php if ( isset($atbs_option ['bk-offcanvas-desktop-switch']) && ($atbs_option ['bk-offcanvas-desktop-switch'] != 0) ):?>
                        <?php if ($bkHeaderType != 'site-header-4') :?>
                        <a href="#atbs-keylin-offcanvas-primary" class="offcanvas-menu-toggle navigation-bar-btn js-atbs-keylin-offcanvas-toggle">
                            <i class="mdicon mdicon-menu icon--2x"></i>
                        </a>
                        <?php endif;?>
                    <?php endif;?>
                <?php endif;?>
                <div class="site-logo header-logo atbs-keylin-logo<?php echo esc_attr($logoDarkModeActiveClass); ?><?php echo esc_attr($logoDarkModeClass); ?>">
                    <a href="<?php echo esc_url(get_home_url('/'));?>">
                        <!-- begin logo -->
                        <?php
                            if ( !empty($stickyLogo) && array_key_exists('url',$stickyLogo) && !empty($stickyLogo['url']) ) : ?>
                                <img class="keylin-img-logo active" src="<?php echo esc_url($stickyLogo['url']);?>" alt="<?php esc_attr_e('stickyLogo', 'keylin');?>"/>
                            <!-- logo dark mode -->
                            <?php if ( ($stickyLogo != null) && (array_key_exists('url',$stickyLogo)) && ($logoDarkMode != null) && (array_key_exists('url',$logoDarkMode)) ) {
                                if ($logoDarkMode['url'] != '') {?>
                                <img class="keylin-img-logo" src="<?php echo esc_url($logoDarkMode['url']);?>" alt="<?php esc_attr_e('stickyLogo', 'keylin');?>"/>
                            <?php }
                            }  ?>
                            <!-- logo dark mode -->
                        <?php
                            else : ?>
                            <span class="logo-text"><?php echo esc_attr(bloginfo( 'name' ));?></span>
                        <?php
                            endif; ?>
                        <!-- end logo  -->
                    </a>
                </div>
            </div>

            <div class="navigation-wrapper navigation-bar__section js-priority-nav">
                <?php
                    $sticky_header = true;
                    $fw_navbar     = true;
                    if ( has_nav_menu( 'main-menu' ) ) {
                        $menuSettings = array(
                            'theme_location' => 'main-menu',
                            'container_id'   => 'sticky-main-menu',
                            'menu_class'     => 'navigation navigation--main navigation--inline',
                            'walker'         => new ATBS_Walker,
                            'depth'          => '5'
                        );
                        wp_nav_menu($menuSettings);
                    }
                ?>
            </div>

            <?php if ($bkHeaderType == 'site-header-5') {?>
            <div class="navigation-bar__section">
                <?php if ( isset($atbs_option ['bk-social-header']) && !empty($atbs_option ['bk-social-header']) ){ ?>
                    <ul class="social-list list-horizontal <?php if ($socialInverseClass != '') echo esc_attr($socialInverseClass);?>">
                        <?php echo ATBS_Core::bk_get_social_media_links($atbs_option['bk-social-header']);?>
                    </ul>
                <?php }?>
            </div>
            <?php }?>

            <div class="navigation-bar__section lwa lwa-template-modal flexbox flexbox-center-y">
                <?php if ( $darkModeSW ) : get_template_part( 'library/templates/header/atbs-theme-switch' ); endif; ?>
                <?php
                    if ( function_exists('login_with_ajax') ) {
                        $bk_home_url = esc_url(get_home_url('/'));
                        $ajaxArgs = array(
                            'profile_link' => true,
                            'template'     => 'modal',
                            'registration' => true,
                            'remember'     => true,
                            'redirect'     => $bk_home_url
                        );
                        login_with_ajax($ajaxArgs);
                        if (!is_user_logged_in()) {
                            echo '<a href="#login-modal" class="navigation-bar__login-btn navigation-bar-btn" data-toggle="modal" data-target="#login-modal"><i class="mdicon mdicon-person"></i></a>';
                        }
                    }
                ?>
                <?php
                echo '<button type="submit" class="navigation-bar-btn js-search-popup"><i class="mdicon mdicon-search"></i></button>';
                ?>
            </div>
        </div><!-- .navigation-bar__inner -->
    </nav><!-- Navigation-bar -->
    <?php
        if (is_single() && ($scrollSinglePercentSW == 1)) :
            get_template_part('library/templates/header/atbs-scroll-single-percent-style-1');
        endif;
    ?>
</div><!-- Sticky header -->