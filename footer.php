<?php if (!is_404()) :
    $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');

    if (isset($atbs_option) && ($atbs_option != '')) {
        $bkFooterTemplate = $atbs_option['bk-footer-template'];
    }
    else {
        $bkFooterTemplate = 'footer-1';
    }

    if ($bkFooterTemplate == 'footer-1') {
        get_template_part( 'library/templates/footer/partials/footer', '1' );
    } elseif ($bkFooterTemplate == 'footer-2') {
        get_template_part( 'library/templates/footer/partials/footer', '2' );
    } elseif ($bkFooterTemplate == 'footer-3') {
        get_template_part( 'library/templates/footer/partials/footer', '3' );
    } elseif ($bkFooterTemplate == 'footer-4') {
        get_template_part( 'library/templates/footer/partials/footer', '4' );
    } elseif ($bkFooterTemplate == 'footer-5') {
        get_template_part( 'library/templates/footer/partials/footer', '5' );
    } elseif ($bkFooterTemplate == 'footer-6') {
        get_template_part( 'library/templates/footer/partials/footer', '6' );
    } elseif ($bkFooterTemplate == 'footer-7') {
        get_template_part( 'library/templates/footer/partials/footer', '7' );
    } elseif ($bkFooterTemplate == 'footer-8') {
        get_template_part( 'library/templates/footer/partials/footer', '8' );
    }
?>
</div><!-- .site-wrapper -->
<?php endif; //End if is_404?>

<?php
    ATBS_Core::atbs_create_ajax_security_code();
    ATBS_Core::atbs_add_buff_arrows();
    wp_localize_script( 'atbs-scripts', 'ajax_buff', ATBS_Core::$globalBuff );
    $localize_cookie_name[0] = ATBS_Core::bk_darkmode_cookie_name();
    wp_localize_script( 'atbs-scripts', 'ATBS_DARKMODE_COOKIE_NAME', $localize_cookie_name);
?>
<?php wp_footer(); ?>

</body>
</html>