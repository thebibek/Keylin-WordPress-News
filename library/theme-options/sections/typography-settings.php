<?php
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
    $primary_font = array('.page-heading__title, widget__title-text, .comment-reply-title, .comments-title, .comment-reply-title, .category-tile__name, .block-heading, .block-heading__title, .post-categories__title, .post__title, .entry-title, h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6, .text-font-primary, .social-tile__title, .widget_recent_comments .recentcomments > a, .widget_recent_entries li > a, .modal-title.modal-title, .author-box .author-name a, .comment-author, .comment-author-name, .widget_calendar caption, .widget_archive li, .widget_categories li, .widget_meta li, .widget_pages li, .widget_categories li, .widget_recent_entries li, .widget_categories li>a, .widget_meta ul, .widget_recent_comments .recentcomments>a, .widget_pages li>a, .apsl-widget, .widget_archive li, .widget_archive a, .lwa td, .widget_nav_menu ul, .widget_rss a.rsswidget, .atbs-keylin-search-full-style-2 .search-form__input, .atbs-keylin-search-full-style-2 .search-form__input::placeholder, .post-score-hexagon .post-score-value, .logo-text, .wp-calendar-nav');
    $secondary_font = array('::-webkit-input-placeholder /* WebKit, Blink, Edge */, ::placeholder, .block-heading__subtitle, .meta-font, .post__cat, .post__readmore, .time, .atbs-keylin-pagination, .subscribe-form__info, .btn .author__name, .author__text');

    $tertiary_font = array('.mobile-header-btn, .menu, .meta-text, a.meta-text, .meta-font, a.meta-font, .text-font-tertiary, .block-heading-tabs, .block-heading-tabs > li > a, input[type="button"]:not(.btn), input[type="reset"]:not(.btn), input[type="submit"]:not(.btn), .btn, label, .page-nav, .post-score, .post-score-hexagon .post-score-value, .post__cat, a.post__cat, .entry-cat,
                            a.entry-cat, .read-more-link, .post__meta, .entry-meta, .entry-author__name, a.entry-author__name, .comments-count-box, .atbs-atbs-widget-indexed-posts-a .posts-list > li .post__thumb:after, .atbs-atbs-widget-indexed-posts-b .posts-list > li .post__title:after, .atbs-atbs-widget-indexed-posts-c .list-index, .social-tile__count, .widget_recent_comments .comment-author-link, .atbs-atbs-video-box__playlist .is-playing .post__thumb:after, .atbs-atbs-posts-listing-a .cat-title,
                            .atbs-atbs-news-ticker__heading, .post-sharing__title, .post-sharing--simple .sharing-btn, .entry-action-btn, .entry-tags-title, .comments-title__text, .comments-title .add-comment, .comment-metadata, .comment-metadata a, .comment-reply-link, .countdown__digit, .modal-title, .comment-meta, .comment .reply, .wp-caption, .gallery-caption, .widget-title,
                            .btn, .logged-in-as, .countdown__digit, .atbs-atbs-widget-indexed-posts-a .posts-list>li .post__thumb:after, .atbs-atbs-widget-indexed-posts-b .posts-list>li .post__title:after, .atbs-atbs-widget-indexed-posts-c .list-index, .atbs-atbs-horizontal-list .index, .atbs-atbs-pagination, .atbs-atbs-pagination--next-n-prev .atbs-atbs-pagination__label,
                            .post__readmore, .single-header .atbs-date-style');

    $navigation_font = array('.navigation-bar-btn, .navigation--main>li>a');

    $sub_navigation_font = array('.navigation--main .sub-menu a');

    $off_canvas_sub_navigation_font = array('.navigation--offcanvas>li>.sub-menu>li>a, .navigation--offcanvas>li>.sub-menu>li>.sub-menu>li>a');

    $footer_navigation_font = array('.atbs-footer .navigation--footer > li > a, .navigation--footer > li > a');

    $offcanvas_navigation_font = array('.navigation--offcanvas>li>a');

    $sub_heading_title = array('.atbs-keylin-block-custom-margin .block-heading.block-heading-subtitle-on-top-align-left .block-heading__subtitle,.atbs-keylin-block-custom-margin .block-heading.block-heading-subtitle-on-top .block-heading__subtitle');
    $main_heading_title = array('.block-heading__title .background-hidden, .atbs-keylin-block-custom-margin .block-heading__title, .atbs-keylin-block-custom-margin .block-heading.block-heading-subtitle-on-top-align-left .block-heading__title, .atbs-keylin-block-custom-margin .block-heading.block-heading-subtitle-on-top .block-heading__title');

    Redux::setSection( $opt_name, array(
        'id'    => 'typography-section',
        'icon'  => 'el-icon-font',
		'title' => esc_html__('Typography Setings', 'keylin'),
        'customizer_width' => '500px',
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Body','keylin'),
        'id'               => 'body-typography',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'          => 'body-typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'Body','keylin'),
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => false,
                'subsets'       => true, // Only appears if google is true and subsets not set to false
                'font-size'     => false,
                'line-height'   => false,
                'text-align'    => false,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => 'body',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for body text.','keylin'),
                'default'     => array(
                    'font-family' => 'Rubik',
                    'font-backup' => 'Arial, Helvetica, sans-serif'
                ),
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Heading','keylin'),
        'id'               => 'heading-typography',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'          => 'heading-typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading','keylin'),
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => false,
                'subsets'       => true, // Only appears if google is true and subsets not set to false
                'font-size'     => false,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => $primary_font,
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array(
                    'font-family' => 'Poppins',
                    'font-backup' => 'Arial, Helvetica, sans-serif'
                ),
            ),
        ),
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Secondary','keylin'),
        'id'               => 'secondary-typography',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'          => 'meta-typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'Secondary','keylin'),
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => false,
                'subsets'       => true, // Only appears if google is true and subsets not set to false
                'font-size'     => false,
                'line-height'   => false,
                'text-align'    => false,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                //'preview'       => false, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => $secondary_font,
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for secondary text such as subtitle, sub menu, ...','keylin'),
                'default'     => array(
                    'font-family' => 'Rubik',
                    'font-backup' => 'Arial, Helvetica, sans-serif'
                ),
            ),
        ),
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Tertiary','keylin'),
        'id'               => 'tertiary-typography',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'          => 'tertiary-typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'Tertiary font','keylin'),
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => false,
                'text-align'    => false,
                'subsets'       => true, // Only appears if google is true and subsets not set to false
                'font-size'     => false,
                'line-height'   => false,
                'word-spacing'  => false,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                //'preview'       => false, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => $tertiary_font,
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for tertiary text such as post meta, button, ...','keylin'),
                'default'     => array(
                    'font-family' => 'Rubik',
                    'font-backup' => 'Arial, Helvetica, sans-serif'
                ),
            ),
        ),
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Top Bar Menu','keylin'),
        'id'               => 'top-bar-menu',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id' => 'section-top-bar-menu-typography-start',
                'title' => esc_html__('Navigation', 'keylin'),
                'type' => 'section',
                'indent' => true // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'          => 'top-bar-menu-typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'Top Bar Menu','keylin'),
                'google'      => true,
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => false,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                //'word-spacing'  => true,  // Defaults to false
                'text-transform'    => false,
                'letter-spacing'=> false,  // Defaults to false
                'color'         => false,
                'preview'       => false, // Disable the previewer
                'all_styles'  => false,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array('.top-bar .navigation a, .top-bar > * '),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for Top Menu.','keylin'),
                'default'     => array(
                ),
            ),
            array(
                'id' => 'section-top-bar-menu-typography-end',
                'type' => 'section',
                'indent' => false // Indent all options below until the next 'section' option is set.
            ),
        ),
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Navigation','keylin'),
        'id'               => 'navigation-typography',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id' => 'section-typography-navigation-start',
                'title' => esc_html__('Navigation', 'keylin'),
                'type' => 'section',
                'indent' => true // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'          => 'navigation-typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'Header Navigation','keylin'),
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                //'word-spacing'  => true,  // Defaults to false
                'text-transform'    => true,
                'letter-spacing'=> true,  // Defaults to false
                'color'         => true,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => $navigation_font,
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for navigation.','keylin'),
                'default'     => array(
                    'font-family' => 'Rubik',
                    'font-backup' => 'Arial, Helvetica, sans-serif',
                    'font-weight'    => '500',
                    'text-transform'    => 'uppercase',
                ),
            ),
            array(
                'id'          => 'sub-navigation-typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'Sub Navigation','keylin'),
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                //'word-spacing'  => true,  // Defaults to false
                'text-transform'    => true,
                'letter-spacing'=> true,  // Defaults to false
                'color'         => true,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => $sub_navigation_font,
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for navigation.','keylin'),
                'default'     => array(
                    'font-family' => 'Rubik',
                    'font-backup' => 'Arial, Helvetica, sans-serif',
                    'font-weight'    => '',
                    'text-transform'    => 'none',
                ),
            ),
            array(
                'id'          => 'offcanvas-navigation-typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'Offcanvas Navigation','keylin'),
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => true,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => $offcanvas_navigation_font,
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for navigation.','keylin'),
                'default'     => array(
                    'font-family' => 'Rubik',
                    'font-backup' => 'Arial, Helvetica, sans-serif',
                    'font-weight'    => '700',
                    'text-transform'    => 'uppercase',
                ),
            ),
            array(
                'id'          => 'off-canvas-sub-navigation-typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'Off-canvas Sub Navigation','keylin'),
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                //'word-spacing'  => true,  // Defaults to false
                'text-transform'    => true,
                'letter-spacing'=> true,  // Defaults to false
                'color'         => true,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => $off_canvas_sub_navigation_font,
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for navigation.','keylin'),
                'default'     => array(
                    'font-family' => 'Rubik',
                    'font-backup' => 'Arial, Helvetica, sans-serif',
                    'font-weight'    => '',
                    'text-transform'    => 'capitalize',
                ),
            ),
            array(
                'id'          => 'footer-navigation-typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'Footer Navigation','keylin'),
                'google'      => true,
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                //'word-spacing'  => true,  // Defaults to false
                'text-transform'    => true,
                'letter-spacing'=> true,  // Defaults to false
                'color'         => true,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => $footer_navigation_font,
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for navigation.','keylin'),
                'default'     => array(
                    'font-family' => 'Rubik',
                    'font-backup' => 'Arial, Helvetica, sans-serif',
                    'font-weight'    => '',
                    'text-transform'    => 'uppercase',
                ),
            ),
            array(
                'id' => 'section-typography-navigation-end',
                'type' => 'section',
                'indent' => false // Indent all options below until the next 'section' option is set.
            ),
        ),
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Load More Text','keylin'),
        'id'               => 'loadmore-typography',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
				'id'      =>'bk-load-more-text',
				'type'    => 'text',
				'title'   => esc_html__('Load More Text', 'keylin'),
                'default' => esc_html__('Load more news', 'keylin'),
			),
            array(
				'id'      =>'bk-no-more-text',
				'type'    => 'text',
				'title'   => esc_html__('No More Text', 'keylin'),
                'default' => esc_html__('No more news', 'keylin'),
			),
        ),
    ) );