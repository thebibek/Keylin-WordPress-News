<?php
    $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');
    if ((isset($atbs_option['bk-offcanvas-desktop-logo'])) && (($atbs_option['bk-offcanvas-desktop-logo']) != NULL)){
        $logo = $atbs_option['bk-offcanvas-desktop-logo'];
        if (($logo != null) && (array_key_exists('url',$logo))) {
            if ($logo['url'] == '') {
                $logo = ATBS_Core::bk_get_theme_option('bk-logo');
            }
        }
    }else {
        $logo = ATBS_Core::bk_get_theme_option('bk-logo');
    }
    $atbs_option_show_row = '';
    if ((is_active_sidebar('offcanvas-expand-col-1-area'))  && (is_active_sidebar('offcanvas-expand-col-2-area'))  ):
        $atbs_option_show_row = 'animation_2_row';
    elseif ((is_active_sidebar('offcanvas-expand-col-1-area')) || (is_active_sidebar('offcanvas-expand-col-2-area'))):
        $atbs_option_show_row = 'animation_1_row';
    else:
        $atbs_option_show_row = 'animation_0_row';
    endif;

    // logo dark mode
    $logoDarkMode   = ATBS_Core::bk_get_theme_option('bk-offcanvas-desktop-logo-dark-mode');
    $logoDarkModeClass = '';
    if (empty($logoDarkMode) || ($logoDarkMode['url'] == '') || !(array_key_exists('url',$logoDarkMode)) ) :
        $logoDarkModeClass = ' not-exist-img-logo';
    endif;
    $darkModeActive  = ATBS_Core::bk_get_darkmode_cookie();
    $logoDarkModeActiveClass = $darkModeActive ? ' logo-dark-mode-active' : '';
?>

<div id="atbs-keylin-offcanvas-primary" class="menu-wrap atbs-keylin-offcanvas <?php echo esc_attr($atbs_option_show_row); ?> js-atbs-keylin-offcanvas"> <!-- js-perfect-scrollbar-->
    <div class="atbs-keylin-offcanvas--inner js-perfect-scrollbar">
        <div class="atbs-keylin-offcanvas__section atbs-keylin-offcanvas__title border-right">
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
                    <?php }
                    } ?>
    			</a>
            </h2>
             <?php if ( isset($atbs_option ['bk-offcanvas-desktop-social']) && ($atbs_option ['bk-offcanvas-desktop-social'] != '') ){ ?>
        		<ul class="social-list list-horizontal">
        			<?php echo ATBS_Core::bk_get_social_media_links($atbs_option['bk-offcanvas-desktop-social']);?>
        		</ul>
            <?php }?>
            <a href="#atbs-keylin-offcanvas-primary" class="close-button atbs-keylin-offcanvas-close js-atbs-keylin-offcanvas-close" aria-label="Close">
                <div class="atbs-keylin-offcanvas-close--wrap">
                    <span aria-hidden="true">&#10005;</span>
                    <span class="label-icon">Close</span>
                </div>
            </a>
        </div>
        <div class="atbs-keylin-offcanvas__section atbs-keylin-offcanvas__section-navigation border-right">
            <div class="atbs-keylin-offcanvas__section-navigation--wrap">
                <?php
                    if ( isset($atbs_option ['bk-offcanvas-desktop-menu']) && ($atbs_option ['bk-offcanvas-desktop-menu'] != '') ){
                        if ( has_nav_menu( $atbs_option ['bk-offcanvas-desktop-menu'] ) ) :
                            $menuSettings = array(
                                'theme_location' => $atbs_option ['bk-offcanvas-desktop-menu'],
                                'container_id' => 'offcanvas-menu-desktop',
                                'menu_class'    => 'navigation navigation--offcanvas',
                                'depth' => '5'
                            );
                            wp_nav_menu($menuSettings);
                        elseif ( has_nav_menu( 'main-menu' ) ) :
                            $menuSettings = array(
                                'theme_location' => 'main-menu',
                                'container_id' => 'offcanvas-menu-desktop',
                                'menu_class'    => 'navigation navigation--offcanvas',
                                'depth' => '5'
                            );
                            wp_nav_menu($menuSettings);
                        endif;
                    }
                ?>
            </div>
        </div>
        <?php if (is_active_sidebar('offcanvas-expand-col-1-area')):?>
        <div class="atbs-keylin-offcanvas__section atbs-keylin-offcanvas__section-posts-list border-right">
            <div class="atbs-keylin-offcanvas__section-posts-list--wrap">
                <?php dynamic_sidebar('offcanvas-expand-col-1-area'); ?>
            </div>
        </div>
        <?php endif;?>
        <?php if (is_active_sidebar('offcanvas-expand-col-2-area')):?>
        <div class="atbs-keylin-offcanvas__section atbs-keylin-offcanvas__section-slide-bar border-right">
            <div class="atbs-keylin-offcanvas__section-slide-bar--wrap">
                <?php dynamic_sidebar('offcanvas-expand-col-2-area'); ?>
            </div>
        </div>
        <?php endif;?>
    </div>
    <div class="btn-nav-show_full">
        <i class="mdicon mdicon-chevron-thin-right"></i>
    </div>
</div>