<?php
    $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');
    if ((isset($atbs_option['bk-offcanvas-mobile-logo'])) && (($atbs_option['bk-offcanvas-mobile-logo']) != NULL)){
        $logo = $atbs_option['bk-offcanvas-mobile-logo'];
        if (($logo != null) && (array_key_exists('url',$logo))) {
            if ($logo['url'] == '') {
                $logo = ATBS_Core::bk_get_theme_option('bk-logo');
            }
        }
    }else {
        $logo = ATBS_Core::bk_get_theme_option('bk-logo');
    }
    // logo dark mode
    $logoDarkMode   = ATBS_Core::bk_get_theme_option('bk-offcanvas-mobile-logo-dark-mode');
    $logoDarkModeClass = '';
    if (empty($logoDarkMode) || ($logoDarkMode['url'] == '') || !(array_key_exists('url',$logoDarkMode)) ) :
        $logoDarkModeClass = ' not-exist-img-logo';
    endif;
    $darkModeActive  = ATBS_Core::bk_get_darkmode_cookie();
    $logoDarkModeActiveClass = $darkModeActive ? ' logo-dark-mode-active' : '';
?>
<!-- Off-canvas menu -->
<div id="atbs-keylin-offcanvas-mobile" class="atbs-keylin-offcanvas js-atbs-keylin-offcanvas js-perfect-scrollbar">
	<div class="atbs-keylin-offcanvas__title">
		<h2 class="site-logo atbs-keylin-logo<?php echo esc_attr($logoDarkModeActiveClass); ?><?php echo esc_attr($logoDarkModeClass); ?>">
            <a href="<?php echo esc_url(get_home_url('/'));?>">
				<!-- logo open -->
                <?php if (($logo != null) && (array_key_exists('url',$logo))) {
                        if ($logo['url'] != '') {
                    ?>
                    <img class="keylin-img-logo active" src="<?php echo esc_url($logo['url']);?>" alt="<?php esc_attr_e('logo', 'keylin');?>"/>
                    <!-- logo dark mode -->
                    <?php if ( ($logo != null) && (array_key_exists('url',$logo)) && ($logoDarkMode != null) && (array_key_exists('url',$logoDarkMode)) ) {
                        if ($logoDarkMode['url'] != '') {?>
                        <img class="keylin-img-logo" src="<?php echo esc_url($logoDarkMode['url']);?>" alt="<?php esc_attr_e('logo', 'keylin');?>"/>
                    <?php }
                    }  ?>
                    <!-- logo dark mode -->
    			<!-- logo close -->
                <?php } else {?>
                    <?php echo esc_attr(bloginfo( 'name' ));?>
                <?php }
                } else {?>
                    <?php echo esc_attr(bloginfo( 'name' ));?>
                <?php } ?>
			</a>
        </h2>
        <?php if ( isset($atbs_option ['bk-offcanvas-mobile-social']) && ($atbs_option ['bk-offcanvas-mobile-social'] != '') ){ ?>
		<ul class="social-list list-horizontal">
			<?php echo ATBS_Core::bk_get_social_media_links($atbs_option['bk-offcanvas-mobile-social']);?>
		</ul>
        <?php }?>
		<a href="#atbs-keylin-offcanvas-mobile" class="atbs-keylin-offcanvas-close js-atbs-keylin-offcanvas-close" aria-label="Close"><span aria-hidden="true">&#10005;</span></a>
	</div>

	<div class="atbs-keylin-offcanvas__section atbs-keylin-offcanvas__section-navigation">
		<?php
            if ( isset($atbs_option ['bk-offcanvas-mobile-menu']) && ($atbs_option ['bk-offcanvas-mobile-menu'] != '') ){
                if ( has_nav_menu( $atbs_option ['bk-offcanvas-mobile-menu'] ) ) :
                    $menuSettings = array(
                        'theme_location' => $atbs_option ['bk-offcanvas-mobile-menu'],
                        'container_id' => 'offcanvas-menu-mobile',
                        'menu_class'    => 'navigation navigation--offcanvas',
                        'depth' => '5'
                    );
                    wp_nav_menu($menuSettings);
                elseif ( has_nav_menu( 'main-menu' ) ) :
                    $menuSettings = array(
                        'theme_location' => 'main-menu',
                        'container_id' => 'offcanvas-menu-mobile',
                        'menu_class'    => 'navigation navigation--offcanvas',
                        'depth' => '5'
                    );
                    wp_nav_menu($menuSettings);
                endif;
            }
        ?>
	</div>

    <?php if (isset($atbs_option['bk-offcanvas-mobile-mailchimp-shortcode']) && ($atbs_option['bk-offcanvas-mobile-mailchimp-shortcode'] != '')) :?>
	<div class="atbs-keylin-offcanvas__section">
		<div class="subscribe-form text-center">
            <?php echo do_shortcode($atbs_option['bk-offcanvas-mobile-mailchimp-shortcode']);?>
		</div>
	</div>
    <?php endif;?>

    <?php if (is_active_sidebar('mobile-offcanvas-widget-area')):?>
    <div class="atbs-keylin-offcanvas__section">
        <?php dynamic_sidebar( 'mobile-offcanvas-widget-area' );?>
	</div>
    <?php endif;?>

    <?php if ( function_exists('login_with_ajax') ) {  ?>
	<div class="atbs-keylin-offcanvas__section visible-xs visible-sm">
		<div class="text-center">
            <?php
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
                    echo '<a href="#login-modal" class="btn btn-default" data-toggle="modal" data-target="#login-modal"><i class="mdicon mdicon-person mdicon--first"></i><span>Login/Sign up</span></a>';
                }
            ?>
		</div>
	</div>
    <?php }?>
</div><!-- Off-canvas menu -->