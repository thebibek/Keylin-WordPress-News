<?php
if ( ! function_exists( 'atbs_custom_css' ) ) {
    function atbs_custom_css() {
        $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');
        $atbs_css_output = '';

        $cat_opt = get_option('bk_cat_opt');
        if ( isset($atbs_option)):
            $primary_color = (isset($atbs_option['bk-primary-color']) && $atbs_option['bk-primary-color']) ? $atbs_option['bk-primary-color'] : '#6C92A2';
            function atbs_hex2Rgb($hex) {
                $hex = str_replace("#", "", $hex);
                if(strlen($hex) == 3) {
                    $r = hexdec(substr($hex,0,1).substr($hex,0,1));
                    $g = hexdec(substr($hex,1,1).substr($hex,1,1));
                    $b = hexdec(substr($hex,2,1).substr($hex,2,1));
                } else {
                    $r = hexdec(substr($hex,0,2));
                    $g = hexdec(substr($hex,2,2));
                    $b = hexdec(substr($hex,4,2));
                }
                $rgb = array($r, $g, $b);
                return $rgb; // returns an array with the rgb values
            }

            function atbs_hex2hsl($hex) {
                $hex = array($hex[0].$hex[1], $hex[2].$hex[3], $hex[4].$hex[5]);
                $rgb = array_map(function($part) {
                    return hexdec($part) / 255;
                }, $hex);
                $max = max($rgb);
                $min = min($rgb);
                $l = ($max + $min) / 2;
                if ($max == $min) {
                    $h = $s = 0;
                } else {
                    $diff = $max - $min;
                    $s = $l > 0.5 ? $diff / (2 - $max - $min) : $diff / ($max + $min);
                    switch($max) {
                        case $rgb[0]:
                            $h = ($rgb[1] - $rgb[2]) / $diff + ($rgb[1] < $rgb[2] ? 6 : 0);
                            break;
                        case $rgb[1]:
                            $h = ($rgb[2] - $rgb[0]) / $diff + 2;
                            break;
                        case $rgb[2]:
                            $h = ($rgb[0] - $rgb[1]) / $diff + 4;
                            break;
                    }
                    $h /= 6;
                }
                return array($h, $s, $l);
            }

            function atbs_gethslColor($hex,$var = 0) {
                $hsl = atbs_hex2hsl(substr($hex,1));
                $hsl[0] = round($hsl[0] * 360);
                $hsl[1] = round($hsl[1] * 100);
                $hsl[2] = round($hsl[2] * 100);
                return $hsl;
            }

            function atbs_getformattedhslcolor($hsl) {
                $hsl[0] .= 'deg';
                $hsl[1] .= '%';
                $hsl[2] .= '%';
                return implode(", ", $hsl); // Merge into a string seperated by a colon
            }

            function atbs_calchslvalue($oldValue = 0, $valueToCalc = '+1', $isDegree = false) {
                $newValue = $oldValue; // Default to old value
                $operation = str_split($valueToCalc, 1)[0];

                if ($operation == '+') {
                    $newValue = intval($oldValue) + intval(substr($valueToCalc, 1));
                } elseif ($operation == '-') {
                    $newValue = intval($oldValue) - intval(substr($valueToCalc, 1));
                }

                if ($isDegree) { // if is degree
                    $newValue = ($newValue > 360) ? 360 : $newValue; // Maximum 360deg
                } else {
                    $newValue = ($newValue > 100) ? 100 : $newValue; // Maximum 100%
                }

                return ($newValue < 0) ? 0 : $newValue; // Set back to 0 if < 0
            }

            // Analogous: /əˈnaləɡəs/
            function atbs_gethslanalogouscolor($hsl, $hue = '+1', $saturation = '+1', $lightness = '-1') {
                if (isset($hsl)) {
                    $hsl[0] = atbs_calchslvalue($hsl[0], $hue, true);
                    $hsl[1] = atbs_calchslvalue($hsl[1], $saturation);
                    $hsl[2] = atbs_calchslvalue($hsl[2], $lightness);
                    return $hsl;
                }
            }

            // Get HSL Color
            $hsl_primary_color = atbs_gethslColor($primary_color);
            $hsl_primary_dark_color = atbs_gethslanalogouscolor($hsl_primary_color, '0', '0', '-3');
            $hsl_primary_darker_color = atbs_gethslanalogouscolor($hsl_primary_color, '0', '0', '-6');

            // Format HSL Color
            $hsl_primary_color = atbs_getformattedhslcolor($hsl_primary_color);
            $hsl_primary_dark_color =  atbs_getformattedhslcolor($hsl_primary_dark_color);
            $hsl_primary_darker_color =  atbs_getformattedhslcolor($hsl_primary_darker_color);

            if(isset($atbs_option['bk-header-bg-style']) && ($atbs_option['bk-header-bg-style'] == 'gradient')) {
                if(isset($atbs_option['bk-header-bg-gradient']) && !empty($atbs_option['bk-header-bg-gradient'])) {
                    $atbs_gradient_bg = $atbs_option['bk-header-bg-gradient'];
                    $atbs_gradient_deg = $atbs_option['bk-header-bg-gradient-direction'];
                    if($atbs_gradient_deg == '') {
                        $atbs_gradient_deg = 90;
                    }
                    $atbs_css_output .= ".header-1 .header-main,
                                        .header-2 .header-main,
                                        .header-3 .site-header,
                                        .header-4 .navigation-bar,
                                        .header-5 .navigation-bar,
                                        .header-6 .header-main,
                                        .header-7 .header-main,
                                        .header-8 .site-header,
                                        .header-9 .navigation-bar--fullwidth,
                                        .header-10 .navigation-bar--fullwidth
                                        {background: ".$atbs_gradient_bg['from'].";
                                        background: -webkit-linear-gradient(".$atbs_gradient_deg."deg, ".$atbs_gradient_bg['from']." 0, ".$atbs_gradient_bg['to']." 100%);
                                        background: linear-gradient(".$atbs_gradient_deg."deg, ".$atbs_gradient_bg['from']." 0, ".$atbs_gradient_bg['to']." 100%);}";
                    $atbs_css_output .= ".header-9 .site-header:not(.sticky-header) .navigation-bar__inner::before {display: none}";
                }
            }else if(isset($atbs_option['bk-header-bg-style']) && ($atbs_option['bk-header-bg-style'] == 'color')) {
                if(isset($atbs_option['bk-header-bg-color']) && !empty($atbs_option['bk-header-bg-color'])) {
                    $atbs_bg_color = $atbs_option['bk-header-bg-color'];
                    $atbs_css_output .= ".header-1 .header-main,
                                        .header-2 .header-main,
                                        .header-3 .site-header,
                                        .header-4 .navigation-bar,
                                        .header-5 .navigation-bar,
                                        .header-6 .header-main,
                                        .header-7 .header-main,
                                        .header-8 .site-header,
                                        .header-9 .navigation-bar--fullwidth,
                                        .header-10 .navigation-bar--fullwidth
                                        {background: ".$atbs_bg_color['background-color'].";}";
                    $atbs_css_output .= ".header-9 .site-header:not(.sticky-header) .navigation-bar__inner::before {display: none}";
                }
            }
            if (isset($atbs_option['bk-sticky-menu-bg-style']) && ($atbs_option['bk-sticky-menu-bg-style'] == 'gradient')) {
                if(isset($atbs_option['bk-sticky-menu-bg-gradient']) && !empty($atbs_option['bk-sticky-menu-bg-gradient'])) {
                    $atbs_sticky_menu_gradient_bg = $atbs_option['bk-sticky-menu-bg-gradient'];
                    $atbs_sticky_menu_gradient_deg = $atbs_option['bk-sticky-menu-bg-gradient-direction'];
                    if($atbs_sticky_menu_gradient_deg == '') {
                        $atbs_sticky_menu_gradient_deg = 90;
                    }
                    $atbs_css_output .= ".sticky-header.is-fixed > .navigation-bar
                                        {background: ".$atbs_sticky_menu_gradient_bg['from'].";
                                        background: -webkit-linear-gradient(".$atbs_sticky_menu_gradient_deg."deg, ".$atbs_sticky_menu_gradient_bg['from']." 0, ".$atbs_sticky_menu_gradient_bg['to']." 100%);
                                        background: linear-gradient(".$atbs_sticky_menu_gradient_deg."deg, ".$atbs_sticky_menu_gradient_bg['from']." 0, ".$atbs_sticky_menu_gradient_bg['to']." 100%);}";
                }
            }else if (isset($atbs_option['bk-sticky-menu-bg-style']) && ($atbs_option['bk-sticky-menu-bg-style'] == 'color')) {
                if(isset($atbs_option['bk-sticky-menu-bg-color']) && !empty($atbs_option['bk-sticky-menu-bg-color'])) {
                    $atbs_sticky_menu_bg_color = $atbs_option['bk-sticky-menu-bg-color'];
                    $atbs_css_output .= ".sticky-header.is-fixed > .navigation-bar
                                        {background: ".$atbs_sticky_menu_bg_color['background-color'].";}";
                }
            }
            if (isset($atbs_option['bk-mobile-menu-bg-style']) && ($atbs_option['bk-mobile-menu-bg-style'] == 'gradient')) {
                if(isset($atbs_option['bk-mobile-menu-bg-gradient']) && !empty($atbs_option['bk-mobile-menu-bg-gradient'])) {
                    $atbs_mobile_menu_gradient_bg = $atbs_option['bk-mobile-menu-bg-gradient'];
                    $atbs_mobile_menu_gradient_deg = $atbs_option['bk-mobile-menu-bg-gradient-direction'];
                    if($atbs_mobile_menu_gradient_deg == '') {
                        $atbs_mobile_menu_gradient_deg = 90;
                    }
                    $atbs_css_output .= "#atbs-keylin-mobile-header
                                        {background: ".$atbs_mobile_menu_gradient_bg['from'].";
                                        background: -webkit-linear-gradient(".$atbs_mobile_menu_gradient_deg."deg, ".$atbs_mobile_menu_gradient_bg['from']." 0, ".$atbs_mobile_menu_gradient_bg['to']." 100%);
                                        background: linear-gradient(".$atbs_mobile_menu_gradient_deg."deg, ".$atbs_mobile_menu_gradient_bg['from']." 0, ".$atbs_mobile_menu_gradient_bg['to']." 100%);}";
                }
            }else if (isset($atbs_option['bk-mobile-menu-bg-style']) && ($atbs_option['bk-mobile-menu-bg-style'] == 'color')) {
                if(isset($atbs_option['bk-mobile-menu-bg-color']) && !empty($atbs_option['bk-mobile-menu-bg-color'])) {
                    $atbs_mobile_menu_bg_color = $atbs_option['bk-mobile-menu-bg-color'];
                    $atbs_css_output .= "#atbs-keylin-mobile-header
                                        {background: ".$atbs_mobile_menu_bg_color['background-color'].";}";
                }
            }
            if (isset($atbs_option['bk-footer-bg-style']) && ($atbs_option['bk-footer-bg-style'] == 'gradient')) {
                if(isset($atbs_option['bk-footer-bg-gradient']) && !empty($atbs_option['bk-footer-bg-gradient'])) {
                    $atbs_footer_gradient_bg = $atbs_option['bk-footer-bg-gradient'];
                    $atbs_footer_gradient_deg = $atbs_option['bk-footer-bg-gradient-direction'];
                    if($atbs_footer_gradient_deg == '') {
                        $atbs_footer_gradient_deg = 90;
                    }
                    $atbs_css_output .= ".site-footer, .footer-3.site-footer, .footer-5.site-footer, .site-footer.footer-6 .site-footer__section:first-child, .site-footer.footer-7 .site-footer__section:first-child, .site-footer.footer-6, .site-footer.footer-7
                                        {background: ".$atbs_footer_gradient_bg['from'].";
                                        background: -webkit-linear-gradient(".$atbs_footer_gradient_deg."deg, ".$atbs_footer_gradient_bg['from']." 0, ".$atbs_footer_gradient_bg['to']." 100%);
                                        background: linear-gradient(".$atbs_footer_gradient_deg."deg, ".$atbs_footer_gradient_bg['from']." 0, ".$atbs_footer_gradient_bg['to']." 100%);}";
                }
            }else if (isset($atbs_option['bk-footer-bg-style']) && ($atbs_option['bk-footer-bg-style'] == 'color')) {
                if(isset($atbs_option['bk-footer-bg-color']) && !empty($atbs_option['bk-footer-bg-color'])) {
                    $atbs_footer_bg_color = $atbs_option['bk-footer-bg-color'];
                    $atbs_css_output .= ".site-footer, .footer-3.site-footer, .footer-5.site-footer, .site-footer.footer-6 .site-footer__section:first-child, .site-footer.footer-7 .site-footer__section:first-child, .site-footer.footer-6, .site-footer.footer-7
                                        {background: ".$atbs_footer_bg_color['background-color'].";}";
                }
            }
            if (isset($atbs_option['bk-coming-soon-bg-style']) && ($atbs_option['bk-coming-soon-bg-style'] == 'gradient')) {
                if(isset($atbs_option['bk-coming-soon-bg-gradient']) && !empty($atbs_option['bk-coming-soon-bg-gradient'])) {
                    $atbs_cs_gradient_bg = $atbs_option['bk-coming-soon-bg-gradient'];
                    $atbs_cs_gradient_deg = $atbs_option['bk-coming-soon-bg-gradient-direction'];
                    if($atbs_cs_gradient_deg == '') {
                        $atbs_cs_gradient_deg = 90;
                    }
                    $atbs_css_output .= ".page-coming-soon .background-img>.background-overlay
                                        {background: ".$atbs_cs_gradient_bg['from'].";
                                        background: -webkit-linear-gradient(".$atbs_cs_gradient_deg."deg, ".$atbs_cs_gradient_bg['from']." 0, ".$atbs_cs_gradient_bg['to']." 100%);
                                        background: linear-gradient(".$atbs_cs_gradient_deg."deg, ".$atbs_cs_gradient_bg['from']." 0, ".$atbs_cs_gradient_bg['to']." 100%);}";
                }
            }else if (isset($atbs_option['bk-coming-soon-bg-style']) && ($atbs_option['bk-coming-soon-bg-style'] == 'color')) {
                if(isset($atbs_option['bk-coming-soon-bg-color']) && !empty($atbs_option['bk-coming-soon-bg-color'])) {
                    $atbs_cs_bg_color = $atbs_option['bk-coming-soon-bg-color'];
                    $atbs_css_output .= ".page-coming-soon .background-img
                                        {background: ".$atbs_cs_bg_color['background-color'].";}";
                }
            }
            //option margin
            if ((isset($atbs_option['bk-margin-block']['margin-top'])) && ($atbs_option['bk-margin-block']['margin-top'] != '')) {
                $atbs_css_output .= '.atbs-keylin-block-custom-margin {margin-top: '.$atbs_option['bk-margin-block']['margin-top'].';}';
            }

            if ((isset($atbs_option['bk-block-heading-margin']['margin-bottom'])) && ($atbs_option['bk-block-heading-margin']['margin-bottom'] != '')) {
                $atbs_css_output .= '@media(min-width: 576px){.atbs-keylin-block-custom-margin .block-heading:not(.widget__title){margin-bottom: '.$atbs_option['bk-block-heading-margin']['margin-bottom'].';} }';
            }

        endif;

        $atbs_css_output .= "::selection {color: #FFF; background: $primary_color;}";
        $atbs_css_output .= "::-webkit-selection {color: #FFF; background: $primary_color;}";
        $RGB_color = atbs_hex2Rgb($primary_color);
        $Final_Rgb_color = implode(", ", $RGB_color);
        if ( ($primary_color) != null) :
            $atbs_css_output .= ".atbs-keylin-is-sticky-enable .sticky-atbs-post .post__title a:after, a, a:hover, a:focus, a:active, .post__text:not(.inverse-text) a.post__cat:hover, .post--horizontal-mini .post__title a:hover, .post--horizontal-tiny .post__title a:hover, .post--horizontal-small .post__title a:hover, .post--horizontal-large .post__title a:hover, .post--horizontal-big .post__title a:hover, .post--horizontal-huge .post__title a:hover, .post--horizontal-massive .post__title a:hover, .post--no-thumb-huge .post__title a:hover, .post--no-thumb-md .post__title a:hover, .post--no-thumb-sm .post__title a:hover, .post--vertical-huge .post__title a:hover, .post--vertical-big .post__title a:hover, .post--vertical-large .post__title a:hover, .post--vertical-medium .post__title a:hover, .post--vertical-small .post__title a:hover, .post--vertical-review .post__title a:hover, .post--most-commented .post__title a:hover, .post--overlap .post__title a:hover, .atbs-vertical-megamenu .post__title a:hover, .post__text:not(.inverse-text) a.post__cat:focus, .post--horizontal-mini .post__title a:focus, .post--horizontal-tiny .post__title a:focus, .post--horizontal-small .post__title a:focus, .post--horizontal-large .post__title a:focus, .post--horizontal-big .post__title a:focus, .post--horizontal-huge .post__title a:focus, .post--horizontal-massive .post__title a:focus, .post--no-thumb-huge .post__title a:focus, .post--no-thumb-md .post__title a:focus, .post--no-thumb-sm .post__title a:focus, .post--vertical-huge .post__title a:focus, .post--vertical-big .post__title a:focus, .post--vertical-large .post__title a:focus, .post--vertical-medium .post__title a:focus, .post--vertical-small .post__title a:focus, .post--vertical-review .post__title a:focus, .post--most-commented .post__title a:focus, .post--overlap .post__title a:focus, .atbs-vertical-megamenu .post__title a:focus, .author__name a:hover, .author__name a:focus, .author-box .author-name a:hover, .author-box .author-name a:focus, .author-box .author-info a:hover, .author-box .author-info a:focus, .social-list > li > a:hover, .social-list > li > a:focus, .social-list > li > a:active, .comment-author-name a:hover, .comment-author-name a:focus, .reply a:hover, .reply a:focus, .comment-metadata a:hover, .comment-metadata a:focus, .comment-metadata a:active, .widget_rss a.rsswidget:hover, .widget_rss a.rsswidget:focus, .widget_archive li > a:hover, .widget_archive li > a:focus, .widget_pages li > a:hover, .widget_pages li > a:focus, .widget_categories li > a:hover, .widget_categories li > a:focus, .post--single .entry-tags .tag:hover, .post--single .entry-tags .tag:focus, .tagcloud a:hover, .tagcloud a:focus, .atbs-keylin-search-full-style-2 .search-results__heading, .atbs-keylin-widget-indexed-posts-b .posts-list > li .post__title:after, .atbs-keylin-pagination__item:hover, .atbs-keylin-pagination__item:focus, .atbs-keylin-pagination__item:active, .post__readmore--style-1:hover .readmore__text , .post__readmore--style-1:focus .readmore__text
            {color: $primary_color;}";

            $atbs_css_output .= ":root {
                --color-primary: hsl($hsl_primary_color);
                --color-primary-dark: hsl($hsl_primary_dark_color);
                --color-primary-darker: hsl($hsl_primary_darker_color);
            }";

            $atbs_css_output .= ".comments-count-box, .atbs-keylin-pagination--next-n-prev .atbs-keylin-pagination__links a:last-child .atbs-keylin-pagination__item, .comment-form .form-submit input[type=submit]:hover, .comment-form .form-submit input[type=submit]:active, .comment-form .form-submit input[type=submit]:focus, .atbs-keylin-block__aside .banner__button, .post--horizontal-large-bg:hover .post__text, .post--vertical-large-bg:hover .post__text, .post--overlay-large:hover .post__text-inner, .post--no-thumb-md-bg-hover:hover .post__text, .post__readmore--style-2 .button__readmore:hover i, .post__readmore--style-2 .button__readmore:focus i, input[type=submit]:not(.btn):hover, input[type=submit]:not(.btn):focus, .btn-primary:hover, .btn-primary:focus, .btn-primary:active, .subscribe-form__fields input[type=submit]:hover, .subscribe-form__fields input[type=submit]:focus, .atbs-keylin-block-subscribe input[type=submit]:hover, .atbs-keylin-block-subscribe input[type=submit]:focus, .atbs-keylin-widget-subscribe .subscribe-form__fields input[type=submit]:hover, .atbs-keylin-widget-subscribe .subscribe-form__fields input[type=submit]:focus, .atbs-keylin-widget-twitter .atbs-keylin-widget__inner, .ajax-load-more-button button:hover, .ajax-load-more-button button:focus, .ajax-load-more-button button:active, .posts-navigation .navigation-button:hover i, .posts-navigation .navigation-button:focus i, .single-entry--billboard-overlap-title .single-header--svg-bg.single-header--has-background, .single-entry--template-4 .single-header-with-bg, .single-entry--template-4-alt .single-header-with-bg, .atbs-keylin-widget-indexed-posts-a .posts-list > li .post__thumb:after, .atbs-keylin-carousel:not(.dots-inverse) .owl-dot.active span, .navigation--main > li > a:before, .atbs-keylin-widget-subscribe .subscribe-form__fields input[type=submit]:hover, .atbs-keylin-widget-subscribe .subscribe-form__fields input[type=submit]:active, .atbs-keylin-widget-subscribe .subscribe-form__fields input[type=submit]:focus
            {background-color: $primary_color;}";

            $atbs_css_output .= "@media (max-width: 380px) { .atbs-keylin-featured-slider-1 .dots-inverse .owl-dot.active span
            {background-color: $primary_color;} }";

            $atbs_css_output .= ".site-header--skin-4 .navigation--main > li > a:before
            {background-color: $primary_color !important;}";

            $atbs_css_output .= ".social-list .share-item__icon:hover svg, .post-score-hexagon .hexagon-svg path
            {fill: $primary_color;}";

            $atbs_css_output .= ".entry-tags ul>li>a, .has-overlap-frame:before, .atbs-keylin-gallery-slider .fotorama__thumb-border, .bypostauthor > .comment-body .comment-author > img, .atbs-article-reactions .atbs-reactions-content:hover, .post__readmore--style-1:hover .button__readmore::after, .btn-primary:hover, .subscribe-form__fields input[type=submit]:hover, input[type=text]:focus, input[type=email]:focus, input[type=url]:focus, input[type=password]:focus, input[type=search]:focus, input[type=tel]:focus, input[type=number]:focus, textarea:focus, textarea.form-control:focus, select:focus, select.form-control:focus
            {border-color: $primary_color;}";

            $atbs_css_output .= ".atbs-keylin-pagination--next-n-prev .atbs-keylin-pagination__links a:last-child .atbs-keylin-pagination__item:after
            {border-left-color: $primary_color;}";

            $atbs_css_output .= ".comments-count-box:before
            {border-top-color: $primary_color;}";

            $atbs_css_output .= ".navigation--offcanvas li > a:after
            {border-right-color: $primary_color;}";

            // $atbs_css_output .= "
            // {border-bottom-color: $primary_color;}";

            $atbs_css_output .= ".post--single-cover-gradient .single-header
            {
                background-image: -webkit-linear-gradient( bottom , $primary_color 0%, rgba(252, 60, 45, 0.7) 50%, rgba(252, 60, 45, 0) 100%);
                background-image: linear-gradient(to top, $primary_color 0%, rgba(252, 60, 45, 0.7) 50%, rgba(252, 60, 45, 0) 100%);
            }";
            $atbs_css_output .= ".bk-preload-wrapper:after {
                border-top-color: $primary_color;
                border-bottom-color: $primary_color;
            }";

            $atbs_css_output .= ".atbs-keylin-listing--grid-7.set-module-background{
                background-color: rgba($Final_Rgb_color,0.05);
            } ";
        endif;

        $atbs_css_output .= "atbs-keylin-video-box__playlist .is-playing .post__thumb:after { content: '".esc_html__( 'Now playing','keylin')."'; }";

        $cat__terms = get_terms( array(
            'taxonomy' => 'category',
            'hide_empty' => true,
        ) );


        if(is_page(get_the_ID())) {
            $page_info['page_id'] = get_the_ID();
            for ( $counter = 1; $counter < 100; $counter++ ) {
                $field_key = 'bk_section_'.$counter;
                $section_type = get_post_meta( $page_info['page_id'], $field_key, true );
                if ( ! $section_type ) continue;
                for ($mcount = 1; $mcount < 100; $mcount ++) {
                    $page_info['block_prefix'] = 'bk_fullwidth_module_'.$counter.'_'.$mcount;

                    $atbsBGPattern = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_background_pattern', true );
                    $atbsBGPatternSVG = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_background_pattern_svg', true );
                    $atbsBGPatternDecoded = ATBS_Core::atbs_svgUrlEncode($atbsBGPatternSVG);
                    if($atbsBGPattern == 'enable' && $atbsBGPatternDecoded != '') {
                        $atbs_css_output .= '.'.$page_info['block_prefix'] . '.atbs-module-bg-pattern
                        {background-image: url("data:image/svg+xml,'.$atbsBGPatternDecoded.'");}';

                    }
                }
            }
        }

        wp_add_inline_style( 'atbs-style', $atbs_css_output );
    }
    add_action( 'wp_enqueue_scripts', 'atbs_custom_css' );
}