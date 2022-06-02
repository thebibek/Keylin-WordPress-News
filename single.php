<?php
    $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');

    if (function_exists('atbs_set__cookie')) {
        $atbs_cookie = atbs_set__cookie();
    }else {
        $atbs_cookie = 1;
    }

    get_header('single');

    if ( have_posts() ) : while ( have_posts() ) : the_post();

    $postID = get_the_ID();

    if ($atbs_cookie == 1) {
        ATBS_Core::bk_setPostViews($postID);
    }

    $bk_single_template = 'single-1';

    if (isset($atbs_option) && ($atbs_option != '')):
        $bk_single_template = $atbs_option['bk-single-template'];
    endif;

    if (function_exists('has_post_format')):
        $postFormat = get_post_format($postID);
    else :
        $postFormat = 'standard';
    endif;

    $bkPostLayout = get_post_meta($postID,'bk_post_layout_standard',true);
    if ($bkPostLayout == 'global_settings') {
        get_template_part( '/library/templates/single/partials/'.$bk_single_template );
    } elseif ($bkPostLayout == 'single-1') {
        get_template_part( '/library/templates/single/partials/single-1' ); //single-1
    } elseif ($bkPostLayout == 'single-2') {
        get_template_part( '/library/templates/single/partials/single-2' ); //single-1-alt
    } elseif ($bkPostLayout == 'single-3') {
        get_template_part( '/library/templates/single/partials/single-3' ); //single-1--no-sidebar
    } elseif ($bkPostLayout == 'single-4') {
        get_template_part( '/library/templates/single/partials/single-4' ); //single-2
    } elseif ($bkPostLayout == 'single-5') {
        get_template_part( '/library/templates/single/partials/single-5' ); //single-2-alt
    } elseif ($bkPostLayout == 'single-6') {
        get_template_part( '/library/templates/single/partials/single-6' ); //single-2--no-sidebar
    } elseif ($bkPostLayout == 'single-7') {
        get_template_part( '/library/templates/single/partials/single-7' ); //single-3
    } elseif ($bkPostLayout == 'single-8') {
        get_template_part( '/library/templates/single/partials/single-8' ); //single-3--no-sidebar
    } elseif ($bkPostLayout == 'single-9') {
        get_template_part( '/library/templates/single/partials/single-9' ); //single-4
    } elseif ($bkPostLayout == 'single-10') {
        get_template_part( '/library/templates/single/partials/single-10' ); //single-4--no-sidebar
    } elseif ($bkPostLayout == 'single-11') {
        get_template_part( '/library/templates/single/partials/single-11' ); //single-5
    } elseif ($bkPostLayout == 'single-12') {
        get_template_part( '/library/templates/single/partials/single-12' ); //single-5--Center
    } elseif ($bkPostLayout == 'single-13') {
        get_template_part( '/library/templates/single/partials/single-13' ); //single-5--No Sidebar
    } elseif ($bkPostLayout == 'single-14') {
        get_template_part( '/library/templates/single/partials/single-14' ); //single-6
    } elseif ($bkPostLayout == 'single-15') {
        get_template_part( '/library/templates/single/partials/single-15' ); //single-6--Center
    } elseif ($bkPostLayout == 'single-16') {
        get_template_part( '/library/templates/single/partials/single-16' ); //single-6--No Sidebar
    } elseif ($bkPostLayout == 'single-17') {
        if ($postFormat != 'video') :
            get_template_part( '/library/templates/single/single-1' );
        else :
            get_template_part( '/library/templates/single/partials/single-17' ); //single-7 - Video
        endif;
    } else {
        get_template_part( '/library/templates/single/partials/'.$bk_single_template );
    }

    endwhile; endif;

    get_footer();
?>