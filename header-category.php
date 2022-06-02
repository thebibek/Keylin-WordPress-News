<?php
    $atbs_option          = ATBS_Core::bk_get_global_var('atbs_option');
    $darkModeEnabled      = ( isset($atbs_option['bk_enable_darkmode']) && $atbs_option['bk_enable_darkmode'] ) ? true : false;
    $darkModeSW           = ( isset($atbs_option['bk_darkmode_sw']) && $atbs_option['bk_darkmode_sw'] ) ? true : false;
    $darkModeDefault      = ( isset($atbs_option['bk_default_darkmode']) && $atbs_option['bk_default_darkmode'] ) ? true : false;
    $darkModeClass        = ATBS_Core::bk_get_darkmode_class();
    $darkModeCookie       = ATBS_Core::bk_get_darkmode_cookie();
    $darkModeEnabledClass = $darkModeEnabled ? ' atbs-enable-dark-mode-option' : '';
    $darkModeDefaultClass = '';

    if ( $darkModeEnabled ) {
        if ( $darkModeDefault ) {
            $darkModeDefaultClass = ' keylin-dark-mode-default';
            if ( $darkModeCookie === false ) { // Cookie not set
                $darkModeClass    = ' keylin-dark-mode';
            } else {
                if ( !$darkModeSW ) {
                    $darkModeClass = ' keylin-dark-mode';
                    ATBS_Core::bk_remove_darkmode_cookie();
                }
            }
        } elseif ( !$darkModeSW && !$darkModeDefault ) {
            $darkModeClass = '';
            $darkModeEnabledClass = '';
            ATBS_Core::bk_remove_darkmode_cookie();
        }
    } else {
        if ( $darkModeCookie !== false ) {
            $darkModeClass = '';
            ATBS_Core::bk_remove_darkmode_cookie();
        }
    }
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />

    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <link rel="profile" href="/gmpg.org/xfn/11" />

    <?php get_template_part( 'library/templates/single/single-schema-meta');?>
    
    <?php wp_head(); ?>
</head>
<?php
if ((isset($atbs_option['bk-category-header-switch'])) && (($atbs_option['bk-category-header-switch']) == 1)){
    $bkHeaderType = ATBS_Core::bk_get_theme_option('bk-category-header-type');
} else {
    if ((isset($atbs_option['bk-header-type'])) && (($atbs_option['bk-header-type']) != NULL)){
        $bkHeaderType = $atbs_option['bk-header-type'];
        if ($bkHeaderType == 'site-header-12') {
            $bkHeaderType = 'site-header-15';
        }
    } else {
        $bkHeaderType = 'site-header-1';
    }
}
?>
<body <?php body_class();?>>
    <?php
        if ( function_exists( 'wp_body_open' ) ) {
        	wp_body_open();
        }
    ?>
    <div class="site-wrapper<?php echo esc_attr($darkModeEnabledClass.$darkModeDefaultClass.$darkModeClass);?> atbs-dedicated-category-header <?php echo ATBS_Header::atbs_dedicated_page_header_class($bkHeaderType);?>">
        <?php
            ATBS_Header::atbs_get_header($bkHeaderType);
        ?>