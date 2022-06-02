<?php
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
    Redux::setSection( $opt_name, array(
        'id'    => 'single-page-settings-section',
        'icon'  => 'el-icon-indent-left',
        'title' => esc_html__('Single Page Settings', 'keylin'),
        'customizer_width'  => '500px',
        'fields'            => array(
            array(
                'id'        => 'bk-post-view--cache-time',
                'title'     => esc_html__('Post View Cache Time (in second)', 'keylin'),
                'desc'      => esc_html__('Default: 300 means 5 minutes', 'keylin'),
                'type'      => 'slider',
                'default'   => 300,
                'min'       => 0,
                'step'      => 5,
                'max'       => 3600,
                'display_value' => 'text'
            ),
            array(
                'id'=>'bk-single-template',
                'type' => 'image_select',
                'class' => 'bk-single-post-layout--global-option',
                'title' => esc_html__('Post Layout', 'keylin'),
                'options' => array(
                    'single-1' => array(
                        'alt' => 'Single Template 1',
                        'img' => get_template_directory_uri().'/images/admin_panel/single_page/single-1.png',
                    ),
                    'single-2' => array(
                        'alt' => 'Single Template 2',
                        'img' => get_template_directory_uri().'/images/admin_panel/single_page/single-2.png',
                    ),
                    'single-3' => array(
                        'alt' => 'Single Template 3',
                        'img' => get_template_directory_uri().'/images/admin_panel/single_page/single-3.png',
                    ),
                    'single-4' => array(
                        'alt' => 'Single Template 4',
                        'img' => get_template_directory_uri().'/images/admin_panel/single_page/single-4.png',
                    ),
                    'single-5' => array(
                        'alt' => 'Single Template 5',
                        'img' => get_template_directory_uri().'/images/admin_panel/single_page/single-5.png',
                    ),
                    'single-6' => array(
                        'alt' => 'Single Template 6',
                        'img' => get_template_directory_uri().'/images/admin_panel/single_page/single-6.png',
                    ),
                    'single-7' => array(
                        'alt' => 'Single Template 7',
                        'img' => get_template_directory_uri().'/images/admin_panel/single_page/single-7.png',
                    ),
                    'single-8' => array(
                        'alt' => 'Single Template 8',
                        'img' => get_template_directory_uri().'/images/admin_panel/single_page/single-8.png',
                    ),
                    'single-9' => array(
                        'alt' => 'Single Template 9',
                        'img' => get_template_directory_uri().'/images/admin_panel/single_page/single-9.png',
                    ),
                    'single-10' => array(
                        'alt' => 'Single Template 10',
                        'img' => get_template_directory_uri().'/images/admin_panel/single_page/single-10.png',
                    ),
                    'single-11' => array(
                        'alt' => 'Single Template 11',
                        'img' => get_template_directory_uri().'/images/admin_panel/single_page/single-11.png',
                    ),
                    'single-12' => array(
                        'alt' => 'Single Template 12',
                        'img' => get_template_directory_uri().'/images/admin_panel/single_page/single-12.png',
                    ),
                    'single-13' => array(
                        'alt' => 'Single Template 13',
                        'img' => get_template_directory_uri().'/images/admin_panel/single_page/single-13.png',
                    ),
                    'single-14' => array(
                        'alt' => 'Single Template 14',
                        'img' => get_template_directory_uri().'/images/admin_panel/single_page/single-14.png',
                    ),
                    'single-15' => array(
                        'alt' => 'Single Template 15',
                        'img' => get_template_directory_uri().'/images/admin_panel/single_page/single-15.png',
                    ),
                    'single-16' => array(
                        'alt' => 'Single Template 16',
                        'img' => get_template_directory_uri().'/images/admin_panel/single_page/single-16.png',
                    ),
                ),
                'default' => 'single-1',
            ),
            array(
                'title' => 'Single Header Background',
                'id'   => 'bk-single-header--bg-color',
                'type' => 'color',
                'default'  => '',
                'required' => array( 'bk-single-template', 'equals', array('single-7', 'single-8', 'single-9', 'single-10', 'single-14', 'single-15', 'single-16')),
            ),
            array(
                'title'      => esc_html__( 'Header Text', 'keylin' ),
                'id'        => 'bk-single-header--inverse',
                'type'      => 'button_set', 
                'options'   => array(
                    1 => esc_html__( 'White', 'keylin' ),
                    0 => esc_html__( 'Black', 'keylin' ),
                ),
                'default'   => 1,
                'required'  => array( 'bk-single-template', 'equals', array('single-7', 'single-8', 'single-9', 'single-10', 'single-14', 'single-15', 'single-16')),
            ),
            array(
                'title' => esc_html__( 'Featured Image Config','keylin'),
                'id' => 'bk-feat-img-status',
                'type'     => 'button_set',
                'options'  => array(
                    1 => esc_html__( 'On','keylin'),
                    0 => esc_html__( 'Off','keylin'),
                ),
                'default'   => 1,
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Infinity Scrolling','keylin'),
        'id'               => 'single-infinity-scrolling-subsection',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'      => 'single-sections-infinity-scrolling',
                'type'      => 'switch',
                'multi'     => false,
                'title'     => esc_html__('Infinity Scrolling', 'keylin'),
                'subtitle'  => esc_html__('Enable / Disable this feature in the single post page', 'keylin'),
                'desc'      => '',
                'options'   => array(
                    1   => esc_html__( 'Enable','keylin'),
                    0   => esc_html__( 'Disable','keylin'),
                ),
                'default' => 0,
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Single Page Scrolling Percentage Process','keylin'),
        'id'               => 'single-scroll-scrolling-percent-process-subsection',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'=>'bk-scroll-percent-sw',
                'type' => 'switch',
                'title' => esc_html__('Single Scroll Percent', 'keylin'),
                'default' => 1,
                'On' => esc_html__('Enabled', 'keylin'),
                'Off' => esc_html__('Disabled', 'keylin'),
            ),
            array(
                'id'=>'bk-scroll-percentage-progress',
                'required' => array('bk-scroll-percent-sw','=','1'),
                'type' => 'select',
                'title' => esc_html__('Percentage Progress', 'keylin'),
                'default' => 'style_2',
                'options'   => array(
                    'style_1'                  => esc_html__( 'A whole post page (0 - 100%)', 'keylin'),
                    'style_2'  => esc_html__( 'Post content section (0 - 100%)', 'keylin'),
                ),
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Section Layout Sorter','keylin'),
        'id'               => 'section-layout-sorter-subsection',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'      => 'single-sections-sorter',
                'type'    => 'sorter',
                'title'   => 'Manage Layouts',
                'desc'    => 'Organize the layout of Singe Page',
                'options' => array(
                    'enabled'  => array(
                        'related'  => esc_html__('Related Section', 'keylin'),
                        'comment'  => esc_html__('Comment Section', 'keylin'),
                        'same-cat' => esc_html__('Same Category Section', 'keylin'),
                    ),
                ),
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Single Page Sidebar','keylin'),
        'id'               => 'singe-page-sidebar-subsection',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'        => 'bk_post_sb_select',
                'type'      => 'select',
                'data'      => 'sidebars',
                'multi'     => false,
                'title'     => esc_html__('Single Page Sidebar', 'keylin'),
                'subtitle'  => esc_html__('Choose sidebar for single page', 'keylin'),
                'default'   => 'home_sidebar',
            ),
            array(
                'id'        => 'bk_post_sb_position',
                'type'      => 'image_select',
                'multi'     => false,
                'title'     => esc_html__('Sidebar Postion', 'keylin'),
                'desc'      => '',
                'options'   => array(
                                    'right' => array(
                                        'alt' => 'Sidebar Right',
                                        'img' => get_template_directory_uri().'/images/admin_panel/single_page/sb-right.png',
                                    ),
                                    'left' => array(
                                        'alt' => 'Sidebar Left',
                                        'img' => get_template_directory_uri().'/images/admin_panel/single_page/sb-left.png',
                                    ),
                            ),
                'default' => 'right',
            ),
            array(
                'id'        => 'bk_post_sb_sticky',
                'type'      => 'button_set',
                'multi'     => false,
                'title'     => esc_html__('Sticky Sidebar', 'keylin'),
                'subtitle'  => esc_html__('Enable Sticky Sidebar / Disable Sticky Sidebar', 'keylin'),
                'desc'      => '',
                'options'   => array(
                    1   => esc_html__( 'Enable','keylin'),
                    0   => esc_html__( 'Disable','keylin'),
                ),
                'default' => 1,
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Reaction Section','keylin'),
        'id'               => 'reaction-subsection',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
             array(
                'id'=>'bk-reaction-sw',
                'type' => 'switch',
                'title' => esc_html__('Enable Reaction Section', 'keylin'),
                'on' => esc_html__('Enabled', 'keylin'),
                'off' => esc_html__('Disabled', 'keylin'),
                'default' =>'off',
                'indent' => true
            ),
             array(
                'id'=>'bk-reaction-heading',
                'required' => array('bk-reaction-sw','=','1'),
                'type' => 'text',
                'title' => esc_html__('Reaction Heading', 'keylin'),
                'subtitle'  => esc_html__('Insert your text', 'keylin'),
                'default' => esc_html__('What is your reaction?', 'keylin'),
            ),
            //item 1
            array(
                'id'=>'bk-reaction-item-1-sw',
                'required' => array('bk-reaction-sw','=','1'),
                'type' => 'switch',
                'title' => esc_html__('Reaction Item 1', 'keylin'),
                'default' => 1,
                'on' => esc_html__('Enabled', 'keylin'),
                'off' => esc_html__('Disabled', 'keylin'),
            ),
            array(
                'id'=>'bk-reaction-item-1-svg',
                'required' => array('bk-reaction-item-1-sw','=','1'),
                'type' => 'text',
                'title' => esc_html__('Reaction SVG Image code', 'keylin'),
                'subtitle'  => esc_html__('Leave empty to use the default one', 'keylin'),
                'default' => '',
            ),
            array(
                'id'=>'bk-reaction-item-1-text',
                'required' => array('bk-reaction-item-1-sw','=','1'),
                'type' => 'text',
                'title' => esc_html__('Reaction Text', 'keylin'),
                'default' => esc_html__('Excited', 'keylin'),
            ),
            //item 2

            array(
                'id'=>'bk-reaction-item-2-sw',
                'required' => array('bk-reaction-sw','=','1'),
                'type' => 'switch',
                'title' => esc_html__('Reaction Item 2', 'keylin'),
                'default' => 1,
                'on' => esc_html__('Enabled', 'keylin'),
                'off' => esc_html__('Disabled', 'keylin'),
            ),
            array(
                'id'=>'bk-reaction-item-2-svg',
                'required' => array('bk-reaction-item-2-sw','=','1'),
                'type' => 'text',
                'title' => esc_html__('Reaction SVG Image code', 'keylin'),
                'subtitle'  => esc_html__('Leave empty to use the default one', 'keylin'),
                'default' => '',
            ),
            array(
                'id'=>'bk-reaction-item-2-text',
                'required' => array('bk-reaction-item-2-sw','=','1'),
                'type' => 'text',
                'title' => esc_html__('Reaction Text', 'keylin'),
                'default' => esc_html__('Happy', 'keylin'),
            ),
            //item 3

            array(
                'id'=>'bk-reaction-item-3-sw',
                'required' => array('bk-reaction-sw','=','1'),
                'type' => 'switch',
                'title' => esc_html__('Reaction Item 3', 'keylin'),
                'default' => 1,
                'on' => esc_html__('Enabled', 'keylin'),
                'off' => esc_html__('Disabled', 'keylin'),
            ),
            array(
                'id'=>'bk-reaction-item-3-svg',
                'required' => array('bk-reaction-item-3-sw','=','1'),
                'type' => 'text',
                'title' => esc_html__('Reaction SVG Image code', 'keylin'),
                'subtitle'  => esc_html__('Leave empty to use the default one', 'keylin'),
                'default' => '',
            ),
            array(
                'id'=>'bk-reaction-item-3-text',
                'required' => array('bk-reaction-item-3-sw','=','1'),
                'type' => 'text',
                'title' => esc_html__('Reaction Text', 'keylin'),
                'default' => esc_html__('In Love', 'keylin'),
            ),

            //item 4


            array(
                'id'=>'bk-reaction-item-4-sw',
                'required' => array('bk-reaction-sw','=','1'),
                'type' => 'switch',
                'title' => esc_html__('Reaction Item 4', 'keylin'),
                'default' => 1,
                'on' => esc_html__('Enabled', 'keylin'),
                'off' => esc_html__('Disabled', 'keylin'),
            ),
            array(
                'id'=>'bk-reaction-item-4-svg',
                'required' => array('bk-reaction-item-4-sw','=','1'),
                'type' => 'text',
                'title' => esc_html__('Reaction SVG Image code', 'keylin'),
                'subtitle'  => esc_html__('Leave empty to use the default one', 'keylin'),
                'default' => '',
            ),
            array(
                'id'=>'bk-reaction-item-4-text',
                'required' => array('bk-reaction-item-4-sw','=','1'),
                'type' => 'text',
                'title' => esc_html__('Reaction Text', 'keylin'),
                'default' => esc_html__('Not Sure', 'keylin'),
            ),
            //item 5
            array(
                'id'=>'bk-reaction-item-5-sw',
                'required' => array('bk-reaction-sw','=','1'),
                'type' => 'switch',
                'title' => esc_html__('Reaction Item 5', 'keylin'),
                'default' => 1,
                'on' => esc_html__('Enabled', 'keylin'),
                'off' => esc_html__('Disabled', 'keylin'),
            ),
            array(
                'id'=>'bk-reaction-item-5-svg',
                'required' => array('bk-reaction-item-5-sw','=','1'),
                'type' => 'text',
                'title' => esc_html__('Reaction SVG Image code', 'keylin'),
                'subtitle'  => esc_html__('Leave empty to use the default one', 'keylin'),
                'default' => '',
            ),
            array(
                'id'=>'bk-reaction-item-5-text',
                'required' => array('bk-reaction-item-5-sw','=','1'),
                'type' => 'text',
                'title' => esc_html__('Reaction Text', 'keylin'),
                'default' => esc_html__('Silly', 'keylin'),
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Social Share','keylin'),
        'id'               => 'social-share-subsection',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'=>'bk-sharebox-sw',
                'type' => 'switch',
                'title' => esc_html__('Enable share box', 'keylin'),
                'subtitle' => esc_html__('Enable share links below single post', 'keylin'),
                'default' => 1,
                'on' => esc_html__('Enabled', 'keylin'),
                'off' => esc_html__('Disabled', 'keylin'),
                'indent' => true
            ),
            array(
                'id'=>'bk-fb-sw',
                'required' => array('bk-sharebox-sw','=','1'),
                'type' => 'switch',
                'title' => esc_html__('Enable Facebook share link', 'keylin'),
                'default' => 1,
                'on' => esc_html__('Enabled', 'keylin'),
                'off' => esc_html__('Disabled', 'keylin'),
            ),
            array(
                'id'=>'bk-tw-sw',
                'required' => array('bk-sharebox-sw','=','1'),
                'type' => 'switch',
                'title' => esc_html__('Enable Twitter share link', 'keylin'),
                'default' => 1,
                'on' => esc_html__('Enabled', 'keylin'),
                'off' => esc_html__('Disabled', 'keylin'),
            ),
            array(
                'id'=>'bk-pi-sw',
                'required' => array('bk-sharebox-sw','=','1'),
                'type' => 'switch',
                'title' => esc_html__('Enable Pinterest share link', 'keylin'),
                'default' => 1,
                'on' => esc_html__('Enabled', 'keylin'),
                'off' => esc_html__('Disabled', 'keylin'),
            ),
            array(
                'id'=>'bk-li-sw',
                'required' => array('bk-sharebox-sw','=','1'),
                'type' => 'switch',
                'title' => esc_html__('Enable Linkedin share link', 'keylin'),
                'default' => 1,
                'on' => esc_html__('Enabled', 'keylin'),
                'off' => esc_html__('Disabled', 'keylin'),
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Author Box','keylin'),
        'id'               => 'author-box-subsection',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'=>'bk-authorbox-sw',
                'type' => 'switch',
                'title' => esc_html__('Enable author box', 'keylin'),
                'subtitle' => esc_html__('Enable author information below single post', 'keylin'),
                'default' => 1,
                'on' => esc_html__('Enabled', 'keylin'),
                'off' => esc_html__('Disabled', 'keylin'),
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Post Nav','keylin'),
        'id'               => 'post-nav-subsection',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'=>'bk-postnav-sw',
                'type' => 'switch',
                'title' => esc_html__('Enable post navigation', 'keylin'),
                'subtitle' => esc_html__('Enable post navigation below single post', 'keylin'),
                'default' => 1,
                'on' => esc_html__('Enabled', 'keylin'),
                'off' => esc_html__('Disabled', 'keylin'),
            ),
        )
    ) );