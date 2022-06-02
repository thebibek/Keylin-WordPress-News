</div>
<?php 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
global $redux_builder_amp ?>

<?php 
do_action( 'levelup_foot');
if(!ampforwp_levelup_compatibility('hf_builder_foot') ){
if ( isset($redux_builder_amp['footer-type']) && '1' == $redux_builder_amp['footer-type'] ) { ?>
<footer class="footer">
	<?php if ( is_active_sidebar( 'swift-footer-widget-area'  ) ) : ?>
	<div class="f-w-f1">
		<div class="cntr">
			<div class="f-w">
				<?php 
				$sidebar_output = '';
				$sanitized_sidebar = ampforwp_sidebar_content_sanitizer('swift-footer-widget-area');
				if ( $sanitized_sidebar) {
					$sidebar_output = $sanitized_sidebar->get_amp_content();
					$sidebar_output = apply_filters('ampforwp_modify_sidebars_content',$sidebar_output);
					$sidebar_output = preg_replace_callback('/<form(.*?)>(.*?)<\/form>/s', function($match){
					if(strpos($match[1], 'target=') === false){
						return '<form'.$match[1].' target="_top">'.$match[2].'</form>';
					}else{
						return '<form'.$match[1].'>'.$match[2].'</form>';
					}	
					}, $sidebar_output);
				}
	            echo do_shortcode($sidebar_output); // amphtml content, no kses
				?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<div class="f-w-f2">
		<div class="cntr">
			<?php if( ampforwp_get_setting('swift-menu') ){ if ( has_nav_menu( 'amp-footer-menu' ) ) { ?>
			<div class="f-menu">
				<nav>
	              <?php
	              $menu_args = array(
	                  'theme_location' => 'amp-footer-menu',
	                  'link_before'     => '<span>',
	                  'link_after'     => '</span>',
	                  'echo' => false
	              );
	              $menu = amp_menu(true, $menu_args, 'footer'); ?>
	           </nav>
			</div>
			<?php } }?>
			<div class="rr">
				<?php amp_non_amp_link(); ?>
            <?php do_action('amp_footer_link'); ?>
			</div>
		</div>
	</div>
</footer>
<?php }
}
// Social share in AMP 
	$amp_permalink = $facebook_app_id = $amp_permalink_fb_messenger = '';
	$facebook_app_id = ampforwp_get_setting('amp-facebook-app-id-messenger');
	if ( ampforwp_get_setting('ampforwp-social-share-amp')  ) {
		$amp_permalink = ampforwp_url_controller(get_the_permalink());
	} else{
		$amp_permalink = get_the_permalink();
	}
	if($facebook_app_id){
		$amp_permalink_fb_messenger = untrailingslashit($amp_permalink). '&app_id='. $facebook_app_id;
	}
	$twitter_amp_permalink = $amp_permalink;
	if(false == ampforwp_get_setting('enable-single-twitter-share-link')){
		$twitter_amp_permalink = wp_get_shortlink();
	}
do_action("ampforwp_advance_footer_options");
?>
<?php amp_footer_core(); ?>