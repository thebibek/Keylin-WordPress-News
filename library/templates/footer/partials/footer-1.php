<?php
    $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');
    if ((isset($atbs_option['bk-footer-inverse'])) && (($atbs_option['bk-footer-inverse']) == 1)) {
        $inverseClass = 'yes';
    } else {
        $inverseClass = '';
    }
    if ((isset($atbs_option['bk-footer-pattern'])) && (($atbs_option['bk-footer-pattern']) == 1)) {
        $hasPattern = 'yes';
    } else {
        $hasPattern = '';
    }
?>
<footer class="site-footer footer-1 <?php if ($hasPattern == "yes") echo " has-bg-pattern";?> <?php if($inverseClass == "yes") echo " site-footer--inverse inverse-text";?>">
    <?php if(isset($atbs_option['footer-mailchimp--shortcode']) && ($atbs_option['footer-mailchimp--shortcode'] != '')) :?>
    <?php
        if ((isset($atbs_option['bk-footer--mailchimp-bg']['background-image'])) && ($atbs_option['bk-footer--mailchimp-bg']['background-image'] != '')) :
            $imgBGStyle = "background-image: url('".$atbs_option['bk-footer--mailchimp-bg']['background-image'] ."')";
        else :
            $imgBGStyle = '';
        endif;
    ?>
	<div class="site-footer__section site-footer__section--seperated">
        <?php
        if($atbs_option['bk-footer--mailchimp-bg']['background-image'] != '') {
            echo '<div class="background-img" style="'.$imgBGStyle.'"></div>';
        } else {
            echo '<div class="background-img gradient-5"></div>';
        }
        ?>
		<div class="container">
			<div class="site-footer__section-inner">
				<div class="subscribe-form subscribe-form--horizontal text-center max-width-sm">
					<?php echo ATBS_Footer::bk_footer_mailchimp();?>
				</div>
			</div>
		</div>
	</div>
    <?php endif;?>
    <?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
	<div class="site-footer__section site-footer__section--seperated site-footer__section--bordered">
		<div class="container">
			<nav class="footer-menu footer-menu--bold text-center">
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
    <?php if(isset($atbs_option['footer-social']) && ($atbs_option['footer-social'] != '')) :?>
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
    <?php if(isset($atbs_option['footer-copyright-text']) && ($atbs_option['footer-copyright-text'] != '')) :?>
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
    if((isset($atbs_option['bk-sticky-menu-switch'])) && ($atbs_option['bk-sticky-menu-switch'] == 1)):
        get_template_part( 'library/templates/header/atbs-sticky-header' );
    endif;

    if ( function_exists('login_with_ajax') ) {
        get_template_part( 'library/templates/atbs-login-modal' );
    }

    if ( isset($atbs_option ['bk-offcanvas-desktop-switch']) && ($atbs_option ['bk-offcanvas-desktop-switch'] != 0) ) {
        get_template_part( 'library/templates/offcanvas/offcanvas-desktop' );
    }

    get_template_part( 'library/templates/offcanvas/offcanvas-mobile' );

    if((isset($atbs_option['bk-header-subscribe-switch'])) && ($atbs_option['bk-header-subscribe-switch'] == 1)):
        get_template_part( 'library/templates/atbs-subscribe-modal' );
    endif;
    get_template_part( 'library/templates/header/header-search-popup' );
?>
<!-- go top button -->
<a href="#" class="atbs-keylin-go-top btn btn-default hidden-xs js-go-top-el"><i class="mdicon mdicon-arrow_upward"></i></a>