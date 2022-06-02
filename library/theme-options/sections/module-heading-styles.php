<?php
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
    
    Redux::setSection( $opt_name, array(
        'id'    => 'module-heading-styles-section',
        'icon' => 'el el-wrench',
		'title' => esc_html__('Module Heading Styles', 'keylin'),
        'customizer_width' => '500px',
    ) );
    
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Default Module Heading','keylin'),
        'id'               => 'default-module-heading-subsection',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'    => 'info_success',
                'type'  => 'info',
                'style' => 'success',
                'title' => esc_html__('We prepared the example module headings for your reference', 'keylin'),
                'icon'  => 'el-icon-info-sign',
                'desc'  => '<a target="__blank" href="https://keylin.bk-ninja.com/default/module-heading-examples/">'.esc_html__('Please open here', 'keylin').'</a>'
            ),
            array(
            'id'=>'bk-default-module-heading',
            'type' => 'select',
            'title' => esc_html__('Default Module Heading', 'keylin'),
            'subtitle' => esc_html__('Default setting of all module heading style.', 'keylin'),
            'options'   => array(
                            'heading-style-1'         => esc_html__( 'Heading Style 1','keylin'),
                            'heading-style-2'         => esc_html__( 'Heading Style 2','keylin'),
                            'heading-style-2-center'  => esc_html__( 'Heading Style 2 Center','keylin'),
                            'heading-style-3'         => esc_html__( 'Heading Style 3','keylin'),
                            'heading-style-3-center'  => esc_html__( 'Heading Style 3 Center','keylin'),
                            'heading-style-4'         => esc_html__( 'Heading Style 4','keylin'),
                            'heading-style-5-center'  => esc_html__( 'Heading Style 5 Center','keylin'),
                            'heading-style-6'         => esc_html__( 'Heading Style 6','keylin'),
                            'heading-style-7'         => esc_html__( 'Heading Style 7','keylin'),
                            'heading-style-8'         => esc_html__( 'Heading Style 8','keylin'),
                            'heading-style-9'         => esc_html__( 'Heading Style 9','keylin'),
                            'heading-style-10'        => esc_html__( 'Heading Style 10','keylin'),
                            'heading-style-11'        => esc_html__( 'Heading Style 11','keylin'),
                            'heading-style-12'        => esc_html__( 'Heading Style 12','keylin'),
                            'heading-style-13'        => esc_html__( 'Heading Style 13','keylin'),
                            'heading-style-14'        => esc_html__( 'Heading Style 14','keylin'),
                            'heading-style-15'        => esc_html__( 'Heading Style 15','keylin'),
                            'heading-style-16'        => esc_html__( 'Heading Style 16','keylin'),
                            'heading-style-17'        => esc_html__( 'Heading Style 17','keylin'),
                            'heading-style-18'        => esc_html__( 'Heading Style 18','keylin'),
                            ),
                'default'    => 'heading-style-16',
            ),
            array(
            'id'   => 'bk-default-heading-color',
            'type' => 'color',
            'title' => esc_html__('Default Heading Color', 'keylin'),
            'subtitle' => esc_html__('Default heading color of all module heading style.', 'keylin'),
            'default'    => '#222',
            )
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Heading Font','keylin'),
        'id'               => 'module-heading-typography',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'          => 'module-heading-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading Font Setup','keylin'),
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => true, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array('.block-heading:not(.carousel-heading--aside-title) .block-heading__title'),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array(
                    'font-family' => 'Poppins',
                    'font-backup' => 'Arial, Helvetica, sans-serif',
                    'font-weight' => 700,
                ),
            ),

            array(
                'id'          => 'single-section-heading-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Single Post Section Heading Font Setup','keylin'),
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => true, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array('.single .single-entry-section .block-heading .block-heading__title, .single .comment-reply-title, .page .comment-reply-title, .single .atbs-reactions-title'),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array(
                    'font-family' => 'Poppins',
                    'font-backup' => 'Arial, Helvetica, sans-serif',
                    'font-weight' => 600,
                ),
            ),
        ),
    ) );
    // Heading Style 1 Font Setup
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Heading Font for Heading Style 1','keylin'),
        'id'               => 'module-heading-style-1-typography',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'    => 'heading1_img_info',
                'type'  => 'info',
                'style' => 'success',
                'title' => '<img src="https://keylin.bk-ninja.com/default/wp-content/uploads/2020/12/heading-1a.png">',
                'icon'  => 'el-icon-info-sign',
            ),
            array(
                'id'          => 'module-heading-style-1-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading Font Setup for Heading Style 1','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'         => '.block-heading.heading-style-1:not(.carousel-heading--aside-title) .block-heading__title, .single .heading-style-1 .comment-reply-title, .page .heading-style-1 .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
            array(
                'id'          => 'module-sub-heading-style-1-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Sub Heading Font Setup for Heading Style 1','keylin'),
                'font-family' => false,
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array('.atbs-keylin-block-custom-margin .block-heading.heading-style-1 .page-heading__subtitle p, .block-heading.heading-style-1 .page-heading__subtitle'),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for subtitle.','keylin'),
                'default'     => array(),
            ),

            array(
                'id'          => 'single-section-heading-style-1-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Single Post Section Font Setup for Heading Style 1','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => true, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => '.single .single-entry-section .block-heading.heading-style-1 .block-heading__title, .single .heading-style-1 .comment-reply-title, .page .heading-style-1 .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
        ),
    ) );
    // Heading Style 2 Font Setup
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Heading Font for Heading Style 2','keylin'),
        'id'               => 'module-heading-style-2-typography',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'    => 'heading2_img_info',
                'type'  => 'info',
                'style' => 'success',
                'title' => '<img src="https://keylin.bk-ninja.com/default/wp-content/uploads/2020/12/heading-2a.png">',
                'icon'  => 'el-icon-info-sign',
            ),
            array(
                'id'          => 'module-heading-style-2-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading Font Setup for Heading Style 2','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'         => '.block-heading.heading-style-2:not(.carousel-heading--aside-title):not(.text-center) .block-heading__title, .single .heading-style-2:not(.text-center) .comment-reply-title, .page .heading-style-2:not(.text-center) .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
            array(
                'id'          => 'module-sub-heading-style-2-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Sub Heading Font Setup for Heading Style 2','keylin'),
                'font-family' => false,
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array('.atbs-keylin-block-custom-margin .block-heading.heading-style-2:not(.text-center) .page-heading__subtitle p, .block-heading.heading-style-2:not(.text-center) .page-heading__subtitle'),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for subtitle.','keylin'),
                'default'     => array(),
            ),

            array(
                'id'          => 'single-section-heading-style-2-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Single Post Section Font Setup for Heading Style 2','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => true, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => '.single .single-entry-section .block-heading.heading-style-2:not(.text-center) .block-heading__title, .single .heading-style-2:not(.text-center) .comment-reply-title, .page .heading-style-2:not(.text-center) .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
        ),
    ) );
    // Heading Style 2 Center Font Setup
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Heading Font for Heading Style 2 Center','keylin'),
        'id'               => 'module-heading-style-2-center-typography',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'    => 'heading2_center_img_info',
                'type'  => 'info',
                'style' => 'success',
                'title' => '<img src="https://keylin.bk-ninja.com/default/wp-content/uploads/2020/12/heading-3.png">',
                'icon'  => 'el-icon-info-sign',
            ),
            array(
                'id'          => 'module-heading-style-2-center-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading Font Setup for Heading Style 2 Center','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'         => '.block-heading.heading-style-2.text-center:not(.carousel-heading--aside-title) .block-heading__title, .single .heading-style-2.text-center .comment-reply-title, .page .heading-style-2.text-center .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
            array(
                'id'          => 'module-sub-heading-style-2-center-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Sub Heading Font Setup for Heading Style 2 Center','keylin'),
                'font-family' => false,
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array('.atbs-keylin-block-custom-margin .block-heading.heading-style-2.text-center .page-heading__subtitle p, .block-heading.heading-style-2.text-center .page-heading__subtitle'),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for subtitle.','keylin'),
                'default'     => array(),
            ),

            array(
                'id'          => 'single-section-heading-style-2-center-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Single Post Section Font Setup for Heading Style 2 Center','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => true, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => '.single .single-entry-section .block-heading.heading-style-2.text-center .block-heading__title, .single .heading-style-2.text-center .comment-reply-title, .page .heading-style-2.text-center .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
        ),
    ) );
    // Heading Style 3 Font Setup
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Heading Font for Heading Style 3','keylin'),
        'id'               => 'module-heading-style-3-typography',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'    => 'heading3_img_info',
                'type'  => 'info',
                'style' => 'success',
                'title' => '<img src="https://keylin.bk-ninja.com/default/wp-content/uploads/2020/12/heading-3a.png">',
                'icon'  => 'el-icon-info-sign',
            ),
            array(
                'id'          => 'module-heading-style-3-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading Font Setup for Heading Style 3','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'         => '.block-heading.heading-style-3:not(.carousel-heading--aside-title):not(.text-center) .block-heading__title, .single .heading-style-3:not(.text-center) .comment-reply-title, .page .heading-style-3:not(.text-center) .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
            array(
                'id'          => 'module-sub-heading-style-3-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Sub Heading Font Setup for Heading Style 3','keylin'),
                'font-family' => false,
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array('.atbs-keylin-block-custom-margin .block-heading.heading-style-3:not(.text-center) .page-heading__subtitle p, .block-heading.heading-style-3:not(.text-center) .page-heading__subtitle'),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for subtitle.','keylin'),
                'default'     => array(),
            ),

            array(
                'id'          => 'single-section-heading-style-3-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Single Post Section Font Setup for Heading Style 3','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => true, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => '.single .single-entry-section .block-heading.heading-style-3:not(.text-center) .block-heading__title, .single .heading-style-3:not(.text-center) .comment-reply-title, .page .heading-style-3:not(.text-center) .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
        ),
    ) );
    // Heading Style 3 Center Font Setup
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Heading Font for Heading Style 3 Center','keylin'),
        'id'               => 'module-heading-style-3-center-typography',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'    => 'heading3c_img_info',
                'type'  => 'info',
                'style' => 'success',
                'title' => '<img src="https://keylin.bk-ninja.com/default/wp-content/uploads/2020/12/heading-3c.png">',
                'icon'  => 'el-icon-info-sign',
            ),
            array(
                'id'          => 'module-heading-style-3-center-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading Font Setup for Heading Style 3 Center','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'         => '.block-heading.heading-style-3.text-center:not(.carousel-heading--aside-title) .block-heading__title, .single .heading-style-3.text-center .comment-reply-title, .page .heading-style-3.text-center .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
            array(
                'id'          => 'module-sub-heading-style-3-center-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Sub Heading Font Setup for Heading Style 3 Center','keylin'),
                'font-family' => false,
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array('.atbs-keylin-block-custom-margin .block-heading.heading-style-3.text-center .page-heading__subtitle p, .block-heading.heading-style-3.text-center .page-heading__subtitle'),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for subtitle.','keylin'),
                'default'     => array(),
            ),

            array(
                'id'          => 'single-section-heading-style-3-center-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Single Post Section Font Setup for Heading Style 3 Center','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => true, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => '.single .single-entry-section .block-heading.heading-style-3.text-center .block-heading__title, .single .heading-style-3.text-center .comment-reply-title, .page .heading-style-3.text-center .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
        ),
    ) );
    // Heading Style 4 Font Setup
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Heading Font for Heading Style 4','keylin'),
        'id'               => 'module-heading-style-4-typography',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'    => 'heading4_img_info',
                'type'  => 'info',
                'style' => 'success',
                'title' => '<img src="https://keylin.bk-ninja.com/default/wp-content/uploads/2020/12/heading-4.png">',
                'icon'  => 'el-icon-info-sign',
            ),
            array(
                'id'          => 'module-heading-style-4-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading Font Setup for Heading Style 4','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'         => '.block-heading.heading-style-4:not(.carousel-heading--aside-title) .block-heading__title, .single .heading-style-4 .comment-reply-title, .page .heading-style-4 .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
            array(
                'id'          => 'module-sub-heading-style-4-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Sub Heading Font Setup for Heading Style 4','keylin'),
                'font-family' => false,
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array('.atbs-keylin-block-custom-margin .block-heading.heading-style-4 .page-heading__subtitle p, .block-heading.heading-style-4 .page-heading__subtitle'),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for subtitle.','keylin'),
                'default'     => array(),
            ),

            array(
                'id'          => 'single-section-heading-style-4-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Single Post Section Font Setup for Heading Style 4','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => true, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => '.single .single-entry-section .block-heading.heading-style-4 .block-heading__title, .single .heading-style-4 .comment-reply-title, .page .heading-style-4 .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
        ),
    ) );
    // Heading Style 5 Center Font Setup
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Heading Font for Heading Style 5 Center','keylin'),
        'id'               => 'module-heading-style-5-center-typography',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'    => 'heading5_img_info',
                'type'  => 'info',
                'style' => 'success',
                'title' => '<img src="https://keylin.bk-ninja.com/default/wp-content/uploads/2020/12/heading-5.png">',
                'icon'  => 'el-icon-info-sign',
            ),
            array(
                'id'          => 'module-heading-style-5-center-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading Font Setup for Heading Style 5 Center','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'         => '.block-heading.heading-style-5.text-center:not(.carousel-heading--aside-title) .block-heading__title, .single .heading-style-5.text-center .comment-reply-title, .page .heading-style-5.text-center .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
            array(
                'id'          => 'module-sub-heading-style-5-center-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Sub Heading Font Setup for Heading Style 5 Center','keylin'),
                'font-family' => false,
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array('.atbs-keylin-block-custom-margin .block-heading.heading-style-5.text-center .page-heading__subtitle p, .block-heading.heading-style-5.text-center .page-heading__subtitle'),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for subtitle.','keylin'),
                'default'     => array(),
            ),

            array(
                'id'          => 'single-section-heading-style-5-center-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Single Post Section Font Setup for Heading Style 5 Center','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => true, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => '.single .single-entry-section .block-heading.heading-style-5.text-center .block-heading__title, .single .heading-style-5.text-center .comment-reply-title, .page .heading-style-5.text-center .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
        ),
    ) );
    // Heading Style 6 Font Setup
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Heading Font for Heading Style 6','keylin'),
        'id'               => 'module-heading-style-6-typography',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'    => 'heading6_img_info',
                'type'  => 'info',
                'style' => 'success',
                'title' => '<img src="https://keylin.bk-ninja.com/default/wp-content/uploads/2020/12/heading-6.png">',
                'icon'  => 'el-icon-info-sign',
            ),
            array(
                'id'          => 'module-heading-style-6-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading Font Setup for Heading Style 6','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'         => '.block-heading.heading-style-6:not(.carousel-heading--aside-title) .block-heading__title, .single .heading-style-6 .comment-reply-title, .page .heading-style-6 .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
            array(
                'id'          => 'module-sub-heading-style-6-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Sub Heading Font Setup for Heading Style 6','keylin'),
                'font-family' => false,
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array('.atbs-keylin-block-custom-margin .block-heading.heading-style-6 .page-heading__subtitle p, .block-heading.heading-style-6 .page-heading__subtitle'),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for subtitle.','keylin'),
                'default'     => array(),
            ),

            array(
                'id'          => 'single-section-heading-style-6-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Single Post Section Font Setup for Heading Style 6','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => true, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => '.single .single-entry-section .block-heading.heading-style-6 .block-heading__title, .single .heading-style-6 .comment-reply-title, .page .heading-style-6 .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
        ),
    ) );
    // Heading Style 7 Font Setup
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Heading Font for Heading Style 7','keylin'),
        'id'               => 'module-heading-style-7-typography',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'    => 'heading7_img_info',
                'type'  => 'info',
                'style' => 'success',
                'title' => '<img src="https://keylin.bk-ninja.com/default/wp-content/uploads/2020/12/heading-7.png">',
                'icon'  => 'el-icon-info-sign',
            ),
            array(
                'id'          => 'module-heading-style-7-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading Font Setup for Heading Style 7','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'         => '.block-heading.heading-style-7:not(.carousel-heading--aside-title) .block-heading__title, .single .heading-style-7 .comment-reply-title, .page .heading-style-7 .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
            array(
                'id'          => 'module-sub-heading-style-7-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Sub Heading Font Setup for Heading Style 7','keylin'),
                'font-family' => false,
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array('.atbs-keylin-block-custom-margin .block-heading.heading-style-7 .page-heading__subtitle p, .block-heading.heading-style-7 .page-heading__subtitle'),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for subtitle.','keylin'),
                'default'     => array(),
            ),

            array(
                'id'          => 'single-section-heading-style-7-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Single Post Section Font Setup for Heading Style 7','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => true, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => '.single .single-entry-section .block-heading.heading-style-7 .block-heading__title, .single .heading-style-7 .comment-reply-title, .page .heading-style-7 .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
        ),
    ) );
    // Heading Style 8 Font Setup
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Heading Font for Heading Style 8','keylin'),
        'id'               => 'module-heading-style-8-typography',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'    => 'heading8_img_info',
                'type'  => 'info',
                'style' => 'success',
                'title' => '<img src="https://keylin.bk-ninja.com/default/wp-content/uploads/2020/12/heading-8.png">',
                'icon'  => 'el-icon-info-sign',
            ),
            array(
                'id'          => 'module-heading-style-8-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading Font Setup for Heading Style 8','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'         => '.block-heading.heading-style-8:not(.carousel-heading--aside-title) .block-heading__title, .single .heading-style-8 .comment-reply-title, .page .heading-style-8 .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
            array(
                'id'          => 'module-sub-heading-style-8-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Sub Heading Font Setup for Heading Style 8','keylin'),
                'font-family' => false,
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array('.atbs-keylin-block-custom-margin .block-heading.heading-style-8 .page-heading__subtitle p, .block-heading.heading-style-8 .page-heading__subtitle'),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for subtitle.','keylin'),
                'default'     => array(),
            ),

            array(
                'id'          => 'single-section-heading-style-8-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Single Post Section Font Setup for Heading Style 8','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => true, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => '.single .single-entry-section .block-heading.heading-style-8 .block-heading__title, .single .heading-style-8 .comment-reply-title, .page .heading-style-8 .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
        ),
    ) );
    // Heading Style 9 Font Setup
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Heading Font for Heading Style 9','keylin'),
        'id'               => 'module-heading-style-9-typography',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'    => 'heading9_img_info',
                'type'  => 'info',
                'style' => 'success',
                'title' => '<img src="https://keylin.bk-ninja.com/default/wp-content/uploads/2020/12/heading-9.png">',
                'icon'  => 'el-icon-info-sign',
            ),
            array(
                'id'          => 'module-heading-style-9-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading Font Setup for Heading Style 9','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'         => '.block-heading.heading-style-9:not(.carousel-heading--aside-title) .block-heading__title, .single .heading-style-9 .comment-reply-title, .page .heading-style-9 .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
            array(
                'id'          => 'module-sub-heading-style-9-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Sub Heading Font Setup for Heading Style 9','keylin'),
                'font-family' => false,
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array('.atbs-keylin-block-custom-margin .block-heading.heading-style-9 .page-heading__subtitle p, .block-heading.heading-style-9 .page-heading__subtitle'),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for subtitle.','keylin'),
                'default'     => array(),
            ),

            array(
                'id'          => 'single-section-heading-style-9-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Single Post Section Font Setup for Heading Style 9','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => true, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => '.single .single-entry-section .block-heading.heading-style-9 .block-heading__title, .single .heading-style-9 .comment-reply-title, .page .heading-style-9 .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
        ),
    ) );
    // Heading Style 10 Font Setup
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Heading Font for Heading Style 10','keylin'),
        'id'               => 'module-heading-style-10-typography',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'    => 'heading10_img_info',
                'type'  => 'info',
                'style' => 'success',
                'title' => '<img src="https://keylin.bk-ninja.com/default/wp-content/uploads/2020/12/heading-10.png">',
                'icon'  => 'el-icon-info-sign',
            ),
            array(
                'id'          => 'module-heading-style-10-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading Font Setup for Heading Style 10','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'         => '.block-heading.heading-style-10:not(.carousel-heading--aside-title) .block-heading__title, .single .heading-style-10 .comment-reply-title, .page .heading-style-10 .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
            array(
                'id'          => 'module-sub-heading-style-10-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Sub Heading Font Setup for Heading Style 10','keylin'),
                'font-family' => false,
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array('.atbs-keylin-block-custom-margin .block-heading.heading-style-10 .page-heading__subtitle p, .block-heading.heading-style-10 .page-heading__subtitle'),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for subtitle.','keylin'),
                'default'     => array(),
            ),

            array(
                'id'          => 'single-section-heading-style-10-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Single Post Section Font Setup for Heading Style 10','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => true, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => '.single .single-entry-section .block-heading.heading-style-10 .block-heading__title, .single .heading-style-10 .comment-reply-title, .page .heading-style-10 .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
        ),
    ) );
    // Heading Style 11 Center Font Setup
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Heading Font for Heading Style 11 Center','keylin'),
        'id'               => 'module-heading-style-11-center-typography',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'    => 'heading11_img_info',
                'type'  => 'info',
                'style' => 'success',
                'title' => '<img src="https://keylin.bk-ninja.com/default/wp-content/uploads/2020/12/heading-11.png">',
                'icon'  => 'el-icon-info-sign',
            ),
            array(
                'id'          => 'module-heading-style-11-center-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading Font Setup for Heading Style 11 Center','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'         => '.block-heading.heading-style-11:not(.carousel-heading--aside-title) .block-heading__title, .single .heading-style-11 .comment-reply-title, .page .heading-style-11 .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
            array(
                'id'          => 'module-sub-heading-style-11-center-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Sub Heading Font Setup for Heading Style 11 Center','keylin'),
                'font-family' => false,
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array('.atbs-keylin-block-custom-margin .block-heading.heading-style-11 .page-heading__subtitle p, .block-heading.heading-style-11 .page-heading__subtitle'),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for subtitle.','keylin'),
                'default'     => array(),
            ),

            array(
                'id'          => 'single-section-heading-style-11-center-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Single Post Section Font Setup for Heading Style 11 Center','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => true, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => '.single .single-entry-section .block-heading.heading-style-11 .block-heading__title, .single .heading-style-11 .comment-reply-title, .page .heading-style-11 .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
        ),
    ) );
    // Heading Style 12 Font Setup
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Heading Font for Heading Style 12','keylin'),
        'id'               => 'module-heading-style-12-typography',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'    => 'heading12_img_info',
                'type'  => 'info',
                'style' => 'success',
                'title' => '<img src="https://keylin.bk-ninja.com/default/wp-content/uploads/2020/12/heading-12.png">',
                'icon'  => 'el-icon-info-sign',
            ),
            array(
                'id'          => 'module-heading-style-12-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading Font Setup for Heading Style 12','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'         => '.block-heading.heading-style-12:not(.carousel-heading--aside-title) .block-heading__title, .single .heading-style-12 .comment-reply-title, .page .heading-style-12 .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
            array(
                'id'          => 'module-sub-heading-style-12-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Sub Heading Font Setup for Heading Style 12','keylin'),
                'font-family' => false,
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array('.atbs-keylin-block-custom-margin .block-heading.heading-style-12 .page-heading__subtitle p, .block-heading.heading-style-12 .page-heading__subtitle'),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for subtitle.','keylin'),
                'default'     => array(),
            ),

            array(
                'id'          => 'single-section-heading-style-12-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Single Post Section Font Setup for Heading Style 12','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => true, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => '.single .single-entry-section .block-heading.heading-style-12 .block-heading__title, .single .heading-style-12 .comment-reply-title, .page .heading-style-12 .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
        ),
    ) );
    // Heading Style 13 Font Setup
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Heading Font for Heading Style 13','keylin'),
        'id'               => 'module-heading-style-13-typography',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'    => 'heading13_img_info',
                'type'  => 'info',
                'style' => 'success',
                'title' => '<img src="https://keylin.bk-ninja.com/default/wp-content/uploads/2020/12/heading-13.png">',
                'icon'  => 'el-icon-info-sign',
            ),
            array(
                'id'          => 'module-heading-style-13-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading Font Setup for Heading Style 13','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'         => '.block-heading.heading-style-13:not(.carousel-heading--aside-title) .block-heading__title, .single .heading-style-13 .comment-reply-title, .page .heading-style-13 .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
            array(
                'id'          => 'module-sub-heading-style-13-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Sub Heading Font Setup for Heading Style 13','keylin'),
                'font-family' => false,
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array('.atbs-keylin-block-custom-margin .block-heading.heading-style-13 .page-heading__subtitle p, .block-heading.heading-style-13 .page-heading__subtitle'),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for subtitle.','keylin'),
                'default'     => array(),
            ),

            array(
                'id'          => 'single-section-heading-style-13-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Single Post Section Font Setup for Heading Style 13','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => true, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => '.single .single-entry-section .block-heading.heading-style-13 .block-heading__title, .single .heading-style-13 .comment-reply-title, .page .heading-style-13 .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
        ),
    ) );
    // Heading Style 14 Font Setup
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Heading Font for Heading Style 14','keylin'),
        'id'               => 'module-heading-style-14-typography',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'    => 'heading14_img_info',
                'type'  => 'info',
                'style' => 'success',
                'title' => '<img src="https://keylin.bk-ninja.com/default/wp-content/uploads/2020/12/heading-14.png">',
                'icon'  => 'el-icon-info-sign',
            ),
            array(
                'id'          => 'module-heading-style-14-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading Font Setup for Heading Style 14','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'         => '.block-heading.heading-style-14:not(.carousel-heading--aside-title) .block-heading__title, .single .heading-style-14 .comment-reply-title, .page .heading-style-14 .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
            array(
                'id'          => 'module-sub-heading-style-14-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Sub Heading Font Setup for Heading Style 14','keylin'),
                'font-family' => false,
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array('.atbs-keylin-block-custom-margin .block-heading.heading-style-14 .page-heading__subtitle p, .block-heading.heading-style-14 .page-heading__subtitle'),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for subtitle.','keylin'),
                'default'     => array(),
            ),

            array(
                'id'          => 'single-section-heading-style-14-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Single Post Section Font Setup for Heading Style 14','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => true, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => '.single .single-entry-section .block-heading.heading-style-14 .block-heading__title, .single .heading-style-14 .comment-reply-title, .page .heading-style-14 .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
        ),
    ) );
    // Heading Style 15 Font Setup
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Heading Font for Heading Style 15','keylin'),
        'id'               => 'module-heading-style-15-typography',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'    => 'heading15_img_info',
                'type'  => 'info',
                'style' => 'success',
                'title' => '<img src="https://keylin.bk-ninja.com/default/wp-content/uploads/2020/12/heading-15.png">',
                'icon'  => 'el-icon-info-sign',
            ),
            array(
                'id'          => 'module-heading-style-15-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading Font Setup for Heading Style 15','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'         => '.block-heading.heading-style-15:not(.carousel-heading--aside-title) .block-heading__title, .single .heading-style-15 .comment-reply-title, .page .heading-style-15 .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
            array(
                'id'          => 'module-sub-heading-style-15-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Sub Heading Font Setup for Heading Style 15','keylin'),
                'font-family' => false,
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array('.atbs-keylin-block-custom-margin .block-heading.heading-style-15 .page-heading__subtitle p, .block-heading.heading-style-15 .page-heading__subtitle'),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for subtitle.','keylin'),
                'default'     => array(),
            ),

            array(
                'id'          => 'single-section-heading-style-15-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Single Post Section Font Setup for Heading Style 15','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => true, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => '.single .single-entry-section .block-heading.heading-style-15 .block-heading__title, .single .heading-style-15 .comment-reply-title, .page .heading-style-15 .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
        ),
    ) );
    // Heading Style 16 Font Setup
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Heading Font for Heading Style 16','keylin'),
        'id'               => 'module-heading-style-16-typography',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'    => 'heading16_img_info',
                'type'  => 'info',
                'style' => 'success',
                'title' => '<img src="https://keylin.bk-ninja.com/default/wp-content/uploads/2020/12/heading-16.png">',
                'icon'  => 'el-icon-info-sign',
            ),
            array(
                'id'          => 'module-heading-style-16-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading Font Setup for Heading Style 16','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'         => '.block-heading.heading-style-16:not(.carousel-heading--aside-title) .block-heading__title, .single .heading-style-16 .comment-reply-title, .page .heading-style-16 .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
            array(
                'id'          => 'module-sub-heading-style-16-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Sub Heading Font Setup for Heading Style 16','keylin'),
                'font-family' => false,
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array('.atbs-keylin-block-custom-margin .block-heading.heading-style-16 .page-heading__subtitle p, .block-heading.heading-style-16 .page-heading__subtitle'),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for subtitle.','keylin'),
                'default'     => array(),
            ),

            array(
                'id'          => 'single-section-heading-style-16-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Single Post Section Font Setup for Heading Style 16','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => true, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => '.single .single-entry-section .block-heading.heading-style-16 .block-heading__title, .single .heading-style-16 .comment-reply-title, .page .heading-style-16 .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
        ),
    ) );
    // Heading Style 17 Font Setup
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Heading Font for Heading Style 17','keylin'),
        'id'               => 'module-heading-style-17-typography',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'    => 'heading17_img_info',
                'type'  => 'info',
                'style' => 'success',
                'title' => '<img src="https://keylin.bk-ninja.com/default/wp-content/uploads/2020/12/heading-17.png">',
                'icon'  => 'el-icon-info-sign',
            ),
            array(
                'id'          => 'module-heading-style-17-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading Font Setup for Heading Style 17','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'         => '.block-heading.heading-style-17:not(.carousel-heading--aside-title) .block-heading__title, .single .heading-style-17 .comment-reply-title, .page .heading-style-17 .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
            array(
                'id'          => 'module-sub-heading-style-17-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Sub Heading Font Setup for Heading Style 17','keylin'),
                'font-family' => false,
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array('.atbs-keylin-block-custom-margin .block-heading.heading-style-17 .page-heading__subtitle p, .block-heading.heading-style-17 .page-heading__subtitle'),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for subtitle.','keylin'),
                'default'     => array(),
            ),

            array(
                'id'          => 'single-section-heading-style-17-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Single Post Section Font Setup for Heading Style 17','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => true, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => '.single .single-entry-section .block-heading.heading-style-17 .block-heading__title, .single .heading-style-17 .comment-reply-title, .page .heading-style-17 .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
        ),
    ) );
    // Heading Style 18 Font Setup
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Heading Font for Heading Style 18','keylin'),
        'id'               => 'module-heading-style-18-typography',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'    => 'heading18_img_info',
                'type'  => 'info',
                'style' => 'success',
                'title' => '<img src="https://keylin.bk-ninja.com/default/wp-content/uploads/2020/12/heading-18.png">',
                'icon'  => 'el-icon-info-sign',
            ),
            array(
                'id'          => 'module-heading-style-18-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading Font Setup for Heading Style 18','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'         => '.block-heading.heading-style-18:not(.carousel-heading--aside-title) .block-heading__title, .single .heading-style-18 .comment-reply-title, .page .heading-style-18 .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
            array(
                'id'          => 'module-sub-heading-style-18-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Sub Heading Font Setup for Heading Style 18','keylin'),
                'font-family' => false,
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array('.atbs-keylin-block-custom-margin .block-heading.heading-style-18 .page-heading__subtitle p, .block-heading.heading-style-18 .page-heading__subtitle'),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for subtitle.','keylin'),
                'default'     => array(),
            ),

            array(
                'id'          => 'single-section-heading-style-18-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Single Post Section Font Setup for Heading Style 18','keylin'),
                'font-family' => false,
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => true, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform'    => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => '.single .single-entry-section .block-heading.heading-style-18 .block-heading__title, .single .heading-style-18 .comment-reply-title, .page .heading-style-18 .comment-reply-title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for title.','keylin'),
                'default'     => array()
            ),
        ),
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Sub Heading Font','keylin'),
        'id'               => 'module-sub-heading-typography',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'          => 'module-sub-heading-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Sub Heading Font Setup','keylin'),
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => true, // Only appears if google is true and subsets not set to false
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
                'output'      => array('.atbs-keylin-block-custom-margin .block-heading .page-heading__subtitle p, .block-heading .page-heading__subtitle'),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for subtitle.','keylin'),
                'default'     => array(
                    'font-family' => 'Poppins',
                    'font-backup' => 'Arial, Helvetica, sans-serif',
                ),
            ),
        ),
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Default Widget Heading','keylin'),
        'id'               => 'default-widget-heading-subsection',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'=>'bk-default-widget-heading',
                'type' => 'select',
                'title' => esc_html__('Default Widget Heading', 'keylin'),
                'subtitle' => esc_html__('Default setting of all widget heading style.', 'keylin'),
                'options'   => array(
                                'line'              => esc_html__( 'Heading Line','keylin'),
                                'no-line'           => esc_html__( 'Heading No Line','keylin'),
                                'line-under'        => esc_html__( 'Heading Line Under','keylin'),
                                'center'            => esc_html__( 'Heading Center','keylin'),
                                'line-around'       => esc_html__( 'Heading Line Around','keylin'),
                            ),
                'default'    => 'line',
            ),
             array(
                'id'          => 'module-widget-heading-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Widget Heading Font Setup','keylin'),
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => true, // Only appears if google is true and subsets not set to false
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
                'output'      => array('.widget__title, .widget__title .widget__title-text'),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for widget title.','keylin'),
                'default'     => array(
                    'font-family' => 'Poppins',
                    'font-backup' => 'Arial, Helvetica, sans-serif',
                ),
            ),
        )
    ) );