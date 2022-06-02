<?php
    $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');
    $logo   = ATBS_Core::bk_get_theme_option('bk-logo');
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
    $atbsAds = 'enable';
    if ((isset($atbs_option['bk-header-ads'])) && ($atbs_option['bk-header-ads'] == 1)) {
        $atbsAds = 'enable';
    } else {
        $atbsAds = 'disable';
    }
    $top_menu = isset($atbs_option ['bk-top-bar-header']) ? $atbs_option ['bk-top-bar-header'] : false;
    if ((isset($atbs_option['bk-top-bar-header-inverse'])) && (($atbs_option['bk-top-bar-header-inverse']) == 1)){
        $topBarinverseClass = ' top-bar--inverse';
    } else {
        $topBarinverseClass = '';
    }
    // logo dark mode
    $logoDarkMode   = ATBS_Core::bk_get_theme_option('bk-logo-dark-mode');
    $logoDarkModeClass = '';
    if (empty($logoDarkMode) || ($logoDarkMode['url'] == '') || !(array_key_exists('url',$logoDarkMode)) ) :
        $logoDarkModeClass = ' not-exist-img-logo';
    endif;
    $darkModeEnabled = ( isset($atbs_option['bk_enable_darkmode']) && $atbs_option['bk_enable_darkmode'] ) ? true : false;
    $darkModeSW      = ( $darkModeEnabled && isset($atbs_option['bk_darkmode_sw']) && $atbs_option['bk_darkmode_sw'] ) ? true : false;
    $darkModeActive  = ATBS_Core::bk_get_darkmode_cookie();
    $logoDarkModeActiveClass = $darkModeActive ? ' logo-dark-mode-active' : '';
?>
<header class="site-header site-header--skin-1">
    <!-- Top bar -->
    <?php if ( $top_menu ): ?>
    <div class="top-bar top-bar--fullwidth<?php echo esc_attr($topBarinverseClass); ?> hidden-xs hidden-sm">
        <div class="container">
            <div class="top-bar__inner top-bar__inner--flex">
                <div class="top-bar__section">
                    <div class="top-bar__nav">
                        <?php
                        if ( has_nav_menu( 'top-menu' ) ) :
                            $menuSettings = array(
                                'theme_location' => 'top-menu',
                                'container_id' => 'top-menu',
                                'menu_class'    => 'navigation navigation--top navigation--center',
                                'depth' => '10'
                            );
                            wp_nav_menu($menuSettings);
                        endif;
                        ?>
                    </div>
                </div>
                <div class="top-bar__section">
                    <div class="header-time">
                        <time datetime="<?php echo get_the_date('c'); ?>"><?php echo date('F j, Y'); ?></time>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <!-- Top bar -->
    <!-- Header content -->
    <div class="header-main hidden-xs hidden-sm <?php if ($inverseClass == "yes") echo " header-main--inverse";?>">
        <?php if (isset($atbs_option['bk-header-bg-style']) && ($atbs_option['bk-header-bg-style'] == 'image')) :?>
		<div class="background-img-wrapper">
			<div class="background-img"></div>
		</div>
        <?php endif;?>
    	<div class="container">
    		<div class="row row--flex row--vertical-center">
                <div class="col-xs-4">
					<div class="header-logo text-left atbs-keylin-logo<?php echo esc_attr($logoDarkModeActiveClass); ?><?php echo esc_attr($logoDarkModeClass); ?>">
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
                <div class="col-xs-8">
                    <?php if ($atbsAds == 'enable') {?>
                        <div class="site-header__ads">
                            <?php if ( isset($atbs_option ['bk-ads-html']) && !empty($atbs_option ['bk-ads-html']) ){ ?>
            					<?php echo ATBS_Core::atbs_html_render($atbs_option['bk-ads-html']);?>
                            <?php }?>
    					</div>
                    <?php } else {?>
    					<div class="site-header__social <?php if ($inverseClass == "yes") echo " inverse-text";?>">
                            <?php if ( isset($atbs_option ['bk-social-header']) && !empty($atbs_option ['bk-social-header']) ){ ?>
            					<ul class="social-list list-horizontal text-right">
            						<?php echo ATBS_Core::bk_get_social_media_links($atbs_option['bk-social-header']);?>
            					</ul>
                            <?php }?>
    					</div>
                    <?php }?>
				</div>
    		</div>
    	</div>
    </div><!-- Header content -->
    <?php get_template_part( 'library/templates/header/header-mobile' ); ?>
    <!-- Navigation bar -->
    <nav class="navigation-bar navigation-bar--fullwidth hidden-xs hidden-sm js-sticky-header-holder <?php if ($inverseClass == "yes") echo " navigation-bar--inverse";?>">
    	<div class="container">
            <div class="navigation-bar__inner">
                <?php if (is_active_sidebar('offcanvas-widget-area') || has_nav_menu( 'main-menu' ) || has_nav_menu( 'offcanvas-menu' )):?>
                    <?php if ( isset($atbs_option ['bk-offcanvas-desktop-switch']) && ($atbs_option ['bk-offcanvas-desktop-switch'] != 0) ){ ?>
    				<div class="navigation-bar__section">
    					<a href="#atbs-keylin-offcanvas-primary" class="offcanvas-menu-toggle navigation-bar-btn js-atbs-keylin-offcanvas-toggle">
    						<i class="mdicon mdicon-menu"></i>
    					</a>
    				</div>
                    <?php }?>
                <?php endif;?>
				<div class="navigation-wrapper navigation-bar__section js-priority-nav">
					<?php
                        if ( has_nav_menu( 'main-menu' ) ) :
                            $menuSettings = array(
                                'theme_location' => 'main-menu',
                                'container_id' => 'main-menu',
                                'menu_class'    => 'navigation navigation--main navigation--inline',
                                'walker' => new ATBS_Walker,
                            );
                            wp_nav_menu($menuSettings);
                        endif;
                    ?>
				</div>

				<div class="navigation-bar__section lwa lwa-template-modal flexbox-wrap flexbox-center-y">
                    <?php if ( $darkModeSW ) : get_template_part( 'library/templates/header/atbs-theme-switch' ); endif; ?>
                    <?php
                        if ( function_exists('login_with_ajax') ) {
                            $bk_home_url = esc_url(get_home_url('/'));
                            $ajaxArgs = array(
                                'profile_link' => true,
                                'template' => 'modal',
                                'registration' => true,
                                'remember' => true,
                                'redirect'  => $bk_home_url
                            );
                            login_with_ajax($ajaxArgs);
                            if (!is_user_logged_in()) {
                                echo '<a href="#login-modal" class="navigation-bar__login-btn navigation-bar-btn" data-toggle="modal" data-target="#login-modal"><i class="mdicon mdicon-person"></i></a>';
                            }
                    }?>
    				<button type="submit" class="navigation-bar-btn js-search-popup"><i class="mdicon mdicon-search"></i></button>
                </div>
			</div><!-- .navigation-bar__inner -->
    	</div><!-- .container -->
    </nav><!-- Navigation-bar -->
</header><!-- Site header -->